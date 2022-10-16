<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlacklistedEmail;
use App\Models\BlacklistedDomain;
use App\Helpers\GlobalHelper;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use DB;

class SettingsController extends Controller
{
    public function settings()
    {
        $meta_title = __('admin.settings');
        $providers = DB::table('marketing_providers')->get();
        $settings = DB::table('settings')->first();
        $options = DB::table('subscribe_options')->get();
        $currentProvider = null;
        $currentOption = null;
        $currentTick = 0;
        if(!is_null($settings))
        {
            $currentProvider = $settings->marketing_provider;
            $currentOption = $settings->subscribe_on_register;
            $currentTick = $settings->tick_subscribe;
        }
        return view('admin.settings', compact('meta_title', 'providers', 'options', 'currentProvider', 'currentOption', 'currentTick'));
    }

    public function updateSettings(Request $request)
    {

        $settings = Setting::first();
        if( is_null($settings)  )
        {
            return redirect()->back()->with('failureMsg', __('admin.the_settings_not_found'))->withInput();
        }

        $validator = Validator::make($request->all(), [
            'provider' => ['exists:marketing_providers,provider'],
            'subscribe_option' => ['exists:subscribe_options,option'],
            'tick_subscribe' => ['boolean'],
        ]);

        if( $validator->fails() )
        {
            $errorJson = $validator->errors();
            $beautifiedJson = GlobalHelper::beautifyJson($errorJson);

            return redirect()->back()->with('failureMsg', $beautifiedJson )->withErrors($validator)->withInput();
        }

        $settings->marketing_provider = $request->provider;
        $settings->subscribe_on_register = $request->subscribe_option;
        $settings->tick_subscribe = $request->tick_subscribe;
        $settings->save();

        return redirect(route('admin.settings'))->with('successMsg',  __('admin.settings_update_success'));
    }

    // BLACKLIST SETTINGS
    public function blacklist()
    {
        $meta_title = __('admin.blacklist');

        $domainBlacklist = null;
        $domainBlacklistArray = BlacklistedDomain::pluck('domain')->toArray();
        if(!empty($domainBlacklistArray))
        {
            $domainBlacklist = GlobalHelper::getSeparatedStringFromArray($domainBlacklistArray, '|');
        }

        $emailBlacklist = null;
        $emailBlacklistArray = BlacklistedEmail::pluck('email_address')->toArray();
        if(!empty($emailBlacklistArray))
        {
            $emailBlacklist = GlobalHelper::getSeparatedStringFromArray($emailBlacklistArray, '|');
        }

        return view('admin.blacklist', compact('meta_title', 'domainBlacklist', 'emailBlacklist'));
    }

    public function updateBlacklist(Request $request)
    {
        if(is_null($request->blacklisted_domains))
        {
            BlacklistedDomain::truncate();
        }
        else
        {
            $blacklistedDomainString = $request->blacklisted_domains;
            $blacklistedDomainArray = GlobalHelper::getArrayFromSeparatedString($blacklistedDomainString, '|');
            BlacklistedDomain::truncate();

            foreach($blacklistedDomainArray as $blacklistedDomain)
            {
                if($blacklistedDomain != '')
                {
                    $domain = new BlacklistedDomain;
                    $domain->domain = $blacklistedDomain;
                    $domain->save();
                }
            }
        }

        if(is_null($request->blacklisted_emails))
        {
            BlacklistedEmail::truncate();
        }
        else
        {
            $blacklistedEmailString = $request->blacklisted_emails;
            $blacklistedEmailArray = GlobalHelper::getArrayFromSeparatedString($blacklistedEmailString, '|');
            BlacklistedEmail::truncate();

            foreach($blacklistedEmailArray as $blacklistedEmail)
            {
                if($blacklistedEmail != '')
                {
                    $email = new BlacklistedEmail;
                    $email->email_address = $blacklistedEmail;
                    $email->save();
                }
            }
        }

        return redirect()->route('admin.blacklist')->with('successMsg', __('admin.blacklist_update_success'));
    }
}

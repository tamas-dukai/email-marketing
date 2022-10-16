<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\Validator;
use App\Models\MailchimpConfig;
use DB;

class MailchimpController extends Controller
{
    public function mailchimp()
    {
        $meta_title = __('admin.mailchimp');
        $config = DB::table('mailchimp_configs')->first();
        return view('admin.mailchimp', compact('meta_title', 'config'));
    }

    public function updateMailchimp(Request $request)
    {
        $config = MailchimpConfig::first();
        if( is_null($config)  )
        {
            return redirect()->back()->with('failureMsg', __('admin.the_config_not_found'))->withInput();
        }

        $validator = Validator::make($request->all(), [
            'api_key' => ['required', 'string', 'max:1000'],
            'list_id' => ['required', 'string', 'max:1000'],
            'server_prefix' => ['required', 'string', 'max:1000'],
        ]);

        if( $validator->fails() )
        {
            $errorJson = $validator->errors();
            $beautifiedJson = GlobalHelper::beautifyJson($errorJson);

            return redirect()->back()->with('failureMsg', $beautifiedJson )->withErrors($validator)->withInput();
        }

        $config->api_key = $request->api_key;
        $config->list_id = $request->list_id;
        $config->server_prefix = $request->server_prefix;
        $config->save();

        return redirect(route('admin.mailchimp'))->with('successMsg',  __('admin.settings_update_success'));
    }
}

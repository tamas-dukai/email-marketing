<?php

namespace App\Http\Controllers\EmailMarketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\GlobalHelper;
use App\Rules\BlacklistedDomainRule;
use App\Rules\BlacklistedEmailRule;
use App\Helpers\Marketing\MailChimpHelper;
use DB;
use Log;

class SubscribeController extends Controller
{
    private $mailChimp = 'mailchimp';

    public function subscribeToList(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email:filter', 'max:100', new BlacklistedDomainRule, new BlacklistedEmailRule],
        ]);

        if( $validation->fails() )
        {
            $errorJson = $validation->errors();
            $beautifiedJson = GlobalHelper::beautifyJson($errorJson);
            return json_encode(array('error' => $beautifiedJson));
        }

        $settings = DB::table('settings')->first();
        $provider = $settings->marketing_provider;
        if(empty($provider)) //previoulsy is_null($provider)
        {
            return json_encode(array('error' =>  __('email-marketing.provider_not_set')));
        }

        $errorMsg = '';
        $isSubscribed = false;
        if($provider == $this->mailChimp)
        {
            $isSubscribed = MailChimpHelper::subscribeToMailChimpList($request->name, $request->email, $errorMsg);
        }
        else
        {
            return json_encode(array('error' => __('email-marketing.invalid_provider')));
        }

        if(!$isSubscribed)
        {
            return json_encode(array('error' => $errorMsg));
        }

        return json_encode(array('success' => __('email-marketing.thanks_for_subscribing') ));
    }
}

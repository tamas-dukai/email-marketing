<?php

namespace App\Helpers\Marketing;

use DB;
use Exception;

class MailChimpHelper
{
    public static function subscribeToMailChimpList($name, $email, &$errorMsg)
    {
        $mailchimpConfig = DB::table('mailchimp_configs')->first();
        if(is_null($mailchimpConfig))
        {
            $errorMsg = __('email-marketing.mc_config_not_found');
            return false;
        }

        if(empty($mailchimpConfig->api_key)) // changed from is_null($mailchimpConfig->api_key)
        {
            $errorMsg = __('email-marketing.mc_api_not_found');
            return false;
        }

        if(empty($mailchimpConfig->list_id)) // changed from is_null($mailchimpConfig->list_id)
        {
            $errorMsg = __('email-marketing.mc_list_id_not_found');
            return false;
        }

        if(empty($mailchimpConfig->server_prefix)) // changed from is_null($mailchimpConfig->server_prefix)
        {
            $errorMsg = __('email-marketing.mc_server_prefix_not_found');
            return false;
        }

        $client = new \MailchimpMarketing\ApiClient();

        $client->setConfig([
            'apiKey' => $mailchimpConfig->api_key,
            'server' => $mailchimpConfig->server_prefix,
        ]);

        try
        {
            $response = $client->lists->addListMember($mailchimpConfig->list_id, [
                "email_address" => $email,
                "status" => "subscribed",
                'merge_fields'  => ['FNAME' => $name],
            ]);
        }
        catch(Exception $e)
        {
            if(method_exists($e, 'getResponse'))
            {
                $errorResponse = $e->getResponse();
                $jsonDecodedObj = json_decode($errorResponse->getBody()->getContents());
                // the error response from mailchimp should contain a detail property, which describes the error
                if(property_exists($jsonDecodedObj, 'detail'))
                {
                    $errorMsg = $jsonDecodedObj->detail;
                }
                else
                {
                    $errorMsg = __('email-marketing.sth_went_wrong_while_subscribe');
                }
            }
            else
            {
                $errorMsg = __('email-marketing.sth_went_wrong_with_request');
            }

            return false;
        }

        return true;
    }

}

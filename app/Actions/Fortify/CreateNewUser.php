<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Rules\BlacklistedDomainRule;
use App\Rules\BlacklistedEmailRule;
use App\Helpers\Marketing\SendyHelper;
use App\Helpers\Marketing\MailChimpHelper;
use App\Helpers\Marketing\ConvertkitHelper;
use App\Helpers\Marketing\SendinblueHelper;
use App\Helpers\Marketing\GetresponseHelper;
use DB;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    private $mailChimp = 'mailchimp'; private $sendy = 'sendy';
    private $convertkit = 'convertkit'; private $sendInBlue = 'sendinblue';
    private $getresponse = 'getresponse';

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            //'username' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
                new BlacklistedDomainRule,
                new BlacklistedEmailRule,
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $settings = DB::table('settings')->first();
        if(!is_null($settings))
        {
            if( ($settings->subscribe_on_register == 'automatic') ||
                ($settings->subscribe_on_register == 'checkbox' && array_key_exists('subscribe_newsletter', $input) &&
                 $input['subscribe_newsletter'] == 'subscribe_me')  )
            {
                $errorMsg = '';
                $provider = $settings->marketing_provider;
                if($provider == $this->mailChimp)
                {
                    $isSubscribed = MailChimpHelper::subscribeToMailChimpList($input['name'], $input['email'], $errorMsg);
                }
            }
        }

        return User::create([
            'name' => $input['name'],
            //'username' => $input['username'],
            // 'role_id' => '2', commented out because in user migration we have role_id = 2 set by default
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}

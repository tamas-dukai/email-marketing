<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class BlacklistedEmailRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $blackListedEmail = DB::table('blacklisted_emails')->where('email_address', $value)->first();

        if(!is_null($blackListedEmail))
        {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        //return 'This email address is not allowed.';
        return __('email-marketing.email_not_allowed');
    }
}

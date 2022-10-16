<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class BlacklistedDomainRule implements Rule
{
    private $emailDomain;
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
        $indexOfAtSign = strpos($value, '@');
        if( $indexOfAtSign == false )
        {
            return false;
        }

        $this->emailDomain = substr($value, $indexOfAtSign);

        $blacklistedDomain = DB::table('blacklisted_domains')->where('domain', $this->emailDomain)->first();
        if(!is_null($blacklistedDomain))
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
        return 'The email domain is not allowed: ' . $this->emailDomain . '. ';
    }
}

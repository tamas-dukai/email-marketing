<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used the admin panel for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'dashboard' => 'Admin Dashboard',
    'dashboard2' => 'Dashboard',
    'yes' => 'Yes',
    'no' => 'No',
    'save_settings' => 'Save settings',
    'home' => 'Home',
    'settings' => 'Settings',
    'email_providers' => 'Email Providers',
    'sendy' => 'Sendy',
    'mailchimp' => 'Mailchimp',
    'convertkit' => 'ConvertKit',
    'sendinblue' => 'SendinBlue',
    'getresponse' => 'Getresponse',
    'the_config_not_found' => 'The config cannot be found!',
    'the_settings_not_found' => 'The settings cannot be found!',

    // SETTINGS
    'email_marketing_settings' => 'Email Marketing Settings',
    'settings_update_success' => 'The settings have been successfully updated!',
    'select_service_provider' => 'Select service provider',
    'select_service_provider_info' => 'Select the email marketing provider that you want your subscription form to use.',
    'add_users_to_list' => 'ADD USERS TO LIST',
    'add_users_to_list_info' => 'Select an option from the dropdown menu how you want to handle newsletter subscription for newly registered users. Options: no -> users are not added automatically, automatic -> users are added to the list upon registration, checkbox -> users are added to the list if they check a checkbox.',
    'auto_check' => 'AUTOMATICALLY CHECK THE SUBSCRIBE CHECKBOX ON REGISTRATION',
    'auto_check_info' => 'If you want to check the subscribe checkbox automatically on the register page, select "Yes". This option is only relevant if the selected option above is "checkbox".',

    // BLACKLISTS
    'blacklist' => 'Blacklist',
    'blacklist_settings' => 'Blacklist Settings',
    'bl_title_desc' => 'Here you can control which email addresses or email domains are allowed to register on your site.',
    'bl_proh_emails' => 'Prohibited email domains',
    'bl_proh_emails_desc' => 'The email domains added here will not be allowed to register on the website. Use the pipe symbol "|" to separate multiple email domains.',
    'bl_proh_emails_ph' => 'For example: @yahoo.com|@hotmail.com',
    'bl_proh_address' => 'Prohibited email addresses',
    'bl_proh_address_desc' => 'The email addresses added here will not be allowed to register on the website. Use the pipe symbol "|" to separate multiple email addresses.',
    'bl_proh_address_ph' => 'For example: user@yahoo.com|user@hotmail.com',
    'blacklist_update_success' => 'The Blacklists have been successfully updated!',

    // SENDY
    'sendy_settings' => 'Sendy Settings',
    'sendy_install_url' => 'Sendy Installation URL',
    'sendy_install_url_info' => 'Add the full URL where you installed Sendy.',
    'sendy_api_key' => 'SENDY API KEY',
    'sendy_api_key_info' => 'Paste your Sendy API key here. You can find it under the settings option on your Sendy installation.',
    'sendy_list_id' => 'SENDY LIST ID',
    'sendy_list_id_info' => 'Paste your list ID where you want to save your subscribers.',

    // MAILCHIMP
    'mc_settings' => 'Mailchimp Settings',
    'mc_api_key' => 'MAILCHIMP API KEY',
    'mc_api_key_info' => 'Paste your Mailchimp API key here. You can create API keys in your Mailchimp account under the "Account" -> "Extras" menu.',
    'mc_list_id' => 'MAILCHIMP LIST ID',
    'mc_list_id_info' => 'Paste the list ID where you want to save your subscribers.',
    'mc_server_prefix' => 'MAILCHIMP SERVER PREFIX',
    'mc_server_prefix_info' => 'Paste your Server Prefix here.',

    // CONVERTKIT
    'ck_settings' => 'ConvertKit Settings',
    'ck_api_key' => 'CONVERTKIT API KEY',
    'ck_api_key_info' => 'Paste your ConvertKit API key here. You can find your API keys in your ConvertKit account under the "Settings" -> "Advanced" menu.',
    'ck_seq_id' => 'CONVERTKIT SEQUENCE ID',
    'ck_seq_id_info' => 'Paste the Sequence ID here. The Sequence is the list to which the users will be subscribed.',

    // SENDINBLUE
    'sb_settings' => 'SendinBlue Settings',
    'sb_api_key' => 'SENDINBLUE API KEY',
    'sb_api_key_info' => 'Paste your SendinBlue API key here. You can create API keys in your SendinBlue account under the "SMTP & API" menu-',
    'sb_email_list' => 'SENDINBLUE EMAIL LIST',
    'sb_email_list_info' => 'Paste the list ID where you want to save your subscribers.',

    // GETRESPONSE
    'gr_settings' => 'Getresponse Settings',
    'gr_api_key' => 'GETRESPONSE API KEY',
    'gr_api_key_info' => 'Paste your Getresponse API key here. You can create API keys in your Getresponse account under the "Menu" -> "Integrations and API".',
    'gr_email_list' => 'GETRESPONSE EMAIL LIST',
    'gr_email_list_info' => 'Paste the List Token where you want to save your subscribers.',

];

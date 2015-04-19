<?php

/*
 * This file is part of Laravel Redmine API Client.
 *
 * (c) Anton Pauli <anton.pauli@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Redmine Credentials
    |--------------------------------------------------------------------------
    |
    | Authentication can be done in 2 different ways:
    | - using your API key which is a handy way to avoid putting a password in a script
    | - using your regular login/password
    |
    | You have to provide credentials for at least one authentication type.
    */

    'url' => env('REDMINE_URL', 'https://your.redmain.com'),
    'key' => env('REDMINE_API_ACCESS_KEY', 'redmine_api_access_key'),
    'username' => env('REDMINE_USERNAME', 'redmine_username'),
    'password' => env('REDMINE_PASSWORD', 'redmine_password')

];

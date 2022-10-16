<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SendyController;
use App\Http\Controllers\Admin\MailchimpController;
use App\Http\Controllers\Admin\ConvertkitController;
use App\Http\Controllers\Admin\SendinBlueController;
use App\Http\Controllers\Admin\GetresponseController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\EmailMarketing\SubscribeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/subscribe-to-list', [SubscribeController::class, 'subscribeToList']);

// Routes for Admin group
Route::group([
    'as'=>'admin.',
    'prefix'=>'admin',
    'namespace'=>'Admin',
    'middleware' => ['auth', 'admin']],

    function() {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
        Route::put('settings/update', [SettingsController::class, 'updateSettings'])->name('settings.update');

        Route::get('blacklist', [SettingsController::class, 'blacklist'])->name('blacklist');
        Route::put('blacklist/update', [SettingsController::class, 'updateBlacklist'])->name('blacklist.update');

        Route::get('providers/sendy', [SendyController::class, 'sendy'])->name('sendy');

        Route::get('providers/mailchimp', [MailchimpController::class, 'mailchimp'])->name('mailchimp');
        Route::put('providers/mailchimp/update', [MailchimpController::class, 'updateMailchimp'])->name('mailchimp.update');

        Route::get('providers/convertkit', [ConvertkitController::class, 'convertkit'])->name('convertkit');

        Route::get('providers/sendinblue', [SendinBlueController::class, 'sendinblue'])->name('sendinblue');

        Route::get('providers/getresponse', [GetresponseController::class, 'getresponse'])->name('getresponse');

    }
);


// Routes for members
Route::group([
    'as'=>'member.',
    'prefix'=>'member',
    'namespace'=>'Member',
    'middleware' => ['auth']],

    function() {

        Route::get('dashboard', [MemberController::class, 'index'])->name('dashboard');

    }
);

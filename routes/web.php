<?php

use Illuminate\Support\Facades\Route;
use Parkwayprojects\PayWithBank3D\PayWithBank3DFacade;

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
    // $data = [
    //     'reference' => time(),
    //     'amount'=> 20000,
    //     'currencyCode' => 'NGN',
    //     'customer' => [
    //         'name' => 'Edward Paul',
    //         'email' => 'infinitypaul@live.com',
    //         'phone' => '08170574789'
    //     ],
    //     'returnUrl' => route('callback'),
    //     'metadata' => [
    //         'orderId'=> '1234'
    //     ]
    // ];
    // return PayWithBank3DFacade::setUrl($data)->redirectNow();
});

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');

Route::get('/payment/callback', 'PaymentController@handleGatewayCallback')->name('callback');

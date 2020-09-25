<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Parkwayprojects\PayWithBank3D\PayWithBank3D;
use Parkwayprojects\PayWithBank3D\PayWithBank3DFacade;

class PaymentController extends Controller
{
    public function collectData(Request $request){
        $data = [];
        $data['reference'] = time();
        $data['amount'] = $request->amount;
        $data['currencyCode'] = 'NGN';
        $data['returnUrl'] = route('callback');
        $data['customer']['name'] = $request->name;
        $data['customer']['email'] = $request->email;
        $data['customer']['phone'] = $request->phone;
        $data['metadata']['orderId'] = 12345;

        return $data;
    }

    /**
     * Redirect the User to PayWithBank3D Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        return PayWithBank3DFacade::setUrl()->redirectNow();
    }

    /**
     * Get The PayWithBank3D Redirect Url
     * @return array
     */
    public function redirectUrl()
    {
        return  PayWithBank3DFacade::getUrl();
    }

    /**
     * Obtain PayWithBank3D payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails =  PayWithBank3DFacade::getData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can then redirect or do whatever you want
    }
}

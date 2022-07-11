<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Model\Package;

/**
 * Class PayuMoneyController
 */
class PayuMoneyController extends \InfyOm\Payu\PayuMoneyController
{
    const TEST_URL = 'https://sandboxsecure.payu.in';
    const PRODUCTION_URL = 'https://secure.payu.in';
    public function paymentCancel(Request $request)
    {
        $data = $request->all();
        echo "<pre>";
        print_r($data);
        die;
        // your code here
    }

    public function paymentSuccess(Request $request)
    {
        $data = $request->all();
        $validHash = $this->checkHasValidHas($data);

        if (!$validHash) {
            echo "Invalid Transaction. Please try again";
        } else {
            // success code here
        }
    }

    public function checkHasValidHas($data)
    {
        $status = $data["status"];
        $firstname = $data["firstname"];
        $amount = $data["amount"];
        $txnid = $data["txnid"];
        $errorMessage = $data["error_Message"];

        $posted_hash = $data["hash"];
        $key = $data["key"];
        $productinfo = $data["productinfo"];
        $email = $data["email"];
        $salt = "";

        // Salt should be same Post Request

        if (isset($data["additionalCharges"])) {
            $additionalCharges = $data["additionalCharges"];
            $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        } else {
            $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        }

        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) {
            return  false;
        }

        return true;
    }

    public function redirectToPayU($id)
   {

       $sid = Crypt::decrypt($id);
       $package = Package::where('id',$sid)->first();
       $MERCHANT_KEY = config('payu.merchant_key');
       $SALT = config('payu.salt_key');

       $PAYU_BASE_URL = config('payu.test_mode') ? self::TEST_URL : self::PRODUCTION_URL;
       $action = '';


        $posted = array();
        $posted['amount'] = 10;
        $posted['firstname'] = 'bhupinder';
        $posted['email'] = 'testing@gmail.com';
        $posted['productinfo'] = '11';
        $posted['surl'] = 10;
        $posted['furl'] = 10;
        $posted['service_provider'] = 'ss';
        $posted['phone'] = '8360193897';
        $posted['key'] = '31';
       // if (!empty($data)) {
       //     foreach ($data as $key => $value) {
       //         $posted[$key] = $value;
       //     }
       // }

       $formError = 0;
       $txnid = substr(hash('sha256', mt_rand().microtime()), 0, 20);
       // Auth::user()->id
       $hash = Crypt::encrypt(21);
       $action = $PAYU_BASE_URL.'/_payment';

// Hash Sequence
       $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
       if (empty($posted['hash']) && sizeof($posted) > 0) {
           if (
               empty($posted['key'])
               || empty($posted['txnid'])
               || empty($posted['amount'])
               || empty($posted['firstname'])
               || empty($posted['email'])
               || empty($posted['phone'])
               || empty($posted['productinfo'])
               || empty($posted['surl'])
               || empty($posted['furl'])
               || empty($posted['service_provider'])
           ) {
               $formError = 1;
           } else {
//                $posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
               $hashVarsSeq = explode('|', $hashSequence);
               $hash_string = '';
               foreach ($hashVarsSeq as $hash_var) {
                   $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                   $hash_string .= '|';
               }

               $hash_string .= $SALT;


               $hash = strtolower(hash('sha512', $hash_string));
               $action = $PAYU_BASE_URL.'/_payment';

           }
       } elseif (!empty($posted['hash'])) {
           $hash = $posted['hash'];
           $action = $PAYU_BASE_URL.'/_payment';

       }

       return view('payumoney.pay',
           compact('hash', 'action', 'MERCHANT_KEY', 'formError', 'txnid', 'posted', 'SALT'));
   }



}

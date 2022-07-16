<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Session;
use Curl;
use DB;
use Crypt;
use Auth;
use DateTime;
use App\Helpers\GlobalFunctions as CommonHelper;


class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.contact.contact');
    }

    public function contactSave(Request $request)
    {
        $mailData = array('email'=>$request->email,'name'=>$request->name,'message'=>$request->message);
        $res = CommonHelper::sendmail('test@gmail.com', 'test','test@gmail.com',$request->firstName, 'Contact us' , ['data'=>$mailData], 'emails.contact','',$attachment=null);
        if($res)
        {
        $output['success'] ="true";
        $output['success_message'] ="Contact Form Submitted Successfully";
        $output['resetform'] ='true';
        }
        else
        {
         $output['formErrors'] ="true";
         $output['errors'] ="Contact form not send";
         }
        echo json_encode($output);
        exit;
    }

    public function about()
    {
        return view('front.about.about');
    }

    public function mediaCenter()
    {
        return view('front.media-center.media-center');
    }

    public function testimonials()
    {
        return view('front.testimonials.testimonials');
    }

    public function careers()
    {
        return view('front.career.career');
    }



}

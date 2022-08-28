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
use App\Model\Media;
use App\Model\Career;
use App\Model\Settings;


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
        $setting =  Settings::first();
        return view('front.contact.contact',['setting'=>$setting]);
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
        $media = Media::where('type',1)->orderby('displayOrder','ASC')->get();
        return view('front.media-center.media-center',['media'=>$media]);
    }

    public function testimonials()
    {
        return view('front.testimonials.testimonials');
    }

    public function careers()
    {
        $career = Career::orderby('displayOrder','ASC')->get();
        return view('front.career.career',['career'=>$career]);
    }



}

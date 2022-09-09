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

    public function sendContactUs(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'full_name' => 'required',
                                        'last_name' => 'required',
                                        'email' => 'required|email',
                                        'subject' => 'required',
                                        'message' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $getFullName = $request->full_name." ".$request->last_name;
            $getSubject = "Contact US :- ".$request->subject;
            $toEmail = "project87458@yopmail.com";
            $toName = "Project Data";
            $mailData = array('email' => $request->email, 'name'=> $getFullName, 'message' => $request->message);
            $res = CommonHelper::sendmail($toEmail, $toName, $toEmail, $toName, $getSubject , ['data'=>$mailData], 'emails.contact','',$attachment=null);
            if($res) {
                $response['success']         = true;
                $response['delayTime']       = '3000';
                $response['success_message'] = "Contact Form Submitted Successfully";
                // $response['url'] = route('contact.us.index');
                $response['resetform'] ='true';
                return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime'] = '3000';
                $response['errors'] = "Contact form not send";
                return response($response);
            }
        }
    }


    public function sendCarrier(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'full_name' => 'required',
                                        'last_name' => 'required',
                                        'email' => 'required|email',
                                        'phone' => 'required',
                                        'location' => 'required',
                                        'qualification' => 'required',
                                        'post' => 'required',
                                        'experience' => 'required',
                                        'ctc' => 'required',
                                        'expectedCtc' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $getFullName = $request->full_name." ".$request->last_name;
            $getSubject = "Carrer";
            $toEmail = "project87458@yopmail.com";
            $toName = "Project Data";
            $mailData = array('email' => $request->email, 'name'=> $getFullName, 'phone' => $request->phone,'location'=>$request->location,'qualification'=>$request->qualification,'ctc'=>$request->ctc,'expectedCtc'=>$request->expectedCtc,'experience'=>$request->experience,'post'=>$request->post);
            $res = CommonHelper::sendmail($toEmail, $toName, $toEmail, $toName, $getSubject , ['data'=>$mailData], 'emails.career','',$attachment=null);
            if($res) {
                $response['success']         = true;
                $response['delayTime']       = '3000';
                $response['success_message'] = "Career Form Submitted Successfully";
                $response['resetform'] ='true';
                return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime'] = '3000';
                $response['errors'] = "Career form not send";
                return response($response);
            }
        }
    }

}

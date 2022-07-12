<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Settings;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;


// use Illuminate\Support\Facades\Auth;
// use Carbon\Carbon;
// use DB;
// use Illuminate\Support\Facades\URL;



class SettingsController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $getSettingsData = array();
        $checkSettingsData = Settings::Query();
        if ($checkSettingsData->exists()) {
            $getSettingsData = $checkSettingsData->first();
        }
        return view('admin.settings.index',['prefix'=>$this->prefix, 'getSettingsData' => $getSettingsData]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'email' => 'required',
                                        'address' => 'required',
                                        'phone' => 'required',
                                        'fax' => 'required',
                                        'mobile' => 'required',
                                        'copyright' => 'required',
                                        'facebook' => 'required',
                                        'instagram' => 'required',
                                        'twitter' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['email'] = (trim($request->email)) ?? "";
            $saveData['address'] = (trim($request->address)) ?? "";
            $saveData['phone'] = (trim($request->phone)) ?? "";
            $saveData['fax'] = (trim($request->fax)) ?? "";
            $saveData['mobile'] = (trim($request->mobile)) ?? "";
            $saveData['copy_right'] = (trim($request->copyright)) ?? "";
            $saveData['facebook'] = (trim($request->facebook)) ?? "";
            $saveData['instagram'] = (trim($request->instagram)) ?? "";
            $saveData['twitter'] = (trim($request->twitter)) ?? "";

            if($request->hasFile('attachment')) {
                $getUniqueNo = time();
                $saveStorePath = "public/logo";
                $attachmentDoc = $request->file('attachment');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $saveData['logo'] = $attachmentDocFilenameToStore;
            }

            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Settings::where('id',$id)->update($saveData);
            } else {
                $user = new Settings($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Settings Saved Successfully.';
               $response['url'] = route('settings.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Settings Not Saved.';
                return response($response);
            }
        }
    }
}

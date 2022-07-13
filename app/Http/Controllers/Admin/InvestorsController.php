<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Investors;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;


// use Illuminate\Support\Facades\Auth;
// use Carbon\Carbon;
// use DB;
// use Illuminate\Support\Facades\URL;



class InvestorsController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Investors::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            if(!empty($request->search)) {
                $search = $request->search;
                $query->where('name', 'like', '%' . $search . '%');
            }
            $investorData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.investor.investorajax',['prefix'=>$this->prefix,'investorData'=>$investorData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else {
            $investorData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.investor.index',['prefix'=>$this->prefix,'investorData'=>$investorData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        return view('admin.investor.add',['prefix'=>$this->prefix]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'name' => 'required',
                                        'designation' => 'required',
                                        'mobile' => 'required',
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
            $saveData['name'] = (trim($request->name)) ?? "";
            $saveData['designation'] = (trim($request->designation)) ?? "";
            $saveData['mobile'] = (trim($request->mobile)) ?? "";
            $saveData['facebook'] = (trim($request->facebook)) ?? "";
            $saveData['instagram'] = (trim($request->instagram)) ?? "";
            $saveData['twitter'] = (trim($request->twitter)) ?? "";

            if($request->has('type')) {
                $saveData['type'] = "1";
            }

            if($request->hasFile('investor_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/investors";
                $attachmentDoc = $request->file('investor_image');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $saveData['image'] = $attachmentDocFilenameToStore;
            }

            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Investors::where('id',$id)->update($saveData);
            } else {
                $user = new Investors($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Investor Saved Successfully.';
               $response['url'] = route('investor.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Investor Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Investors::whereKey($id)->first();
        return view('admin.investor.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }

   public function update(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'name' => 'required',
                                        'designation' => 'required',
                                        'mobile' => 'required',
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
            $saveData['name'] = (trim($request->name)) ?? "";
            $saveData['designation'] = (trim($request->designation)) ?? "";
            $saveData['mobile'] = (trim($request->mobile)) ?? "";
            $saveData['facebook'] = (trim($request->facebook)) ?? "";
            $saveData['instagram'] = (trim($request->instagram)) ?? "";
            $saveData['twitter'] = (trim($request->twitter)) ?? "";

            $saveData['type'] = "0";
            if($request->has('type')) {
                $saveData['type'] = "1";
            }

            if($request->hasFile('investor_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/investors";
                $attachmentDoc = $request->file('investor_image');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $saveData['image'] = $attachmentDocFilenameToStore;
            }

            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Investors::where('id',$id)->update($saveData);
            } else {
                $user = new Investors($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Investor Updated Successfully.';
               $response['url'] = route('investor.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Investor Not Saved.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Investors::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Investor Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Investor Not Deleted.';
            return response($response);
        }
    }
}

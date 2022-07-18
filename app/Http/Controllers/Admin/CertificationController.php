<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Certification;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;

class CertificationController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Certification::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            /*if(!empty($request->search)) {
                $search = $request->search;
                $query->where('name', 'like', '%' . $search . '%');
            }*/
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.certification.certificationajax',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else {
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.certification.index',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        return view('admin.certification.add',['prefix'=>$this->prefix]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'certification_image' => 'required',
                                        'status' => 'required',
                                        'title' => 'required',
                                        'displayOrder' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['status'] = (trim($request->status)) ?? "";
            $saveData['title'] = (trim($request->title)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";

            if($request->hasFile('certification_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/certification";
                $attachmentDoc = $request->file('certification_image');
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
                $res = Certification::where('id',$id)->update($saveData);
            } else {
                $user = new Certification($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Certification Saved Successfully.';
               $response['url'] = route('certification.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Certification Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Certification::whereKey($id)->first();
        return view('admin.certification.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }

   public function update(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'status' => 'required',
                                        'title' => 'required',
                                        'displayOrder' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['status'] = (trim($request->status)) ?? "";
            $saveData['title'] = (trim($request->title)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";

            if($request->hasFile('certification_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/certification";
                $attachmentDoc = $request->file('certification_image');
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
                $res = Certification::where('id',$id)->update($saveData);
            } else {
                $user = new Certification($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Certification Updated Successfully.';
               $response['url'] = route('certification.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Certification Not Saved.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Certification::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Certification Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Certification Not Deleted.';
            return response($response);
        }
    }
}

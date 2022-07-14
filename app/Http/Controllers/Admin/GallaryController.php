<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Gallary;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;

class GallaryController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Gallary::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            /*if(!empty($request->search)) {
                $search = $request->search;
                $query->where('name', 'like', '%' . $search . '%');
            }*/
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.gallary.gallaryajax',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else {
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.gallary.index',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        return view('admin.gallary.add',['prefix'=>$this->prefix]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'gallary_image' => 'required',
                                        'status' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['status'] = (trim($request->status)) ?? "";

            if($request->hasFile('gallary_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/gallary";
                $attachmentDoc = $request->file('gallary_image');
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
                $res = Gallary::where('id',$id)->update($saveData);
            } else {
                $user = new Gallary($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Gallary Saved Successfully.';
               $response['url'] = route('gallary.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Gallary Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Gallary::whereKey($id)->first();
        return view('admin.gallary.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }

   public function update(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'gallary_image' => 'required',
                                        'status' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['status'] = (trim($request->status)) ?? "";

            if($request->hasFile('gallary_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/gallary";
                $attachmentDoc = $request->file('gallary_image');
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
                $res = Gallary::where('id',$id)->update($saveData);
            } else {
                $user = new Gallary($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Gallary Updated Successfully.';
               $response['url'] = route('gallary.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Gallary Not Saved.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Gallary::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Gallary Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Gallary Not Deleted.';
            return response($response);
        }
    }
}

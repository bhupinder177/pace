<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Career;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;

class CareerController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Career::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            if(!empty($request->search)) {
                $search = $request->search;
                $query->where('title', 'like', '%' . $search . '%');
            }
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.career.careerajax',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else {
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.career.index',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        return view('admin.career.add',['prefix'=>$this->prefix]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'title' => 'required',
                                        'description' => 'required',
                                        'status' => 'required',
                                        'designation'=>'required',
                                        'experience'=>'required',
                                        'displayOrder'=>'required',
                                        'postedOn'=>'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['title'] = (trim($request->title)) ?? "";
            $saveData['description'] = (trim($request->description)) ?? "";
            $saveData['status'] = (trim($request->status)) ?? "";
            $saveData['designation'] = (trim($request->designation)) ?? "";
            $saveData['experience'] = (trim($request->experience)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";
            $saveData['postedOn'] = date("Y-m-d", strtotime($request->postedOn));

            if($request->hasFile('career_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/career";
                $attachmentDoc = $request->file('career_image');
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
                $res = Career::where('id',$id)->update($saveData);
            } else {
                $user = new Career($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Career Saved Successfully.';
               $response['url'] = route('career.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Career Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Career::whereKey($id)->first();
        return view('admin.career.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }

   public function update(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'title' => 'required',
                                        'description' => 'required',
                                        'status' => 'required',
                                        'designation'=>'required',
                                        'experience'=>'required',
                                        'displayOrder'=>'required',
                                        'postedOn'=>'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['title'] = (trim($request->title)) ?? "";
            $saveData['description'] = (trim($request->description)) ?? "";
            $saveData['status'] = (trim($request->status)) ?? "";
            $saveData['designation'] = (trim($request->designation)) ?? "";
            $saveData['experience'] = (trim($request->experience)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";
            $saveData['postedOn'] = date("Y-m-d", strtotime($request->postedOn));


            if($request->hasFile('career_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/career";
                $attachmentDoc = $request->file('career_image');
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
                $res = Career::where('id',$id)->update($saveData);
            } else {
                $user = new Career($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Career Updated Successfully.';
               $response['url'] = route('career.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Career Not Saved.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Career::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Career Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Career Not Deleted.';
            return response($response);
        }
    }
}

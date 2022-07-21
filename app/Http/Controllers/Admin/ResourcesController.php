<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Resources;
use App\Model\ResourcesAttachment;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class ResourcesController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Resources::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            if(!empty($request->search)) {
                $search = $request->search;
                $query->where('title', 'like', '%' . $search . '%');
            }
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.resources.resourcesajax',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else {
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.resources.index',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        return view('admin.resources.add',['prefix'=>$this->prefix]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'title' => 'required',
                                        'display_order' => 'required|integer',
                                        'status' => 'required',
                                        // 'attachment.*' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['title'] = (trim($request->title)) ?? "";
            $saveData['display_order'] = (trim($request->display_order)) ?? "";
            $saveData['status'] = (trim($request->status)) ?? "";

            if ($request->has('id')) {
                $getId = Crypt::decrypt($request->id);
                $res = Resources::where('id',$id)->update($saveData);
            } else {
                $user = new Resources($saveData);
                $res =  $user->save();
                $getId = $user->id;
            }

            if($res) {
                $getResourcesId = $getId;
                if($request->hasFile('attachment')) {
                    $htmlView = "";
                    $allAttachmentDoc = $request->file('attachment');
                    $saveStorePath = "public/resources";
                    $saveAttachments = array();
                    foreach ($allAttachmentDoc as $attachmentDoc) {
                        $getUniqueNo = time();
                        $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                        $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                        $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                        $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                        $extension = $attachmentDoc->getClientOriginalExtension();
                        $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                        $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                        $saveAttachments[] = array(
                                                    "resources_id" => $getResourcesId,
                                                    "image" => $attachmentDocFilenameToStore,
                                                    "created_at" => Carbon::now(),
                                                    "updated_at" => Carbon::now(),
                                                );
                    }

                    if (!empty($saveAttachments)) {
                        ResourcesAttachment::insert($saveAttachments);
                    }
                }
                $response['success']         = true;
                $response['delayTime']       = '3000';
                $response['success_message'] = 'Resources Saved Successfully.';
                $response['url'] = route('resources.index');
                $response['resetform'] ='true';
                return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Resources Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Resources::whereKey($id)->first();
        return view('admin.resources.edit',['result'=>$result,'prefix'=>$this->prefix]);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'title' => 'required',
                                        'display_order' => 'required|integer',
                                        'status' => 'required',
                                        // 'attachment.*' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['title'] = (trim($request->title)) ?? "";
            $saveData['display_order'] = (trim($request->display_order)) ?? "";
            $saveData['status'] = (trim($request->status)) ?? "";

            if ($request->has('id')) {
                $getId = Crypt::decrypt($request->id);
                $res = Resources::where('id',$getId)->update($saveData);
            } else {
                $user = new Resources($saveData);
                $res =  $user->save();
                $getId = $user->id;
            }

            if($res) {
                $getResourcesId = $getId;
                if($request->hasFile('attachment')) {
                    $htmlView = "";
                    $allAttachmentDoc = $request->file('attachment');
                    $saveStorePath = "public/resources";
                    $saveAttachments = array();
                    foreach ($allAttachmentDoc as $attachmentDoc) {
                        $getUniqueNo = time();
                        $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                        $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                        $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                        $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                        $extension = $attachmentDoc->getClientOriginalExtension();
                        $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                        $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                        $saveAttachments[] = array(
                                                    "resources_id" => $getResourcesId,
                                                    "image" => $attachmentDocFilenameToStore,
                                                    "created_at" => Carbon::now(),
                                                    "updated_at" => Carbon::now(),
                                                );
                    }

                    if (!empty($saveAttachments)) {
                        ResourcesAttachment::insert($saveAttachments);
                    }
                }
                $response['success']         = true;
                $response['delayTime']       = '3000';
                $response['success_message'] = 'Resources Updated Successfully.';
                $response['url'] = route('resources.index');
                $response['resetform'] ='true';
                return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Resources Not Updated.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Resources::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Resources Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Resources Not Deleted.';
            return response($response);
        }
    }

    public function resourcesDeleteAttachment(Request $request) {
        $res = ResourcesAttachment::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Attachment Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Attachment Not Deleted.';
            return response($response);
        }
    }
}

<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Media;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;

class MediaController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Media::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            if(!empty($request->search)) {
                $search = $request->search;
                $query->where('title', 'like', '%' . $search . '%');
            }
            $investorData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.media.mediaajax',['prefix'=>$this->prefix,'mediaData'=>$mediaData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else {
            $mediaData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.media.media',['prefix'=>$this->prefix,'mediaData'=>$mediaData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        return view('admin.media.add',['prefix'=>$this->prefix]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'title' => 'required',
                                        'type' => 'required',
                                        'displayOrder' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['title'] = (trim($request->title)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";
            $saveData['showOnHome'] = (trim($request->showOnHome)) ?? "";

            if($request->has('type')) {
                $saveData['type'] = $request->type;
            }

            if($request->hasFile('media_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/media";
                $attachmentDoc = $request->file('media_image');
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
                $res = Media::where('id',$id)->update($saveData);
            } else {
                $user = new Media($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Media Saved Successfully.';
               $response['url'] = route('media.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Media Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Media::whereKey($id)->first();
        return view('admin.media.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }

   public function update(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'title' => 'required',
                                        'type' => 'required',
                                        'displayOrder'=>'required'
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['title'] = (trim($request->title)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";
            $saveData['showOnHome'] = (trim($request->showOnHome)) ?? "";

            if($request->has('type')) {
                $saveData['type'] = $request->type;
            }

            if($request->hasFile('media_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/media";
                $attachmentDoc = $request->file('media_image');
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
                $res = Media::where('id',$id)->update($saveData);
            } else {
                $user = new Media($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Media Updated Successfully.';
               $response['url'] = route('media.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Media Not Saved.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Media::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Media Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Media Not Deleted.';
            return response($response);
        }
    }
}

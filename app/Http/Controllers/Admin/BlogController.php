<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Blog;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;
use App\Services\PageSlug;

class BlogController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Blog::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            if(!empty($request->search)) {
                $search = $request->search;
                $query->where('title', 'like', '%' . $search . '%');
            }
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.blog.blogajax',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        } else {
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.blog.index',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        return view('admin.blog.add',['prefix'=>$this->prefix]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'title' => 'required',
                                        'status' => 'required',
                                        'description' => 'required',
                                        'displayOrder' => 'required',

                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $getTitle = (trim($request->title)) ?? "";
            $saveData['title'] = $getTitle;
            $saveData['status'] = (trim($request->status)) ?? "";
            $saveData['description'] = (trim($request->description)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";


            if($request->hasFile('blog_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/blog";
                $attachmentDoc = $request->file('blog_image');
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
                $res = Blog::where('id',$id)->update($saveData);
            } else {
                $user = new Blog($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Blog Saved Successfully.';
               $response['url'] = route('blog.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Blog Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Blog::whereKey($id)->first();
        return view('admin.blog.edit',['result'=>$result,'prefix'=>$this->prefix]);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'title' => 'required',
                                        'status' => 'required',
                                        'description' => 'required',
                                        'displayOrder' => 'required',

                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $getTitle = (trim($request->title)) ?? "";
            $saveData['title'] = $getTitle;
            $saveData['status'] = (trim($request->status)) ?? "";
            $saveData['description'] = (trim($request->description)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";


            if($request->hasFile('blog_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/blog";
                $attachmentDoc = $request->file('blog_image');
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
                $res = Blog::where('id',$id)->update($saveData);
            } else {
                $saveData['slug'] = (PageSlug::createSlug($getTitle)) ?? "";
                $user = new Blog($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Blog Updated Successfully.';
               $response['url'] = route('blog.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Page Not Saved.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Blog::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Blog Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Blog Not Deleted.';
            return response($response);
        }
    }
}

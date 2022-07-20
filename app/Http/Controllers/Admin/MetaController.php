<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Meta;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;

class MetaController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Meta::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            if(!empty($request->search)) {
                $search = $request->search;
                $query->where('title', 'like', '%' . $search . '%');
            }
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.meta.metaajax',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else {
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.meta.index',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        return view('admin.meta.add',['prefix'=>$this->prefix]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'title' => 'required',
                                        'description' => 'required',
                                        'keyword' => 'required',
                                        'page_type' => 'required|unique:metas',
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
            $saveData['page_type'] = (trim($request->page_type)) ?? "";
            $saveData['keyword'] = (trim($request->keyword)) ?? "";

            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Meta::where('id',$id)->update($saveData);
            } else {
                $user = new Meta($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Meta Saved Successfully.';
               $response['url'] = route('meta.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Meta Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Meta::whereKey($id)->first();
        return view('admin.meta.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }

    public function update(Request $request) {
        $id = "";
        if ($request->has('id')) {
            $id = Crypt::decrypt($request->id);
        }
        $validator = Validator::make($request->all(),[
                                        'title' => 'required',
                                        'description' => 'required',
                                        'keyword' => 'required',
                                        'page_type' => 'required|unique:metas,page_type,'.$id,
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
            $saveData['page_type'] = (trim($request->page_type)) ?? "";
            $saveData['keyword'] = (trim($request->keyword)) ?? "";


            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Meta::where('id',$id)->update($saveData);
            } else {
                $user = new Meta($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Meta Updated Successfully.';
               $response['url'] = route('meta.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Meta Not Saved.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Meta::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Meta Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Meta Not Deleted.';
            return response($response);
        }
    }
}

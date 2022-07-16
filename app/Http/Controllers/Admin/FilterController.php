<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Filter;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;

class FilterController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Filter::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            if(!empty($request->search)) {
                $search = $request->search;
                $query->where('category', 'like', '%' . $search . '%');
            }
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.filter.filterajax',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else {
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.filter.index',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        return view('admin.filter.add',['prefix'=>$this->prefix]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'category' => 'required',
                                        'structure' => 'required',
                                        'species' => 'required',
                                        'status' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['category'] = (trim($request->category)) ?? "";
            $saveData['structure'] = (trim($request->structure)) ?? "";
            $saveData['species'] = (trim($request->species)) ?? "";
            $saveData['status'] = (trim($request->status)) ?? "";

            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Filter::where('id',$id)->update($saveData);
            } else {
                $user = new Filter($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Filter Saved Successfully.';
               $response['url'] = route('filter.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Filter Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Filter::whereKey($id)->first();
        return view('admin.filter.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }

   public function update(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'category' => 'required',
                                        'structure' => 'required',
                                        'species' => 'required',
                                        'status' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['category'] = (trim($request->category)) ?? "";
            $saveData['structure'] = (trim($request->structure)) ?? "";
            $saveData['species'] = (trim($request->species)) ?? "";
            $saveData['status'] = (trim($request->status)) ?? "";

            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Filter::where('id',$id)->update($saveData);
            } else {
                $user = new Filter($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Filter Updated Successfully.';
               $response['url'] = route('filter.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Filter Not Saved.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Filter::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Filter Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Filter Not Deleted.';
            return response($response);
        }
    }
}

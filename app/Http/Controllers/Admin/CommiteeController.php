<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Commitees;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;

class CommiteeController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Commitees::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            if(!empty($request->search)) {
                $search = $request->search;
                $query->where('title', 'like', '%' . $search . '%');
            }
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.Commitees.Commiteesajax',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else {
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.Commitees.index',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        return view('admin.Commitees.add',['prefix'=>$this->prefix]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'name' => 'required',
                                        'department' => 'required',
                                        'type' => 'required',
                                        'designation'=>'required',
                                        'displayOrder'=>'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['name'] = (trim($request->name)) ?? "";
            $saveData['type'] = (trim($request->type)) ?? "";
            $saveData['designation'] = (trim($request->designation)) ?? "";
            $saveData['department'] = (trim($request->department)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";



            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Commitees::where('id',$id)->update($saveData);
            } else {
                $user = new Commitees($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Commitees Saved Successfully.';
               $response['url'] = route('commitee.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Commitees Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Commitees::whereKey($id)->first();
        return view('admin.Commitees.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }

   public function update(Request $request) {
        $validator = Validator::make($request->all(),[
          'name' => 'required',
          'department' => 'required',
          'type' => 'required',
          'designation'=>'required',
          'displayOrder'=>'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['name'] = (trim($request->name)) ?? "";
            $saveData['type'] = (trim($request->type)) ?? "";
            $saveData['designation'] = (trim($request->designation)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";
            $saveData['department'] =(trim($request->department)) ?? "";




            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Commitees::where('id',$id)->update($saveData);
            } else {
                $user = new Commitees($saveData);
                $res =  $user->save();
            }

            if($res) {
               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Commitees Updated Successfully.';
               $response['url'] = route('commitee.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Commitees Not Saved.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Commitees::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Commitees Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Commitees Not Deleted.';
            return response($response);
        }
    }
}

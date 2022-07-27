<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Filter;
use App\Model\FilterRelationType;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

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
                $query->where('filterValue', 'like', '%' . $search . '%');
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
                                        'filterType' => 'required',
                                        'filterValue' => 'required',
                                        'displayOrder' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['filterType'] = (trim($request->filterType)) ?? "";
            $saveData['filterValue'] = (trim($request->filterValue)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";

            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $getFilterTypeId = $id;
                $res = Filter::where('id',$id)->update($saveData);
            } else {
                $user = new Filter($saveData);
                $res =  $user->save();
                $getFilterTypeId = $user->id;
            }

            if($res) {
                // if($request->has('filterType')) {
                //     $getFilterTypes = ($request->filterType) ?? array();
                //     $saveFilterTypes = array();
                //     foreach ($getFilterTypes as $getFilterType) {
                //         $saveFilterTypes[] = array(
                //                                         "filter_id" => $getFilterTypeId,
                //                                         "filter_type_id" => $getFilterType,
                //                                         "created_at" => Carbon::now(),
                //                                         "updated_at" => Carbon::now(),
                //                                     );
                //     }
                //     if (!empty($saveFilterTypes)) {
                //         FilterRelationType::insert($saveFilterTypes);
                //     }
                // }
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
                                        'filterType' => 'required',
                                        'filterValue' => 'required',
                                        'displayOrder' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['filterType'] = (trim($request->filterType)) ?? "";
            $saveData['filterValue'] = (trim($request->filterValue)) ?? "";
            $saveData['displayOrder'] = (trim($request->displayOrder)) ?? "";


            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $getFilterTypeId = $id;
                $res = Filter::where('id',$id)->update($saveData);
            } else {
                $user = new Filter($saveData);
                $res =  $user->save();
                $getFilterTypeId = $user->id;
            }

            if($res) {

                // if($request->has('filterType')) {
                //     $getFilterTypes = ($request->filterType) ?? array();
                //     $saveFilterTypes = array();
                //     FilterRelationType::where('filter_id',$getFilterTypeId)->delete();
                //     foreach ($getFilterTypes as $getFilterType) {
                //         $saveFilterTypes[] = array(
                //                                         "filter_id" => $getFilterTypeId,
                //                                         "filter_type_id" => $getFilterType,
                //                                         "created_at" => Carbon::now(),
                //                                         "updated_at" => Carbon::now(),
                //                                     );
                //     }
                //     if (!empty($saveFilterTypes)) {
                //         FilterRelationType::insert($saveFilterTypes);
                //     }
                // }
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

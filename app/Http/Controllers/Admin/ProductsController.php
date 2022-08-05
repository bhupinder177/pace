<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Products;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;
use App\Model\Categories;
use App\Model\Filter;
use App\Model\ProRelFilTy;
use Carbon\Carbon;

class ProductsController extends Controller
{
    public function index(Request $request) {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Products::query();
        if($request->ajax()){
            if(isset($request->peritem)) {
                $perpage = $request->peritem;
            }
            if(!empty($request->search)) {
                $search = $request->search;
                $query->where('product_name', 'like', '%' . $search . '%');
            }
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            $html =  view('admin.product.productajax',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        } else {
            $allData = $query->orderby('id','DESC')->paginate($perpage);
            return view('admin.product.index',['prefix'=>$this->prefix,'allData'=>$allData,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
        }
    }

    public function add() {
        $this->prefix = request()->route()->getPrefix();
        $getCategories = array();
        $getFilter = array();
        $checkCategory = Categories::Query();
        $checkFilter = Filter::Query();
        if ($checkCategory->exists()) {
            $getCategories = $checkCategory->get();
        }
        if ($checkFilter->exists()) {
            $getFilter = $checkFilter->get();
        }
        return view('admin.product.add',['prefix'=>$this->prefix,'getFilter'=>$getFilter,'getCategories' => $getCategories]);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'product_name' => 'required',
                                        'category_id' => 'required',
                                        'filter_type_id' => 'required',
                                        // 'thumbnail_image' => 'required',
                                        'main_image' => 'required',
                                        'short_description' => 'required',
                                        'product_features' => 'required',
                                        'product_long_description' => 'required',
                                        'display_order' => 'required',
                                        'meta_title' => 'required',
                                        'meta_description' => 'required',
                                        'meta_keyword' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['product_name'] = (trim($request->product_name)) ?? "";
            $saveData['category_id'] = (trim($request->category_id)) ?? "";
            // $saveData['filter_type_id'] = (trim($request->filter_type_id)) ?? "";
            $saveData['short_description'] = (trim($request->short_description)) ?? "";
            $saveData['product_features'] = (trim($request->product_features)) ?? "";
            $saveData['product_long_description'] = (trim($request->product_long_description)) ?? "";
            $saveData['display_order'] = (trim($request->display_order)) ?? "";
            $saveData['meta_title'] = (trim($request->meta_title)) ?? "";
            $saveData['meta_description'] = (trim($request->meta_description)) ?? "";
            $saveData['meta_keyword'] = (trim($request->meta_keyword)) ?? "";

            if($request->hasFile('thumbnail_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/products";
                $attachmentDoc = $request->file('thumbnail_image');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $saveData['thumbnail_image'] = $attachmentDocFilenameToStore;
            }

            if($request->hasFile('main_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/products";
                $attachmentDoc = $request->file('main_image');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $saveData['main_image'] = $attachmentDocFilenameToStore;
            }

            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Products::where('id',$id)->update($saveData);
            } else {
                $user = new Products($saveData);
                $res = $user->save();
                $id = $user->id;
            }

            if($res) {

                if($request->has('filter_type_id')) {
                    $getProductFilters = ($request->filter_type_id) ?? array();
                    $saveProductFilter = array();
                    foreach ($getProductFilters as $getProductFilter) {
                        $saveProductFilter[] = array(
                                                        "pro_id" => $id,
                                                        "fil_id" => $getProductFilter,
                                                        "created_at" => Carbon::now(),
                                                        "updated_at" => Carbon::now(),
                                                    );
                    }
                    if (!empty($saveProductFilter)) {
                        ProRelFilTy::insert($saveProductFilter);
                    }
                }

                $response['success']         = true;
                $response['delayTime']       = '3000';
                $response['success_message'] = 'Product Saved Successfully.';
                $response['url'] = route('product.index');
                $response['resetform'] ='true';
                return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Product Not Saved.';
                return response($response);
            }
        }
    }

    public function edit($id) {
        $id = Crypt::decrypt($id);
        $this->prefix = request()->route()->getPrefix();
        $result = Products::whereKey($id)->first();
        $getCategories = array();
        $getFilter = array();
        $checkCategory = Categories::Query();
        $checkFilter = Filter::Query();
        if ($checkCategory->exists()) {
            $getCategories = $checkCategory->get();
        }
        if ($checkFilter->exists()) {
            $getFilter = $checkFilter->get();
        }
        return view('admin.product.edit',['result'=>$result,'prefix'=>$this->prefix,'getFilter'=>$getFilter,'getCategories' => $getCategories]);
   }

   public function update(Request $request) {
        $validator = Validator::make($request->all(),[
                                        'product_name' => 'required',
                                        'category_id' => 'required',
                                        // 'filter_type_id' => 'required',
                                        // 'thumbnail_image' => 'required',
                                        // 'main_image' => 'required',
                                        'short_description' => 'required',
                                        'product_features' => 'required',
                                        'product_long_description' => 'required',
                                        'display_order' => 'required',
                                        'meta_title' => 'required',
                                        'meta_description' => 'required',
                                        'meta_keyword' => 'required',
                                    ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']  = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $saveData = array();
            $saveData['product_name'] = (trim($request->product_name)) ?? "";
            $saveData['category_id'] = (trim($request->category_id)) ?? "";
            // $saveData['filter_type_id'] = (trim($request->filter_type_id)) ?? "";
            $saveData['short_description'] = (trim($request->short_description)) ?? "";
            $saveData['product_features'] = (trim($request->product_features)) ?? "";
            $saveData['product_long_description'] = (trim($request->product_long_description)) ?? "";
            $saveData['display_order'] = (trim($request->display_order)) ?? "";
            $saveData['meta_title'] = (trim($request->meta_title)) ?? "";
            $saveData['meta_description'] = (trim($request->meta_description)) ?? "";
            $saveData['meta_keyword'] = (trim($request->meta_keyword)) ?? "";

            if($request->hasFile('thumbnail_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/products";
                $attachmentDoc = $request->file('thumbnail_image');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $saveData['thumbnail_image'] = $attachmentDocFilenameToStore;
            }

            if($request->hasFile('main_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/products";
                $attachmentDoc = $request->file('main_image');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $saveData['main_image'] = $attachmentDocFilenameToStore;
            }

            if ($request->has('id')) {
                $id = Crypt::decrypt($request->id);
                $res = Products::where('id',$id)->update($saveData);
            } else {
                $user = new Products($saveData);
                $res = $user->save();
                $id = $user->id;
            }

            if($res) {

                if($request->has('filter_type_id')) {
                    $getProductFilters = ($request->filter_type_id) ?? array();
                    $saveProductFilter = array();
                    ProRelFilTy::where('pro_id',$id)->delete();
                    foreach ($getProductFilters as $getProductFilter) {
                        $saveProductFilter[] = array(
                                                        "pro_id" => $id,
                                                        "fil_id" => $getProductFilter,
                                                        "created_at" => Carbon::now(),
                                                        "updated_at" => Carbon::now(),
                                                    );
                    }
                    if (!empty($saveProductFilter)) {
                        ProRelFilTy::insert($saveProductFilter);
                    }
                }

               $response['success']         = true;
               $response['delayTime']       = '3000';
               $response['success_message'] = 'Product Updated Successfully.';
               $response['url'] = route('product.index');
               $response['resetform'] ='true';
               return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Product Not Saved.';
                return response($response);
            }
        }
    }

    public function delete(Request $request) {
        $res = Products::destroy($request['id']);
        if($res) {
            $response['success']         = true;
            $response['delayTime']       = '2000';
            $response['success_message'] = 'Product Deleted successfully.';
            return response($response);
        } else {
            $response['formErrors'] = true;
            $response['delayTime']     = '2000';
            $response['errors'] = 'Product Not Deleted.';
            return response($response);
        }
    }
}

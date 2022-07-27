<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\CategoryRelationFilterType;
use Illuminate\Http\Request;
use App\Helpers\GlobalFunctions as CommonHelper;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\URL;
use Validator;
use Illuminate\Support\Facades\Crypt;

class CategoriesController extends Controller
{
    //

    public function index(Request $request)
    {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Categories::query();


        if($request->ajax()){
            $query = Categories::query();
            if(isset($request->peritem))
            {
              $perpage = $request->peritem;
            }

            if(!empty($request->search))
            {
              $search = $request->search;
              $query->where(function ($query)use($search)
              {
                  $query->where('name', 'like', '%' . $search . '%');
              });
            }



            $users = $query->orderby('id','DESC')->paginate($perpage);

            $html =  view('admin.categories.categoriesajax',['prefix'=>$this->prefix,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else
        {
           $users = $query->orderby('id','DESC')->paginate($perpage);
          return view('admin.categories.categories',['prefix'=>$this->prefix,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
         }
    }

    public function add()
  {
    $this->prefix = request()->route()->getPrefix();
    return view('admin.categories.add',['prefix'=>$this->prefix]);
  }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'category_type' => 'required|string',
            'displayOrder' => 'required',
            'description' => 'required',
            'thumbnail_image' => 'required',
            'banner_image' => 'required',
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
            $this->prefix = request()->route()->getPrefix();
            $getThumbnailImage = NULL;
            $getBannerImage = NULL;

            if($request->hasFile('thumbnail_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/categories/thumbnail";
                $attachmentDoc = $request->file('thumbnail_image');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $getThumbnailImage = $attachmentDocFilenameToStore;
            }

            if($request->hasFile('banner_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/categories/banner";
                $attachmentDoc = $request->file('banner_image');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $getBannerImage = $attachmentDocFilenameToStore;
            }

            $user = new Categories([
                'name' => $request->name,
                'displayOrder' => $request->displayOrder,
                'category_type' => $request->category_type,
                'description' => $request->description,
                'thumbnail_image' => $getThumbnailImage,
                'banner_image' => $getBannerImage,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
           ]);
            $res =  $user->save();
            if($res) {
                if($request->has('filter_type')) {
                    $getCategoryFilters = ($request->filter_type) ?? array();
                    $getCatId = $user->id;
                    $saveCategoryFilter = array();
                    foreach ($getCategoryFilters as $getCategoryFilter) {
                        $saveCategoryFilter[] = array(
                                                        "category_id" => $getCatId,
                                                        "filter_type_id" => $getCategoryFilter,
                                                        "created_at" => Carbon::now(),
                                                        "updated_at" => Carbon::now(),
                                                    );
                    }
                    if (!empty($saveCategoryFilter)) {
                        CategoryRelationFilterType::insert($saveCategoryFilter);
                    }
                }
                $response['success']         = true;
                $response['delayTime']       = '3000';
                $response['success_message'] = 'Categories Added Successfully.';
                $response['url'] = url($this->prefix.'/categories');
                $response['resetform'] ='true';
                return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Category Not Added.';
                return response($response);
            }
        }
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(),[
                                                    'name' => 'required|string',
                                                    'category_type' => 'required|string',
                                                    'displayOrder' => 'required',
                                                    'description' => 'required',
                                                    'meta_title' => 'required',
                                                    'meta_description' => 'required',
                                                    'meta_keyword' => 'required',
                                                ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['validation']     = false;
            $response['errors']      = $errors;
            return response($response);
        } else {
            $this->prefix = request()->route()->getPrefix();
            $id = Crypt::decrypt($request['id']);
            $data1['name'] = $request['name'];
            $data1['displayOrder'] = $request['displayOrder'];
            $data1['category_type'] = $request['category_type'];
            $data1['description'] = $request['description'];
            $data1['meta_title'] = $request['meta_title'];
            $data1['meta_description'] = $request['meta_description'];
            $data1['meta_keyword'] = $request['meta_keyword'];

            if($request->hasFile('thumbnail_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/categories/thumbnail";
                $attachmentDoc = $request->file('thumbnail_image');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $data1['thumbnail_image'] = $attachmentDocFilenameToStore;
            }

            if($request->hasFile('banner_image')) {
                $getUniqueNo = time();
                $saveStorePath = "public/categories/banner";
                $attachmentDoc = $request->file('banner_image');
                $attachmentDocFilenameWithExt = $attachmentDoc->getClientOriginalName();
                $attachmentDocFilename = pathinfo($attachmentDocFilenameWithExt, PATHINFO_FILENAME);
                $attachmentDocFilename = str_replace(' ', '', $attachmentDocFilename);
                $attachmentDocFilename = preg_replace('/[^A-Za-z0-9\-]/', '', $attachmentDocFilename);
                $extension = $attachmentDoc->getClientOriginalExtension();
                $attachmentDocFilenameToStore = $attachmentDocFilename.'_'.$getUniqueNo.'.'.$extension;
                $attachmentDocPath = $attachmentDoc->storeAs($saveStorePath,$attachmentDocFilenameToStore);
                $data1['banner_image'] = $attachmentDocFilenameToStore;
            }

            $res = Categories::where('id',$id)->update($data1);
            if($res) {
                if($request->has('filter_type')) {
                    $getCategoryFilters = ($request->filter_type) ?? array();
                    $getCatId = $id;
                    CategoryRelationFilterType::where('category_id',$getCatId)->delete();
                    $saveCategoryFilter = array();
                    foreach ($getCategoryFilters as $getCategoryFilter) {
                        $saveCategoryFilter[] = array(
                                                        "category_id" => $getCatId,
                                                        "filter_type_id" => $getCategoryFilter,
                                                        "created_at" => Carbon::now(),
                                                        "updated_at" => Carbon::now(),
                                                    );
                    }
                    if (!empty($saveCategoryFilter)) {
                        CategoryRelationFilterType::insert($saveCategoryFilter);
                    }
                }
                $response['success']         = true;
                $response['delayTime']       = '3000';
                $response['success_message'] = 'Category Updated Successfully.';
                $response['url'] = url($this->prefix.'/categories');
                return response($response);
            } else {
                $response['formErrors'] = true;
                $response['delayTime']     = '3000';
                $response['errors'] = 'Category Not Update.';
                return response($response);
            }
        }
    }

  public function edit($id)
   {
     $id = Crypt::decrypt($id);
     $this->prefix = request()->route()->getPrefix();

     $result = Categories::where(array("id"=>$id))->first();
     return view('admin.categories.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }




    public function delete(Request $request)
    {

      $res = Categories::destroy($request['id']);


      if($res)
      {
        $response['success']         = true;
        $response['delayTime']       = '2000';
        $response['success_message'] = 'Category Deleted successfully.';

        return response($response);
      }
      else
      {
        $response['formErrors'] = true;
        $response['delayTime']     = '2000';
        $response['errors'] = 'Category Not Deleted.';
        return response($response);
    }
  }









}

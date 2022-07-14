<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Testimonials;
use Illuminate\Http\Request;
use App\Helpers\GlobalFunctions as CommonHelper;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\URL;
use Validator;
use Illuminate\Support\Facades\Crypt;



class TestimonialsController extends Controller
{
    //

    public function index(Request $request)
    {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = Testimonials::query();


        if($request->ajax()){
            $query = Testimonials::query();
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

            $html =  view('admin.testimonials.testimonialsajax',['prefix'=>$this->prefix,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else
        {
          $users = $query->orderby('id','DESC')->paginate($perpage);
          return view('admin.testimonials.testimonials',['prefix'=>$this->prefix,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
         }
    }

    public function add()
  {
    $this->prefix = request()->route()->getPrefix();
    return view('admin.testimonials.add',['prefix'=>$this->prefix]);
  }

  public function save(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'name' => 'required|string',
          'designation' => 'required|string',
          'description' => 'required|string',

        ]);

      if ($validator->fails())
      {
        $errors = $validator->errors();
       $response['validation']  = false;
       $response['errors']      = $errors;
       return response($response);
      }
      else
     {

       $this->prefix = request()->route()->getPrefix();

       $user = new Testimonials([
           'description' => $request->description,
           'name'=>$request->name,
           'designation'=>$request->designation,

       ]);

      $res =  $user->save();


     if($res)
     {
       $response['success']         = true;
       $response['delayTime']       = '3000';
       $response['success_message'] = 'Testimonial Added Successfully.';
       $response['url'] = url($this->prefix.'/testimonials');
       $response['resetform'] ='true';
       return response($response);
     }
     else
     {
       $response['formErrors'] = true;
       $response['delayTime']     = '3000';
       $response['errors'] = 'Testimonial Not Added.';
       return response($response);
     }
   }

  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(),[
      'name' => 'required|string',
      'designation' => 'required|string',
      'description' => 'required|string',
        ]);

      if ($validator->fails())
      {
        $errors = $validator->errors();
       $response['validation']     = false;
       $response['errors']      = $errors;
       return response($response);

      }
      else
     {
       $this->prefix = request()->route()->getPrefix();

       $id = Crypt::decrypt($request['id']);

       $data1['description'] = $request['description'];
       $data1['name'] = $request['name'];
       $data1['designation'] = $request['designation'];

       $res = Testimonials::where('id',$id)->update($data1);
        if($res)
        {
           $response['success']         = true;
           $response['delayTime']       = '3000';
           $response['success_message'] = 'Testimonial Updated Successfully.';
           $response['url'] = url($this->prefix.'/testimonials');

           return response($response);
         }
         else
         {
           $response['formErrors'] = true;
           $response['delayTime']     = '3000';
           $response['errors'] = 'Testimonial Not Update.';
           return response($response);
         }
     }

  }

  public function edit($id)
   {
     $id = Crypt::decrypt($id);
     $this->prefix = request()->route()->getPrefix();

     $result = Testimonials::where(array("id"=>$id))->first();
     return view('admin.testimonials.edit',['result'=>$result,'prefix'=>$this->prefix]);
   }




    public function delete(Request $request)
    {

      $res = Testimonials::destroy($request['id']);


      if($res)
      {
        $response['success']         = true;
        $response['delayTime']       = '2000';
        $response['success_message'] = 'Testimonial Deleted successfully.';

        return response($response);
      }
      else
      {
        $response['formErrors'] = true;
        $response['delayTime']     = '2000';
        $response['errors'] = 'Testimonials Not Deleted.';
        return response($response);
    }
  }









}

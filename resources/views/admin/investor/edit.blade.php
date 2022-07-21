
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Edit Investor</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('investor.update')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
                @csrf
                <input type="hidden" value="{{Crypt::encrypt($result->id)}}" name="id">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name <span class="red">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$result->name}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Designation <span class="red">*</span></label>
                            <input type="text" class="form-control" name="designation" id="designation" value="{{$result->designation}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mobile <span class="red">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{$result->mobile}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Facebook <span class="red">*</span></label>
                            <input type="text" class="form-control" name="facebook" id="facebook" value="{{$result->facebook}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Instagram <span class="red">*</span></label>
                            <input type="text" class="form-control" name="instagram" id="instagram" value="{{$result->instagram}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Twitter <span class="red">*</span></label>
                            <input type="text" class="form-control" name="twitter" id="twitter" value="{{$result->twitter}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Image <span class="red">*</span></label>
                            <input type="file" class="form-control" name="investor_image" id="investor_image">
                            @if(!empty($result->image) && "" != trim($result->image))
                                <img src="{{url('storage/investors/'.$result->image)}}" width="150px;" />
                            @endif
                        </div>
                    </div>
                  
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-rounded button-disabled" >Save</button>
                    <button type="button" class="cancel btn btn-rounded btn-default button-disabled" >Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.layouts.footer')

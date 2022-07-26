@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Edit Page</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('blog.update')}}" method="post" enctype="multipart/form-data" class="reset general_form" id="addCommonEditor">
                @csrf
                <input type="hidden" value="{{Crypt::encrypt($result->id)}}" name="id">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Title <span class="red">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{($result->title) ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status <span class="red">*</span></label>
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>
                                <option value="1" @if($result->status == 1) selected="selected" @endif>Active</option>
                                <option value="0" @if($result->status == 0) selected="selected" @endif>In-Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Category Thumbnail Image<span class="red">*</span></label>
                          <input type="file"  class="form-control "  name="blog_image"   id="blog_image">
                          <img src="{{url('storage/blog/'.$result->image)}}" width="150px;" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Display Order<span class="red">*</span></label>
                            <input type="text" value="{{ $result->displayOrder }}"  class="form-control numberonly " name="displayOrder"   id="displayOrder" placeholder="Please enter display order">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Description <span class="red">*</span></label>
                            <textarea class="form-control" name="description" id="description">{{($result->description) ?? ''}}</textarea>
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
@php
$showTextEditor = 1;
@endphp
@include('admin.layouts.footer')

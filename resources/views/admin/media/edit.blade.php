
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Edit Media Center</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('media.update')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
                @csrf
                <input type="hidden" value="{{Crypt::encrypt($result->id)}}" name="id">
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Title <span class="red">*</span></label>
                          <input type="text" value="{{ $result->title }}" class="form-control" name="title" id="title">
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Type <span class="red">*</span></label>
                          <select  class="form-control" name="type" id="type">
                            <option value="">Select Type</option>

                            <option @if($result->type == 1) selected @endif value="1">Media Center Top</option>
                            <option @if($result->type == 2) selected @endif value="2">Project Spotlight</option>
                            <option @if($result->type == 3) selected @endif value="3">Inspiration Latest Trends</option>
                            <option @if($result->type == 4) selected @endif value="4">Inspiration A;;lications</option>
                          </select>
                      </div>
                  </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Image <span class="red">*</span></label>
                            <input type="file" class="form-control" name="investor_image" id="investor_image">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Show On Home <span class="red">*</span></label>
                            <input type="checkbox" value="1" class="form-control" @if($result->showOnHome == 1) checked @endif name="showOnHome" id="showOnHome">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Display Order <span class="red">*</span></label>
                            <input type="text" class="form-control" value="{{ $result->displayOrder }}" name="displayOrder" id="displayOrder">
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-rounded button-disabled" >Update</button>
                    <button type="button" class="cancel btn btn-rounded btn-default button-disabled" >Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.layouts.footer')

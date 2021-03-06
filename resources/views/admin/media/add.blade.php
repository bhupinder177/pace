
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Add Media Center</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('media.save')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Title <span class="red">*</span></label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Type <span class="red">*</span></label>
                            <select  class="form-control" name="type" id="type">
                              <option value="">Select Type</option>
                              <option value="1">Media Center Top</option>
                              <option value="2">Project Spotlight</option>
                              <option value="3">Inspiration Latest Trends</option>
                              <option value="4">Inspiration A;;lications</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Image <span class="red">*</span></label>
                            <input type="file" class="form-control" name="media_image" id="media_image">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Show On Home <span class="red">*</span></label>
                            <input type="checkbox" class="form-control" value="1" name="showOnHome" id="showOnHome">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Display Order <span class="red">*</span></label>
                            <input type="text" class="form-control numberonly" name="displayOrder" id="displayOrder">
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

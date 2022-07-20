
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Add Investor</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('investor.save')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name <span class="red">*</span></label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Designation <span class="red">*</span></label>
                            <input type="text" class="form-control" name="designation" id="designation">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mobile <span class="red">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Facebook <span class="red">*</span></label>
                            <input type="text" class="form-control" name="facebook" id="facebook">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Instagram <span class="red">*</span></label>
                            <input type="text" class="form-control" name="instagram" id="instagram">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Twitter <span class="red">*</span></label>
                            <input type="text" class="form-control" name="twitter" id="twitter">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Image <span class="red">*</span></label>
                            <input type="file" class="form-control" name="investor_image" id="investor_image">
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

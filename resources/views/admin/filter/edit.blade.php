
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Edit Filter</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('filter.update')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
                @csrf
                <input type="hidden" value="{{Crypt::encrypt($result->id)}}" name="id">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Category <span class="red">*</span></label>
                            <input type="text" class="form-control" name="category" id="category" value="{{($result->category) ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Structure <span class="red">*</span></label>
                            <input type="text" class="form-control" name="structure" id="structure" value="{{($result->structure) ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Species <span class="red">*</span></label>
                            <input type="text" class="form-control" name="species" id="species" value="{{($result->species) ?? ''}}">
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
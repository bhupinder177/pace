@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Add Page</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('page.save')}}" method="post" enctype="multipart/form-data" class="reset general_form" id="addCommonEditor">
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
                            <label>Status <span class="red">*</span></label>
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Description <span class="red">*</span></label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <center><h3>Meta Details</h3></center>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Title <span class="red">*</span></label>
                            <input type="text"  class="form-control" name="meta_title" id="meta_title" placeholder="Please enter meta title">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Description <span class="red">*</span></label>
                            <input type="text"  class="form-control" name="meta_description" id="meta_description" placeholder="Please enter meta description">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Keyword <span class="red">*</span></label>
                            <input type="text"  class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Please enter meta keyword">
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
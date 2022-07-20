
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Add Bod & Commitee</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('commitee.save')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
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
                            <label>Designation<span class="red">*</span></label>
                            <input type="text" class="form-control" name="designation" id="designation">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Department<span class="red">*</span></label>
                            <input type="text" class="form-control" name="department" id="department">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label> Type <span class="red">*</span></label>
                            @php
                            $getCType = Helper::commiteeTypes();
                            @endphp
                            <select class="form-control" name="type" id="type">
                                <option value="">Select Type</option>
                                @foreach($getCType as $pageType)
                                    <option value="{{$pageType['id']}}">{{$pageType['status']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Display Order<span class="red">*</span></label>
                            <input type="text" class="form-control" name="displayOrder" id="displayOrder">
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


@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Add Meta</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('meta.save')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Page Type <span class="red">*</span></label>
                            @php
                            $getPageType = Helper::pageTypes();
                            @endphp
                            <select class="form-control" name="page_type" id="page_type">
                                <option value="">Select Page Type</option>
                                @foreach($getPageType as $pageType)
                                    <option value="{{$pageType['id']}}">{{$pageType['status']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Meta Title <span class="red">*</span></label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Meta Keyword <span class="red">*</span></label>
                            <input type="text" class="form-control" name="keyword" id="keyword">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Meta Description <span class="red">*</span></label>
                            <input type="text" class="form-control" name="description" id="description">
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

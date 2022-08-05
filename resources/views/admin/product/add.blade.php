@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Add Product</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('product.save')}}" method="post" enctype="multipart/form-data" class="reset general_form" id="addCommonEditor">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Product Name <span class="red">*</span></label>
                            <input type="text" class="form-control" name="product_name" id="product_name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Category <span class="red">*</span></label>
                            <select class="form-control" name="category_id" id="category">
                                <option value="">Select Category</option>
                                @if(!empty($getCategories))
                                    @foreach($getCategories as $getCategory)
                                        @php
                                        $getCType = Helper::categoryTypes($getCategory->category_type);
                                        @endphp
                                        <option value="{{$getCategory->id}}">{{$getCategory->name}} - {{($getCType['status']) ?? ""}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                          <div class="form-group">
                              <label>Filter Name <span class="red">*</span></label>
                              <select class="form-control multiSelect" multiple="multiple" name="filter_type_id[]" id="filterType">
                                  {{-- <option value="">Select Filter</option> --}}
                                  @if(!empty($getFilter))
                                      @foreach($getFilter as $pageType)
                                            @php
                                            $getFilterName = Helper::filterTypes((int)$pageType->filterType);
                                            @endphp
                                          <option value="{{$pageType->id}}">{{$pageType->filterValue}} - {{($getFilterName['status']) ?? ""}}</option>
                                      @endforeach
                                  @endif
                              </select>
                          </div>
                      </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Thumbnail Image<span class="red">*</span></label>
                            <input type="file" class="form-control " name="thumbnail_image"   id="thumbnail_image">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Main Image<span class="red">*</span></label>
                            <input type="file"  class="form-control " name="main_image" id="main_image">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Short Description <span class="red">*</span></label>
                            <textarea class="form-control" name="short_description" id="short_description"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Product Features <span class="red">*</span></label>
                            <textarea class="form-control" name="product_features" id="product_features"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Product Long Description <span class="red">*</span></label>
                            <textarea class="form-control" name="product_long_description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Display Order <span class="red">*</span></label>
                            <input type="text" class="form-control numberonly" name="display_order" id="display_order">
                        </div>
                    </div>

                    {{-- <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status <span class="red">*</span></label>
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                        </div>
                    </div> --}}
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
                            <textarea class="form-control" name="meta_description" id="meta_description" placeholder="Please enter meta description"></textarea>
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
$showTextProductEditor = 1;
$showMultiSelect = 1;
@endphp
@include('admin.layouts.footer')

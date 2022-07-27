
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Edit Category</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/categories-update') }}" method="post" enctype="multipart/form-data" class="reset general_form" id="addCommonEditor">

                    <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Category Type <span class="red">*</span></label>
                              @php
                              $getPageType = Helper::categoryTypes();
                              @endphp
                              <select class="form-control" name="category_type" id="type">
                                  <option value="">Select Category Type</option>
                                  @foreach($getPageType as $pageType)
                                      <option value="{{$pageType['id']}}" @if($pageType['id'] == $result->category_type){{"selected='selected'"}}@endif >{{$pageType['status']}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Filter Name <span class="red">*</span></label>
                            @php
                            $getPageType = Helper::filterTypes();
                            $getSelectedFilterType = ($result->getCatRelFilterTypes()->pluck("filter_type_id")->toArray()) ?? array();
                            @endphp
                            <select class="form-control multiSelect" name="filter_type[]" id="filterType" multiple="multiple">
                                {{-- <option value="">Select Filter</option> --}}
                                @foreach($getPageType as $pageType)
                                    <option value="{{$pageType['id']}}" @if(in_array($pageType['id'], $getSelectedFilterType)){{"selected='selected'"}}@endif >{{$pageType['status']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                      <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category<span class="red">*</span></label>
                                <input type="text" value="{{$result->name}}" placeholder="Please enter religion" class="form-control " name="name"   id="name">
                            </div>
                          <input type="hidden" value="{{Crypt::encrypt($result->id)}}" name="id">

                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Category Thumbnail Image<span class="red">*</span></label>
                            <input type="file"  class="form-control "  name="thumbnail_image"   id="thumbnail_image">
                            <img src="{{url('storage/categories/thumbnail/'.$result->thumbnail_image)}}" width="150px;" />
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Category Banner Image<span class="red">*</span></label>
                            <input type="file"  class="form-control " name="banner_image"   id="banner_image">
                            <img src="{{url('storage/categories/banner/'.$result->banner_image)}}" width="150px;" />
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Display Order<span class="red">*</span></label>
      <input type="text"  class="form-control numberonly " value="{{ $result->displayOrder }}" name="displayOrder"   id="displayOrder">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Description <span class="red">*</span></label>
      <textarea type="text" placeholder="Please enter description" class="form-control " name="description"   id="description">{{ $result->description }}</textarea>
                          </div>
                      </div>


                        <div class="col-sm-12">
                              <center><h3>Meta Details</h3></center>
                         </div>
                         <div class="col-sm-6">
                              <div class="form-group">
                                   <label>Title <span class="red">*</span></label>
                                   <input type="text"  class="form-control" name="meta_title" id="meta_title" placeholder="Please enter meta title" value="{{$result->meta_title}}">
                              </div>
                         </div>
                         <div class="col-sm-6">
                              <div class="form-group">
                                   <label>Description <span class="red">*</span></label>
                                   <input type="text"  class="form-control" name="meta_description" id="meta_description" placeholder="Please enter meta description" value="{{$result->meta_description}}">
                              </div>
                         </div>
                         <div class="col-sm-6">
                              <div class="form-group">
                                   <label>Keyword <span class="red">*</span></label>
                                   <input type="text"  class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Please enter meta keyword" value="{{$result->meta_keyword}}">
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
<!-- ///ddasdd -->



@php
$showTextEditor = 1;
$showMultiSelect = 1;
@endphp

    @include('admin.layouts.footer')

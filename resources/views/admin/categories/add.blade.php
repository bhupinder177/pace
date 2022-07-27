
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Add Category</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/categoriesSave') }}" method="post" enctype="multipart/form-data" class="reset general_form" id="addCommonEditor">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Category Type <span class="red">*</span></label>
                              @php
                              $getCType = Helper::categoryTypes();
                              @endphp
                              <select class="form-control" name="category_type" id="type">
                                <option value="">Select Category Type</option>
                                  @foreach($getCType as $pageType)
                                      <option value="{{$pageType['id']}}">{{$pageType['status']}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Filter Name <span class="red">*</span></label>
                              @php
                              $getCType = Helper::filterTypes();
                              @endphp
                              <select class="form-control multiSelect" multiple="multiple" name="filter_type[]" id="filterType">
                                  {{-- <option value="">Select Filter</option> --}}
                                  @foreach($getCType as $pageType)
                                      <option value="{{$pageType['id']}}">{{$pageType['status']}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Category <span class="red">*</span></label>
      <input type="text" placeholder="Please enter category" class="form-control " name="name"   id="name">
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Category Thumbnail Image<span class="red">*</span></label>
      <input type="file"  class="form-control " name="thumbnail_image"   id="thumbnail_image">
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Category Banner Image<span class="red">*</span></label>
      <input type="file"  class="form-control " name="banner_image"   id="banner_image">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Display Order<span class="red">*</span></label>
                              <input type="text"  class="form-control numberonly " name="displayOrder"   id="displayOrder" placeholder="Please enter display order">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Description <span class="red">*</span></label>
      <textarea type="text" placeholder="Please enter description" class="form-control " name="description"   id="description"></textarea>
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
$showMultiSelect = 1;
@endphp

@include('admin.layouts.footer')

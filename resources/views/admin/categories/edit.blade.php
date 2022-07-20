
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

            <form action="{{ url($prefix.'/categories-update') }}" method="post" enctype="multipart/form-data" class="reset" id="addreligions">

                    <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Category Type <span class="red">*</span></label>
                              @php
                              $getPageType = Helper::categoryTypes();
                              @endphp
                              <select class="form-control" name="type" id="type">
                                  <option value="">Select  Type</option>
                                  @foreach($getPageType as $pageType)
                                      <option value="{{$pageType['id']}}" @if($result->category_type == $pageType['id']) selected="selected" @endif  >{{$pageType['status']}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Category<span class="red">*</span></label>
      <input type="text" value="{{ $result->name }}" placeholder="Please enter religion" class="form-control " name="name"   id="name">
                          </div>
                          <input type="hidden" value="{{Crypt::encrypt($result->id)}}" name="id">

                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Category Thumbnail Image<span class="red">*</span></label>
      <input type="file"  class="form-control "  name="thumbnail_image"   id="thumbnail_image">
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
      <input type="text"  class="form-control numberonly " value="{{ $result->displayOrder }}" name="displayOrder"   id="displayOrder">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Description <span class="red">*</span></label>
      <textarea type="text" placeholder="Please enter description" class="form-control " name="description"   id="description">{{ $result->description }}</textarea>
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





    @include('admin.layouts.footer')

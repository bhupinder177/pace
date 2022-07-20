
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Edit Testimonial</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/testimonials-update') }}" method="post" enctype="multipart/form-data" class="reset" id="addtestimonials">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                              <input type="hidden" value="{{Crypt::encrypt($result->id)}}" name="id">
                            <label>Name <span class="red">*</span></label>
      <input type="text" placeholder="Please enter name"  class="form-control " value="{{ $result->name }}" name="name"   id="name">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Designation <span class="red">*</span></label>
      <input type="text"  class="form-control " placeholder="Please enter designation" value="{{ $result->designation }}" name="designation"   id="designation">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Show On Home <span class="red">*</span></label>
                              <input type="checkbox" value="1" class="form-control" @if($result->showOnHome == 1) checked @endif name="showOnHome" id="showOnHome">
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Display Order <span class="red">*</span></label>
                              <input type="text" class="form-control numberonly" value="{{ $result->displayOrder }}" name="displayOrder" id="displayOrder">
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

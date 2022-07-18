
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Add Testimonial</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/testimonialsSave') }}" method="post" enctype="multipart/form-data" class="reset" id="addtestimonials">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Name <span class="red">*</span></label>
      <input type="text"  class="form-control " placeholder="Please enter name" name="name"   id="name">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Designation <span class="red">*</span></label>
      <input type="text"  class="form-control " placeholder="Please enter designation" name="designation"   id="designation">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Show On Home <span class="red">*</span></label>
                              <input type="checkbox" class="form-control" value="1" name="showOnHome" id="showOnHome">
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Display Order <span class="red">*</span></label>
                              <input type="text" class="form-control" name="displayOrder" id="displayOrder">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Description <span class="red">*</span></label>
      <textarea type="text" placeholder="Please enter description" class="form-control " name="description"   id="description"></textarea>
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

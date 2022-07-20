
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Add Filter</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('filter.save')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
                @csrf
                <div class="row">

                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Filter Name <span class="red">*</span></label>
                          @php
                          $getCType = Helper::filterTypes();
                          @endphp
                          <select class="form-control" name="filterType" id="filterType">
                              <option value="">Select Filter</option>
                              @foreach($getCType as $pageType)
                                  <option value="{{$pageType['id']}}">{{$pageType['status']}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Filter Value <span class="red">*</span></label>
                            <input type="text" class="form-control" name="filterValue" id="filterValue">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Display Order <span class="red">*</span></label>
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

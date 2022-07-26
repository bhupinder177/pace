
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Edit Filter</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('filter.update')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
                @csrf
                <input type="hidden" value="{{Crypt::encrypt($result->id)}}" name="id">
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Filter Name <span class="red">*</span></label>
                          @php
                          $getPageType = Helper::filterTypes();
                          $getSelectedFilterType = ($result->getAllFilterTypes()->pluck("filter_type_id")->toArray()) ?? array();
                          @endphp
                          <select class="form-control multiSelect" name="filterType[]" id="filterType" multiple="multiple">
                              {{-- <option value="">Select Filter</option> --}}
                              @foreach($getPageType as $pageType)
                                  <option value="{{$pageType['id']}}" @if(in_array($pageType['id'], $getSelectedFilterType)){{"selected='selected'"}}@endif >{{$pageType['status']}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Filter Value <span class="red">*</span></label>
                          <input type="text" value="{{($result->filterValue) ?? ''}}" class="form-control" name="filterValue" id="filterValue">
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Display Order <span class="red">*</span></label>
                          <input type="text" value="{{($result->displayOrder) ?? ''}}" class="form-control" name="displayOrder" id="displayOrder">
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
$showMultiSelect = 1;
@endphp
@include('admin.layouts.footer')


@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">Edit Resources</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('resources.update')}}" method="post" enctype="multipart/form-data" class="reset" id="addCommon">
                @csrf
                <input type="hidden" value="{{Crypt::encrypt($result->id)}}" name="id">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Title <span class="red">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{$result->title}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Display Order <span class="red">*</span></label>
                            <input type="text" class="form-control" name="display_order" id="display_order" placeholder="Enter Display Order" value="{{$result->display_order}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Attachments <span class="red">*</span></label>
                            <input type="file" class="form-control" name="attachment[]" id="attachment" placeholder="Upload Attachments" multiple="multiple">
                            {{-- <br>
                            <br>
                            @if($result->resourceAllAttachments()->exists())
                                @php
                                $getResourceAllAttachments = ($result->resourceAllAttachments) ?? array();
                                @endphp
                                @if(!empty($getResourceAllAttachments))
                                    @foreach($getResourceAllAttachments as $getResourceAttachments)
                                        <img src="{{url('storage/resources/'.$getResourceAttachments->image)}}" width="150px;" />
                                        <a class="deleterecord" data-link="{{route('resources.delete.attachment')}}" data-id="{{$getResourceAttachments->id}}"><i class="fa fa-trash deleterecord"  data-link="{{route('resources.delete')}}"  data-id="{{$getResourceAttachments->id}}" aria-hidden="true"></i></a>
                                    @endforeach
                                @endif
                            @endif --}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status <span class="red">*</span></label>
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>
                                <option value="1" @if($result->status == 1) selected="selected" @endif>Active</option>
                                <option value="0" @if($result->status == 0) selected="selected" @endif>In-Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            @if($result->resourceAllAttachments()->exists())
                                @php
                                $getResourceAllAttachments = ($result->resourceAllAttachments) ?? array();
                                @endphp
                                @if(!empty($getResourceAllAttachments))
                                    @foreach($getResourceAllAttachments as $getResourceAttachments)
                                        <img src="{{url('storage/resources/'.$getResourceAttachments->image)}}" width="150px;" />
                                        {{-- <a href="{{route('resources.delete.attachment', ['id' => Crypt::encrypt($getResourceAttachments->id)])}}">Delete</a> --}}
                                        <a class="deleterecord" data-link="{{route('resources.delete.attachment')}}" data-id="{{$getResourceAttachments->id}}"><i class="fa fa-trash deleterecord"  data-link="{{route('resources.delete')}}"  data-id="{{$getResourceAttachments->id}}" aria-hidden="true"></i></a>
                                    @endforeach
                                @endif
                            @endif
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

<!-- delete confirm modal -->
<div id="deleteconfirm" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body driverdetails">
                <h5 class="messagetext">Are you sure to  delete this record ?</h5>
                <input type="hidden" value="" name="id" class="deleteId">
                <input type="hidden" value="" name="link" class="deletelink">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success datadelete" >Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- delete confirm modal -->
@include('admin.layouts.footer')
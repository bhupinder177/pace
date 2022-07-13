
@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<div class="page-content">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">General Settings</li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="">
            <form action="{{route('settings.save')}}" method="post" enctype="multipart/form-data" class="reset" id="addsettings">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Logo <span class="red">*</span></label>
                            <input type="file" class="form-control" name="attachment" id="sitelogo">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="red">*</span></label>
                            <input type="text" class="form-control" name="email" id="email" value="{{($getSettingsData->email) ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address <span class="red">*</span></label>
                            <textarea class="form-control" name="address" id="address">{{($getSettingsData->address) ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone <span class="red">*</span></label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{($getSettingsData->phone) ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fax <span class="red">*</span></label>
                            <input type="text" class="form-control" name="fax" id="fax" value="{{($getSettingsData->fax) ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mobile <span class="red">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{($getSettingsData->mobile) ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Copy Right <span class="red">*</span></label>
                            <input type="text" class="form-control" name="copyright" id="copyright" value="{{($getSettingsData->copy_right) ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Facebook <span class="red">*</span></label>
                            <input type="text" class="form-control" name="facebook" id="facebook" value="{{($getSettingsData->facebook) ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Instagram <span class="red">*</span></label>
                            <input type="text" class="form-control" name="instagram" id="instagram" value="{{($getSettingsData->instagram) ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Twitter <span class="red">*</span></label>
                            <input type="text" class="form-control" name="twitter" id="twitter" value="{{($getSettingsData->twitter) ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @if(!empty($getSettingsData))
                        <input type="hidden" value="{{Crypt::encrypt($getSettingsData->id)}}" name="id">
                    @endif
                    <button type="submit" class="btn btn-rounded button-disabled" >Save</button>
                    {{-- <button type="button" class="cancel btn btn-rounded btn-default button-disabled" >Cancel</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.layouts.footer')

<div class="container">
    <div class="row" id="profile_row1">
        <h3>{{__('custom.profile')}}</h3>
        <p>{{__('custom.Manage profile information for account security')}}</p>
    </div>
    <div class="row">
        <form class="form-horizontal" action="{{route('save_infor')}}" method="POST"> 
            @csrf
            <div class="col-md-7">
                <div class="form-group" id="profile_form_group1">
                    <label class="control-label col-sm-3" for="name">{{__('custom.username')}}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="profile_name" name="name" value="{{Auth::user()->name}}" placeholder="{{__('custom.username')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group" id="profile_form_group2">
                    <label class="control-label col-sm-3" for="email">{{__('custom.email')}}</label>
                    <div class="col-sm-9" id="profile_email">
                        {{Auth::user()->email}}
                    </div>
                </div>
                <div class="form-group" id="profile_form_group3">
                    <label class="control-label col-sm-3" for="phone">{{__('custom.Phone Number')}}</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="profile_phone" name="phone"  value="{{Auth::user()->phone}}" placeholder="{{__('custom.Phone Number')}}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group" id="profile_form_group4">
                    <label class="control-label col-sm-3" for="gender">{{__('custom.Gender')}}</label>
                    <div class="col-sm-9">
                        <select name="gender" id="profile_gender">
                           {!!checkGenderUser()!!}
                        </select>
                    </div>
                </div>
                <div class="form-group" id="profile_form_group5">
                    <label class="control-label col-sm-3" for="date_of_birth">{{__('custom.Date Of Birth')}}</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="profile_date_of_birth" name="date_of_birth" value="{{Auth::user()->date_of_birth}}">
                        @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group" id="profile_form_group6">
                    <label class="control-label col-sm-3" for="pwd">{{__('custom.Address')}}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="profile_address" name="address" value="{{Auth::user()->address}}" placeholder="{{__('custom.Address')}}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="pwd"></label>
                    <div class="col-sm-9">
                        <button class="btn btn-danger" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('custom.Save')}}</button>
                    </div>
                </div>
            </div>
            <div class="col-md-5" id="div_image">
                <div class="image_avatar_profile" id="holder">
                    {!!checkImageUser()!!}
                </div>
                <input id="thumbnail" class="form-control" type="hidden" name="image" value="{{Auth::user()->image}}">
                <h5 class="mb-3"><button  id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-danger">{{__('custom.Choose')}}</button></h5>
                <p>{{__('custom.Maximum file size')}}</p>
                <p>{{__('custom.Format')}}</p>
            </div>
        </form>
    </div>
</div>
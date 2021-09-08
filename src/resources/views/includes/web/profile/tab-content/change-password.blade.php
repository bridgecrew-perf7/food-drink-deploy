<div class="container">
    <div class="row" id="profile_row1">
        <h3>{{__('custom.Change Password')}}</h3>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <form class="form-horizontal" action="{{route('profile.change.password')}}" method="POST"> 
                @csrf
                <div class="form-group" id="profile_form_group1">
                    <label class="control-label col-sm-4" for="current_password">{{__('custom.Current Password')}}</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="{{__('custom.Current Password')}}">
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group" id="profile_form_group2">
                    <label class="control-label col-sm-4" for="new_password">{{__('custom.New Password')}}</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="profile_new_password" name="new_password" placeholder="{{__('custom.New Password')}}">
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group" id="profile_form_group6">
                    <label class="control-label col-sm-4" for="enter_new_password">{{__('custom.Enter New Password')}}</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="profile_enter_new_password" name="enter_new_password" placeholder="{{__('custom.Enter New Password')}}">
                        @error('enter_new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="pwd"></label>
                    <div class="col-sm-8">
                        <button class="btn btn-danger" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('custom.Change Password')}}</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4" id="div_image">
                
        </div>
    </div>
</div>
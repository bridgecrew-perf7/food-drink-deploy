@extends('layouts.web')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
              <div id="message_time" class="alert {{ session('alert') }} text-center">
                <h4>{{ session('message') }}</h4>
              </div>
            @endif
            <div class="panel with-nav-tabs panel-primary" id="panel-primary">
                <div class="panel-heading" id="panel-heading">
                    @include('includes.web.profile.panel-heading')
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
                            @include('includes.web.profile.tab-content.profile')
                        </div>
                        <div class="tab-pane fade" id="tab2primary">
                            @include('includes.web.profile.tab-content.purchase-order')
                        </div>
                        <div class="tab-pane fade" id="tab3primary">
                            @include('includes.web.profile.tab-content.change-password')
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@include('profile.js-profile')
@endsection

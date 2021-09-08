<!-- modal view detail -->
<div class="modal fade" id="modalViewDetail" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                        <i class="fa fa-info-circle"></i> 
                        {{__('custom.Detail')}}
                    </a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                        <i class="fa fa-cubes"></i> 
                        {{__('custom.Ordered Products')}}
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
            @include('includes.admin.order.order_detail.infor-order')
            @include('includes.admin.order.order_detail.list-product-order')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('custom.Exit')}}</button>
            </div>
        </div>
    </div>
</div>
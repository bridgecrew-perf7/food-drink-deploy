<!-- Modal delete-->
<div class="modal fade" id="modalDeleteProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('custom.Confirm')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{__('custom.Are you sure you want to remove the product')}}</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">{{__('custom.Exit')}}</button>
                <button class="btn btn-primary" form="delete" >{{__('custom.Agree')}}</button>
            </div>
        </div>
    </div>
</div>
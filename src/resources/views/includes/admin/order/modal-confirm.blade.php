<!-- Modal confirm-->
<div class="modal fade" id="modalConfirmOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" id="form_confirm">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('custom.Confirm')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('custom.Are you sure you want to confirm the order')}}</p>
                    <input type="hidden" name="status" value="1">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">{{__('custom.Exit')}}</button>
                    <button type="submit" class="btn btn-primary" name="btn_confirm">{{__('custom.Agree')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
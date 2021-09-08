<!-- Modal active-->
<div class="modal fade" id="modalActiveUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" id="form_active">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('custom.Confirm')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('custom.Do you want to active this user')}}</p>
                    <input type="hidden" name="status" value="1">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">{{__('custom.Exit')}}</button>
                    <button type="submit" class="btn btn-primary" name="btn_active">{{__('custom.Agree')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal block-->
<div class="modal fade" id="modalBlockUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" id="form_block">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('custom.Confirm')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('custom.Do you want to block this user')}}</p>
                    <p style="color:red;">{{__('custom.Warning')}}</p>
                    <input type="hidden" name="status" value="0">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">{{__('custom.Exit')}}</button>
                    <button type="submit" class="btn btn-primary" name="btn_block">{{__('custom.Agree')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
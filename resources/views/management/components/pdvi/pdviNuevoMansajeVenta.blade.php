<!--Modal nuevo mensaje-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalNewMessage"
        data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: beige;">
            <div class="modal-header">
                <h5 class="modal-title modal_header_font">{{ __('Confirm Delivery') }}</h5>
            </div>
            <div id="alertNew" hidden role="alert"></div>
            <div class="modal-body">
                <div id="alertMessage" hidden role="alert"></div>
            </div>
            <div class="modal-footer">
                <button style="width:100%; height:36px;" type="button" class="btn btn-primary" data-dismiss="modal">{{__('Accept')}} </button>
            </div>
        </div>
    </div>
</div>


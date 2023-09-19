<!--Modal Combos-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalComboProducts">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="comboheader">
            </div>
            <div id="alert" hidden role="alert"></div>
            <form action="/management/pdvi" id="formSearch" method="POST" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="container" id="combosproductsdiv" style="display:flex; flex-wrap:wrap;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeClientModal()">{{ __('Close') }} <i class="fa fa-close"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

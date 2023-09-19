<!--Modal de Mensajes-->
<div class="modal fade" id="modalConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color:#F5F5DC">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>

            <div class="modal-body" style="display:flex; justify-content: center;">
            </div>

            <div class="modal-footer" style="display:block;"> 

                        <a type="submit"  class="edit-sale btn btn-primary" style="color: #ffff; width:100%">  {{ __('Accept') }}</a> 
            
                    <br> 
                    <br> 
                <div style="display:flex; justify-content:flex-end;"> 
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal()" >{{ __('Close') }} 
                        </button> 
                </div> 
            </div>
        </div>
    </div>
</div>





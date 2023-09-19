<div class="form-group row" id="ocultarCargaImagen">
    <label for="imageLabel" class="col-sm-3 col-form-label">{{ __('Image') }}*</label>
    <div class="col-lg-6">
        <input type="hidden" name="image" value="{{ !empty($companyEdit) ? $companyEdit->image : $image }}">
        <!-- Solo para los que el path image cambia-->
        @if(!empty($scrCustom))
            <img name="image-view" id="image-view" src="{{ !empty($companyEdit) ? $path.$scrCustom : $path.$image }}"
                 class="col-sm-2" style="height: 200px; display: block; max-width:200px;  " value="{{ !empty($companyEdit) ? $path.$scrCustom : $path.$image }}">
        @else
            <img name="image-view" id="image-view" src="{{ $path.$image }}"
                 class="col-sm-2" style="height: 200px; display: block; max-width:200px;  " value="{{ $path.$image }}">
        @endif
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview fileinput-exists thumbnail" style=" max-height: 200px;"></div>

            <div style="height: 30px"></div>

            <div class="row">
                <div class="col-md-6">
                    <label for="image" class="subir file-inputpdv" title="Buscar tu imagen"
                           style="width:100%; height:82%; text-align: center;">
                        <i style="padding-right: 0px"
                           class="fa fa-search btn btn-primary btn-file fileinput-new"></i> {{__('Select Image')}}
                        <input style="display: none" type="file" name="image_file" accept=".png,image/png"
                               id="image" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>
                    </label>
                </div>

                <div class="col-md-6">
                    <button id="quitarimagen" disabled type="button" title="Quitar tu imagen"
                    <i class="fa fa-trash-o btn btn-success" style="width:100%"
                       data-dismiss="fileinput"></i> {{__('Remove')}}
                    </button>
                </div>

                <div style="height:42px"></div>
                <div class="col-md-12">
                    <!-- @if(!empty($companyEdit)) -->
                        <!-- <div style="height:8px"></div> -->
                        <!-- <input type="hidden" name="{{$nameId}}" value="{{ $companyEdit->id }}"/> -->
                    <!-- @endif -->
                    <button type="button" class="btn btn-primary btn-cancel" data-placement="top"
                            data-toggle="tooltip" title="{{ __('Cancel') }}">
                        <i class="fa fa-reply"></i>
                    </button>

                    <button type="submit" class="btn btn-primary"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                            data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                        <i class="fa fa-save"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            $("#image-view").hide();
            $("#quitarimagen").removeAttr('disabled');

            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function () {
        readURL(this);
    });
</script>
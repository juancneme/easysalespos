<button type="button" class="btn btn-success btn-import"
        <?= !validatePermission("add", $page) ? "disabled" : "" ?>
        data-placement="top" data-toggle="tooltip" title="{{ __('Bulk Load') }}">
    <i class="fa fa-upload"></i>
</button>

<!--Modal de descarga de plantilla -->
<input type="hidden" name="url" value="{{url()->current()}}">

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: beige;">
             <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
            </button>
            <div class="modal-header">
                <h5 class="modal-title modal_header_font" id="exampleModalLabel">{{ __('Bulk Load') }}</h5>
            </div>
            <form  method="POST" class="f1" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="table" value="{{$page}}">
                <input type="hidden" name="units" value="{{$units}}">
                <input type="hidden" name="table" value="{{$nametable}}">
                <input type="hidden" name="exceptionfields" value="{{$exceptionfields}}">
                <input type="hidden" name="catalog" value="{{!isset($catalog) ? '':$catalog}}">
                <div class="modal-body">
                    <button type="submit" class="btn btn-success btn-download" data-placement="top" onclick=this.form.action="{{ route('downloadFile') }}"
                            data-toggle="tooltip"
                            title="{{ __('Download template') }}">
                        <i class="fa fa-file-excel-o"></i>
                    </button>
                    <h5 class="modal-title file_upload_font" style="margin-left: 49px;margin-top: -30px;">{{ __('Download template') }}</h5>
                </div>
            </form>
            
   <form action="{{route('uploadExcel')}}" method="POST" class="f1" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="page" value="{{$page}}">
                <input type="hidden" name="group" value="{{$group}}">
                <input type="hidden" name="table" value="{{$nametable}}">
                <input type="hidden" name="catalog" value="{{!isset($catalog) ? '':$catalog}}">
                                
                <div class="file-container">
                    <div class="container">
                        <i class="btn btn-primary fa fa-cloud-upload" aria-hidden="true"></i>
                          <input type="file" class="file-upload" id="file-upload" name="upload_file" accept=".xlsx, .xls"/>
                          <h5 class="modal-title file_upload_font"  style="margin-left: 49px;margin-top: -30px;">{{ __('Click to upload your file') }}(.xls)</h5>
                    </div>
                </div>

               @if(strpos(url()->current(), 'inventory') == 0 && strpos(url()->current(), 'categories') == 0)
                   <div class="file-container">
                       <div class="container">
                           <i class="btn btn-primary fa fa-cloud-upload" aria-hidden="true"></i>
                           <input type="file" class="file-upload" id="image-upload" name="upload_image" accept=".zip"/>
                           <h5 class="modal-title file_upload_font"  style="margin-left: 49px;margin-top: -30px;">{{ __('Click to upload your images') }}(.zip)</h5>
                       </div>
                   </div>
               @endif

                <br/>
                <p id="status" style="margin-left: 60px;margin-top: 10px;"></p>

                <p id="statuszip" style="margin-left: 60px;margin-top: 10px;color: #df8612"></p>

                <button type="submit" class="btn btn-primary" style="height:36px; margin-right: 67px; width:90%; margin-right: 20px; margin-left:20px;">{{__('Accept')}}</button>

                <div class="modal-footer">
                     <button style="width:7rem;" type="button" class="btn btn-danger" data-dismiss="modal">
                        {{ __('Cancel') }}
                    </button>
                </div>
         </form>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        //Carga de metodos JS
        uploadFile();
    });

    function uploadFile() {
        $('.btn-import').on('click', function () {
            $('#uploadModal').modal('show')
        })
    }

    document.getElementById("file-upload").addEventListener("change", function() {
        var fullPath = document.getElementById("file-upload").value;
        var filename = fullPath.replace(/^.*[\\\/]/, '');
        document.getElementById("status").innerHTML = filename;
    });

    document.getElementById("image-upload").addEventListener("change", function() {
        var fullPath = document.getElementById("image-upload").value;
        var filename = fullPath.replace(/^.*[\\\/]/, '');
        document.getElementById("statuszip").innerHTML =  filename;
    });
    
   
</script>



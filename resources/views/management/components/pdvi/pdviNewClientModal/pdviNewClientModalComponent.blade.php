<!--Modal Add new Client-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalNewClient">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: beige;">
    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
    </button>
            <div class="modal-header">
                <h5 class="modal-title modal_header_font">{{ __('Search Client') }} <i class="fa fa-search"></i></h5>
            </div>
            <div id="alert" hidden role="alert"></div>
            <form action="/management/pdvi" id="formSearch" method="POST" class="form-horizontal" style="padding-right: 15px;padding-left: 15px; background-color: beige; border: none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                
                <div class="modal-body">
                    
                       
                   <div class="container">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">{{ __('Identification') }}</label>
                            <div class="col-sm-8">
                                <select name="typedoc" id="typedoc1" class="form-control" required>
                                    <option value="" disabled selected>{{__('Select a type of identification')}}</option>
                                    @foreach ($itemstypedocument as $ItemsDocs)
                                    <option value="{{ $ItemsDocs->id }}">{{ $ItemsDocs->name }}</option >
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>

                    <form>
                        <div class="form-group row">
                            <label for="surname" class="col-sm-4 col-form-label">{{ __('Number Document') }}</label>
                            <div class="col-sm-8">
                                <input type="text" name="numberdocument" id="numberdocument1" class="form-control"
                                    required placeholder="{{ __('Number Document') }}"
                                    value=""/>
                            </div>
                            {{-- <div class="col-sm-4" id="perjur1" hidden>
                                <input name="digitcheck" id="digitcheck-name" placeholder="{{ __('Digit Check') }}"
                                    class="form-control" value=""/>
                            </div> --}}
                        </div>

                        <br>
                        
                  
                        </div>
                            <button id="search" type="button" value="search" style="height:36px; margin-right: 67px; width:100%;"
                                        class="btn btn-primary" onSubmit="return false;"onclick="searchClient()">
                                    {{ __('Search') }}
                                    
                            </button>
                        </div>
                    </form> 
                
              
                
                 
                <div class="modal-footer">

                    {{-- <button style="width:7rem;" type="button" id="add" onclick="addClient()" class="btn btn-success">
                        {{ __('Add') }}
                        <i class="fa fa-plus"></i>
                    </button>
                    
                    <button type="button" id="clean" style="display: none" class="btn btn-warning" data-dismiss="modal">
                        {{__('Delete') }}
                        <i class="fa fa-trash"></i>
                    </button> --}}
                    
                    <button style="width:7rem;" type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeClientModal()">
                        {{ __('Close') }}
                    </button>
                </div>
            
        </div>
    </div>
</div>

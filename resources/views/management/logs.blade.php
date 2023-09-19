<?php $page_title = __('Log viewer') ?>
@extends('admin_template') 
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')

<div class="panel-body">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-3 control-label">{{ __('Log file') }}:</label>
			<div class="input-group">
				<select name="logfilename" id="log-file"
					class="form-control select2"> @foreach($files as $file)
					<option value="{{ base64_encode($file) }}">{{$file}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</form>
</div>

<div class="panel panel-default" style="margin-top: 110px;">
	<div class="panel-heading">{{ __('Log Viewer') }}
		<div>
			<button data-toggle="tooltip" data-placement="top" class="btn btn-primary btn-log-action" data-btn-action="dl" type="button" data-original-title="{{ __('Download File') }}">
				<i class="fa fa-download"></i> 
			</button>
			<button data-toggle="tooltip" data-placement="top" class="btn btn-primary btn-log-action" data-btn-action="del" type="button" data-original-title="{{ __('Delete File') }}">
				<i class="fa fa-trash"></i> 
			</button>
		</div>
	</div>
	<div class="panel-body">
		@if ($logs === null)
		<div>{{ __('Log file') }} >50M, {{ __('please download it.') }}</div>
		@else
		<table id="table-log" class="table table-striped table-en task-table">
			<thead>
				<tr>
					<th width="2%">#</th>
					<th width="10%">{{ __('Level') }}</th>
					<th width="15%">{{ __('Date') }}</th>
					<th>{{ __('Content') }}</th>
				</tr>
			</thead>
		</table>
		@endif
	</div>
</div>
<script>
      jQuery(document).ready(function(){
    	  var logtable = $('#table-log').DataTable({
    		ajax: {
    		      url: '/management/logs/viewlist',
    		      data: function(d) {
    		         d.l = $('select#log-file').val()
    		      }
			},
    		columns: [
    		    {data: 7, name: 'id'},
                {data: 0, name: 'level', render: function ( data, type, full, meta ) {
                	return '<div class="text-'+ full[1] +'"><span class="glyphicon glyphicon-'+ full[2] +'-sign" aria-hidden="true"></span> &nbsp;'+ full[0] + '</div>';
                }},
   	            {data: 3},
	   	        {data: 2, name: 'text', render: function ( data, type, full, meta ) {		   	         
					var ret = '';
					if(full[6]) 
						ret += '<a class="pull-right expand btn btn-default btn-xs" data-display="stack'+ meta.row +'"><span class="glyphicon glyphicon-search"></span></a>';

					ret += full[4]; 

					if(full[5])
						ret += '<br />' + full[5];
						
				    if(full[6])
				    	ret += '<div class="stack" id="stack'+ meta.row +'" style="display: none;">'+ full[6] +'</div>';
				    return ret; 
          		}}
			],
			"order": []
		});
		$('select#log-file').change(function() {
			logtable.ajax.reload();
  		});
		$('.btn-log-action').click(function() {
			if($(this).attr('data-btn-action') == 'del' && !confirm("{{ __('Are you sure?') }}")) return false;
			
			window.location.href = window.location.href + '?'+ $(this).attr('data-btn-action') +'=' + $('select#log-file').val();
		});
    		
        $('#table-log').on('click', '.expand', function(){
            $('#' + $(this).data('display')).toggle();
        });
      });
    </script>

@endsection

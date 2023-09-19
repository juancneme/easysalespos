<?php $page_title = __('validator') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<iframe src="http://oscarsrv:8080/mondrian-rest/query-ui/QueryUI.html" width="100%" height="800px"></iframe>
@endsection
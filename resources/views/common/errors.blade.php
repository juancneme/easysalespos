@if (session()->has('errors'))
    @if (!isset($errors) || count($errors) == 0)
        <?php $errors = session()->get('errors'); ?>
    @endif
@endif
<style>
    .errors {
        display: inline-block;
        width: 100%;
        margin-top: 0px;
    }
</style>
<div class="errors">
@if (count($errors) > 0)
    <!-- Form Error List -->
        <div class="alert alert-danger">
            <strong>{{ __('Error:') }}</strong>

            <br><br>

            <ul>
                @if(is_array($errors))
                    @foreach ($errors as $error)
                        @if(!is_array($error))
                            <li>{{ $error }}</li>
                        @else
                            @foreach ($error as $e)
                                @foreach ($e->all() as $msg)
                                    <li>{{ $msg }}</li>
                                @endforeach
                            @endforeach
                        @endif
                    @endforeach
                @elseif(is_string($errors))
                    <li>{{ $errors }}</li>
                @else
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
            </ul>
        </div>
@endif

@if (session()->has('success'))
    @if (!isset($success))
        <?php $success = session()->get('success'); ?>
    @endif
@endif
@if (isset($success) && count($success) > 0)
    <!-- Form Error List -->
        <div class="alert alert-success">
            <strong>{{ __('Success:') }}</strong>

            <br><br>

            <ul>
                @foreach ($success as $suc)
                    <li>{{ $suc }}</li>
                @endforeach
            </ul>
        </div>
@endif

@if (session()->has('infos'))
    @if (!isset($infos))
        <?php $infos = session()->get('infos'); ?>
    @endif
@endif

@if (isset($infos) && count($infos) > 0)
    <!-- Form Error List -->
        <div class="alert alert-info">
            <strong>{{ __('Info:') }}</strong>

            <br><br>

            <ul>
                @foreach ($infos as $info)
                    <li>{{ $info }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($page))
        @if($page !='newstore' && $page != 'newsupplier')
            <div class="alert-javascript-success hide alert alert-success">
                <strong>{{__('Success:')}}</strong>
                <br><br>
                <ul></ul>
            </div>
            <div class="alert-javascript-info hide alert alert-info">
                <strong>{{__('Info:')}}</strong>
                <br><br>
                <ul></ul>
            </div>
            <div class="alert-javascript-error hide alert alert-danger">
                <strong>{{__('Error:')}}</strong>
                <br><br>
                <ul></ul>
            </div>
        @endif
    @endif
</div>
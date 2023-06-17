<!--end::Label-->
@php
    $endpoint_model = arrayGet($input,'endpoint.model'); //check isset
    $modelValue = pluck_columns($input['model'],get($input,'endpoint.option_value'),get($input,'endpoint.option_name'),$endpoint_model);
@endphp
<select name="{{ $input['model'] }}[]" id="{{ $input['model'] }}" class="form-select"
        data-control="select2" data-placeholder="Select an option"
        @if(array_key_exists('role',$input) && arrayGet($input,'role.require')) required @endif>
    <option>{{trans('lang.select_one')}}</option>
    @if(count($modelValue))
        @foreach($modelValue as $key=>$value)
            <option value="{{$value}}" @if(isset($_value[$input['model']]) && $value === (int)$_value[$input['model']]) selected @endif>{{$key}}</option>
        @endforeach
    @endif
</select>

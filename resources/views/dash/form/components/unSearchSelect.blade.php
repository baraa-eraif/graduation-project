<!--end::Label-->
@php
    $modelValue = get($input,'endpoint.model.function') ? $model->{get($input,'endpoint.model.function')}() :
(pluck_columns($input['model'],get($input,'endpoint.option_value'),get($input,'endpoint.option_name'),arrayGet($input,'endpoint.model')) ?? get($input,'endpoint.model'));
@endphp
<select name="{{ $input['model'] }}" id="{{ $input['model'] }}"
        class="form-select form-select-sm form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple"
        @if(array_key_exists('role',$input) && arrayGet($input,'role.require')) required @endif>
    <option value="{{null}}">{{trans('lang.select_one')}}</option>
    @if(is_array($modelValue) && count($modelValue))
        @foreach($modelValue as $key=>$value)
            <option value="{{$value}}"
                    @if(isset(${$input['model']}) && $value === ${$input['model']}) selected @endif>{{$key}}</option>
        @endforeach
    @endif
</select>


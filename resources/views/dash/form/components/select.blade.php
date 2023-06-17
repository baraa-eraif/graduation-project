<!--end::Label-->
@php
    $modelValue = get($input,'endpoint.model.function') ? $model->{get($input,'endpoint.model.function')}() :
(pluck_columns($input['model'],get($input,'endpoint.option_value'),get($input,'endpoint.option_name'),
arrayGet($input,'endpoint.model')) ?? get($input,'endpoint.model'));
    $is_multiple = get($input,'multiple');
@endphp
<select class="form-select searchSelect {{($input['class'] ?? '' ). ' '.$input['model'] }}" data-control="select2"
        data-allow-clear="true" name="{{ $input['model'] . ($is_multiple ? '[]' : null) }}" id="{{ $input['model'] }}"
        @if($is_multiple)  multiple="multiple" @endif @if(get($input,'hideSearch'))  data-hide-search="true" @endif
@isset($input['function'])
    @foreach($input['function'] as $value)
        {{$value['name']}} = {{$value['callable']}}(this);
    @endforeach
@endisset
@if(isset($is_search))
    data-placeholder="{{$placeholder}}"
@else
    data-placeholder="اختر ..."
    @if(array_key_exists('role',$input) && arrayGet($input,'role.require'))
        required
    @endif
@endif
>
<option value="{{null}}">{{trans('lang.select_one')}}</option>
@if(isset($modelValue) && count($modelValue))
    @foreach($modelValue as $key=>$value)
        <option value="{{$value}}"
                @isset(${$input['model']})
                    @if(($is_multiple && in_array($value,${$input['model']})) || (!$is_multiple && $value == ${$input['model']}))
                        selected
                    @endif
            @endisset
        >{{$key}}</option>
        @endforeach
        @endif
        </select>


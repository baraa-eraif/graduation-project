@isset($input['model'],$input['type'])
@php
    $placeholder = trans('lang.'.(!isset($is_search) ? null : 'search_select_') .$input['model']);
@endphp
@switch($input['type'])
    @case('input')
        @include('dash.form.components.input')
        @break
    @case('select')
{{--        @if(arrayExists($input,'multiple'))--}}
{{--            @include('dash.form.inputType.multiSelect')--}}
{{--        @else--}}

            @include('dash.form.components.select')
{{--        @endif--}}
        @break
    @case('textarea')
        @include('dash.form.components.textarea')
        @break
    @case('ckeditor')
        @include('dash.form.components.ckeditor')
        @break
    @case('switch')
        @include('dash.form.components.switch')
        @break
    @case('repeater')
        @include('dash.form.components.repeater')
        @break
    @case('image')
        @include('dash.form.components.image')
        @break
    @case('date')
        @include('dash.form.components.date')
        @break
    @case('password')
        @include('dash.form.components.password')
        @break
    @case('dateRange')
        @include('dash.form.components.dateRange')
        @break
    @case('checkBoxGroup')
        @include('dash.form.components.checkBoxGroup')
        @break
@endswitch
@endisset

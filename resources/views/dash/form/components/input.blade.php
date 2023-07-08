@php
 $span = get($input,'span');
$modelValue = $span ? remove_string($span,${$input['model']} ?? null ) : ${$input['model']} ?? null;
@endphp
<div class="{{$span ? 'input-group' : 'form-floating'}}">
    @if($span)
        <span class="input-group-text" id="{{get($input,'model')}}">{{$span}}</span>
    @endif
    <input type="{{arrayGet($input,'role.type') ?? 'text'}}"
    @isset($input['function'])
        @foreach($input['function'] as $value)
            {{$value['name']}} = {{$value['callable']}}();
        @endforeach
    @endisset
    class="form-control {{$input['model'] }}" id="floatingInput" value="{{ $modelValue }}"
    name="{{ $input['model'] }}" @if(arrayGet($input,'role.require')) required @endif
    placeholder="{{$placeholder}}"/>
        @if(!$span)
    <label for="floatingInput"> أدخل {{ trans('lang.'.$input['model']) }}</label>
        @endif
</div>
{{--<!--begin::Input group-->--}}
{{--<div class="input-group mb-5">--}}
{{--    <span class="input-group-text" id="basic-addon1">@</span>--}}
{{--    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"/>--}}
{{--</div>--}}
{{--<!--end::Input group-->--}}

<input  type="{{array_key_exists('role',$value) ? arrayGet($value,'role.type') : 'text'}}"
        @if(array_key_exists('role',$value) && arrayGet($value,'role.require')) required @endif
        name="{{$value['model']}}[]" placeholder="{{trans('lang.'.$value['model'])}}"
       @if(!isset($genrate)) @isset($_value) value="{{ $_value[$value['model']] ?? (${$value['model']} ?? null) }}"
       @endisset @endif class="form-control name_list"  id="floatingInput"/>

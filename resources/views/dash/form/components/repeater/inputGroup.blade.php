<tr id="row{{$_value['id'] ?? null}}" class="dynamic-added">
    <td>
        <div class="input-group">
            @foreach($input['inputs'] as $value)
                @switch($value['type'])
                    @case('input')
                    @include('dash.form.components.repeater.input')
                    @break
                    @case('select')
                    <div class="{{array_key_exists('class',$value) ? $value['class'] : 'col-md-6'}}">
                        @include('dash.form.components.repeater.select',['input' => $value])
                    </div>
                    @break
                @endswitch
            @endforeach
        </div>
    </td>
    @if(!isset($_key) || (isset($_key) && $_key === 0))
        <td>
            <button type="button" name="add" id="add" class="btn btn-primary"><i class="la la-plus"></i>أضف</button>
        </td>
    @else
        <td>
            <button type="button" name="remove" id="{{$_value['id']  ?? null}}" class="btn btn-danger btn_remove"><i
                    class="la la-trash-o fs-3"></i>حذف
            </button>
        </td>
    @endif

</tr>

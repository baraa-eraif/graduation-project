<div class="position-relative d-flex align-items-center">
    <input class="form-control searchDateRange" placeholder="{{$placeholder}}" id="kt_daterangepicker_4"
           value="{{ ${$input['model']}  ?? null  }}"
           @if(array_key_exists('role',$input) && arrayGet($input,'role.require')) required
           @endif name="{{ $input['model'] }}"/>
</div>


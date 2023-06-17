@php
$data_model = $input['model'].'-id' ?? 'kt_datepicker_3';
@endphp
<div class="position-relative d-flex align-items-center">
    <input class="form-control datepickerFilter" placeholder="{{$placeholder}}" id="{{ $data_model }}"
           value="{{ ${$input['model']}  ?? null  }}"
           @if(arrayGet($input,'role.require')) required
           @endif name="{{ $input['model'] }}"/>
</div>
{{--@if(isset($is_search))--}}
  @push('script')
      <script>
          $("#{{$data_model}}").flatpickr({
              enableTime: {{$enableTime ?? true}},
              dateFormat: "Y-m-d",
          });
      </script>
  @endpush
{{--@endif--}}

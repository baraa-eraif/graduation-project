<meta name="csrf-token" content="{{ csrf_token() }}"/>
<div class="row">
    <div class="col">
        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>
        <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
        </div>
        <div class="table-responsive text-center">
            <table class="table table-bordered" style="border:none;" id="dynamic_field">
                @php
                    $modelValue =isset(${$input['model']}) ? (array)${$input['model']} : [] ;
                @endphp
                @if(count($modelValue))
                    @foreach($modelValue as $_key=>$_value)
                        @include('dash.form.components.repeater.inputGroup')
                    @endforeach
                @else
                    @include('dash.form.components.repeater.inputGroup')
                @endif
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = {{(collect($modelValue)->last()['id'] ?? 0) + 1}};
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><div class="input-group">' +
                @foreach($input['inputs'] as $key => $value)
                @switch($value['type'])
                @case('input')
                `@include('dash.form.components.repeater.input',['genrate'=>true])` +
                @break
                @case('select')
                `<div class="{{array_key_exists('class',$value) ? $value['class'] : 'col-md-6'}}">` +
                `@include('dash.form.components.repeater.select',['genrate'=>true,'input' => $value])` +
                `</div>` +
                @break
                    @endswitch
                    @endforeach
                    '</div></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="la la-trash-o fs-3"></i>حذف</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            console.log('button_idbutton_id',button_id)
            $('#row' + button_id + '').remove();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submit').click(function () {
            $.ajax({
                url: postURL,
                method: "POST",
                data: $('#add_name').serialize(),
                type: 'json',
                success: function (data) {
                    if (data.error) {
                        printErrorMsg(data.error);
                    } else {
                        i = 1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display', 'block');
                        $(".print-error-msg").css('display', 'none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }
            });
        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $(".print-success-msg").css('display', 'none');
            $.each(msg, function (key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }
    });
</script>


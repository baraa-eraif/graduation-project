<div class="row">
    @foreach($inputs as $input)
        <div class="{{$input['class'] ?? 'col-md-6'}} fv-row" id="{{$input['model']}}">
            <!--begin::Input-->
            <label
                class="fs-5 fw-bold mb-2 mt-3 {{isset($input['role']['require']) ? 'required' : ''}}">{{ __genrateLabel($input) }}</label>
            @include('dash.form.components.register')
        </div>
    @endforeach
</div>
    <script type="text/javascript">
        // function begininput() {
        //     const inputValue = $('.name');
        //     const sellerOrderId = $('.seller_order_id');
        //     console.log('sellerOrderId', sellerOrderId)
        //     if (inputValue?.val()?.length > 0) {
        //         sellerOrderId.attr('disabled', 'disabled');
        //         inputValue.removeAttr('disabled');
        //     } else {
        //         console.log('inputValue', inputValue)
        //         sellerOrderId.removeAttr('disabled');
        //     }
        // }
        //
        // function onselect_seller_order_id() {
        //     console.log('onselect_seller_order_id', $('.seller_order_id').val())
        //     const inputValue = $('.name');
        //     if($('.seller_order_id').val() > 0){
        //         inputValue.attr('disabled', 'disabled');
        //         inputValue.val() === "";
        //     }else {
        //         inputValue.removeAttr('disabled');
        //     }
        // }

function onselect_notification_type_id () {
    let val = $('.notification_type').val();
    let teacher_input = $('.teacher_id');
    let teacher_input_div = teacher_input.parent();
    let student_input = $('.student_id');
    let student_input_div = student_input.parent();
    console.log('onselect_notification_type_id ',teacher_input)

    switch (val) {
        case 'teacher':
            teacher_input.removeClass('d-none');
            teacher_input_div.removeClass('d-none');
            student_input.addClass('d-none');
            student_input_div.addClass('d-none');
            break;
        case 'student':
            student_input.removeClass('d-none');
            student_input_div.removeClass('d-none');
            teacher_input_div.addClass('d-none');
            teacher_input.addClass('d-none');
            break;
        default:
            student_input.addClass('d-none');
            student_input_div.addClass('d-none');
            teacher_input_div.addClass('d-none');
            teacher_input.addClass('d-none');
    }
}
    </script>

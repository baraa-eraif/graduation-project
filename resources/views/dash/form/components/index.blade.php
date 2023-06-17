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
        function begininput() {
            const inputValue = $('.name');
            const sellerOrderId = $('.seller_order_id');
            console.log('sellerOrderId', sellerOrderId)
            if (inputValue?.val()?.length > 0) {
                sellerOrderId.attr('disabled', 'disabled');
                inputValue.removeAttr('disabled');
            } else {
                console.log('inputValue', inputValue)
                sellerOrderId.removeAttr('disabled');
            }
        }

        function onselect_seller_order_id() {
            console.log('onselect_seller_order_id', $('.seller_order_id').val())
            const inputValue = $('.name');
            if($('.seller_order_id').val() > 0){
                inputValue.attr('disabled', 'disabled');
                inputValue.val() === "";
            }else {
                inputValue.removeAttr('disabled');
            }
        }


    </script>

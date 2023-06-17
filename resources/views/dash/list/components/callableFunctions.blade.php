<script>
    @if(isset($editable_input) && @is_array($editable_input))
    @foreach($editable_input as $input)
    @foreach($columns as $key => $column)
    @if($column == $input)
    $(document).on('input', '{{"#editable_$input"}}', function (event) {
        let inputVal = $(this).val();
        var spanElement = $('<button id="{{"editable_{$input}_button"}}" class="input-group-text"></button>').text('تعديل');
        if (inputVal.length > 0) {
            if ($(this).parent().has('button').length > 0) {

            } else {
                $(this).after(spanElement);
            }
        } else {
            $(this).parent().find('button').remove();
        }
    });
    let {{$input}}buttonContext;
    $(document).on('click', "{{"#editable_{$input}_button"}}", function (event) {
        {{$input}}buttonContext = $(this)
        let inputVal = $(this).parent().find('input').val();
        let rowId = $(this).parent().find('input').data('row');
        ajax_request('teacher/course/evaluation', {
            '{{$input}}': inputVal,
            'row_id': rowId
        }, function (response) {
            {{$input}}buttonContext.parent().find('button').remove();
            console.log('response', response)
        }, 'POST')
    })

    {{--let input = $('{{"#editable_$column"}}');--}}
    {{--input.maxlength({--}}
    {{--    warningClass: "badge badge-warning",--}}
    {{--    limitReachedClass: "badge badge-success"--}}
    {{--});--}}
    @endif
    @endforeach
    @endforeach
    @endif
</script>

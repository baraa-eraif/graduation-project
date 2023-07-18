<script>
    function onselect_course_type(input) {
        let inputValue = $(input).val();
        let specialization =  $(document).find('#specialization');
        if (inputValue === 'university_requirement')
            specialization.hide()
        else
            specialization.show()
    }


</script>

<script>
    $('#logoutButton').click(function(e) {
        e.preventDefault();
       ajax_request('student/logout',{},function (response) {
           window.location.href = '{{route('student.login')}}'; // Redirect to the login page
       },'POST',{
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       })
    });
</script>

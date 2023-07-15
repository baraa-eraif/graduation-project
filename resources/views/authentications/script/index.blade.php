<script>
    $('#logoutButton').click(function (e) {
        e.preventDefault();
        let guard = '{{\Illuminate\Support\Str::remove('s-auth',activeGuard())}}';
        ajax_request(`${guard}/logout`, {}, function (response) {
            window.location.href = window.location.origin + `/${response.route}/login`; // Redirect to the login page
        }, 'POST', {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        })
    });
</script>

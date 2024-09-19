
<script src="/assets/js/jquery-3.6.0.min.js"></script>

<script src="/assets/js/feather.min.js"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/jquery.slimscroll.min.js"></script>
<script src="/assets/plugins/select2/js/select2.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
{{-- Confirm Delete --}}
<script>
    $(document).on('click', 'a[data-confirm-delete]', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                var token = '{{ csrf_token() }}';
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    data: {
                        '_token': token
                    },
                    success: function(data) {
                        window.location.replace(window.location.href)
                    },
                    error: function(data) {
                        console.warn(data);
                        window.location.replace(window.location.href)
                    }
                });
            }
        });
    });
</script>

</body>

</html>

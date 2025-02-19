@if (Session::has('toastSuccess'))
    <script>
        beautyToast.success({
            title: 'Success',
            message: "{{ Session::get('toastSuccess') }}"
        });
    </script>
@elseif (Session::has('toastError'))
    <script>
        beautyToast.error({
            title: 'Error',
            message: "{{ Session::get('toastError') }}"
        });
    </script>
@elseif (Session::has('toastInfo'))
    <script>
        beautyToast.info({
            title: 'Info',
            message: "{{ Session::get('toastInfo') }}"
        });
    </script>
@elseif (Session::has('toastWarning'))
    <script>
        beautyToast.warning({
            title: 'Warning',
            message: "{{ Session::get('toastWarning') }}"
        });
    </script>
@endif

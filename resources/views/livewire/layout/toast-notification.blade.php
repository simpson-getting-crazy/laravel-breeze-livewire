{{-- livewire/toast-notification.blade.php --}}
<div>
    <script>
        document.addEventListener('livewire:navigated', () => {
            @this.on('toast-message', (data) => {
                setTimeout(() => {
                    switch (data[0].type) {
                        case 'success':
                            iziToast.success({
                                title: 'Success',
                                message: data[0].message,
                                position: 'topRight',
                            });
                            break;
                        case 'error':
                            iziToast.error({
                                title: 'Error',
                                message: data[0].message,
                                position: 'topRight',
                            });
                            break;
                        case 'info':
                            iziToast.info({
                                title: 'Info',
                                message: data[0].message,
                                position: 'topRight',
                            });
                            break;
                        case 'warning':
                            iziToast.warning({
                                title: 'Warning',
                                message: data[0].message,
                                position: 'topRight',
                            });
                            break;
                    }
                }, 1000);
            });
        });
    </script>
</div>

<div>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('alert-confirmation', (data) => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1F2937",
                    cancelButtonColor: "#DC2626",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.dispatch('delete-confirmed', {id: data[0].id})
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            })
        })
    </script>
</div>

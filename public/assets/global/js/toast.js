const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

function showToast(icon, message) {

    if (typeof icon == 'number') {
        switch (icon) {
            case 200:
                icon = 'success'
                break
            case 201:
                icon = 'success'
                break
            default:
                icon = 'error'
                break
        }
    }

    return Toast.fire({
        icon: icon,
        title: message
    })
}
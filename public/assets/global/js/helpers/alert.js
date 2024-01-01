function showSwal(message, status = 'info', confirmButton = false) {

    let title
    switch (status) {
        case 'info':
            title = 'Info'
            break;
        case 'success':
            title = 'Sukses'
            break;
        case 'warning':
            title = 'Oops..'
            break;
        case 'error':
            title = 'Gagal'
            break;
        default:
            title = 'Lain-lain..'
            break;
    }

    return Swal.fire({
        icon: status,
        // title: status[0].toUpperCase() + status.slice(1),
        title: title,
        text: message,
        timer: !confirmButton ? 2e3 : false,
        showConfirmButton: status == 'success' ? false : true,
        confirmButtonText: 'Oke, saya mengerti',
        confirmButtonTextColor: '#4A4A4A',
        confirmButtonColor: '#8C8C8C',
    })
}

function showSwalConfirm(title, message, status = 'info', callback) {
    let confirmButtonColor

    switch (status) {
        case 'success':
            confirmButtonColor = '#1B8754'
            break;
        case 'info':
            confirmButtonColor = '#1F88EB'
            break;
        case 'warning':
            confirmButtonColor = '#DC3545'
            break;
        case 'error':
            confirmButtonColor = '#DC3545'
            break;
        default:
            break;
    }

    Swal.fire({
        title: title,
        icon: status,
        html: message,
        showCancelButton: true,
        confirmButtonColor: confirmButtonColor,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
    }).then((result) => {
        callback(result.isConfirmed)
    })
}

function getQueryString($query = null) {
    var url = document.location.href
    var qs = url.substring(url.indexOf('?') + 1).split('&')
    var result
    for (var i = 0, result = {}; i < qs.length; i++) {
        qs[i] = qs[i].split('=')
        result[qs[i][0]] = decodeURIComponent(qs[i][1])
    }
    return result
}

function getOS() {
    let userAgent = window.navigator.userAgent.toLowerCase(),
        macosPlatforms = /(macintosh|macintel|macppc|mac68k|macos)/i,
        windowsPlatforms = /(win32|win64|windows|wince)/i,
        iosPlatforms = /(iphone|ipad|ipod)/i,
        os = null

    if (macosPlatforms.test(userAgent)) {
        os = "macos"
    } else if (iosPlatforms.test(userAgent)) {
        os = "ios"
    } else if (windowsPlatforms.test(userAgent)) {
        os = "windows"
    } else if (/android/.test(userAgent)) {
        os = "android"
    } else if (!os && /linux/.test(userAgent)) {
        os = "linux"
    }

    return os
}

function toMonthInIndonesian(monthNumber) {
    switch (Number(monthNumber)) {
        case 1:
            return "Januari"
            break;
        case 2:
            return "Februari"
            break;
        case 3:
            return "Maret"
            break;
        case 4:
            return "April"
            break;
        case 5:
            return "Mei"
            break;
        case 6:
            return "Juni"
            break;
        case 7:
            return "Juli"
            break;
        case 8:
            return "Agustus"
            break;
        case 9:
            return "September"
            break;
        case 10:
            return "Oktober"
            break;
        case 11:
            return "November"
            break;
        case 12:
            return "Desember"
            break;
        default:
            break;
    }
}

function validationMessageRender(response, prefix = '', suffix = '') {
    for (let key in response) {
        let firstError = response[key][0]

        $(`#${prefix != '' ? prefix + '-' : ''}` + key).focus();
        $(`#${prefix != '' ? prefix + '-' : ''}` + key).removeClass('is-valid border-success');
        $(`#${prefix != '' ? prefix + '-' : ''}` + key).addClass('is-invalid border-danger');
        $(`#${prefix != '' ? prefix + '-' : ''}` + key + `${suffix != '	' ? '-' + suffix : ''}`).html(`<small class="text-danger">${firstError}</small>`);
    }
}

function clearValidationMessage(prefix = '', suffix = '') {
    $(`*input[id*=${prefix}]`).each(function () {
        $(this).removeClass('is-invalid')
        $(this).removeClass('is-valid')

        $(this).removeClass('border-danger')
        $(this).removeClass('border-success')
    })

    $(`*select[id*=${prefix}]`).each(function () {
        $(this).removeClass('is-invalid')
        $(this).removeClass('is-valid')

        $(this).removeClass('border-danger')
        $(this).removeClass('border-success')
    })

    $(`*textarea[id*=${prefix}]`).each(function () {
        $(this).removeClass('is-invalid')
        $(this).removeClass('is-valid')

        $(this).removeClass('border-danger')
        $(this).removeClass('border-success')
    })

    $(`*div[id^=${prefix}]`).each(function () {
        $(this).html('')
    })
}

function previewImageFromInput(input, previewId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader()
        reader.onload = function (e) {
            $(previewId).attr('src', e.target.result)
            $(previewId).hide()
            $(previewId).fadeIn(650)
        }
        reader.readAsDataURL(input.files[0])
    }
}

function getCsrfToken() {
    return $('meta[name="csrf-token"]').attr("content")
}

function getExtensionString(string) {
    string = string.split('.')
    string = string[string.length - 1]

    return string
}

function renderBtnSubmitIndicator(textIndicator = 'Memproses') {
    $('button').click(function () {
        if ($(this).attr('type') == 'submit') {
            $(this).attr('disabled', true).html(`<div class="d-flex align-items-center justify-content-center"><div class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></div><strong class="ms-2">${textIndicator}...</strong></div>`)
        }
    })
}

function clearBtnSubmitIndicator() {
    $('form').each(function () {
        let btnSubmit = $(this).find('button[type=submit]')
        btnSubmit.removeAttr('disabled').html($(btnSubmit).data('text'))
    })
}

function tgl_indo($tanggal){
	$bulan = array (
		1 = 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] .''. $bulan[(int)$pecahkan[1]] .''. $pecahkan[0];
}
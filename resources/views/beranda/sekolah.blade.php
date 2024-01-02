@extends('layout.maindashboard')
@section('content')
<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{$title}}</h5>
                <div class="text-end ms-auto">
                    <button type="button" class="btn btn-xs btn-primary mb-0" data-bs-toggle="modal"
                        data-bs-target="#modal-add-sekolah">
                        <i class="fas fa-plus pe-2"></i> Tambah Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Sekolah</th>
                                <th>Alamat</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('beranda.modalSekolah')
@endsection
@push('script')
<script type="text/javascript">
    let table = $('#myTable').DataTable({
        serverSide: true,
        ajax: {
            url: "{{ url()->current() }}",

        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'dt-body-center'
            },
            {
                data: 'nama',
                name: 'nama',
            },
            {
                data: 'alamat',
                name: 'alamat',
            },
            {
                data: 'latitude',
                name: 'latitude',
            },
            {
                data: 'longitude',
                name: 'longitude',
            },
            {
                data: 'gambar',
                name: 'gambar',
            },
            {
                data: 'aksi',
                name: 'aksi',
            },
        ],
    });

    $('#tambah-sekolah').submit(function(event) {
        event.preventDefault();
       
        var formData = new FormData(this)
        formData.append('_method', 'post')
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'))

        $.ajax({
            method: "POST",
            url: "{{ url()->current() }}",
            data: formData,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                clearValidationMessage('add', 'msg')
            },
            success: function(response) {
                showSwal('Data berhasil ditambah', 'success')
                $('#modal-add-sekolah').modal('hide')
                location.reload()
            },
            error: function(response) {
                if (response.status == 422) {
                    let error = response.responseJSON.errors
                    validationMessageRender(error, 'add', 'msg')
                }
            }
        })
    });

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

function validationMessageRender(response, prefix = '', suffix = '') {
    for (let key in response) {
        let firstError = response[key][0]

        $(`#${prefix != '' ? prefix + '-' : ''}` + key).focus();
        $(`#${prefix != '' ? prefix + '-' : ''}` + key).removeClass('is-valid border-success');
        $(`#${prefix != '' ? prefix + '-' : ''}` + key).addClass('is-invalid border-danger');
        $(`#${prefix != '' ? prefix + '-' : ''}` + key + `${suffix != '	' ? '-' + suffix : ''}`).html(`<small class="text-danger">${firstError}</small>`);
    }
}

    $('#myTable tbody').on('click', '.btn-edit', function() {
        let detail = $(this).data('detail')
        console.log(detail.gambar)
        let gambar = detail.gambar
        $('#modal-edit-sekolah').modal('show')
        $('#edit-id_sekolah').val(detail.id_sekolah)
        $('#edit-nama').val(detail.nama)
        $('#edit-alamat').val(detail.alamat)
        $('#edit-latitude').val(detail.latitude)
        $('#edit-longitude').val(detail.longitude)
    });

    $('#form-edit-sekolah').submit(function(event) {
        event.preventDefault();

        let id = $('#edit-id_sekolah').val()

        var formData = new FormData(this)
        formData.append('_method', 'put')
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'))

        $.ajax({
            method: "POST",
            url: "{{ url()->current()}}/" + id,
            data: formData,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                clearValidationMessage('edit', 'msg')
            },
            success: function(results) {
                showSwal('Data berhasil dirubah', 'success')
                $('#modal-edit-sekolah').modal('hide')
                location.reload()
            },
            error: function(response) {
                if (response.status == 422) {
                    let error = response.responseJSON.errors
                    validationMessageRender(error, 'edit', 'msg')
                }
            }
        })
    });

    $('#myTable tbody').on('click', '.btn-hapus', function() {
        let id = $(this).data('id')
        
        Swal.fire({
            title: 'Hapus sekolah?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6D7A91',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url()->current() }}/" + id,
                    data: {
                        _method: 'delete',
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    dataType: "JSON",
                    success: function(results) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Data berhasil dihapus',
                            timer: 2e3,
                            showConfirmButton: !1
                        })
                        location.reload();
                    },
                    error: function(results) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Data gagal dihapus',
                            timer: 2e3,
                            showConfirmButton: !1
                        })
                    }
                })
            }
        })
    });
</script>
@endpush
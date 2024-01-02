@extends('login.layouts.main')

@section('content')

<style>
    #icon-show-password {
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
    }

    #indicator-page i {
        font-size: 12px;
    }
</style>

<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-7 pb-9 m-3 border-radius-lg"
        style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-cover.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
                    <p class="text-lead text-white">Selamat datang di Aplikasi GIS Sekolah.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                @if(session()->has('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text">{{session('sukses')}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text">{{session('loginError')}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card mt-5">
                    <div class="card-header pb-0 text-start">
                        <h3 class="font-weight-bolder">Selamat Datang</h3>
                        <p class="mb-0">Masukkan Email dan NIK Anda.</p>
                    </div>
                    <div class="card-body">
                        <form role="form-login" class="text-start" method="POST" action="{{ url('/auth') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email Anda</label>
                                <div class="mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Email" aria-label="Email" name="email"
                                        autofocus required>
                                </div>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>NIK Anda</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="NIK Anda" id="password"
                                        aria-label="Password" name="password" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 mt-4 mb-0">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{ url('/') }}" class="btn btn-success mt-3 col-md-12">Home</a>
            </div>
        </div>
    </div>
</main>
@endsection

@push('script')
<script>
    $('#form-login').submit(function(e) {
        e.preventDefault()

        $(this).find('button[type=submit]').attr('disabled', true).html('<div class="d-flex align-items-center justify-content-center"><div class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></div><strong class="ms-2">Memproses...</strong></div>')

        e.currentTarget.submit()
    })

    $('#icon-show-password').click(function() {
        $('#password').attr('type') == 'password' ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password')
        $('#password').attr('type') == 'password' ? $(this).html(`<i class="bi bi-eye force-bi-bold-05"></i>`) : $(this).html(`<i class="bi bi-eye-slash-fill"></i>`)
    })
</script>
@endpush
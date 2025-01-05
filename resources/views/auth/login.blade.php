@extends('layout.authLayout')

@section('auth')
<div class="m-auto mw-510 py-5 col-12">
    <form method="POST" action="{{ route('login') }}" class="col-12">
        @csrf
        <div class="d-flex align-items-center gap-4 mb-5">
            <h4 class="fs-3 mb-0">Login.</h4>
            <a href="index.html">
                <img src="{{ asset('') }}admin/assets/images/logopgcandibaru.png" alt="logo" style="width: 50px;">
            </a>
        </div>
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <div class="form-group mb-4">
                    <label class="label">Email</label>
                    <input autocomplete="off" type="email" name="email" class="form-control h-58" placeholder="envytheme@info.com">
                </div>
                <div class="form-group mb-0">
                    <label class="label">Password</label>
                    <div class="form-group">
                        <div class="password-wrapper position-relative">
                            <input autocomplete="off" type="password" name="password" id="password" placeholder="XXXXXXXX" class="form-control h-58 text-dark">
                            <i style="color: #A9A9C8; font-size: 16px; right: 15px !important;"
                                class="ri-eye-off-line password-toggle-icon translate-middle-y top-50 end-0 position-absolute" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit"
            class="btn btn-primary fs-16 fw-semibold text-dark heading-fornt py-2 py-md-3 px-4 text-white w-100">
            Login
        </button>
    </form>
</div>
@endsection

@extends('layout.mainLayout')



@section('content')
    <form action="{{ route('user.update', ['id' => $data["user"]->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nama</label>
                    <div class="form-group position-relative">
                        <input type="text" name="name" class="form-control text-dark ps-5 h-58" placeholder="Enter Name" value="{{ $data["user"]->name }}">
                        <i
                            class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Email</label>
                    <div class="form-group position-relative">
                        <input type="email" name="email" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Email" value="{{ $data["user"]->email }}">
                        <i
                            class="ri-mail-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Role</label>
                    <div class="form-group position-relative">
                        <select name="role" class="form-select form-control text-dark ps-5 h-58">
                            <option value="">Pilih Role</option>
                            @foreach ($data['roles'] as $role)
                                <option value="{{ $role }}" {{ $data["user"]->getRoleNames()->first() == $role ? 'selected' : '' }}>{{ $role }}</option>
                            @endforeach
                        </select>
                        <i
                            class="ri-list-ordered position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Password</label>
                    <div class="form-group position-relative">
                        <input type="password" id="luas-input" name="password" class="form-control text-dark ps-5 h-58"
                            placeholder="XXXXXXXXX" />
                        <i
                            class="ri-key-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('user.index') }}" class="">
            <button type="button" class="btn btn-secondary fw-semibold text-white py-3 px-4 mt-2 w-30">
                Back
            </button>
        </a>
        <button type="submit" class="btn btn-primary fw-semibold text-white py-3 px-4 mt-2 w-30">save</button>
    </form>
@endsection

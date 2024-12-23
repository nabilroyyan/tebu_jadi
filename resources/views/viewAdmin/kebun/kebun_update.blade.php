@extends('layout.mainLayout')

@section('content')
    <form action="/kebun/{{ $kebun->id_master_kebun }}/update" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nama Kebun</label>
                    <div class="form-group position-relative">
                        <input type="text" name="nama_kebun" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Name" value="{{ $kebun->nama_kebun }}">
                        <i
                            class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Alamat</label>
                    <div class="form-group position-relative">
                        <input type="text" name="alamat" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Address" value="{{ $kebun->alamat }}">
                        <i
                            class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Luas (m²)</label>
                    <div class="form-group position-relative">
                        <input type="text" id="luas-input" name="luas" class="form-control text-dark ps-5 h-58"
                            placeholder="Masukkan Luas" value="{{ $kebun->luas }}"
                            " />
                        <i
                            class="ri-map-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Kecamatan</label>
                    <div class="form-group position-relative">
                        <input name="kecamatan" type="text" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Kecamatan" value="{{ $kebun->kecamatan }}">
                        <i
                            class="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Kabupaten</label>
                    <div class="form-group position-relative">
                        <input name="kabupaten" type="text" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Kabupaten" value="{{ $kebun->kabupaten }}">
                        <i
                            class="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nama Petani</label>
                    <div class="form-group position-relative">
                        <input name="nama_petani" type="text" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Nama Petani" value="{{ $kebun->nama_petani }}">
                        <i
                            class="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group mb-4">
                    <label class="label">Status</label>
                    <div class="form-group position-relative">
                        <select name="status" class="form-select form-control text-dark ps-5 h-58">
                            <option value="" disabled>Pilih Status</option>
                            <option value="diterima" {{ $kebun->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="ditolak" {{ $kebun->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        <i
                            class="ri-list-ordered position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary fw-semibold text-white py-3 px-4 mt-2 w-30"
            onclick="window.location.href='/kebun'">
            Back
        </button>
        <button type="submit" class="btn btn-primary fw-semibold text-white py-3 px-4 mt-2 w-30">Save</button>
    </form>
@endsection

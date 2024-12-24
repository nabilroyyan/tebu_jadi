@extends('layout.mainLayout')

@section('content')
    <form action="/timbangan-store" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">No SPA</label>
                    <div class="form-group position-relative">
                        <input type="text" name="no_spa" class="form-control text-dark ps-5 h-58" placeholder="Masukkan No SPA">
                        <i class="ri-file-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Tanggal</label>
                    <div class="form-group position-relative">
                        <input type="date" name="tanggal" class="form-control text-dark ps-5 h-58">
                        <i class="ri-calendar-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nomor Kontrak</label>
                    <div class="form-group position-relative">
                        <select name="nomer_kontrak" class="form-select form-control text-dark ps-5 h-58">
                            <option value="" selected disabled>Pilih Nomor Kontrak</option>
                            @foreach ($kebuns as $kebun)
                                <option value="{{ $kebun->nomer_kontrak }}">{{ $kebun->nomer_kontrak }} - {{ $kebun->nama_kebun }}</option>
                            @endforeach
                        </select>
                        <i class="ri-contract-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nama Kebun</label>
                    <div class="form-group position-relative">
                        <input type="text" name="nama_kebun" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Nama Kebun">
                        <i class="ri-landscape-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nama Petani</label>
                    <div class="form-group position-relative">
                        <input type="text" name="nama_petani" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Nama Petani">
                        <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nopol</label>
                    <div class="form-group position-relative">
                        <input type="text" name="nopol" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Nomor Polisi">
                        <i class="ri-car-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Sopir</label>
                    <div class="form-group position-relative">
                        <input type="text" name="sopir" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Nama Sopir">
                        <i class="ri-user-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Status Timbang</label>
                    <div class="form-group position-relative">
                        <select name="status_timbang" class="form-select form-control text-dark ps-5 h-58">
                            <option value="" selected disabled>Pilih Status</option>
                            <option value="proses">Proses</option>
                            <option value="selesai_ditimbang">Selesai Ditimbang</option>
                        </select>
                        <i class="ri-checkbox-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Bruto (Kg)</label>
                    <div class="form-group position-relative">
                        <input type="number" name="bruto" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Bruto">
                        <i class="ri-scale-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Tara (Kg)</label>
                    <div class="form-group position-relative">
                        <input type="number" name="tara" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Tara">
                        <i class="ri-scale-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Neto (Kg)</label>
                    <div class="form-group position-relative">
                        <input type="number" name="neto" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Neto">
                        <i class="ri-scale-3-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Jenis Tebu</label>
                    <div class="form-group position-relative">
                        <input type="text" name="jenis_tebu" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Jenis Tebu">
                        <i class="ri-leaf-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Brix (%)</label>
                    <div class="form-group position-relative">
                        <input type="text" name="brix" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Brix">
                        <i class="ri-line-chart-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Tanggal Masuk Pos</label>
                    <div class="form-group position-relative">
                        <input type="date" name="tgl_masuk_pos" class="form-control text-dark ps-5 h-58">
                        <i class="ri-time-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <!-- Tgl Timbang Masuk -->
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Tanggal Timbang Masuk</label>
                    <div class="form-group position-relative">
                        <input type="date" name="tgl_timb_masuk" class="form-control text-dark ps-5 h-58">
                        <i class="ri-time-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <!-- Tgl Timbang Keluar -->
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Tanggal Timbang Keluar</label>
                    <div class="form-group position-relative">
                        <input type="date" name="tgl_timb_keluar" class="form-control text-dark ps-5 h-58">
                        <i class="ri-time-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>


        </div>

        <button type="button" class="btn btn-secondary fw-semibold text-white py-3 px-4 mt-2 w-30" onclick="window.location.href='/timbangan'">Back</button>
        <button type="submit" class="btn btn-primary fw-semibold text-white py-3 px-4 mt-2 w-30">Save</button>
    </form>
@endsection

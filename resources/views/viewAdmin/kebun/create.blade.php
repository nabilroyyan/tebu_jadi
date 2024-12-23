@extends('layout.mainLayout')



@section('content')
    <form action="/kebun-store" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">nama kebun</label>
                    <div class="form-group position-relative">
                        <input type="text" name="nama_kebun" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Name">
                        <i
                            class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">alamat</label>
                    <div class="form-group position-relative">
                        <input type="text" name="alamat" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Name">
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
                            placeholder="Masukkan Luas" />
                        <i
                            class="ri-map-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6">
            <div class="form-group mb-4">
                <label class="label">luas</label>
                <div class="form-group position-relative">
                    <input name="luas" type="teks" name="kecamatan" class="form-control text-dark ps-5 h-58" placeholder="Enter Phone Number">
                    <i class="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                </div>
            </div>
        </div> --}}

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Kecamatan</label>
                    <div class="form-group position-relative">
                        <input name="kecamatan" type="teks" name="kecamatan" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Phone Number">
                        <i
                            class="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">kabupaten</label>
                    <div class="form-group position-relative">
                        <input name="kabupaten" type="teks" name="kabupaten" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Phone Number">
                        <i
                            class="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nama Petani</label>
                    <div class="form-group position-relative">
                        <input name="nama_petani" type="teks" name="nama_petani" class="form-control text-dark ps-5 h-58"
                            placeholder="Enter Phone Number">
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
                            <option value="" selected disabled>Pilih Status</option>
                            <option value="diterima">diterima</option>
                            <option value="ditolak">ditolak</option>
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
        <button type="submit" class="btn btn-primary fw-semibold text-white py-3 px-4 mt-2 w-30">save</button>
    </form>



    <script>
        const luasInput = document.getElementById('luas-input');
        const luasHidden = document.getElementById('luas-hidden');

        luasInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^0-9]/g, '');
            const formattedValue = new Intl.NumberFormat('id-ID').format(value);
            e.target.value = formattedValue + ' m²';
            luasHidden.value = value; // Simpan angka asli di hidden input
        });

        luasInput.addEventListener('focus', function(e) {
            e.target.value = luasHidden.value || ''; // Tampilkan angka asli saat fokus
        });

        luasInput.addEventListener('blur', function(e) {
            let value = luasHidden.value || '0';
            const formattedValue = new Intl.NumberFormat('id-ID').format(value);
            e.target.value = formattedValue + ' m²'; // Tambahkan m² saat blur
        });
    </script>
@endsection

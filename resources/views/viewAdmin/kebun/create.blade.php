@extends('layout.mainLayout')



@section('content')
<div class="">
<h3>Create Data Kebun</h3>
</div>
    <form action="/kebun-store" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">nama kebun</label>
                    <div class="form-group position-relative">
                        <input type="text" autocomplete="off" name="nama_kebun" class="form-control text-dark ps-5 h-58"
                            placeholder="masukkan nama kebun">
                        <i
                            class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">alamat</label>
                    <div class="form-group position-relative">
                        <input type="text" autocomplete="off" name="alamat" class="form-control text-dark ps-5 h-58"
                            placeholder="Masukkan alamat">
                        <i
                            class="flaticon-search position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Luas (m²)</label>
                    <div class="form-group position-relative">
                        <input autocomplete="off" type="text" id="luas-input" name="luas"
                            class="form-control text-dark ps-5 h-58" placeholder="Masukkan Luas" />
                        <i
                            class="ri-map-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="provinsi">provinsi</label>
                    <div class="form-group position-relative">
                        <select id="provinsi" name="provinsi" class="form-select form-control text-dark ps-5 h-58">
                            <option value="" selected disabled>Pilih Provinsi</option>
                        </select>
                        <i
                            class="ri-list-ordered position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="kabupaten">kabupaten</label>
                    <div class="form-group position-relative">
                        <select id="kabupaten" name="kabupaten" class="form-select form-control text-dark ps-5 h-58">
                            <option value="" selected disabled>Pilih Kabupaten</option>
                        </select>
                        <i
                            class="ri-list-ordered position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="kecamatan">kecamatan</label>
                    <div class="form-group position-relative">
                        <select id="kecamatan" name="kecamatan" class="form-select form-control text-dark ps-5 h-58">
                            <option value="" selected disabled>Pilih kecamatan</option>
                        </select>
                        <i
                            class="ri-list-ordered position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nama Petani</label>
                    <div class="form-group position-relative">
                        <input autocomplete="off" name="nama_petani" type="teks" name="nama_petani"
                            class="form-control text-dark ps-5 h-58" placeholder="masukkan nama petani">
                        <i
                            class="flaticon-user position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
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

        // provinsi, kebun, kecamatan
        const provinsiSelect = document.getElementById("provinsi");
        const kabupatenSelect = document.getElementById("kabupaten");
        const kecamatanSelect = document.getElementById("kecamatan");

        // Hidden inputs untuk menyimpan nama wilayah
        const provinsiNameInput = document.createElement("input");
        provinsiNameInput.type = "hidden";
        provinsiNameInput.name = "provinsi_nama";
        provinsiSelect.parentNode.appendChild(provinsiNameInput);

        const kabupatenNameInput = document.createElement("input");
        kabupatenNameInput.type = "hidden";
        kabupatenNameInput.name = "kabupaten_nama";
        kabupatenSelect.parentNode.appendChild(kabupatenNameInput);

        const kecamatanNameInput = document.createElement("input");
        kecamatanNameInput.type = "hidden";
        kecamatanNameInput.name = "kecamatan_nama";
        kecamatanSelect.parentNode.appendChild(kecamatanNameInput);

        // Inisialisasi dengan opsi default
        provinsiSelect.innerHTML = '<option value="" selected disabled>Pilih Provinsi</option>';
        kabupatenSelect.innerHTML = '<option value="" selected disabled>Pilih Kabupaten</option>';
        kecamatanSelect.innerHTML = '<option value="" selected disabled>Pilih Kecamatan</option>';

        // Fetch data provinsi saat halaman dimuat
        fetch("https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json")
            .then((response) => response.json())
            .then((provinces) => {
                provinces.forEach((province) => {
                    const option = document.createElement("option");
                    option.value = province.id;
                    option.textContent = province.name;
                    provinsiSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching provinces:', error);
            });

        // Event listener untuk provinsi
        provinsiSelect.addEventListener("change", () => {
            const provinceId = provinsiSelect.value;
            const provinceName = provinsiSelect.options[provinsiSelect.selectedIndex].textContent;
            provinsiNameInput.value = provinceName;

            // Reset dan disable dropdown berikutnya
            kabupatenSelect.innerHTML = '<option value="" selected disabled>Pilih Kabupaten</option>';
            kecamatanSelect.innerHTML = '<option value="" selected disabled>Pilih Kecamatan</option>';
            kabupatenSelect.disabled = true;
            kecamatanSelect.disabled = true;

            // Reset hidden inputs
            kabupatenNameInput.value = '';
            kecamatanNameInput.value = '';

            if (provinceId) {
                fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                    .then((response) => response.json())
                    .then((regencies) => {
                        regencies.forEach((regency) => {
                            const option = document.createElement("option");
                            option.value = regency.id;
                            option.textContent = regency.name;
                            kabupatenSelect.appendChild(option);
                        });
                        kabupatenSelect.disabled = false;
                    })
                    .catch(error => {
                        console.error('Error fetching regencies:', error);
                    });
            }
        });

        // Event listener untuk kabupaten
        kabupatenSelect.addEventListener("change", () => {
            const regencyId = kabupatenSelect.value;
            const regencyName = kabupatenSelect.options[kabupatenSelect.selectedIndex].textContent;
            kabupatenNameInput.value = regencyName;

            // Reset dan disable dropdown kecamatan
            kecamatanSelect.innerHTML = '<option value="" selected disabled>Pilih Kecamatan</option>';
            kecamatanSelect.disabled = true;

            // Reset hidden input
            kecamatanNameInput.value = '';

            if (regencyId) {
                fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${regencyId}.json`)
                    .then((response) => response.json())
                    .then((districts) => {
                        districts.forEach((district) => {
                            const option = document.createElement("option");
                            option.value = district.id;
                            option.textContent = district.name;
                            kecamatanSelect.appendChild(option);
                        });
                        kecamatanSelect.disabled = false;
                    })
                    .catch(error => {
                        console.error('Error fetching districts:', error);
                    });
            }
        });

        // Event listener untuk kecamatan
        kecamatanSelect.addEventListener("change", () => {
            const districtName = kecamatanSelect.options[kecamatanSelect.selectedIndex].textContent;
            kecamatanNameInput.value = districtName;
        });
    </script>
@endsection

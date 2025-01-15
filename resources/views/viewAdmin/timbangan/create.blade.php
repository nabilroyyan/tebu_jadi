@extends('layout.mainLayout')

@section('content')
    @if (Auth::user()->can('timbangan.create'))
    <div class="">
        <h3>Create Data Timbangan</h3>
        </div>
        <form action="/timbangan-store" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Tanggal</label>
                        <div class="form-group position-relative">
                            <input type="date" name="tanggal" class="form-control text-dark ps-5 h-58">
                            <i
                                class="ri-calendar-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Nomor Kontrak</label>
                        <div class="form-group position-relative">
                            <select id="nomer_kontrak" name="master_kebun_id"
                                class="form-select form-control text-dark ps-5 h-58">
                                <option selected disabled>Pilih Nomor Kontrak</option>
                                @foreach ($kebuns as $kebun)
                                    <option value="{{ $kebun->id_master_kebun }}">{{ $kebun->nomer_kontrak }} -
                                        {{ $kebun->nama_kebun }}</option>
                                @endforeach
                            </select>
                            <i
                                class="ri-contract-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Nama Kebun</label>
                        <div class="form-group position-relative">
                            <input id="nama_kebun" type="text" name="nama_kebun" class="form-control text-dark ps-5 h-58"
                                placeholder="Masukkan Nama Kebun" readonly>
                            <i
                                class="ri-landscape-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Nama Petani</label>
                        <div class="form-group position-relative">
                            <input id="nama_petani" type="text" name="nama_petani"
                                class="form-control text-dark ps-5 h-58" placeholder="Masukkan Nama Petani" readonly>
                            <i
                                class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Nopol</label>
                        <div class="form-group position-relative">
                            <input type="text" id="nopol" name="nopol" class="form-control text-dark ps-5 h-58"
                                placeholder="Masukkan Nomor Polisi">
                            <i class="ri-car-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>
                

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Sopir</label>
                        <div class="form-group position-relative">
                            <input type="text" name="sopir" class="form-control text-dark ps-5 h-58"
                                placeholder="Masukkan Nama Sopir">
                            <i
                                class="ri-user-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Status Timbang</label>
                    <div class="form-group position-relative">
                        <select name="status_timbang" class="form-select form-control text-dark ps-5 h-58">
                            <option value="" selected disabled>Pilih Status</option>
                            <option value="proses">Proses</option>
                            <option value="selesai_ditimbang">Selesai Ditimbang</option>
                        </select>
                        <i
                            class="ri-checkbox-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div> --}}



                <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">jenis tebu</label>
                    <div class="form-group position-relative">
                        <select name="jenis_tebu" class="form-select form-control text-dark ps-5 h-58">
                            <option value="" selected disabled>Pilih Status</option>
                            <option value="proses">lokal</option>
                            <option value="non lokal">non lokal</option>
                        </select>
                        <i
                            class="ri-checkbox-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>


                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Brix (%)</label>
                        <div class="form-group position-relative">
                            <input type="text" name="brix" class="form-control text-dark ps-5 h-58"
                                placeholder="Masukkan Brix">
                            <i
                                class="ri-line-chart-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>


            </div>

            <button type="button" class="btn btn-secondary fw-semibold text-white py-3 px-4 mt-2 w-30"
                onclick="window.location.href='/timbangan'">Back</button>
            <button type="submit" class="btn btn-primary fw-semibold text-white py-3 px-4 mt-2 w-30">Save</button>
        </form>


        <script>
            document.getElementById('nomer_kontrak').addEventListener('change', function() {
                const kebunId = this.value;

                if (kebunId) {
                    fetch(`/kebun-details/${kebunId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Isi kolom nama kebun dan nama petani
                            document.getElementById('nama_kebun').value = data.nama_kebun;
                            document.getElementById('nama_petani').value = data.nama_petani;
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    // Kosongkan kolom jika tidak ada yang dipilih
                    document.getElementById('nama_kebun').value = '';
                    document.getElementById('nama_petani').value = '';
                }
            });


            document.getElementById('nopol').addEventListener('input', function () {
        let value = this.value.replace(/\s+/g, '').toUpperCase(); // Hilangkan spasi & jadikan huruf kapital

        // Format: Huruf 1 spasi Angka 4 spasi Huruf 2 atau 3
        value = value.replace(/^([A-Z]?)(\d{0,4})([A-Z]*)$/, (match, p1, p2, p3) => {
            return `${p1} ${p2} ${p3}`.trim(); // Tambahkan spasi di tempat yang benar
        });

        this.value = value; // Update nilai input
    });
        </script>
    @endif

@endsection

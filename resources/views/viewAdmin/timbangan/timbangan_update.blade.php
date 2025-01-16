@extends('layout.mainLayout')

@section('content')
<div class="">
    <h3>Edit Data Timbangan</h3>
    </div>
    @if (Auth::user()->can('timbangan.edit'))
        <form action="/timbangan/{{ $timbangan->id_timbangan }}/update" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Tanggal</label>
                        <div class="form-group position-relative">
                            <input type="date" name="tanggal" class="form-control text-dark ps-5 h-58"
                                value="{{ $timbangan->tanggal }}">
                            <i
                                class="ri-calendar-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Nomor Kontrak</label>
                        <div class="form-group position-relative">
                            <select name="master_kebun_id" class="form-select form-control text-dark ps-5 h-58">
                                <option value="" disabled>Pilih Nomor Kontrak</option>
                                @foreach ($kebuns as $kebun)
                                    <option value="{{ $kebun->id_master_kebun }}"
                                        {{ $timbangan->master_kebun_id == $kebun->id_master_kebun ? 'selected' : '' }}>
                                        {{ $kebun->nomer_kontrak }} - {{ $kebun->nama_kebun }}
                                    </option>
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
                            <input type="text" name="nama_kebun" class="form-control text-dark ps-5 h-58"
                                placeholder="Enter Nama Kebun" value="{{ $timbangan->nama_kebun }}">
                            <i
                                class="ri-landscape-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Nama Petani</label>
                        <div class="form-group position-relative">
                            <input type="text" name="nama_petani" class="form-control text-dark ps-5 h-58"
                                placeholder="Enter Nama Petani" value="{{ $timbangan->nama_petani }}">
                            <i
                                class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Nomor Polisi (Nopol)</label>
                        <div class="form-group position-relative">
                            <input type="text" name="nopol" class="form-control text-dark ps-5 h-58"
                                placeholder="Enter Nopol" value="{{ $timbangan->nopol }}">
                            <i
                                class="ri-car-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Nama Sopir</label>
                        <div class="form-group position-relative">
                            <input type="text" name="sopir" class="form-control text-dark ps-5 h-58"
                                placeholder="Enter Nama Sopir" value="{{ $timbangan->sopir }}">
                            <i
                                class="ri-user-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Status Timbang</label>
                        <div class="form-group position-relative">
                            <select name="status_timbang" class="form-select form-control text-dark ps-5 h-58">
                                <option value="" disabled>Pilih Status</option>
                                <option value="proses" {{ $timbangan->status_timbang == 'proses' ? 'selected' : '' }}>
                                    Proses
                                </option>
                                <option value="selesai ditimbang"
                                    {{ $timbangan->status_timbang == 'selesai ditimbang' ? 'selected' : '' }}>
                                    Selesai
                                </option>
                            </select>
                            <i
                                class="ri-checkbox-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <!-- Input Bruto -->
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Bruto</label>
                        <div class="form-group position-relative">
                            <input type="number" name="bruto" id="bruto" class="form-control text-dark ps-5 h-58"
                                placeholder="Enter Bruto" value="{{ $timbangan->bruto }}">
                            <i
                                class="ri-bubble-chart-fill position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <!-- Input Tara -->
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Tara</label>
                        <div class="form-group position-relative">
                            <input type="number" name="tara" id="tara" class="form-control text-dark ps-5 h-58"
                                placeholder="Enter Tara" value="{{ $timbangan->tara }}">
                            <i
                                class="ri-stack-fill position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <!-- Input Neto -->
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label class="label">Neto</label>
                        <div class="form-group position-relative">
                            <input type="number" name="neto" id="neto" class="form-control text-dark ps-5 h-58"
                                placeholder="Enter Neto" value="{{ $timbangan->neto }}" readonly>
                            <i
                                class="ri-drop-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>
            </div>      
                <button type="button" class="btn btn-secondary fw-semibold text-white py-3 px-4 mt-2 w-30"
                    onclick="window.location.href='/timbangan'">Back</button>
                <button type="submit" class="btn btn-primary fw-semibold text-white py-3 px-4 mt-2 w-30">Save</button>

        </form>



        <!-- JavaScript untuk perhitungan Neto -->
        <script>
            
            // Ambil elemen input bruto, tara, dan neto
            const brutoInput = document.getElementById('bruto');
            const taraInput = document.getElementById('tara');
            const netoInput = document.getElementById('neto');

            // Fungsi untuk menghitung netto otomatis
            function calculateNetto() {
                const bruto = parseFloat(brutoInput.value) || 0; // Nilai default 0 jika kosong
                const tara = parseFloat(taraInput.value) || 0; // Nilai default 0 jika kosong
                const netto = bruto - tara;

                // Masukkan hasil netto ke input neto
                netoInput.value = netto >= 0 ? netto : 0; // Pastikan netto tidak negatif
            }

            // Tambahkan event listener untuk input bruto dan tara
            brutoInput.addEventListener('input', calculateNetto);
            taraInput.addEventListener('input', calculateNetto);

            // Hitung netto saat halaman pertama kali dimuat
            calculateNetto();
        </script>
    @endif
@endsection

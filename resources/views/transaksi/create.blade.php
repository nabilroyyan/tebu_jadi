@extends('layout.mainLayout')

@section('content')
    <div class="container">
        <h1>Tambah Transaksi</h1>

        <!-- Form Transaksi -->
        <form action="{{ route('transaksis.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="recid">Pilih Hutang</label>
                <select id="recid" name="recid" class="form-control" onchange="updateKontrakAndPetani()">
                    <option value="">Pilih Hutang</option>
                    @foreach ($kebuns as $kebun)
                        <option value="{{ $kebun->hutang_id }}" 
                                data-nokontrak="{{ $kebun->nomer_kontrak }}" 
                                data-petani="{{ $kebun->nama_petani }}">
                            {{ $kebun->pinjaman }}  <!-- This will be displayed in the dropdown -->
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nokontrak">Nomer Kontrak</label>
                <input type="text" id="nokontrak" name="nokontrak" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="nama_petani">Nama Petani</label>
                <input type="text" id="nama_petani" name="nama_petani" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="angsuran">Angsuran</label>
                <input type="number" id="angsuran" name="angsuran" class="form-control" required>
            </div>

            <div class="form-group" style="display:none;">
    <label for="status">Status</label>
    <input type="text" name="status" id="status" class="form-control" value="belum diverifikasi" readonly>
</div>

            <br><br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
        // Update nomer kontrak, nama petani, dan angsuran sisa berdasarkan pilihan recid
        function updateKontrakAndPetani() {
            var selectedOption = document.getElementById('recid').selectedOptions[0];
            var nokontrak = selectedOption.getAttribute('data-nokontrak');
            var petani = selectedOption.getAttribute('data-petani');

            // Update the input fields with the corresponding values
            document.getElementById('nokontrak').value = nokontrak;
            document.getElementById('nama_petani').value = petani;
        }
    </script>

@endsection

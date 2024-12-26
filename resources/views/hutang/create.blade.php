@extends('layout.mainLayout')

@section('content')
    <div class="container">
        <h1>Tambah Hutang</h1>

       <!-- Form Hutang -->
<form action="{{ route('hutangs.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nokontrak">Nomer Kontrak</label>
        <select id="nokontrak" name="nokontrak" class="form-control" onchange="updatePetani()">
            <option value="">Pilih Nomer Kontrak</option>
            @foreach ($kebuns as $kebun)
                <option value="{{ $kebun->nomer_kontrak }}" data-petani="{{ $kebun->nama_petani }}">{{ $kebun->nomer_kontrak }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="nama_petani">Nama Petani</label>
        <input type="text" id="nama_petani" name="nama_petani" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label for="pinjaman">Pinjaman</label>
        <input type="number" id="pinjaman" name="pinjaman" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="angsuran_sisa">Angsuran Sisa</label>
    <input type="number" id="angsuran_sisa" name="angsuran_sisa" class="form-control" value="0" readonly required>
</div>


<div class="form-group" style="display:none;">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="diproses" selected>Diproses</option>
    </select>
</div>
<br></br>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<script>
    // Update nama petani berdasarkan pilihan nokontrak
    function updatePetani() {
        var selectedOption = document.getElementById('nokontrak').selectedOptions[0];
        var petani = selectedOption.getAttribute('data-petani');
        document.getElementById('nama_petani').value = petani;
    }
</script>

@endsection

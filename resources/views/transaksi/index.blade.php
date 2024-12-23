@extends('layout.mainLayout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="d-flex align-items-center bg-body justify-content-between">
                <h5 class="ms-5">Daftar Transaksi</h5>
                <a href="{{ route('transaksis.create') }}" class="btn btn-primary text-white me-5">Tambah Transaksi Baru</a>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel" aria-labelledby="preview-tab" tabindex="0">
                <div class="default-table-area members-list">
                    <div class="table-responsive">
                        <table class="table align-middle" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No. Kontrak</th>
                                    <th scope="col">Angsuran</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be inserted here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fetch transaksi data from the API
    fetch('/api/transaksis')
        .then(response => response.json())
        .then(data => {
            const transaksiList = document.querySelector('tbody');
            let html = '';

            // Loop through the data and generate table rows
            data.forEach((transaksi, index) => {
                html += `<tr>
                    <td>${index + 1}</td>
                    <td>${transaksi.nokontrak}</td>
                    <td>${transaksi.angsuran}</td>
                    <td>${transaksi.status}</td>
                    <td>${new Date(transaksi.created_at).toLocaleDateString()}</td>
                </tr>`;
            });

            // Insert generated HTML into the table body
            transaksiList.innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
</script>

@endsection

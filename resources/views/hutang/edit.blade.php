@extends('layout.mainLayout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="d-flex align-items-center bg-body justify-content-between">
                <h5 class="ms-5">Daftar Hutang</h5>
                @if (Auth::user()->can('hutang.create'))
                    <a href="{{ route('hutangs.create') }}" class="btn btn-primary text-white me-5">Tambah Hutang Baru</a>
                @endif
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel"
                aria-labelledby="preview-tab" tabindex="0">
                <div class="default-table-area members-list">
                    <div class="table-responsive">
                        <table class="table align-middle" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Kontrak</th>
                                    <th>Pinjaman</th>
                                    <th>Angsuran Sisa</th>
                                    <th>Sisa</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="hutang-table-body">
                                <!-- Data will be inserted here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for changing status -->
<div id="statusModal" class="modal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Pilih Status Hutang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button class="btn btn-primary" onclick="changeStatus('diproses')">Diproses</button>
                <button class="btn btn-success" onclick="changeStatus('diterima')">Diterima</button>
                <button class="btn btn-danger" onclick="changeStatus('ditolak')">Ditolak</button>
            </div>
        </div>
    </div>
</div>
<script>
    let currentHutangId = null;

    // Fetch all hutang data from the API
    fetch('/api/hutangs')
        .then(response => response.json())
        .then(data => {
            const hutangTableBody = document.getElementById('hutang-table-body');
            let html = '';

            data.forEach((hutang, index) => {
                const statusText = hutang.sisa <= 0 ? 'Lunas' : hutang.status;
                const createdAt = new Date(hutang.created_at).toLocaleDateString('id-ID', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${hutang.nokontrak}</td>
                    <td>${hutang.pinjaman}</td>
                    <td>${hutang.angsuran_sisa}</td>
                    <td>${hutang.sisa}</td>
                    <td id="status-${hutang.id}">${hutang.status}</td>
                    <td>${createdAt}</td>
                    <td>
                        <button class="btn btn-warning" onclick="openStatusModal(${hutang.id})">Ubah Status</button>
                        <button class="btn btn-danger" onclick="deleteHutang(${hutang.id})">Hapus</button>
                    </td>
                </tr>
            `;
            });

            hutangTableBody.innerHTML = html;
        })
        .catch(error => console.error('Error:', error));

    // Open the modal for status change
    function openStatusModal(id) {
        currentHutangId = id;
        const modal = new bootstrap.Modal(document.getElementById('statusModal'));
        modal.show();
    }

    // Get the CSRF token from the meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Function to change the status of the hutang
    function changeStatus(status) {
        fetch(`/api/hutangs/${currentHutangId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    status: status
                }),
            })
            .then(response => response.json())
            .then(data => {
                alert('Status berhasil diupdate');
                location.reload();
                document.getElementById(`status-${currentHutangId}`).innerText = status;
                const modal = bootstrap.Modal.getInstance(document.getElementById('statusModal'));
               
                modal.hide();
                location.reload();
            })
            .catch(error => console.error('Error:', error));
    }

    // Function to delete hutang
    function deleteHutang(id) {
        if (confirm('Apakah Anda yakin ingin menghapus hutang ini?')) {
            fetch(`/api/hutangs/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                })
                .then(response => response.json())
                .then(data => {
                    alert('Hutang berhasil dihapus');
                    location.reload();
                })
                .catch(error => console.error('Error:', error));
        }
    }
</script>
@endsection

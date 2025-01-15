@extends('layout.mainLayout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
         
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
                                    <th scope="col">Aksi</th>
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
            const isVerified = transaksi.status.toLowerCase() === 'diverifikasi';
            
            html += `<tr id="transaksi-${transaksi.id}">
                <td>${index + 1}</td>
                <td>${transaksi.nokontrak}</td>
                <td>${transaksi.angsuran}</td>
                <td class="status">${transaksi.status}</td>
                <td>${new Date(transaksi.created_at).toLocaleDateString()}</td>
                <td>
                    ${!isVerified ? `
                        <button onclick="deleteTransaksi(${transaksi.id})" class="btn btn-danger">Hapus</button>
                        <button onclick="verifyTransaksi(${transaksi.id})" class="btn btn-success">Verifikasi</button>
                    ` : ''}
                </td>
            </tr>`;
        });

            // Insert generated HTML into the table body
            transaksiList.innerHTML = html;
        })
        .catch(error => console.error('Error:', error));

    // Function to delete transaksi
    function deleteTransaksi(id) {
        // Confirm before deletion
        if (!confirm('Apakah Anda yakin ingin menghapus transaksi ini?')) {
            return;
        }

        // Get the CSRF token from the meta tag (make sure it's included in the <head> section of your layout)
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Send the DELETE request via fetch
        fetch(`/transaksis/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken, // CSRF token
            },
        })
        .then(response => {
            if (response.ok) {
                alert('Transaksi berhasil dihapus');
                location.reload(); // Reload the page to reflect changes
            } else {
                alert('Transaksi berhasil dihapus');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus transaksi 2');
        });
    }

    // Function to verify transaksi (update status to "diverifikasi")
    function verifyTransaksi(id) {
        // Confirm before verification
        if (!confirm('Apakah Anda yakin ingin memverifikasi transaksi ini?')) {
            return;
        }

        // Get the CSRF token from the meta tag (make sure it's included in the <head> section of your layout)
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Send the request to update the transaction directly
        fetch(`/api/transaksis/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken, // CSRF token
            },
            body: JSON.stringify({
                status: 'diverifikasi',  // Update status to 'diverifikasi'
                angsuran: '0'            // Assuming '0' is a placeholder if you don't need to send a specific value for angsuran
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Debugging: Check if the row exists
                console.log('Data received:', data);
                const row = document.querySelector(`#transaksi-${id}`);
                if (row) {
                    // Update the status in the table
                    row.querySelector('.status').innerText = 'Diverifikasi';
                    alert('Transaksi berhasil diverifikasi');
                    location.reload();
                } else {
                    alert('Transaksi berhasil diverifikasi. ID transaksi: ' + id);
                    location.reload();
                }
            } else {
                alert('Terjadi kesalahan saat memverifikasi transaksi');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memverifikasi transaksi');
        });
    }
</script>

@endsection

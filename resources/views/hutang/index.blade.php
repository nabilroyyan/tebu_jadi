@extends('layout.mainLayout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="d-flex align-items-center bg-body justify-content-between">
                <h5 class="ms-5">Daftar Hutang</h5>            
                    <a href="{{ route('hutangs.create') }}" class="btn btn-primary text-white me-5">Tambah Hutang Baru</a>            
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel"
                aria-labelledby="preview-tab" tabindex="0">
                <div class="default-table-area members-list">
                    <div class="table-responsive">
                        <table class="table align-middle" id="hutangTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Kontrak</th>
                                    <th>Total Pinjaman</th>
                                    <th>Sisa</th>
                                    <th>Status</th>
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

<script>
   // Fetch data and render the table
fetch('/api/hutangs')
    .then(response => response.json())
    .then(data => {
        const groupedData = {};
        const hutangTableBody = document.getElementById('hutang-table-body');

        // Group data by nokontrak
        data.forEach(hutang => {
            if (!groupedData[hutang.nokontrak]) {
                groupedData[hutang.nokontrak] = {
                    nokontrak: hutang.nokontrak,
                    totalPinjaman: 0,
                    totalAngsuranSisa: 0,
                    details: []
                };
            }

            // If status is 'diterima', add to totals
            if (hutang.status === 'diterima') {
                groupedData[hutang.nokontrak].totalPinjaman += hutang.pinjaman;
                groupedData[hutang.nokontrak].totalAngsuranSisa += hutang.sisa;
            }

            // Add the hutang to the details (including 'diproses' ones)
            groupedData[hutang.nokontrak].details.push(hutang);
        });

        let html = '';
        let rowIndex = 1;

        // Loop through the grouped data and render the table
        for (const key in groupedData) {
            const group = groupedData[key];
            html += `
                <tr onclick="toggleDetails('${group.nokontrak}')">
                    <td>${rowIndex++}</td>
                    <td>${group.nokontrak}</td>
                    <td>${group.totalPinjaman}</td>
                    <td>${group.totalAngsuranSisa}</td>
                    <td>Detail</td>
                </tr>
                <tr id="details-${group.nokontrak}" style="display: none;">
                    <td colspan="5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pinjaman</th>
                                        <th>Angsuran Sisa</th>
                                        <th>Sisa</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${group.details.map((detail, index) => `
                                        <tr onclick="toggleTransactionDetails(${detail.id}, ${detail.recid}, '${group.nokontrak}')">
                                            <td>${index + 1}</td>
                                            <td>${detail.pinjaman}</td>
                                            <td>${detail.angsuran_sisa}</td>
                                            <td>${detail.sisa}</td>
                                            <td>${detail.status}</td>
                                            <td>${new Date(detail.created_at).toLocaleDateString('id-ID', {
                                                year: 'numeric',
                                                month: 'long',
                                                day: 'numeric'
                                            })}</td>
                                            <td>Detail Transaksi</td>
                                        </tr>
                                        <tr id="transaction-details-${detail.id}" style="display: none;">
                                            <td colspan="7">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Angsuran</th>
                                                                <th>Status</th>
                                                                <th>Tanggal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="transaction-table-${detail.id}">
                                                            <!-- Data will be inserted here by JavaScript -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            `;
        }

        hutangTableBody.innerHTML = html;
    })
    .catch(error => console.error('Error:', error));

function toggleDetails(nokontrak) {
    const detailsRow = document.getElementById(`details-${nokontrak}`);
    detailsRow.style.display = detailsRow.style.display === 'none' ? '' : 'none';
}

// Toggle visibility of the transaction details row
function toggleTransactionDetails(detailId, recid, nokontrak) {
    const transactionDetailsRow = document.getElementById(`transaction-details-${detailId}`);
    const transactionTableBody = document.getElementById(`transaction-table-${detailId}`);

    if (transactionDetailsRow.style.display === 'none') {
    transactionDetailsRow.style.display = '';
    fetch(`/api/transaksis`)
        .then(response => response.json())
        .then(transactions => {
            // Filter transactions by recid matching detailId
            const filteredTransactions = transactions.filter(transaction => 
                transaction.recid === detailId
            );

            if (filteredTransactions.length > 0) {
                let transactionHtml = '';
                filteredTransactions.forEach((transaction, index) => {
                    transactionHtml += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${transaction.angsuran}</td>
                            <td>${transaction.status}</td>
                            <td>${new Date(transaction.created_at).toLocaleDateString('id-ID', {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            })}</td>
                        </tr>
                    `;
                });
                transactionTableBody.innerHTML = transactionHtml;
            } else {
                // If no transactions match, hide the details row
                transactionDetailsRow.style.display = 'none';
            }
        })
        .catch(error => console.error('Error fetching transactions:', error));
} else {
    transactionDetailsRow.style.display = 'none';
}}
</script>
@endsection

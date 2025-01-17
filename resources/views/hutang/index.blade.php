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
                    <!-- Custom Search -->
                    <div class="mb-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search by No. Kontrak" />
                    </div>

                    <div class="table-responsive">
                        <table id="hutangTable" class="table" cellspacing="0" width="100%">
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

                    <!-- Custom Pagination -->
                    <div id="pagination" class="mt-3">
                        <button id="prevPage" class="btn btn-secondary">Previous</button>
                        <span id="pageNumber">Page 1</span>
                        <button id="nextPage" class="btn btn-secondary">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Custom Pagination and Search Logic -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Custom pagination variables
    const itemsPerPage = 5;
    let currentPage = 1;
    let data = [];

    // Fetch data and render the table
    fetch('/api/hutangs')
        .then(response => response.json())
        .then(fetchedData => {
            data = fetchedData;
            renderTable(data);
        })
        .catch(error => console.error('Error:', error));

    // Group data by 'nokontrak' (grouping logic)
    function groupData(data) {
        const groupedData = {};

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

        return groupedData;
    }

    // Render the table based on the current page
    function renderTable(filteredData) {
        const groupedData = groupData(filteredData); // Group the data
        const hutangTableBody = document.getElementById('hutang-table-body');
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const currentPageData = Object.values(groupedData).slice(startIndex, endIndex);

        let html = '';
        currentPageData.forEach((group, index) => {
            html += `
                <tr onclick="toggleDetails('${group.nokontrak}')">
                    <td>${startIndex + index + 1}</td>
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
                                        <tr onclick="toggleTransactionDetails(${detail.id}, '${group.nokontrak}')">
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
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            `;
        });

        hutangTableBody.innerHTML = html;

        // Update pagination display
        document.getElementById('pageNumber').textContent = Page ${currentPage};
        document.getElementById('prevPage').disabled = currentPage === 1;
        document.getElementById('nextPage').disabled = currentPage * itemsPerPage >= Object.keys(groupedData).length;
    }

    // Handle search input
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const filteredData = data.filter(hutang => hutang.nokontrak.toLowerCase().includes(searchTerm));
        currentPage = 1;  // Reset to first page on search
        renderTable(filteredData);
    });

    // Handle previous page click
    document.getElementById('prevPage').addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            renderTable(data);
        }
    });

    // Handle next page click
    document.getElementById('nextPage').addEventListener('click', function() {
        if (currentPage * itemsPerPage < data.length) {
            currentPage++;
            renderTable(data);
        }
    });

    // Toggle details visibility for the grouped rows
    function toggleDetails(nokontrak) {
        const detailsRow = document.getElementById(details-${nokontrak});
        detailsRow.style.display = detailsRow.style.display === 'none' ? '' : 'none';
    }

    // Toggle visibility of the transaction details row
    function toggleTransactionDetails(detailId, nokontrak) {
        const transactionDetailsRow = document.getElementById(transaction-details-${detailId});
        const transactionTableBody = document.getElementById(transaction-table-${detailId});

        if (transactionDetailsRow.style.display === 'none') {
            transactionDetailsRow.style.display = '';
            fetch(/api/transaksis)
                .then(response => response.json())
                .then(transactions => {
                    const filteredTransactions = transactions.filter(transaction => 
                        transaction.recid === detailId
                    );

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
                })
                .catch(error => console.error('Error fetching transactions:', error));
        } else {
            transactionDetailsRow.style.display = 'none';
        }
    }
</script>
@endsection
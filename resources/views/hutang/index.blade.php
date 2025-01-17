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
            <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel" aria-labelledby="preview-tab" tabindex="0">
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
    const itemsPerPage = 5; // Number of items per page
    let currentPage = 1; // Current page
    let data = []; // All data fetched from API

    // Fetch data from API
    fetch('/api/hutangs')
        .then(response => response.json())
        .then(fetchedData => {
            console.log('Fetched Data:', fetchedData); // Debugging
            data = fetchedData;
            renderTable(data);
        })
        .catch(error => console.error('Error fetching data:', error));

    // Group data by 'nokontrak'
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
            if (hutang.status === 'diterima') {
                groupedData[hutang.nokontrak].totalPinjaman += hutang.pinjaman;
                groupedData[hutang.nokontrak].totalAngsuranSisa += hutang.sisa;
            }
            groupedData[hutang.nokontrak].details.push(hutang);
        });
        return groupedData;
    }

    // Render table with pagination
    function renderTable(filteredData) {
        const groupedData = groupData(filteredData);
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
                                    </tr>
                                </thead>
                                <tbody>
                                    ${group.details.map((detail, index) => `
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${detail.pinjaman}</td>
                                            <td>${detail.angsuran_sisa}</td>
                                            <td>${detail.sisa}</td>
                                            <td>${detail.status}</td>
                                            <td>${new Date(detail.created_at).toLocaleDateString('id-ID')}</td>
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

        // Update pagination controls
        document.getElementById('pageNumber').textContent = `Page ${currentPage}`;
        document.getElementById('prevPage').disabled = currentPage === 1;
        document.getElementById('nextPage').disabled = currentPage * itemsPerPage >= Object.keys(groupedData).length;
    }

    // Handle search
    document.getElementById('searchInput').addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        const filteredData = data.filter(hutang => hutang.nokontrak.toLowerCase().includes(searchTerm));
        currentPage = 1;
        renderTable(filteredData);
    });

    // Pagination controls
    document.getElementById('prevPage').addEventListener('click', function () {
        if (currentPage > 1) {
            currentPage--;
            renderTable(data);
        }
    });

    document.getElementById('nextPage').addEventListener('click', function () {
        if (currentPage * itemsPerPage < data.length) {
            currentPage++;
            renderTable(data);
        }
    });

    // Toggle row details
    function toggleDetails(nokontrak) {
        const detailsRow = document.getElementById(`details-${nokontrak}`);
        detailsRow.style.display = detailsRow.style.display === 'none' ? '' : 'none';
    }
</script>
@endsection

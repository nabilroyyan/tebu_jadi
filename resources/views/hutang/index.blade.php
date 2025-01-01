@extends('layout.mainLayout')

@section('content')
    @if (Auth::user()->can('hutang.list'))
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card bg-white border-0 rounded-10 mb-4">
                    <div class="d-flex align-items-center bg-body justify-content-between">
                        <h5 class="ms-5">Daftar Hutang</h5>
                        @if (Auth::user()->can('hutang.create'))
                            <a href="{{ route('hutangs.create') }}" class="btn btn-primary text-white me-5">Tambah Hutang
                                Baru</a>
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
                                            <th scope="col">No</th>
                                            <th scope="col">No. Kontrak</th>
                                            <th scope="col">Pinjaman</th>
                                            <th scope="col">Angsuran Sisa</th>
                                            <th scope="col">Sisa</th>
                                            <th scope="col">Status</th>
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
            // Fetch debt data from the API
            fetch('/api/hutangs')
                .then(response => response.json())
                .then(data => {
                    const hutangList = document.querySelector('tbody');
                    let html = '';

                    data.forEach((hutang, index) => {
                        const sisaText = hutang.sisa <= 0 ? 'Lunas' : hutang.sisa;
                        const statusText = hutang.sisa <= 0 ? 'Lunas' : hutang.status;

                        html += `<tr>
                <td>${index + 1}</td>
                <td>${hutang.nokontrak}</td>
                <td>${hutang.pinjaman}</td>
                <td>${hutang.angsuran_sisa}</td>
                <td>${sisaText}</td>
                <td>${statusText}</td>
            </tr>`;
                    });

                    hutangList.innerHTML = html;
                })
                .catch(error => console.error('Error:', error));
        </script>
    @endif
@endsection

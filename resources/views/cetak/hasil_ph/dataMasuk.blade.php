@extends('layout.mainLayout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="d-flex align-items-center bg-body justify-content-between">
                    <h5 class="ms-5">List Item</h5>
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
                                        <th scope="col">ID</th>
                                        <th scope="col">Netto</th>
                                        <th scope="col">Action</th>
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
        // Fetch data from the API and populate the table
        fetch('http://localhost:8000/api/data-masuk')
            .then(response => response.json())
            .then(data => {
                console.log('Data fetched successfully:', data);

                const dataMasukList = document.querySelector('#myTable tbody');
                let html = '';

                if (data && data.dataMasuk) {
                    data.dataMasuk.forEach((item) => {
                        html += `<tr>
                            <td>${item.id_timbangan}</td>
                            <td>${item.neto}</td>
                            <td>
                                <a href="javascript:void(0);" 
                                   class="view-document" 
                                   data-encrypted-id="${item.encrypted_id}">show</a>
                            </td>
                        </tr>`;
                    });

                    dataMasukList.innerHTML = html;
                } else {
                    console.error('No data found in response.');
                }
            })
            .catch(error => console.error('Error fetching data:', error));

        // Use event delegation to handle clicks on dynamically added elements
        document.querySelector('#myTable').addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('view-document')) {
                event.preventDefault();

                const encryptedId = event.target.getAttribute('data-encrypted-id');
                console.log('Show button clicked, encrypted ID:', encryptedId);

                if (encryptedId) {
                    const form = document.createElement('form');
                    form.method = 'GET';
                    form.action = '/data-report';

                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'Id';
                    input.value = encryptedId;

                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                } else {
                    console.error('Encrypted ID not found on clicked element.');
                }
            }
        });
    </script>
@endsection

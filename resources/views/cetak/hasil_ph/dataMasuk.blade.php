@extends('layout.mainLayout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="d-flex align-items-center bg-body justify-content-between">
                <h5 class="ms-5">List Item</h5>
                <input type="text" id="search-input" class="form-control me-5" placeholder="Cari data..." style="width: 250px;">
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel" aria-labelledby="preview-tab" tabindex="0">
                <div class="default-table-area members-list">
                    <div class="table-responsive">
                        <table class="table align-middle" id="data-masuk-table">
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

        <div class="card bg-white border-0 rounded-10 mt-4">
            <div class="d-flex align-items-center bg-body justify-content-between">
                <h5 class="ms-5">Quick Question</h5>
            </div>
            <div id="chat-area" class="custom-chat-area p-4">
                <div id="message-container" class="custom-message-container mb-3"></div>
                <div class="d-flex">
                    <textarea class="form-control me-2 custom-textarea" placeholder="Masukkan teks di sini"></textarea>
                    <button id="send-btn" class="btn btn-primary custom-send-btn">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Fetch data for table
        $.ajax({
            url: 'http://localhost:8000/api/data-masuk',
            method: 'GET',
            success: function(response) {
                if (response && response.dataMasuk) {
                    let rows = '';
                    response.dataMasuk.forEach(function(data) {
                        rows += `<tr>
                            <td>${data.id_timbangan}</td>
                            <td>${data.neto}</td>
                            <td>
                                <a href="javascript:void(0);" class="view-document" data-encrypted-id="${data.encrypted_id}">show</a>
                            </td>
                        </tr>`;
                    });
                    $('#data-masuk-table tbody').html(rows);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });

        // Search functionality
        $('#search-input').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#data-masuk-table tbody tr').each(function() {
                const rowText = $(this).text().toLowerCase();
                $(this).toggle(rowText.includes(searchTerm));
            });
        });

        // Chatbot functionality
        $('#send-btn').on('click', function() {
            const textarea = $('.custom-textarea');
            const userMessage = textarea.val().trim();

            if (!userMessage) return;

            // Append user message
            $('#message-container').append(`<div class="message-box"><textarea class="form-control frm-textarea">${userMessage}</textarea></div>`);

            // Send message to API
            fetch('http://localhost:5000/api/chatbot', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: userMessage })
            })
            .then(response => response.json())
            .then(data => {
                $('#message-container').append(`<div class="message-box"><textarea class="form-control frm-textarea response-area">${data.response}</textarea></div>`);
                if (data.audio_url) {
                    const audioElement = `<audio controls autoplay src="http://localhost:5000/${data.audio_url}"></audio>`;
                    $('#message-container').append(audioElement);
                }
                textarea.val('');
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
@endsection

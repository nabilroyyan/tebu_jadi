@extends('layout.mainLayout')

@section('content')
<!-- Container for table and chatbot -->
<div class="container">
    <!-- Tabel Data Masuk -->
    <div class="tab-content" id="myTabContent">
        <h2 class="table-title">List Item</h2>
        <table id="data-masuk-table" class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Netto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Chatbot Section -->
    <div id="chat-area" class="custom-chat-area">
        <h2 class="chat-title">Quick Question</h2>
        <div id="message-container" class="custom-message-container"></div>

        <!-- Input section for user to type their message -->
        <div class="custom-message-box">
            <textarea class="custom-textarea" placeholder="Masukkan teks di sini"></textarea>
            <button id="send-btn" class="custom-send-btn">Kirim</button>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
        console.log('Document Ready: JavaScript file loaded and executing.');

        $(document).ready(function() {
    console.log('Document Ready: JavaScript file loaded and executing.');

    // AJAX request to get data from the API
    $.ajax({
        url: 'http://localhost:8000/api/data-masuk', // URL of your API
        method: 'GET',
        beforeSend: function() {
            console.log('AJAX request is about to be sent.');
        },
        success: function(response) {
            console.log('AJAX Success:', response);
            if (response && response.dataMasuk) {
                var rows = '';
                response.dataMasuk.forEach(function(data) {
                    rows += `
                        <tr>
                            <td>${data.id_timbangan}</td> <!-- Menampilkan id_timbangan -->
                            <td>${data.neto}</td> <!-- Menampilkan netto -->
                            <td>
                                <a href="javascript:void(0);" 
                                   class="view-document" 
                                   data-encrypted-id="${data.encrypted_id}">show</a>
                            </td>
                        </tr>
                    `;
                });
                $('#data-masuk-table tbody').html(rows);

                $('.view-document').on('click', function() {
                    var encryptedId = $(this).data('encrypted-id');
                    var form = document.createElement('form');
                    form.method = 'GET';
                    form.action = '/data-report'; // This is the correct route

                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'Id';
                    input.value = encryptedId; // Use encrypted ID here

                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                });
            } else {
                console.error('Data not found in response.');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        },
        complete: function() {
            console.log('AJAX request completed.');
        }
    });
});

        // API endpoint untuk chatbot
        const apiEndpoint = 'http://localhost:5000/api/chatbot';
        
        // Select elements untuk chatbot
        const messageContainer = document.getElementById('message-container');
        
        // Fungsi untuk membuat text area baru
        function createTextArea(text, isResponse = false) {
            const messageBox = document.createElement('div');
            messageBox.classList.add('message-box');
        
            const newTextArea = document.createElement('textarea');
            newTextArea.classList.add('frm-textarea');
            newTextArea.value = text;
            newTextArea.readOnly = true;  // Disable text area editing after submission
        
            // Jika ini adalah response, posisikan di sebelah kanan
            if (isResponse) {
                newTextArea.classList.add('response-area');
            }
        
            messageBox.appendChild(newTextArea);
            messageContainer.appendChild(messageBox);
        }
        
        // Fungsi untuk memutar audio
        function playAudio(audioUrl) {
            const audioElement = document.createElement('audio');
            audioElement.src = audioUrl;
            audioElement.controls = true;
            audioElement.autoplay = true; // Play audio automatically when added to the DOM
        
            // Tambahkan elemen audio ke dalam container
            const audioContainer = document.createElement('div');
            audioContainer.classList.add('audio-container');
            audioContainer.appendChild(audioElement);
            messageContainer.appendChild(audioContainer);
        }
        
        // Fungsi untuk mengirim pesan ke API chatbot
        function sendToChatbot(event) {
            event.preventDefault(); // Mencegah pengiriman form default
        
            // Ambil textarea dan tombol kirim
            const buttonClicked = event.currentTarget;
            const textarea = buttonClicked.previousElementSibling; // Ambil textarea sebelum tombol
            const userMessage = textarea.value.trim();
        
            // Cek jika textarea kosong
            if (!userMessage) return;
        
            // Tampilkan pesan user
            createTextArea(userMessage);
        
            // Kirim pesan ke API chatbot
            fetch(apiEndpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message: userMessage })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Chatbot response:", data);  // Log response chatbot

                // Tampilkan response chatbot
                createTextArea(data.response, true);
        
                // Putar audio jika ada
                if (data.audio_url) {
                    const audioUrl = `http://localhost:5000/${data.audio_url}`;
                    playAudio(audioUrl);
                }
        
                // Buat textarea kosong untuk pesan selanjutnya
                const newMessageBox = document.createElement('div');
                newMessageBox.classList.add('message-box');
            })
            .catch(error => console.error('Error:', error));
        }
        
        // Event listener untuk tombol "Kirim"
        document.getElementById('send-btn').addEventListener('click', sendToChatbot);
    });
</script>

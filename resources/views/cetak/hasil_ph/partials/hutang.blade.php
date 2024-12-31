<h3 class="underline" id="header3"></h3>
<table id="table-hutang">
</table>
<div class="line"></div>
<p style="text-align: right;" id="jumlah-hutang"></p>
<p></p>
<p style="text-align: right;" id="jumlah-pendapatan"></p>
<p id="sisa-pinjaman"></p>
<div class="line"></div>
<script>
    $(document).ready(function() {
        id = '{{ $id }}';
        $.ajax({
            url: 'http://localhost:8000/api/report-data/' + id,
            method: 'GET',
            success: function(response) {
                console.log('Respons JSON:', response);

                var body4s = response.body4s || [];
                var dataMasuk = response.timbangan || {};
                var konstata = response.konstata || {};
                var halamanRelated = response.halamanRelated || {};
                var totalSisa = response.totalSisa || 0;

                $('#header3').text(halamanRelated.header3 || '');

                var totalHutang = 0;

                function safeMultiply(a, b) {
                    return (parseFloat(a) || 0) * (parseFloat(b) || 0);
                }

                function 
                formatCurrency(num) {
                    return `Rp ${parseFloat(num).toFixed(2)}`;
                }

                var rows = `
                   
                `;

                $('#table-hutang').html(rows);

                totalHutang = [
                    safeMultiply(dataMasuk.neto, konstata.angkutTruk),
                    safeMultiply(dataMasuk.bruto, konstata.biayaEksplo),
                    safeMultiply(dataMasuk.bruto * 0.1, konstata.biayaRDKK),
                    safeMultiply(dataMasuk.neto, konstata.biayaLinting),
                    safeMultiply(dataMasuk.tara * 0.9, konstata.biaaZAK),
                    safeMultiply(dataMasuk.tara * 0.1, konstata.biaaZAK),
                    safeMultiply(dataMasuk.neto, konstata.iuranAPTRI),
                    safeMultiply(dataMasuk.neto, konstata.biayaCrane)
                ].reduce((a, b) => a + b, 0);

                $('#jumlah-hutang').text(`Sisa Hutang Di PG : ${formatCurrency(totalSisa)}`);

                var nilaibruto = parseFloat(konstata.nilaibruto) || 0;
                var nilaiGula = parseFloat(konstata.nilaiGula) || 0;
                var sisaPinjaman = parseFloat(response.sisaPinjaman) || 0; 

                var uangbersih = (dataMasuk.bruto * nilaibruto) + (dataMasuk.tara * 0.9 * nilaiGula);
                var totalPendapatan = (dataMasuk.tara * 0.9 * nilaiGula) - (totalSisa);
                $('#jumlah-pendapatan').text(`Jumlah Pendapatan Petani (A-B) = ${formatCurrency(totalPendapatan)}`);
                 
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });
</script>

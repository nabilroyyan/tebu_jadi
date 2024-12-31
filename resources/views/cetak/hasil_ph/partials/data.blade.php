<div class="header">
    <table>
        <td id="body1s-data">
        </td>
        <td id="body1s-data-right">
        </td>
    </table>
</div>
<div class="content">
    <h3 class="underline" id="header1"></h3>
    <table id="body2s-data">
    </table>
</div>
<script>
    $(document).ready(function() {
        id = '{{ $id }}';
        $.ajax({
            url: 'http://localhost:8000/api/report-data/' + id,
            method: 'GET',
            success: function(response) {
                var body1s = response.body1s;
                var petani = response.kebun;
                var body2s = response.body2s;
                var dataMasuk = response.timbangan;
                var halamanRelated = response.halamanRelated;

                function formatNumber(num) {
                    return parseFloat(num).toFixed(2);
                }

                $('#body1s-data').html(`
                    <div>${body1s.find(item => item.id == 1).menu}: ${petani.nama_petani}</div>
                    <div>${body1s.find(item => item.id == 3).menu}: ${petani.nama_kebun}</div>
                     <div>${body1s.find(item => item.id == 8).menu}: ${petani.luas}</div>
                    <div>${body1s.find(item => item.id == 10).menu}: ${dataMasuk.tgl_timb_masuk}</div>
                `);

                $('#body1s-data-right').html(`
                    <div>${body1s.find(item => item.id == 4).menu}: ${petani.kecamatan}</div>
                    <div>${body1s.find(item => item.id == 5).menu}: ${petani.nomer_kontrak}</div>
                    <div>${body1s.find(item => item.id == 6).menu}: ${petani.kabupaten}</div>
                    <div>${body1s.find(item => item.id == 9).menu}: ${dataMasuk.jenis_tebu}</div>
                   
                `);
                $('#header1').text(halamanRelated.header1);
                $('#body2s-data').html(`
                    <tr>
                        <td>${body2s.find(item => item.id == 1).menu}: ${formatNumber(dataMasuk.neto)} Ku</td>
                       
                    </tr>
                    <tr>
                       
                    </tr>
                    <tr>
                        
                    </tr>
                    <tr>
                      
                    </tr>
                `);
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });
</script>

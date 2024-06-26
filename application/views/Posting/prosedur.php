<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            padding: 50px;
        }
        .header{
            text-align: center;
            padding:30px;
        }
        .step{
            margin-bottom:20px;
        }
    </style>
</head>
<body>
    <table style="width:100%;border-collapse: collapse;margin-top: 20px;">
        <tr>
            <td width="20%" align="right"  style="text-align: left;">
                <img src="<?= base_url() ?>asset/img/logo.png" width="90px" />
            </td>
            <td align="center" style="text-align: left;">
                <font size="3">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RESET, DAN TEKNOLOGI</font> <br />
                <font size="5"><b>POLITEKNIK NEGERI BALI</b></font><br />
                <font size="2">Jalan Kampus Bukit Jimbaran, Kuta Selatan, Kabupaten Badung, Bali - 80364</font> <br />
                <font size="2">Telp.(0361)701981 (Hunting) Fax. 701128</font> <br />
                <font size="1">Laman : www.pnb.ac.id, Email : poltek@pnb.ac.id </font>
            </td>
        </tr>
    </table>

    <hr style="border: 1px solid #ddd;margin-top:20px;">

    <h2 class="header">PROSEDUR</h2>
    <p>Jika menemukan barang :</p>
    <ol class="step">
        <li>Mengisi form pengajuan</li>
        <li>Kemudian pergi ke admin untuk validasi dan</li>
        <li>Harus memberikan barang tersebut ke admin</li>
    </ol>
    <p>Jika kehilangan barang :</p>
    <ol class="step">
        <li>Mengisi form pengajuan</li>
        <li>Kemudian pergi ke admin untuk validasi</li>
        <li>Jika barangnya ditemukan maka akan di chat langsung oleh admin via wa</li>
    </ol>
    <p>Jika ingin mengambil barang temuan :</p>
    <ol class="step">
        <li>Datang ke admin untuk mengajukan pengambilan barang</li>
        <li>Kemudian memvalidasi bahwa anda pemilik barang tersebut</li>
        <li>Lengkapi validasi dengan foto, ktp, dan no telp</li>
    </ol>
    <p>Jika ingin mengambil barang temuan, tetapi status sudah diambil :</p>
    <ol class="step">
        <li>Datang ke admin untuk melaporkan pengambilan barang</li>
        <li>Kemudian admin akan menghubungi/melacak orang yang telah mengambil barang tersebut</li>
        <li>Jika barang sudah dikembalikan, maka anda harus memvalidasi bahwa anda pemilik barang tersebut</li>
        <li>Lengkapi validasi dengan foto, ktp, dan no telp</li>
    </ol>
    <table style="width:100%;" border="1">
        <tr>
            <th colspan="2">KETERANGAN</th>
        </tr>
        <tr>
            <th>Barang Hilang</th>
            <th>Barang Temuan</th>
        </tr>
        <tr>
            <td>Jika postingan barang hilang berwarna hijau, berarti barang sudah ditemukan</td>
            <td>Jika postingan barang temuan berwarna hijau, berarti barang sudah diambil</td>
        </tr>
    </table>
</body>
</html>

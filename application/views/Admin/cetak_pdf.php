<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:nth-child(odd) {
            background-color: #ffffff;
        }

        hr {
            border: 1px solid #ddd;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td width="20%" align="right">
                <img src="<?= base_url() ?>asset/img/logo.png" width="90px" />
            </td>
            <td align="center">
                <font size="3">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RESET, DAN TEKNOLOGI</font> <br />
                <font size="5"><b>POLITEKNIK NEGERI BALI</b></font><br />
                <font size="2">Jalan Kampus Bukit Jimbaran, Kuta Selatan, Kabupaten Badung, Bali - 80364</font> <br />
                <font size="2">Telp.(0361)701981 (Hunting) Fax. 701128</font> <br />
                <font size="1">Laman : www.pnb.ac.id, Email : poltek@pnb.ac.id </font>
            </td>
        </tr>
    </table>

    <hr />

    <h2><b>Data Statistik</b></h2>

    <p><b>Jumlah Postingan:</b> <?= $total_posting; ?></p>

    <p><b>Jumlah Validasi:</b> <?= $total_validasi; ?></p>

    <p><b>Jumlah User:</b> <?= $total_user; ?></p>

    <h3><b>Jumlah Postingan Berdasarkan Kategori:</b></h3>
    <table border="1" width="100%">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Jumlah Postingan</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($kategori_stats as $kategori) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $kategori['kategori']; ?></td>
                <td><?= $kategori['post_count']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Data Postingan</h2>
    <table border="1" width="100%">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($all_postings as $posting) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $posting['judul']; ?></td>
                <td><?= $posting['kategori']; ?></td>
                <td><?= $posting['deskripsi']; ?></td>
                <td><?= $posting['tanggal']; ?></td>
                <td><?= ($posting['status'] == 1) ? 'Ditemukan' : 'Hilang'; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota</title>
    <style>
        body {
            height: 210mm;
            width: 148mm;
        }

        .section {
            border: 1px solid black;
            padding: 5px;
            font-family: Arial, Helvetica, sans-serif;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
            page-break-after: always
        }

        .header h1 {
            text-align: center;
            text-decoration: underline;
        }

        .header h3 {
            text-align: center;
        }

        .header div {
            display: flex;
            border-bottom: 2px solid black;

        }

        .header div #nama {
            font-weight: bold
        }

        .header div #kelas {
            font-weight: bold;
            margin-left: 400px;
        }

        .body div {
            display: flex;
            justify-content: space-between;
            padding-right: 20px;
            padding-bottom: 20px;
            border-bottom: 2px solid black;
        }

        .body ul {
            border-bottom: 2px solid black;
            padding-bottom: 10px
        }

        .body ul li {
            font-size: 6px;
            font-weight: bold;
        }

        .biaya-num li {
            font-size: 6px;
            font-weight: bold;

        }

        .biaya-rp li {
            font-size: 6px;
            font-weight: bold;
            text-align: left;
            list-style-type: none;
        }

        .footer {
            display: flex;
            justify-content: space-between;

        }

        .to p {
            margin-left: 20px;
            font-weight: bold;
            font-size: 8px;
            text-align: center;
        }

        .to #nama-bendahara {
            margin-top: 80px;
        }

        .total p {

            font-weight: bold;
            font-size: 8px
        }

        .total #jumlah {
            border-bottom: 1px solid black;
            padding-bottom: 5px;
        }

        .catatan {
            margin-top: 80px;
            margin-right: 20px;
        }

        .catatan h5 {
            font-size: 8px;
            font-weight: bold;
        }

        .catatan p {
            font-size: 5px;
        }

        /* TABLE */

        table {
            width: 210mm;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table,
        th {
            margin: 0;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th></th>
            <th>
                <h1 style="font-size: 13px; text-align: center;">SMK PERSADA MAKASSAR</h1>
            </th>
            <th></th>
        </tr>
        <tr>
            <td></td>
            <td>
                <h3 style="font-size: 10px; text-align: center;">KWITANSI PEMBAYARAN</h3>
            </td>
            <td></td>
        </tr>

        <tr>
            <td>Nama : {{ $nota->nama_siswa }}</td>
            <td width='350'>Keterangan Pembayaran : </td>
            <td>Jumlah : </td>
        </tr>
        <tr>
            <td>
                <ol style="font-size: 13px;">
                    <li>Biaya Pembangunan : </li>
                    <li>Sumbangan Pembinaan Pendidikan (SPP)</li>
                    <li>laboratorium</li>
                    <li>Biaya Semester</li>
                    <li>Pendidikan Sistem Ganda (PSG)</li>
                    <li>Ujian Sekolah & UKK</li>
                    <li>Tunggakan Dan Alumni</li>
                    <li>Lain Lain</li>
                </ol>
            </td>
            <td></td>
            <td>
                <ol style="list-style-type: none">
                    <li>Rp. {{ $nota->uang_pembangunan }}</li>
                    <li>Rp. {{ $nota->uang_spp }}</li>
                    <li>Rp. {{ $nota->uang_lab }}</li>
                    <li>Rp. {{ $nota->semester_ganjil }}</li>
                    <li>Rp. {{ $nota->uang_psg }}</li>
                    <li>Rp. {{ $nota->uang_uas }}</li>
                    <li>Rp. {{ $nota->tunggakan }}</li>
                    <li>Rp. {{ $nota->tunggakan }}</li>
                </ol>
            </td>
        <tr>
            <td></td>
            <td style="text-align: center;">Total : </td>
            <td>Rp. 1.000.000</td>
        </tr>

        <tr>
            <td style="text-align: center">
                <p style="font-size: 10px;">Yang Menerima</p> <br> <br>
                <p><strong style="font-size: 10px;">Muliyadi, S.T., S.Pd., M.M</strong></p>
                <strong style="font-size: 10px;">Bendahara</strong>
            </td>
            <td></td>
            <td>
                <p><strong style="font-size: 13px;">Catatan : </strong> <br>
                    <span style="font-size: 10px;">
                        - Disimpan sebagai Bukti Pembayaran yang SAH <br>
                        - Uang yang sudah dibayarkan tidak dapat diminta kembali
                    </span>
                </p>
            </td>
        </tr>
    </table>
</body>

</html>

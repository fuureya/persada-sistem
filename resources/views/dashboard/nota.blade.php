<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota</title>
    <style>
        .section {
            width: 50%;
            border: 1px solid black;
            padding: 5px;
            font-family: Arial, Helvetica, sans-serif;
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
            font-size: 11px;
            font-weight: bold;
        }

        .biaya-num li {
            font-size: 11px;
            font-weight: bold;

        }

        .biaya-rp li {
            font-size: 11px;
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
            font-size: 12px;
            text-align: center;
        }

        .to #nama-bendahara {
            margin-top: 80px;
        }

        .total p {

            font-weight: bold;
            font-size: 12px
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
            font-size: 12px;
            font-weight: bold;
        }

        .catatan p {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="section">
        <div class="header">
            <h1>SMK PERSADA MAKASSAR</h1>
            <h3>KWITANSI PEMBAYARAN</h3>

            <div>
                <p id="nama">Nama : Amanesu</p>
                <p id="kelas">Kelas : XII TKJ</p>
            </div>
        </div>

        <div class="body">
            <ul>
                <li>NO : </li>
                <li>Keterangan : </li>
                <li>Jumlah : </li>
            </ul>

            <div>
                <ol class="biaya-num">
                    <li>Biaya Pembangunan</li>
                    <li>Sumbangan Pembinaan Pendidikan (SPP)</li>
                    <li>Laboratorium</li>
                    <li>Biaya Semester</li>
                    <li>Pendidikan Sistem Ganda (PSG)</li>
                    <li>Ujian Sekolah dan UKK</li>
                    <li>Tunggakan Dan Alumni</li>
                    <li>Lain - Lain </li>
                </ol>
                <ol class="biaya-rp">
                    <li>Rp.432434</li>
                    <li>Rp.43</li>
                    <li>Rp.434</li>
                    <li>Rp.434234234234</li>
                    <li>Rp.</li>
                    <li>Rp.</li>
                    <li>Rp.</li>
                    <li>Rp.</li>
                </ol>
            </div>
        </div>

        <div class="footer">
            <div class="to">
                <p>Yang Menerima</p>
                <p id="nama-bendahara">Muliyadi, S,T, S.Pd., M.M</p>
                <p>Bendahara</p>
            </div>
            <div class="total">
                <p id="jumlah">Total : Rp. 132323232</p>
                <div class="catatan">
                    <h5>Catatan : </h5>
                    <p> - Di Simpan Sebagai Bukti Pembayaran Yang SAH</p>
                    <p> - Uang Yang Sudah Di Bayar Tidak Dapat Di Minta Kembali</p>
                </div>
            </div>

        </div>
    </div>
</body>

</html>

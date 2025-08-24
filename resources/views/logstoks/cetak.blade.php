<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Mutasi Stok</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
            margin: 20px;
        }

        h1, h2, h4 {
            text-align: center;
            margin: 0;
            font-weight: bold;
        }

        .garis-pemisah {
            border-bottom: 2px solid #000;
            margin: 6px 0 12px;
        }

        .identitas-laporan {
            text-align: center;
            font-size: 11pt;
            margin-bottom: 10px;
        }

        .periode {
            margin: 15px 0 8px;
            font-size: 11pt;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .text-left {
            text-align: left;
        }

        .total-row td {
            font-weight: bold;
            background-color: #f9f9f9;
            border-top: 2px solid #000;
        }

        .no-data {
            margin-top: 20px;
            text-align: center;
            font-style: italic;
            color: #555;
        }

        .footer {
            margin-top: 40px;
            font-size: 11pt;
            display: flex;
            justify-content: space-between;
        }

        .footer-kiri {
            max-width: 50%;
        }

        .ttd {
            text-align: center;
        }

        .ttd div {
            margin-bottom: 60px;
        }
    </style>
</head>
<body>

    <header>
        <h2>PT. A.W. KARYA BANGUNAN</h2>
        <h4>LAPORAN MUTASI STOK</h4>
        <div class="footer-kiri">
            <strong>Alamat:</strong> Jl. Mesjid, Sungai Pua, Kec. Sungai Pua, Kabupaten Agam, Sumatera Barat 26181<br>
            <strong>Telepon:</strong> (0752)691374
        </div>
        <div class="garis-pemisah"></div>
        <div class="identitas-laporan">
            <strong>Tanggal Cetak:</strong> {{ $tanggalCetak }}
        </div>
    </header>

    <section>
        <div class="periode">
            Periode: {{ $periodeLabel }}
        </div>

        @if(count($dataMutasi) > 0)
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 35%;">Nama Produk</th>
                        <th style="width: 10%;">Stok Awal</th>
                        <th style="width: 10%;">Stok Masuk</th>
                        <th style="width: 10%;">Stok Keluar</th>
                        <th style="width: 10%;">Stok Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMutasi as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td class="text-left">{{ $item->nama_produk }}</td>
                            <td>{{ $item->stok_awal }}</td>
                            <td>{{ $item->masuk }}</td>
                            <td>{{ $item->keluar }}</td>
                            <td>{{ $item->stok_akhir }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data">
                Tidak terdapat data mutasi stok untuk periode yang dipilih.
            </div>
        @endif
    </section>

    <footer class="footer">

        <div class="ttd">
            <h4>Sungai Pua, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</h4>
            <br>Mengetahui,
            <div><strong>Pemilik Toko</strong></div>
            <div style="margin-top: 25px;">____________________</div>
        </div>

    </footer>

</body>
</html>

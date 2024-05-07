<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }} a/n {{ $pengajuan->nasabah->name }}</title>
    <style>
        #table2 {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        tr{
            font-family: arial, sans-serif;
        }
        .rowTable2 {
            border: 1px solid #000000;
            text-align: center;
        }
        h4 {
            font-family: arial, sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; font-family: arial, sans-serif;">{{ $title }}</h1>
    <br>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $pengajuan->nasabah->name }}</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $nasabah->ktp }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $nasabah->jenis_kelamin }}</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>NPWP</td>
            <td>:</td>
            <td>{{ $nasabah->npwp }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>{{ $nasabah->status }}</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>Rekening</td>
            <td>:</td>
            <td>{{ $nasabah->bank }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $nasabah->alamat }}</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>Nomor Kartu Kredit</td>
            <td>:</td>
            <td>{{ $nasabah->no_cc }}</td>
        </tr>
        <tr>
            <td>Nomor HP</td>
            <td>:</td>
            <td>{{ $nasabah->no_hp }}</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>Limit Kartu Kredit</td>
            <td>:</td>
            <td>Rp {{ number_format($nasabah->limit_cc, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td>Pekerjaan sekarang</td>
            <td>:</td>
            <td>{{ $pengajuan->jenis_pekerjaan }}</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>Penghasilan</td>
            <td>:</td>
            <td>Rp {{ number_format($pengajuan->penghasilan, 0, '.', ',') }}</td>
        </tr>
    </table>
    <br>
    <table id="table2" style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background-color: #cccccc;">
                <th class="rowTable2">Bank</th>
                <th class="rowTable2">Pinjaman</th>
                <th class="rowTable2">Tenor</th>
                <th class="rowTable2">Bunga</th>
                <th class="rowTable2">Angsuran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="rowTable2">{{ $kriteria->bank }}</td>
                <td class="rowTable2">Rp {{ number_format($pengajuan->besar_pinjaman, 0, '.', ',') }}</td>
                <td class="rowTable2">{{ $pengajuan->tenor }} Bulan</td>
                <td class="rowTable2">{{ number_format($kriteria->bunga, 2, '.', ',') }} %</td>
                <td class="rowTable2">Rp {{ number_format($angsuran, 0, '.', ',') }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    *Pengajuan dilakukan di tanggal {{ $pengajuan->tanggal_pengajuan }}
</body>
</html>
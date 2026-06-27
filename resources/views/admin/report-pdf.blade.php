<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Artikel Dapur MBG</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .header h2 { margin: 0; padding: 0; text-transform: uppercase; }
        .header p { margin: 5px 0 0 0; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .text-center { text-align: center; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: right; font-size: 10px; color: #999; }
    </style>
</head>
<body>

    <div class="header">
        <h2>Dapur MBG Cibeuteung Muara</h2>
        <p>Laporan Data Publikasi Artikel / Berita Sistem Informasi</p>
        <p style="font-size: 10px;">Dicetak pada tanggal: {{ date('d F Y, H:i') }} WIB</p>
    </div>

    <h3 style="margin-bottom: 10px;">Daftar Artikel Diterbitkan</h3>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;" class="text-center">No</th>
                <th style="width: 35%;">Judul Artikel</th>
                <th style="width: 40%;">Potongan Isi Konten</th>
                <th style="width: 20%;">Tanggal Rilis</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td style="font-weight: bold;">{{ $item->title }}</td>
                    <td>{{ Str::limit($item->content, 90) }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data artikel di dalam database.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Halaman Laporan Otomatis - Sistem Informasi UNPAM
    </div>

</body>
</html>

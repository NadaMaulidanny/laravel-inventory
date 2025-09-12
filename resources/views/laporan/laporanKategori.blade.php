<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kategori</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Kategori</h2>
    <p>Periode: {{ $request->start_date }} s/d {{ $request->end_date }}</p>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $kategori)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $kategori->kategori }}</td>
                    <td>{{ $kategori->deskripsi }}</td>
                    <td>{{ $kategori->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ID Card - {{ $member->nama }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .id-card {
            width: 360px;
            border: 2px solid #0d6efd;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
        }
        .id-header {
            background: #0d6efd;
            color: white;
            padding: 12px;
            text-align: center;
        }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-light d-flex flex-column align-items-center justify-content-center vh-100">
    <div class="id-card shadow">
        <div class="id-header">
            <h5 class="mb-0">KARTU ANGGOTA PERPUSTAKAAN</h5>
            <small>Perpustakaan Digital</small>
        </div>
        <div class="p-3">
            <p class="mb-1"><strong>No. Kartu:</strong> {{ $member->nomor_kartu }}</p>
            <p class="mb-1"><strong>Nama:</strong> {{ $member->nama }}</p>
            <p class="mb-1"><strong>Status:</strong> {{ $member->tipe_keanggotaan }}</p>
            <p class="mb-1"><strong>Email:</strong> {{ $member->email }}</p>
            <p class="mb-0"><strong>No. HP:</strong> {{ $member->no_hp }}</p>
        </div>
        <div class="bg-light text-center py-2 border-top">
            <small class="text-muted">Berlaku Selama Menjadi Anggota</small>
        </div>
    </div>

    <div class="mt-3 no-print">
        <button onclick="window.print()" class="btn btn-success">Print / Simpan PDF</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
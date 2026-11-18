<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul Anggota & Kartu Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container bg-white p-4 rounded shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Modul Anggota & Kartu Perpustakaan</h3>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-info text-dark">
                {{ Auth::user()->name }} ({{ strtoupper(Auth::user()->role) }})
            </span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Auth::user()->role === 'admin')
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Tambah Anggota Baru</div>
        <div class="card-body">
            <form action="{{ route('members.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Nomor Kartu</label>
                        <input type="text" name="nomor_kartu" class="form-control" placeholder="Contoh: LIB-2026001" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tipe Keanggotaan</label>
                        <select name="tipe_keanggotaan" class="form-select" required>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3">Simpan Anggota</button>
            </form>
        </div>
    </div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>No. Kartu</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Email / No. HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
            <tr>
                <td><strong>{{ $member->nomor_kartu }}</strong></td>
                <td>{{ $member->nama }}</td>
                <td><span class="badge bg-secondary">{{ $member->tipe_keanggotaan }}</span></td>
                <td>{{ $member->email }}<br><small class="text-muted">{{ $member->no_hp }}</small></td>
                <td>{{ $member->alamat }}</td>
                <td>
                    <a href="{{ route('members.card', $member->id) }}" target="_blank" class="btn btn-info btn-sm text-white">Cetak ID Card</a>
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted">Belum ada data anggota.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
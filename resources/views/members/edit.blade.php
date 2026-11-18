<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
    <h4 class="mb-3">Edit Data Anggota</h4>
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nomor Kartu</label>
            <input type="text" name="nomor_kartu" value="{{ $member->nomor_kartu }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ $member->nama }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipe Keanggotaan</label>
            <select name="tipe_keanggotaan" class="form-select" required>
                <option value="Mahasiswa" {{ $member->tipe_keanggotaan == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                <option value="Dosen" {{ $member->tipe_keanggotaan == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                <option value="Umum" {{ $member->tipe_keanggotaan == 'Umum' ? 'selected' : '' }}>Umum</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ $member->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">No. HP</label>
            <input type="text" name="no_hp" value="{{ $member->no_hp }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" value="{{ $member->alamat }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
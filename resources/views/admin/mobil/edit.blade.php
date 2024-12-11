<div class="container mt-5">
    <h2 class="mb-4">Edit Data Mobil</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <form action="/admin/mobil/{{ $car->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="jenis_mobil">Jenis Mobil</label>
            <input type="text" name="jenis_mobil" id="jenis_mobil" class="form-control" value="{{ $car->jenis_mobil }}" required>
        </div>

        <div class="form-group">
            <label for="merek_mobil">Model Mobil</label>
            <input type="text" name="merek_mobil" id="merek_mobil" class="form-control" value="{{ $car->merek_mobil }}" required>
        </div>

        <div class="form-group">
            <label for="warna_mobil">Warna Mobil</label>
            <input type="text" name="warna_mobil" id="warna_mobil" class="form-control" value="{{ $car->warna_mobil }}" required>
        </div>

        <div class="form-group">
            <label for="plat_nomor">Plat Nomor</label>
            <input type="text" name="plat_nomor" id="plat_nomor" class="form-control" value="{{ $car->plat_nomor }}" required>
        </div>

        <div class="form-group">
            <label for="harga_sewa_per_hari">Harga Sewa Per Hari</label>
            <input type="text" name="harga_sewa_per_hari" id="harga_sewa_per_hari" class="form-control" value="{{ $car->harga_sewa_per_hari }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="/admin/mobil/index" class="btn btn-secondary">Batal</a>
    </form>
</div>

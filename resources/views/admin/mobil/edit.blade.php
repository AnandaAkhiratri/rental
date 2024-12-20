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

    
    <form action="{{ route('car.update',$car->id) }}}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <img src="{{ asset('storage/'.$car->image) }}" alt="foto" class="img-thumbnail" style="width: 8rem;height: 8rem;">
        <div class="mb-3">
            <label class="form-label">Foto Mobil</label>
            <input type="file" class="form-control" id="jenisMobil" name="image">
            @error('image')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>
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
        <a href="{{ route('car.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

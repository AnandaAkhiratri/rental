
<div class="container mt-5">
    <h2 class="mb-4">Tambah Mobil</h2>
    <form action="{{ route('car.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Foto Mobil</label>
            <input type="file" class="form-control" id="jenisMobil" name="image">
            @error('foto_mobil')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Mobil</label>
            <input type="text" class="form-control" id="jenisMobil" name="jenis_mobil" placeholder="Masukkan jenis mobil">
            @error('jenis_mobil')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="merekMobil" class="form-label">Model Mobil</label>
            <input type="text" class="form-control" id="merekMobil" name="merek_mobil" placeholder="Masukkan merek mobil">
            @error('merek_mobil')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="warnaMobil" class="form-label">Warna Mobil</label>
            <input type="text" class="form-control" id="warnaMobil" name="warna_mobil" placeholder="Masukkan warna mobil">
            @error('warna_mobil')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="platNomor" class="form-label">Plat Nomor</label>
            <input type="text" class="form-control" id="platNomor" name="plat_nomor" placeholder="Masukkan plat nomor">
            @error('plat_nomor')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="hargaSewa" class="form-label">Harga Sewa Per Hari</label>
            <input type="number" class="form-control" id="hargaSewa" name="harga_sewa_per_hari" placeholder="Masukkan harga sewa per hari">
            @error('harga_sewa_per_hari')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan Mobil</button>
    </form>
</div>

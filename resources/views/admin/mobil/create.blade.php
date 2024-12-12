
<div class="container mt-5">
    <h2 class="mb-4">Tambah Mobil</h2>
    <form action="{{route('mobil.store')}}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="jenisMobil" class="form-label">Jenis Mobil</label>
            <input type="text" class="form-control" id="jenisMobil" name="jenis_mobil" placeholder="Masukkan jenis mobil" required>
        </div>
        
        <div class="mb-3">
            <label for="merekMobil" class="form-label">Model Mobil</label>
            <input type="text" class="form-control" id="merekMobil" name="merek_mobil" placeholder="Masukkan merek mobil" required>
        </div>
        
        <div class="mb-3">
            <label for="warnaMobil" class="form-label">Warna Mobil</label>
            <input type="text" class="form-control" id="warnaMobil" name="warna_mobil" placeholder="Masukkan warna mobil" required>
        </div>
        
        <div class="mb-3">
            <label for="platNomor" class="form-label">Plat Nomor</label>
            <input type="text" class="form-control" id="platNomor" name="plat_nomor" placeholder="Masukkan plat nomor" required>
        </div>
        
        <div class="mb-3">
            <label for="hargaSewa" class="form-label">Harga Sewa Per Hari</label>
            <input type="number" class="form-control" id="hargaSewa" name="harga_sewa_per_hari" placeholder="Masukkan harga sewa per hari" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan Mobil</button>
    </form>
</div>

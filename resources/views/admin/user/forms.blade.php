
<div class="container mt-5">
    <h2 class="mb-4">Pengembalian Mobil</h2>
    <form action="{{ route('return.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Data Peminjaman</label>
            <select name="loan_id" class="form-control">
                <option value="">--Pilih Data--</option>
                @foreach ($loan as $item)
                    <option value="{{ $item->id }}">{{ $item->user->name }} - {{ $item->car->jenis_mobil }} ({{ $item->car->plat_nomor }})</option>
                @endforeach
            </select>
            @error('loan_id')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>        
        <div class="mb-3">
            <label class="form-label">Tanggal Pengembalian</label>
            <input type="date" class="form-control" name="returned_at" value="{{ old('returned_at') }}">
            @error('returned_at')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('return.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
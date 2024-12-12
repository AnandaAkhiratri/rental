
<div class="container mt-5">
    <h2 class="mb-4">Sewa Mobil</h2>
    <form action="{{ ($type == "create") ? route('rent.store') : route('rent.update',$loan->id) }}" method="POST">
        @csrf
        @if ($type == "edit")
            @method("PUT")
            <div class="mb-3">
                <label class="form-label">Mobil Yang Disewa Saat Ini</label>
                <input type="text" readonly value="{{ $loan->car->merek_mobil }} - {{ $loan->car->plat_nomor }}" class="form-control">
            </div>
        @endif
        <div class="d-flex justify-content-center">
            <img src="{{ ($type == "edit") ? asset('storage/'.$loan->car->image) : asset('default.png') }}" class="img-thumbnail" id="image-car" style="width: 8rem;height: 8rem;object-fit: cover;" alt="img-car">
        </div>
        <p class="mb-2 text-danger text-center">Foto Mobil</p>
        <div class="mb-3">
            <label class="form-label">Mobil {{ $type == "edit" ? "(Opsional)" : "" }}</label>
            <select name="car_id" id="car_id" onchange="return setImage()" class="form-control">
                <option value="">--Pilih Mobil--</option>
                @foreach ($cars as $item)
                    <option value="{{ $item->id }}" {{ (isset($loan) && $loan->car_id == $item->id) ? "selected" : "" }}>{{ $item->jenis_mobil }} - {{ $item->plat_nomor }}</option>
                @endforeach
            </select>
            @error('car_id')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>        
        <div class="mb-3">
            <label class="form-label">Tanggal Sewa</label>
            <input type="date" class="form-control" name="loan_at" value="{{ old('loan_at', $loan->loan_at ?? '') }}">
            @error('loan_at')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>        
        <div class="mb-3">
            <label class="form-label">Lama Sewa</label>
            <input type="text" class="form-control" name="days" value="{{ old('days', $loan->days ?? '') }}">
            @error('days')
                <span class="text-danger"><small>{{ $message }}</small></span>
            @enderror
        </div>        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('rent.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@section('js')
    <script>
        function setImage(){
            let id = $("#car_id").find(":selected").val() 
            if (id != "") {
                $.ajax({
                    url:"{{ route('rent.get-car') }}/"+id,
                    method:"GET",
                    success:(res) => {
                        if (res.success) {
                            $("#image-car").attr("src",res.img)
                        }
                    }
                })
            } else {
                $("#image-car").attr("src","{{ asset('default.png') }}")                
            }
        }
    </script>
@endsection
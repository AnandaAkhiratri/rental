<div class="container mt-5">
    <h2 class="mb-4">Daftar Mobil</h2>

    
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (auth()->user()->role == "ADM")
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('car.create') }}" class="btn btn-primary">Tambah Mobil</a>
    </div>        
    @endif
    <div class="table-responsive">
        <table class="table w-100 table-striped table-bordered text-center" id="table">
            <thead class="thead-dark">
                <tr>
                    <th class="align-middle">No</th>
                    <th class="align-middle">Foto Mobil</th>
                    <th class="align-middle">Jenis Mobil</th>
                    <th class="align-middle">Model Mobil Mobil</th>
                    <th class="align-middle">Warna Mobil</th>
                    <th class="align-middle">Plat Nomor</th>
                    <th class="align-middle">Harga Sewa Per Hari</th>
                    <th class="align-middle">Status</th>
                    <th class="align-middle">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $key => $car)
                <tr>
                    <td class="align-middle">{{ $key + 1 }}</td>
                    <td class="align-middle"><img src="{{ asset('storage/'.$car->image) }}" alt="fto" class="img-thumbnail" style="width: 8rem;height: 8rem;"></td>
                    <td class="align-middle">{{ $car->jenis_mobil }}</td>
                    <td class="align-middle">{{ $car->merek_mobil }}</td>
                    <td class="align-middle">{{ $car->warna_mobil }}</td>
                    <td class="align-middle">{{ $car->plat_nomor }}</td>
                    <td class="align-middle">{{ $car->harga_sewa_per_hari }}</td>
                    <td class="align-middle">{!! ($car->status == "Available") ? '<span class="text-white badge bg-success">Available</span>' : '<span class="text-white badge bg-danger">Not Available</span>' !!}</td>
                    <td class="align-middle">
                        @if (auth()->user()->role == "ADM")
                            <a href="{{ route('car.edit',$car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('car.destroy',$car->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>                            
                        @else
                            <a href="{{ route('rent.create') }}" class="btn btn-success btn-sm">Rent Here</a>                            
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
</div>
@section('js')
    <script>
        $(document).ready(function(){
            datatable()
        })
    </script>
@endsection
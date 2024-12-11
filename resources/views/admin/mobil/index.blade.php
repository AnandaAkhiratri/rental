<div class="container mt-5">
    <h2 class="mb-4">Daftar Mobil</h2>

    
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Jenis Mobil</th>
                <th>Model Mobil Mobil</th>
                <th>Warna Mobil</th>
                <th>Plat Nomor</th>
                <th>Harga Sewa Per Hari</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $key => $car)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $car->jenis_mobil }}</td>
                <td>{{ $car->merek_mobil }}</td>
                <td>{{ $car->warna_mobil }}</td>
                <td>{{ $car->plat_nomor }}</td>
                <td>{{ $car->harga_sewa_per_hari }}</td>
                <td>
                    <a href="/admin/mobil/{{$car->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/admin/mobil/{{$car->id}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    <a href="/admin/mobil/create" class="btn btn-primary">Tambah Mobil</a>
</div>

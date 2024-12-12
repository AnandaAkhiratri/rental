<div class="container mt-5">
    <h2 class="mb-4">Data Pengguna</h2>

    
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table w-100 table-striped table-bordered text-center" id="table">
            <thead class="thead-dark">
                <tr>
                    <th class="align-middle">No</th>
                    <th class="align-middle">Nama</th>
                    <th class="align-middle">Alamat</th>
                    <th class="align-middle">No HP</th>
                    <th class="align-middle">No SIM</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dt as $item)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle">{{ $item->address }}</td>
                    <td class="align-middle">{{ $item->phone }}</td>
                    <td class="align-middle">{{ $item->sim }}</td>
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
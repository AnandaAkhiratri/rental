<div class="container mt-5">
    <h2 class="mb-4">Pengembalian Mobil</h2>

    
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('return.create') }}" class="btn btn-primary">Input Pengembalian Mobil</a>
    </div>
    <div class="table-responsive">
        <table class="table w-100 table-striped table-bordered text-center" id="table">
            <thead class="thead-dark">
                <tr>
                    <th class="align-middle">No</th>
                    <th class="align-middle">Mobil</th>
                    <th class="align-middle">Penyewa</th>
                    <th class="align-middle">Harga per Hari</th>
                    <th class="align-middle">Tanggal Sewa</th>
                    <th class="align-middle">Tanggal Kembali</th>
                    <th class="align-middle">Lama Sewa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dt as $item)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->loan->car->merek_mobil }} ({{ $item->loan->car->plat_nomor }})</td>
                    <td class="align-middle">{{ $item->loan->user->name }}</td>
                    <td class="align-middle">{{ $item->loan->car->harga_sewa_per_hari }}</td>
                    <td class="align-middle">{{ date('d-m-Y',strtotime($item->loan->loan_at)) }}</td>
                    <td class="align-middle">{{ $item->loan->days }} hari</td>
                    <td class="align-middle">{{ $item->loan->car->harga_sewa_per_hari*$item->loan->days }}</td>
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
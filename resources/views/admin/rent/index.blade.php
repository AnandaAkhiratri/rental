<div class="container mt-5">
    <h2 class="mb-4">Peminjaman Mobil</h2>

    
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('rent.create') }}" class="btn btn-primary">Sewa Mobil</a>
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
                    <th class="align-middle">Lama Sewa</th>
                    <th class="align-middle">Total</th>
                    <th class="align-middle">Status</th>
                    <th class="align-middle">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dt as $item)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">
                        <img src="{{ asset('storage/'.$item->car->image) }}" alt="car" class="img-thumbnail" style="width: 5rem;height: 5rem;">
                        <p class="mb-0">{{ $item->car->merek_mobil }} ({{ $item->car->plat_nomor }})</p>
                    </td>
                    <td class="align-middle">{{ $item->user->name }}</td>
                    <td class="align-middle">{{ $item->car->harga_sewa_per_hari }}</td>
                    <td class="align-middle">{{ date('d-m-Y',strtotime($item->loan_at)) }}</td>
                    <td class="align-middle">{{ $item->days }} hari</td>
                    <td class="align-middle">{{ $item->car->harga_sewa_per_hari*$item->days }}</td>
                    <td class="align-middle"><span class="badge bg-dark text-white">{{ $item->status }}</span></td>
                    <td class="align-middle">
                        <div class="d-flex justify-content-center align-items-center">
                            @if ($item->status == "Waiting")
                                <form action="{{ route('rent.update-status',$item->id) }}" class="mr-1" method="post">
                                    @csrf
                                    <input type="hidden" name="status" value="On Going">
                                    <button onclick="return confirm('Anda yakin?')" class="btn btn-sm btn-success">On Going</button>                                
                                </form>
                                <form action="{{ route('rent.update-status',$item->id) }}" class="mr-1" method="post">
                                    @csrf
                                    <input type="hidden" name="status" value="Cancelled">
                                    <button onclick="return confirm('Anda yakin?')" class="btn btn-sm btn-danger">Cancel</button>                                
                                </form>
                            @elseif ($item->status == "On Going")
                                <form action="{{ route('rent.update-status',$item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="status" value="On Going">
                                    <button onclick="return confirm('Anda yakin?')" class="btn btn-sm btn-warning" disabled>On Going</button>                                
                                </form>
                            @elseif ($item->status == "Cancelled")
                                <form action="{{ route('rent.update-status',$item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="status" value="Cancelled">
                                    <button onclick="return confirm('Anda yakin?')" class="btn btn-sm btn-danger" disabled>Cancelled</button>                                
                                </form>
                            @elseif ($item->status == "Finished")
                                <form action="{{ route('rent.update-status',$item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="status" value="Finished">
                                    <button onclick="return confirm('Anda yakin?')" class="btn btn-sm btn-success" disabled>Finished</button>                                
                                </form>
                            @endif
                            @if ($item->status == "Waiting")
                            <a href="{{ route('rent.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('rent.destroy',$item->id) }}" method="POST" class="ml-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>                            
                            @endif
                        </div>
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
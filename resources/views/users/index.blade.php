@extends('admin.index')
@section('content')
<section class="section schedule text-black">
    <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3 class="m-0 font-weight-bold text-primary">Data User</h3><br>
                    {{-- 
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                        @endif
                        <a href="{{ route('users.create') }}">
                        <button type="button" class="btn btn-primary bi-plus btn-sm" title="Tambah"></button></a>&nbsp; <br><br> 
                    --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                    <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($user as $row)
                        <tr align="center">
                            <th scope="row">{{$no++}}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->role }}</td>
                            @php $aktif = ($row->isactive == 1) ? 'Aktif' : 'Tidak Aktif'; @endphp
                            <td>{{ $aktif}}</td>
                            <td>
                            <form method="POST" id="formDelete">
                            @csrf
                            @method('DELETE')
                                <a class="btn btn-warning btn-sm" title="Edit"
                                    href=" {{ route('users.edit',$row->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                &nbsp;
                                <button type="submit" 
                                data-action="{{ route('users.destroy',$row->id) }}"
                                class="btn btn-danger btn-sm btnDelete" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>  
<script>
$('#dataTable').DataTable();
</script>
<script type="text/javascript">

    $('body').on('click', '.btnDelete', function(e) {
    e.preventDefault();
    var action = $(this).data('action');
    Swal.fire({
        title: 'Yakin ingin menghapus data ini?',
        text: "Data yang sudah dihapus tidak bisa dikembalikan lagi",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Yakin'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#formDelete').attr('action', action);
            $('#formDelete').submit();
        }
    })
})
</script>
@endsection
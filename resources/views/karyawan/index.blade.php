@extends('admin.index')
@section('content')

<section class="section schedule text-black">
    <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3 class="m-0 font-weight-bold text-primary">Data Karyawan</h3><br>
                        @if(auth()->user()->role==='admin')
                        <a href="{{ route('karyawan.create') }}">
                        <button type="button" class="btn btn-primary bi-plus btn-sm" title="Tambah Karyawan"></button></a>&nbsp;
                        @endif
                        <a href="{{ url('karyawan-pdf')}}">
                        <button type="button" class="btn btn-danger bi-file-earmark-pdf btn-sm" title="Export PDF"></button></a>&nbsp;
                        <a href="{{ url('karyawan-excel')}}">
                        <button type="button" class="btn btn-success bi-file-earmark-excel btn-sm" title="Export Excel"></button></a>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                    <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr  align="center">
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($karyawan as $row)
                        <tr align="center">
                            <th scope="row">{{$no++}}</th>
                            <td>{{ $row->kode_karyawan }}</td>
                            <td>{{ $row->nama_karyawan }}</td>
                            <td>{{ $row->no_tlp }}</td>
                            <td width="10%">
                                @empty($row->foto)
                                <img src="{{ url('img/foto/nophoto.png') }}" width="35%" alt="Profile" class="rounded-circle">
                                @else
                                <img src="{{ url('img')}}/{{$row->foto}}" width="35%" alt="Profile" class="rounded-circle">
                                @endempty
                            </td>
                            <td>
                            <form method="POST" id="formDelete">
                            @csrf
                            @method('DELETE')
                                <button type="button" class="btn btn-info btn-sm detail-modal-triggers"
                                    data-id="{{ $row->idkaryawan }}"><i class="bi bi-eye"></i>
                                </button>
                                &nbsp;
                                @if(auth()->user()->role==='admin')
                                <a class="btn btn-warning btn-sm" title="Edit"
                                    href=" {{ route('karyawan.edit',$row->idkaryawan) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                @endif
                                &nbsp;
                                @if(auth()->user()->role==='admin')
                                <button type="submit" 
                                data-action="{{ route('karyawan.destroy',$row->idkaryawan) }}"
                                class="btn btn-danger btn-sm btnDelete" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                                @endif
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

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Kode Karyawan</th>
                            <td id="kode"></td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Karyawan</th>
                            <td id="nama"></td>
                        </tr>
                        <tr>
                            <th scope="row">No. Telepon</th>
                            <td id="no_tlp"></td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Kelamin</th>
                            <td id="gender"></td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td id="alamat"></td>
                        </tr>
                        <tr>
                            <th scope="row">Foto</th>
                            <td id="foto">
                                <img src="" alt="" width="100" class="img-thumbnail">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>  
<script>
  $('#dataTable').DataTable();
</script>
<script type="text/javascript">
    $('.detail-modal-triggers').click(function(e){
        var id = $(this).data('id');

        // AJAX request
        $.ajax({
            url: "{{ url('/ajax/karyawan/')}}"+"/"+id,
            success: function(response){ 
                $('.modal-body #kode').html(response.kode_karyawan);
                $('.modal-body #nama').html(response.nama_karyawan);
                $('.modal-body #alamat').html(response.alamat);
                $('.modal-body #no_tlp').html(response.no_tlp);
                $('.modal-body #foto img').attr('src', response.foto);
                $('.modal-body #gender').html(response.gender == 'L' ? 'Laki-Laki' : 'Perempuan');
                $('.modal-body #created_at').html(response.created_at);
                $('.modal-body #updated_at').html(response.updated_at);

                // Display Modal
                $('#detailModal').modal('show'); 
            }
        });
    });

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
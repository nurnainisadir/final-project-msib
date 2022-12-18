@extends('admin.index')
@section('content')

<section class="section schedule text-black">
<div class="card-body">
    <div class="container">
        <div class="row"> 
            <div class="col-12">
                <div class="section-title">
                    <h3 class="m-0 font-weight-bold text-primary">Data Transaksi</h3><br>
                    <a href="{{ route('transaksi.create') }}">
                    <button type="button" class="btn btn-primary bi-plus btn-sm" title="Tambah Transaksi"></button></a>&nbsp;
                    <a href="{{ url('transaksi-pdf')}}">
                    <button type="button" class="btn btn-danger bi-file-earmark-pdf btn-sm" title="Export PDF"></button></a>&nbsp;
                    <a href="{{ url('transaksi-excel')}}">
                    <button type="button" class="btn btn-success bi-file-earmark-excel btn-sm" title="Export Excel"></button></a>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Jenis Laundry</th>
                            <th scope="col">Berat</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Status</th>
                            {{--<th scope="col">Kasir</th>--}}
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($transaksi as $row)
                        @php
                            $color = "";
                            if($row->status == 'Selesai'){
                                $color = 'badge-success';
                            }
                            else{
                                $color = 'badge-info';
                            }
                        @endphp
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{ $row->customer->nama_customer }}</td>
                            <td>{{ $row->jenis->jenis_laundry }}</td>
                            <td>{{ $row->berat }}&nbsp;Kg</td>
                            <td>{{ $row->tgl_awal }}</td>
                            <td>Rp. {{number_format($row['total_bayar'], 2,',','.')}}</td>
                            <td><span class="badge {{ $color }}"> {{ $row->status }}</span></td>
                            {{-- <td>{{ $row->users?->name }}</td> --}}
                            <td>

                            <form method="POST" id="formDelete">
                            @csrf
                            @method('DELETE')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info btn-sm detail-modal-triggers"
                                    data-id="{{ $row->idtransaksi }}"><i class="bi bi-eye"></i>
                                </button>
                                {{-- <a class="btn btn-info btn-sm" title="Detail"
                                    href=" {{ route('transaksi.show',$row->idtransaksi) }}">
                                    <i class="bi bi-printer"></i>
                                </a> --}}
                                &nbsp;
                                <a class="btn btn-warning btn-sm" title="Edit"
                                    href=" {{ route('transaksi.edit',$row->idtransaksi) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-light btn-sm" title="Cetak"
                                    href=" {{ url('unduh-pdf',$row->idtransaksi) }}">
                                    <i class="bi bi-printer"></i>
                                </a>
                                {{--  
                                @if(auth()->user()->role==='admin')
                                <button type="submit" 
                                data-action="{{ route('transaksi.destroy',$row->idtransaksi) }}"
                                class="btn btn-danger btn-sm btnDelete" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                                @endif --}}
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
                <h5 class="modal-title" id="detailModalLabel">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Nama Customer</th>
                            <td id="nama_customer"></td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Laundry</th>
                            <td id="jenis_laundry"></td>
                        </tr>
                        <tr>
                            <th scope="row">Berat (KG)</th>
                            <td id="berat"></td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Masuk</th>
                            <td id="tgl_awal"></td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Keluar</th>
                            <td id="tgl_ambil"></td>
                        </tr>
                        <tr>
                            <th scope="row">Total Bayar</th>
                            <td id="total_bayar"></td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td id="status"></td>
                        </tr>
                        <tr>
                            <th scope="row">Kasir</th>
                            <td id="name"></td>
                        </tr>
                    </tbody>
                </table>
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
            url: "{{ url('/ajax/transaksi/')}}"+"/"+id,
            success: function(response){ 
                $('.modal-body #nama_customer').html(response.customer.nama_customer);
                $('.modal-body #jenis_laundry').html(response.jenis.jenis_laundry);
                $('.modal-body #name').html(response.users.name);
                $('.modal-body #berat').html(response.berat + ' KG');
                $('.modal-body #tgl_awal').html(response.tgl_awal);
                $('.modal-body #tgl_ambil').html(response.tgl_ambil);
                $('.modal-body #total_bayar').html('Rp. ' + response.total_bayar);
                $('.modal-body #status').html(response.status);
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


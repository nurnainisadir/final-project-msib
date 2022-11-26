@extends('admin.index')
@section('content')
<section class="section schedule text-black">
    <div class="container">
        <div class="row">
            
            <div class="col-12">
                <div class="section-title">
                    <br>
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
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Jenis Laundry</th>
                            <th scope="col">Berat</th>
                            <th scope="col">Tanggal Awal</th>
                            <th scope="col">Tanggal Ambil</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                         @php $no = 1; @endphp
                        @foreach($transaksi as $row)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{ $row->customer->nama_customer }}</td>
                            <td>{{ $row->jenis->jenis_laundry }}</td>
                            <td>{{ $row->berat }}&nbsp;Kg</td>
                            <td>{{ $row->tgl_awal }}</td>
                            <td>{{ $row->tgl_ambil }}</td>
                            <td>Rp. {{number_format($row['total_bayar'], 2,',','.')}}</td>
                            <td>{{ $row->karyawan->nama_karyawan }}</td>
                            <td>

                            <form method="POST" id="formDelete">
                            @csrf
                            @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail"
                                    href=" {{ route('transaksi.show',$row->idtransaksi) }}">
                                    <i class="bi bi-printer"></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-warning btn-sm" title="Edit"
                                    href=" {{ route('transaksi.edit',$row->idtransaksi) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                &nbsp;
                                <button type="submit" 
                                data-action="{{ route('transaksi.destroy',$row->idtransaksi) }}"
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

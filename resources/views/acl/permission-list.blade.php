@extends('admin.index')
@section('content')
<section class="section schedule text-black">
    <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3 class="m-0 font-weight-bold text-primary">Data Permission</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($permission as $row)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

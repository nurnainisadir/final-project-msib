@extends('admin.index')
@section('content')
<div class="container px-5 my-2">
    <div class="card-body">
            <h3>Form Role</h3><br>

             @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Terjadi Kesalahan saat input data<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif

            @php
                if (isset($object)) {
                    $actionUrl = route('acl.role.update', $object->id);
                } else {
                    $actionUrl = route('acl.role.store');
                }
            @endphp

            <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($object))
                {{ method_field('PATCH') }}
                @endif
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Role</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" value="{{ isset($object) ? $object->name : old('name') }}" placeholder="Nama Role">
                        <div class="invalid-feedback" data-sb-feedback="name:required">Nama is required.</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Permission</label>
                    <div class="col-md-10">
                        <div class="custom-control custom-checkbox roles">
                            <input type="checkbox" class="custom-control-input" name="permission_all" id="permission_all" value="permission_all">
                            <label class="custom-control-label" for="permission_all">Check All</label>
                        </div>
                        <br>
                        <div class="row">
                            @foreach ($permissions as $permission)
                            <div class="col-12 permissions">
                                <!-- Default unchecked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input parent" name="permissions[]" id="{{ Str::slug($permission->name) }}" value="{{ $permission->id }}" {{ isset($object) && $object->permissions->pluck('name')->contains($permission->name) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="{{ Str::slug($permission->name) }}"><strong>{{ $permission->name }}</strong></label>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>

        <br>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button type="submit" class="btn btn-secondary">Batal</button>
        </div>
    </form>
</div>
@endsection

@push('after_scripts')
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script>
$('#permission_all').change(function() {
    console.log('click');
    if($(this).is(":checked")) {
        $('.permissions input').not(this).prop('checked', true);
    } else {
        $('.permissions input').not(this).prop('checked', false);
    }
});
</script>
@endpush


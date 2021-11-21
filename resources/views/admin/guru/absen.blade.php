@extends('template_backend.home')
@section('heading', 'Absensi Ustadz')
@section('page')
    <li class="breadcrumb-item active">Absensi Ustadz</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Ustadz</th>
                    <th>Cek Absensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_guru }}</td>
                        <td>
                            <a href="{{ route('guru.kehadiran', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Ditails</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("#AbsensiGuru").addClass("active");
    </script>
@endsection
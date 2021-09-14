@extends('adminlte::page')
@section('title', 'List kecamatan')
@section('content_header')
    <h1 class="m-0 text-dark">List kecamatan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @hasanyrole('admin|super admin')
                    <a href="{{route('kecamatan.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    @endhasanyrole
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kabupaten</th>
                            <th>pulau</th>
                            <th>kecamatan</th>
                            @hasanyrole('admin|super admin')
                            <th>Opsi</th>
                            @endhasanyrole
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($kecamatan as $key => $Pul)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$Pul->kabupaten->kabupaten}}</td>
                                <td>{{$Pul->pulau->pulau}}</td>
                                <td>{{$Pul->kecamatan}}</td>
                                @hasanyrole('admin|super admin')
                                <td>
                                    <a href="{{route('kecamatan.edit', $Pul)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('kecamatan.destroy', $Pul)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                                @endhasanyrole
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
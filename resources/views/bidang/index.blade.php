@extends('adminlte::page')
@section('title', 'List Kabupaten')
@section('content_header')
    <h1 class="m-0 text-dark">List Bidang</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @hasanyrole('admin|super admin')
                    <a href="{{route('bidang.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    @endhasanyrole
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Bidang</th>
                            @hasanyrole('admin|super admin')
                            <th>Opsi</th>
                            @endhasanyrole
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($bidang as $key => $bi)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$bi->kode}}</td>
                                <td>{{$bi->bidang}}</td>
                                @hasanyrole('admin|super admin')
                                <td>
                                    <a href="{{route('bidang.edit', $bi)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('bidang.destroy', $bi)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
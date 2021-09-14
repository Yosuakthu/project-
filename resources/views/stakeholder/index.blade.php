@extends('adminlte::page')
@section('title', 'List kategori')
@section('content_header')
    <h1 class="m-0 text-dark">List kategori</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @hasanyrole('admin|super admin')
                    <a href="{{route('stakeholder.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    @endhasanyrole
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>kode</th>
                            <th>Bidang</th>
                            <th>Kategori</th>
                            <th>Stakeholder</th>
                            <th>Jenis</th>
                            @hasanyrole('admin|super admin')
                            <th>Opsi</th>
                            @endhasanyrole
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($stakeholder as $key => $stak)
                            <tr>
                                <td>{{$stak+1}}</td>
                                <td>{{$stak->kode}}</td>
                                <td>{{$stak->bidang->bidang}}</td>
                                <td>{{$stak->kategori->kategori}}</td>
                                
                                @hasanyrole('admin|super admin')
                                <td>
                                    <a href="{{route('stakeholder.edit', $stak)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('stakeholder.destroy', $stak)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
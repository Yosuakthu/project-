@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Stakeholder</h1>
@stop

@section('content')
    <form action="{{route('stakeholder.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="form-group">
                        <label for="exampleInputName">Kode kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kode" placeholder="Kode kategori" name="kode" value="{{old('kode')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <label for="exampleInputName">Pilih Bidang</label>
                    <select name="bidang_id" id="bidang_id" class="form-control select2">
                        <option selected disabled value>Pilih Bidang</option>
                        @foreach ($bi as $data)
                            <option value="{{ $data->id }}">{{ $data->bidang }}</option>
                        @endforeach
                    </select>
                    <label for="exampleInputName">Pilih Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control select2">
                        <option selected disabled value>Pilih Kategori</option>
                        @foreach ($kat as $data)
                            <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="exampleInputName">Stakeholder</label>
                        <input type="text" class="form-control @error('luas') is-invalid @enderror" id="stakeholder" placeholder="stakeholder" name="stakeholder" value="{{old('stakeholder')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('stakeholder.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

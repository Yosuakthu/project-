@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah kategori</h1>
@stop

@section('content')
    <form action="{{route('kategori.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="form-group">
                        <label for="exampleInputName">Kode kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="exampleInputName" placeholder="Kode kategori" name="kode" value="{{old('kode')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <label for="exampleInputName">Pilih Bidang</label>
                    <select name="bidang_id" id="bidang_id" class="form-control select2">
                        <option selected disabled value>Pilih Bidang</option>
                        @foreach ($bi as $data)
                            <option value="{{ $data->id }}">{{ $data->bidang }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="exampleInputName">kategori</label>
                        <input type="text" class="form-control @error('luas') is-invalid @enderror" id="exampleInputName" placeholder="kategori" name="kategori" value="{{old('kategori')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('kategori.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Kecamatan</h1>
@stop

@section('content')
    <form action="{{route('kecamatan.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <label for="exampleInputName">Pilih Kabupaten</label>
                    <select name="kabupaten_id" id="kabupaten_id" class="form-control select2">
                        <option selected disabled value>Pilih Kabupaten</option>
                        @foreach ($kab as $data)
                            <option value="{{ $data->id }}">{{ $data->kabupaten }}</option>
                        @endforeach
                    </select>
                    <label for="exampleInputName">Pilih Pulau</label>
                    <select name="pulau_id" id="pulau_id" class="form-control select2">
                        <option selected disabled value>Pilih Pulau</option>
                        @foreach ($pul as $data)
                            <option value="{{ $data->id }}">{{ $data->pulau }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Kecamatan</label>
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="exampleInputName" placeholder="Nama Kecamatan" name="kecamatan" value="{{old('kecamatan')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('kecamatan.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
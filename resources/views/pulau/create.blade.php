@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah pulau</h1>
@stop

@section('content')
    <form action="{{route('pulau.store')}}" method="post">
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
                    <div class="form-group">
                        <label for="exampleInputName">Nama pulau</label>
                        <input type="text" class="form-control @error('pulau') is-invalid @enderror" id="exampleInputName" placeholder="Nama pulau" name="pulau" value="{{old('pulau')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Luas Pulau</label>
                        <input type="text" class="form-control @error('luas') is-invalid @enderror" id="exampleInputName" placeholder="luas pulau" name="luas" value="{{old('luas')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pulau.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

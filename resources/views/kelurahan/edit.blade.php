@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Kabupaten</h1>
@stop

@section('content')
    <form action="{{route('kelurahan.update', $kelurahan)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Kabupaten</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama Kabupaten" name="kabupaten" value="{{$user->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama pulau</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama pulau" name="pulau" value="{{$user->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama kecamatan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama kecamatan" name="kecamatan" value="{{$user->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    </select>
                <label for="exampleInputName">Pilih Jenis</label>
                <select name="jenis" id="jenis" class="form-control select2" placeholder="Pilih Kelurahan">
                    <option selected disabled value>Pilih Jenis</option>
                    <option value="0" @if($kelurahan->jenis==0) {{ "selected" }} @endif> Desa </option>
                    <option value="1"  @if($kelurahan->jenis==1) {{ "selected" }} @endif>kelurahan</option>
                </select>
                    <div class="form-group">
                        <label for="exampleInputName">Nama kelurahan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama kelurahan" name="kelurahan" value="{{$user->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('kelurahan.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah kelurahan</h1>
@stop

@section('content')
    <form action="{{route('kelurahan.store')}}" method="post">
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
                </select>
                <label for="exampleInputName">Pilih kecamatan</label>
                <select name="kecamatan_id" id="kecamatan_id" class="form-control select2" placeholder="Pilih Kec">
                    <option selected disabled value>Pilih Kecamatan</option>
                    @foreach ($kec as $data)
                        <option value="{{ $data->id }}">{{ $data->kecamatan }}</option>
                    @endforeach
                </select>
                <label for="exampleInputName">Pilih Jenis</label>
                <select name="jenis" id="jenis" class="form-control select2" placeholder="Pilih Kelurahan">
                    <option selected disabled value>Pilih Jenis</option>
                    <option value="0" @if($data->jenis==0) {{ "selected" }} @endif> Desa </option>
                    <option value="1"  @if($data->jenis==1) {{ "selected" }} @endif>kelurahan</option>
                </select>
                    <div class="form-group">
                        <label for="exampleInputName">Nama kelurahan</label>
                        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="exampleInputName" placeholder="Nama kelurahan" name="kelurahan" value="{{old('kelurahan')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
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
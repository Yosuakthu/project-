@extends('adminlte::page')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-4 col-md-4">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img src="{{ asset('img/user1-128x128.jpg') }}" alt="profil" class="profile-user-img img-responsive img-circle">
          </div>
          <h3 class="profile-username text-center">Fadlur Rohman</h3>
          <p class="text-muted text-center">Member sejak : 20 Des 2020</p>
          <hr>
          <strong>
            <i class="fas fa-map-marker mr-2"></i>
            Alamat
          </strong>
          <p class="text-muted">
            Jekulo, Kab Kudus
          </p>
          <hr>
          <strong>
            <i class="fas fa-envelope mr-2"></i>
            Email
          </strong>
          <p class="text-muted">
            f4dlur@gmail.com
          </p>
          <hr>
          <strong>
            <i class="fas fa-phone mr-2"></i>
            No Tlp
          </strong>
          <p class="text-muted">
            Jekulo, Kab Kudus
          </p>
          <hr>
          <a href="{{ URL::to('admin/setting') }}" class="btn btn-primary btn-block">Setting</a>
        </div>
      </div>      
    </div>
@endsection
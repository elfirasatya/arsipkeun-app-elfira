@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
  <div class="row align-items-center">
    <div class="col-6">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 d-flex align-items-center">
          <li class="breadcrumb-item">
            <a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            About
          </li>
        </ol>
      </nav>
      <h1 class="mb-0 fw-bold">About</h1>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="d-flex justify-content-start">
  <div class="user-profile-img me-4">
    <img src="/assets/images/user.jpeg" alt="" />
  </div>
  <div>
    <h3>Aplikasi ini dibuat oleh:</h3>
    <div class="border p-4 shadow">
      <p>Nama : Elfira Satya Pramesti</p>
      <p>NIM : 1931710014</p>
      <p>Tanggal : 13 September 2022</p>
    </div>
  </div>
</div>
@endsection
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
                        Dashboard
                    </li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Dashboard</h1>
        </div>
    </div>
</div>
@endsection
@section('content')
<h1 class="display-4">Selamat datang!</h1>
@endsection
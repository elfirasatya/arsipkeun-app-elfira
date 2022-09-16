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
                        Arsip Surat >> Lihat
                    </li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Arsip Surat >> Lihat</h1>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="">
            <div class="">
                <p class="card-subtitle mb-3">Nomor Surat: {{$arsip->nomor_surat}}</p>
                <p class="card-subtitle mb-3">Kategori: {{$arsip->category->title}}</p>
                <p class="card-subtitle mb-3">Judul: {{$arsip->judul}}</p>
                <p class="card-subtitle mb-3">
                    Waktu Unggah: {{$arsip->created_at}}
                </p>
                <div class="my-4">
                    <div id="example1"></div>

                </div>
                <div>
                    <a href="/arsip-surat" class="btn btn-secondary">
                        {{"<<"}} Kembali</a>
                            <a href="/arsip-surat/download/{{$arsip->id}}" class="btn btn-warning text-dark">Unduh</a>
                            <a href="/arsip-surat/{{$arsip->id}}/edit" class="btn btn-info text-white">
                                Edit/Ganti File
                            </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js"></script>
<script>
    PDFObject.embed("/uploads/{{$arsip->file->filename}}", "#example1");
</script>

@endpush
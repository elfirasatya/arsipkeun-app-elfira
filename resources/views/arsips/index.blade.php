@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="">
            <div class="">
                <h2 class="card-title mb-2">Arsip Surat</h2>
                <p class="card-subtitle text-secondary mb-5">
                    Berikut ini adalah arsip surat yang telah terbit dan
                    diarsipkan. Klik "Lihat" pada kolom aksi untuk menampilkan
                    surat.
                </p>
                @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
                @endif
                <div class="table-responsive arsip-table">
                    <table class="table" id="myTable">
                        <thead>
                            <tr class="bg-body">
                                <th scope="col">Nomor Surat</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Waktu Pengarsipan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arsips as $arsip)
                            <tr>
                                <td scope="row">{{$arsip->nomor_surat}}</td>
                                <td>{{$arsip->category->title}}</td>
                                <td>{{$arsip->judul}}</td>
                                <td>{{$arsip->created_at}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" onclick="showModalDelete({{$arsip->id}})"
                                            class="btn btn-danger text-white d-inline-block me-2">Hapus</a>
                                        <a href="/arsip-surat/download/{{$arsip->id}}" target="_blank"
                                            rel="noreferrer nofollow"
                                            class="btn btn-warning text-dark d-inline-block me-2">Unduh</a>
                                        <a href="/arsip-surat/{{$arsip->id}}"
                                            class="btn btn-info text-white d-inline-block me-2">Lihat</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a href="/arsip-surat/create" class="btn btn-primary">Arsipkan Surat.</a>
        </div>
    </div>
</div>
@endsection
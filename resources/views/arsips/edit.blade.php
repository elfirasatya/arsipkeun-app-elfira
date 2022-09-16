@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="">
            <div class="">
                <p class="card-subtitle mb-5">
                    Unggah surat yang telah terbit pada form ini untuk
                    diarsipkan.
                </p>
                <p>
                    Catatan:
                    <span class="ms-4 d-block mt-2">Gunakan file berformat PDF</span>
                </p>
                <div class="col-md-6">
                    <form action="/arsip-surat/{{$arsip->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-input value="{{$arsip->nomor_surat}}" label="Nomor Surat" field="nomor_surat" placeholder=""
                            type="text" />
                        <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label">Kategori</label>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control d-inline-block" style="width: 200px"
                                    id="">
                                    <option value="0">Pilih Kategori</option>
                                    @foreach ($categories as $category)

                                    <option value="{{$category->id}}" @if ($category->id == $arsip->category_id)
                                        selected
                                        @endif>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <x-input label="Judul" value="{{$arsip->judul}}" field="judul" placeholder="" type="text" />
                        <div class="mb-3 row">
                            <label for="formFile" class="form-label col-md-3 col-form-label">File surat (PDF)</label>
                            <div class="col-md-9">
                                <input class="form-control @error('file_surat') is-invalid @enderror " name="file_surat"
                                    type="file" id="formFile" />
                                <p class="mt-2 p-3 border">{{$arsip->file->filename}}</p>
                                @error('file_surat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <a href="/arsip-surat" class="btn btn-secondary">
                                << Kembali</a>
                                    <button type="submit" class="btn btn-info text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
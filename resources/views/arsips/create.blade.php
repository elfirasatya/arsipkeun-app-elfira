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
                    <form action="/arsip-surat" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input label="Nomor Surat" field="nomor_surat" placeholder="" type="text" />
                        <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label">Kategori</label>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control d-inline-block" style="width: 200px"
                                    id="">
                                    <option value="0">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <x-input label="Judul" field="judul" placeholder="" type="text" />
                        <div class="mb-3 row">
                            <label for="formFile" class="form-label col-md-3 col-form-label">File surat (PDF)</label>
                            <div class="col-md-9">
                                <input class="form-control @error('file_surat') is-invalid @enderror " name="file_surat"
                                    type="file" id="formFile" />
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
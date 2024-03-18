@extends('layouts.master')

@section('page-css')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main-content')
<div class="main-content pt-4">
    <div class="breadcrumb">
        {{-- <h1 class="mr-2">{{ $page_title }}</h1> --}}
       
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <form action="{{ route('pimpinan-perti') }}" method="post" enctype="multipart/form-data">
        @csrf

        <button class="btn btn-primary ripple mb-3" type="submit">Submit</button>

        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        {{-- your conten should be here --}}
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="bp_nama">Nama<span style="color: red">*</span></label>
                                <textarea class="form-control" id="bp_nama" rows="3" name="bp_nama"  required></textarea>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="">Jabatan<span style="color: red">*</span></label>
                                <select id="jabatan-select" class="js-example-basic-single" name="jabatan_nama" style="width: 100%" required>
                                    <option value="">Pilih</option>
                                    @foreach ($jabatan_s as $item)
                                    <option value="{{ $item->id }}">{{ $item->jabatan_nama }}</option>    
                                    @endforeach
                                </select> 
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="pimpinan_tgl_awal">TMT<span style="color: red">*</span></label>
                                <input class="form-control" style="height: 75px" id="pimpinan_tgl_awal" type="date" name="pimpinan_tgl_awal" required />
                            </div>
                        </div>  

        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <p>
                            Kami dengan ini mengonfirmasi bahwa pengguna dengan<br>
                            nama    : {{ Auth::user()->name }}<br>
                            NIP     : {{ Auth::user()->nip }}<br>
                            email   : {{ Auth::user()->email }}<br>
                            yang tercantum telah setuju untuk bertindak sebagai penanggung jawab atas data yang dibuat.
                        </p>
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" name="agreement" required /><span>Checklist Untuk Menyetujui</span><span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </form>

</div>

@endsection

@section('page-js')


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#jabatan-select').select2();
        });

    </script>


@endsection
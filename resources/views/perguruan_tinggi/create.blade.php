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

    <form action="{{ route('perguruan-tinggi') }}" method="post" enctype="multipart/form-data">
        @csrf

        <button class="btn btn-primary ripple mb-3" type="submit">Submit</button>

        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        {{-- your conten should be here --}}
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="perti_nama">Nama Perguruan Tinggi<span style="color: red">*</span></label>
                                <textarea class="form-control" id="perti_nama" rows="3" name="perti_nama"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="perti_nama_singkat">Nama Singkat Perguruan Tinggi <span style="color: red">*</span></label>
                                <textarea class="form-control" id="perti_nama_singkat" rows="3" name="perti_nama_singkat"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="perti_sk_pendirian">Nomor SK Pendirian Perguruan Tinggi<span style="color: red">*</span></label>
                                <textarea class="form-control" id="perti_sk_pendirian" rows="3" name="perti_sk_pendirian"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="perti_tgl_sk_pendirian">Tanggal SK Pendirian Perguruan Tinggi<span style="color: red">*</span></label>
                                <input class="form-control" style="height: 75px" id="perti_tgl_sk_pendirian" type="date" name="perti_tgl_sk_pendirian" required />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="perti_kota">Kota Perguruan Tinggi<span style="color: red">*</span></label>
                                <textarea class="form-control" id="perti_kota" rows="3" name="perti_kota"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="perti_alamat">Alamat Perguruan Tinggi<span style="color: red">*</span></label>
                                <textarea class="form-control" id="perti_alamat" rows="3" name="perti_alamat"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="perti_email">Email Perguruan Tinggi<span style="color: red">*</span></label>
                                <textarea class="form-control" id="perti_email" rows="3" name="perti_email"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="perti_telp">Telepon Perguruan Tinggi<span style="color: red">*</span></label>
                                <textarea class="form-control" id="perti_telp" rows="3" name="perti_telp"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="perti_website">Website Perguruan Tinggi<span style="color: red">*</span></label>
                                <textarea class="form-control" id="perti_website" rows="3" name="perti_website"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="perti_status">Status Perguruan Tinggi<span style="color: red">*</span></label>
                                <select class="form-control mb-1" id="perti_status" name="perti_status">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Pembinaan">Pembinaan</option>
                                    <option value="Alih Bentuk">Alih Bentuk</option>
                                    <option value="Alih Kelola">Alih Kelola</option>
                                    <option value="Tutup">Tutup</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="keterangan">Keterangan<span style="color: red">*</span></label>
                                <textarea class="form-control" id="keterangan" rows="3" name="keterangan"  required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <label for="">Logo Perguruan Tinggi<span style="color: red">*</span></label>
                        <div class="card o-hidden mb-2">
                            <iframe id="perti_logo_preview" frameborder="0"></iframe>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input class="custom-file-input" id="perti_logo" type="file" aria-describedby="inputGroupFileAddon01" name="perti_logo" required/>
                                <label class="custom-file-label" for="perti_logo" id="perti_logo_label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card text-left">
                    <div class="card-body">
                        <label for="">File SK Pendirian Perguruan Tinggi<span style="color: red">*</span></label>
                        <div class="card o-hidden mb-2">
                            <iframe id="file_sk_preview" frameborder="0"></iframe>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input class="custom-file-input" id="file_sk" type="file" aria-describedby="inputGroupFileAddon01" name="bp_logo" required/>
                                <label class="custom-file-label" for="file_sk" id="file_sk_label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        {{-- your conten should be here --}}
                        <div class="row ">
                            <div class="col-md-12 form-group mb-3">
                                <label for="">Badan Penyelenggara<span style="color: red">*</span></label>
                                <select id="badan-penyelenggara-select" class="js-example-basic-single" name="id_bp" style="width: 100%" required>
                                    <option value="">Pilih</option>
                                    <option value="1">BP 1</option>
                                    <option value="1">BP 2</option>
                                </select> 
                            </div>
                            <div class="row m-3">
                                <div class="col-md-5 d-flex justify-content-center align-items-center">
                                    <img class="img-fluid rounded mb-2" id="bp_logo" data-url="{{ asset('storage/badan_penyelenggara/') }}"  alt="" />
                                </div>
                                <div class="col-md-5 d-flex justify-content-center align-items-center flex-column">
                                    <h2 id="bp_nama" class="font-weight-bold text-center mb-0"></h2>
                                    <h6 id="bp_status" class="font-weight-bold text-center mt-2"></h6>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>

        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        {{-- your content should be here --}}
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="akeditasi_pt_sk">Nomor Surat Keputusan Akreditasi<span style="color: red">*</span></label>
                                <textarea class="form-control" id="akeditasi_pt_sk" rows="3" name="akeditasi_pt_sk"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="akreditasi_pt_tgl_sk">Tanggal Mulai SK Akreditasi<span style="color: red">*</span></label>
                                <input class="form-control" style="height: 75px" id="akreditasi_pt_tgl_sk" type="date" name="akreditasi_pt_tgl_sk" required />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="akreditasi_pt_tgl_akhir">Tanggal Berakhir SK Akreditasi<span style="color: red">*</span></label>
                                <input class="form-control" style="height: 75px" id="akreditasi_pt_tgl_akhir" type="date" name="akreditasi_pt_tgl_akhir" required />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="akreditasi_pt_status">Status Akreditasi Perguruan Tinggi<span style="color: red">*</span></label>
                                <select class="form-control mb-1" id="akreditasi_pt_status" name="akreditasi_pt_status">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Berakhir">Berakhir</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="">Lembaga Akreditasi<span style="color: red">*</span></label>
                                <select id="lembaga-akreditasi-select" style="width: 100%" class="js-example-basic-single" name="id_lembaga" required>
                                    <option value="">Pilih</option>
                                    <option value="1">Ban-PT</option>
                                    <option value="2">LAM-PTKES</option>
                                </select> 
                                <div class="row">
                                    <div class="col-md-5 d-flex justify-content-center align-items-center">
                                        <img class="img-fluid rounded mb-2" id="lembaga_logo" data-url="{{ asset('storage/akreditasi/') }}"  alt="" />
                                    </div>
                                    <div class="col-md-5 d-flex justify-content-center align-items-center">
                                        <h6 id="lembaga_nama" class="font-weight-bold text-center mb-0"></h6>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="">Peringkat Akreditasi<span style="color: red">*</span></label>
                                <select id="peringkat-akreditasi-select" style="width: 100%" class="js-example-basic-single" name="id_peringkat_akreditasi" required>
                                    <option value="">Pilih</option>
                                    <option value="1">A</option>
                                    <option value="2">B</option>
                                </select> 
                                <div class="row">
                                    <div class="col-md-5 d-flex justify-content-center align-items-center">
                                        <img class="img-fluid rounded mb-2" id="akreditasi_logo" data-url="{{ asset('storage/badan_penyelenggara/') }}"  alt="" />
                                    </div>
                                    <div class="col-md-5 d-flex justify-content-center align-items-center flex-column">
                                        <h6 id="akreditasi_nama" class="font-weight-bold text-center mb-0"></h6>
                                    </div> 
                                </div>
                            </div>
                        </div>
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
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        
        $("#perti_logo").change(function(){
            readURL(this, '#perti_logo_preview');
        });

        // Ketika pengguna memilih file img, perbarui label
        $('#perti_logo').change(function() {
            var fileName = $(this).val().split('\\').pop(); // Mengambil nama file dari path lengkap
            $('#perti_logo_label').text(fileName); // Mengatur label dengan nama file
        });


    </script>

    <script>

        $("#file_sk").change(function(){
            readURL(this, '#file_sk_preview');
        });

        // Ketika pengguna memilih file akta, perbarui label
        $('#file_sk').change(function() {
            var fileName = $(this).val().split('\\').pop(); // Mengambil nama file dari path lengkap
            $('#file_sk_label').text(fileName); // Mengatur label dengan nama file
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#badan-penyelenggara-select').select2();
        });

        $(document).ready(function() {
            $('#badan-penyelenggara-select').change(function() {
                let selectedValue = $(this).val();
                if(selectedValue == '') { // Jika nilai yang dipilih adalah kosong
                    // Reset nilai select
                    this.selectedIndex = 0; // Atur indeksnya ke 0 (pilihan pertama)
                    document.getElementById('bp_logo').setAttribute('src', ''); // Mengosongkan sumber gambar
                    document.getElementById('bp_nama').innerText = ''; // Mengosongkan teks
                    document.getElementById('bp_status').innerText = ''; // Mengosongkan teks
                } else {
                    let bpLogoUrl = $('#bp_logo').data('url');
                    $.ajax({
                        url: '{{ route("badan-penyelenggara.getById", ":value") }}'.replace(':value', selectedValue),
                        type: 'GET',
                        success: function(response) {
                            let logoUrl = bpLogoUrl + '/'+ response.data[0]['bp_logo'];
    
                            $('#bp_logo').attr('src', logoUrl);                        
                            $('#bp_nama').text(response.data[0]['bp_nama']);
                            $('#bp_status').text(response.data[0]['bp_status']);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#lembaga-akreditasi-select').select2();
        });

        $(document).ready(function() {
            $('#lembaga-akreditasi-select').change(function() {
                let selectedValue = $(this).val();
                if(selectedValue == ''){
                    this.selectedIndex = 0; // Atur indeksnya ke 0 (pilihan pertama)
                    $('#lembaga_logo').attr('src', '');                        
                    $('#lembaga_nama').text('');
                }else{
                    let bpLogoUrl = $('#lembaga_logo').data('url');
                    $.ajax({
                        url: '{{ route("lembaga.getById", ":value") }}'.replace(':value', selectedValue),
                        type: 'GET',
                        success: function(response) {
                            let logoUrl = bpLogoUrl + '/'+ response.data[0]['lembaga_logo'];
    
                            $('#lembaga_logo').attr('src', logoUrl);                        
                            $('#lembaga_nama').text(response.data[0]['lembaga_nama']);
                            $('lembaga_status').text(response.data[0]['lembaga_status']);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#peringkat-akreditasi-select').select2();
        });

        $(document).ready(function() {
            $('#peringkat-akreditasi-select').change(function() {
                let selectedValue = $(this).val();
                if(selectedValue == ''){
                    this.selectedIndex = 0; // Atur indeksnya ke 0 (pilihan pertama)
                    $('#akreditasi_logo').attr('src', '');                        
                    $('#akreditasi_nama').text('');

                }else{
                    let peringkatAkreditasiLogoUrl = $('#lembaga_logo').data('url');
                    $.ajax({
                        url: '{{ route("peringkat-akreditasi.getById", ":value") }}'.replace(':value', selectedValue),
                        type: 'GET',
                        success: function(response) {
                            let logoUrl = peringkatAkreditasiLogoUrl + '/'+ response.data[0]['peringkat_logo'];
    
                            $('#akreditasi_logo').attr('src', logoUrl);                        
                            $('#akreditasi_nama').text(response.data[0]['peringkat_nama']);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>



@endsection
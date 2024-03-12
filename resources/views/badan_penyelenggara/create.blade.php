@extends('layouts.master')

@section('page-css')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection

@section('main-content')
<div class="main-content pt-4">
    <div class="breadcrumb">
        {{-- <h1 class="mr-2">{{ $page_title }}</h1> --}}
       
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <form action="{{ route('badan-penyelenggara') }}" method="post" enctype="multipart/form-data">
        @csrf

        <button class="btn btn-primary ripple mb-3" type="submit">Submit</button>

        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        {{-- your conten should be here --}}
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="bp_nama">Nama Badan Penyelenggara<span style="color: red">*</span></label>
                                <textarea class="form-control" id="bp_nama" rows="3" name="bp_nama"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="bp_alamat">Alamat Badan Penyelenggara <span style="color: red">*</span></label>
                                <textarea class="form-control" id="bp_alamat" rows="3" name="bp_alamat"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="bp_kontak">Kontak Badan Penyelenggara<span style="color: red">*</span></label>
                                <textarea class="form-control" id="bp_kontak" rows="3" name="bp_kontak"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="bp_status">Status Badan Penyelenggara<span style="color: red">*</span></label>
                                <select class="form-control mb-1" id="bp_status" name="bp_status">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <label for="">Logo Badan Penyelenggara<span style="color: red">*</span></label>
                        <div class="card o-hidden mb-2">
                            <iframe id="blah" frameborder="0"></iframe>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input class="custom-file-input" id="logoInp" type="file" aria-describedby="inputGroupFileAddon01" name="bp_logo" required/>
                                <label class="custom-file-label" for="inputGroupFile01" id="imgLabelLogo">Choose file</label>
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
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="akta_nomor">Nomor Akta<span style="color: red">*</span></label>
                                <textarea class="form-control" id="akta_nomor" rows="2" name="akta_nomor"  required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="akta_tgl">Tanggal Akta<span style="color: red">*</span></label>
                                <input class="form-control" style="height: 50px" id="akta_tgl" type="date" name="akta_tgl" required />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="akta_nama_notaris">Nama Notaris<span style="color: red">*</span></label>
                                <textarea class="form-control" id="akta_nama_notaris" rows="2" name="akta_nama_notaris" required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="akta_kota_notaris">Kota Notaris<span style="color: red">*</span></label>
                                <textarea class="form-control" id="akta_kota_notaris" rows="2" name="akta_kota_notaris" required></textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="akta_status">Status Akta<span style="color: red">*</span></label>
                                <select class="form-control mb-1" id="akta_status" name="akta_status">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="akta_jenis">Jenis Akta<span style="color: red">*</span></label>
                                <select class="form-control mb-1" id="akta_jenis" name="akta_jenis">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <label for="">File Akta<span style="color: red">*</span></label>
                        <div class="card o-hidden mb-2">
                            <iframe id="akta_preview" frameborder="0"></iframe>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input class="custom-file-input" id="aktaFileInp" type="file" aria-describedby="inputGroupFileAddon01" name="akta_dokumen" required/>
                                <label class="custom-file-label" for="inputGroupFile01" id="aktaFileLabelLogo">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            
        </div>

        <input type="checkbox" name="buat_sk_kumham" id="buat_sk_kumham">
        <label for="buat_sk_kumham" >Buat SK Kumham??</label>

        <div id="hidden" style="display: none">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card text-left">
                        <div class="card-body">
                            {{-- your conten should be here --}}
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="kumham_sk">Nomor Surat Keputusan<span style="color: red">*</span></label>
                                    <textarea class="form-control kumham_input" id="kumham_sk" rows="2" name="kumham_sk"  ></textarea>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="kumham_tgl_sk">Tanggal Surat Keputusan<span style="color: red">*</span></label>
                                    <input class="form-control kumham_input" style="height: 50px" id="kumham_tgl_sk" type="date" name="kumham_tgl_sk"  />
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label for="kumham_jenis">Jenis Kumham<span style="color: red">*</span></label>
                                    <textarea class="form-control kumham_input" id="kumham_jenis" rows="2" name="kumham_jenis" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4 mb-4">
                    <div class="card text-left">
                        <div class="card-body">
                            <label for="">File Surat Keputusan<span style="color: red">*</span></label>
                            <div class="card o-hidden mb-2">
                                <iframe id="kumham_preview" frameborder="0"></iframe>
                            </div>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input class="custom-file-input kumham_input" id="kumhamFileInp" type="file" aria-describedby="inputGroupFileAddon01" name="kumham_dokumen" />
                                    <label class="custom-file-label" for="inputGroupFile01" id="kumhamFileLabelLogo">Choose file</label>
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
        
        $("#logoInp").change(function(){
            readURL(this, '#blah');
        });

        // Ketika pengguna memilih file img, perbarui label
        $('#logoInp').change(function() {
            var fileName = $(this).val().split('\\').pop(); // Mengambil nama file dari path lengkap
            $('#imgLabelLogo').text(fileName); // Mengatur label dengan nama file
        });


    </script>

    <script>

        $("#aktaFileInp").change(function(){
            readURL(this, '#akta_preview');
        });

        // Ketika pengguna memilih file akta, perbarui label
        $('#aktaFileInp').change(function() {
            var fileName = $(this).val().split('\\').pop(); // Mengambil nama file dari path lengkap
            $('#aktaFileLabelLogo').text(fileName); // Mengatur label dengan nama file
        });

    </script>

    <script>
            
        $("#kumhamFileInp").change(function(){
            readURL(this, '#kumham_preview');
        });

        // Ketika pengguna memilih file akta, perbarui label
        $('#kumhamFileInp').change(function() {
            var fileName = $(this).val().split('\\').pop(); // Mengambil nama file dari path lengkap
            $('#kumhamFileLabelLogo').text(fileName); // Mengatur label dengan nama file
        });

        // Menangkap elemen checkbox
        var checkbox = document.getElementById('buat_sk_kumham');
        // Menangkap elemen div yang akan disembunyikan
        var hiddenDiv = document.getElementById('hidden');
        // Menangkap elemen input dengan kelas 'kumham_input'
        var kumhamInputs = document.getElementsByClassName('kumham_input');
        // Menambahkan event listener ke checkbox
        checkbox.addEventListener('change', function() {
            // Jika checkbox diceklis, tampilkan div
            if (checkbox.checked) {
                hiddenDiv.style.display = 'block';
                for (var i = 0; i < kumhamInputs.length; i++) {
                    kumhamInputs[i].setAttribute('required', '');
                }
            } else {
                // Jika checkbox tidak diceklis, sembunyikan div
                hiddenDiv.style.display = 'none';
                for (var i = 0; i < kumhamInputs.length; i++) {
                    kumhamInputs[i].removeAttribute('required');
                    if (kumhamInputs[i].type === 'file') {
                        kumhamInputs[i].value = ""; // Menghapus file yang dipilih dari input file
                    } else {
                        kumhamInputs[i].value = ''; // Mengosongkan nilai input teks
                    }                
                }
            }
        });



    </script>


@endsection
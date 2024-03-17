@extends('layouts.master')

@section('page-css')
    
@endsection

@section('main-content')
<div class="main-content pt-4">
    <div class="breadcrumb">
        <h1>Blank</h1>
        <ul>
            <li><a href="">Pages</a></li>
            <li>Blank</li>
        </ul>
    </div>
    <form action="{{ route('lembaga-akreditasi') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="separator-breadcrumb border-top"></div><!-- end of main-content -->

        <div class="row">
            <div class="col-md-12 mb-3 ">
                <button class="btn btn-primary">Submit</button>
            </div>

            <div class="col-md-7 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        
                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="lembaga_nama">Nama Lembaga Akreditasi<span style="color: red">*</span></label>
                                    <textarea class="form-control" id="lembaga_nama" rows="3" name="lembaga_nama"  required></textarea>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="lembaga_nama_singkat">Nama Singkat Lembaga Akreditasi<span style="color: red">*</span></label>
                                    <textarea class="form-control" id="lembaga_nama_singkat" rows="3" name="lembaga_nama_singkat"  required></textarea>
                                </div>
                                
                                <div class="col-md-6 form-group mb-3">
                                    <label for="lembaga_status">Status<span style="color: red">*</span></label>
                                    <select class="form-control mb-1" id="lembaga_status" name="lembaga_status">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <div class="col-md-12 mb-4">
                                    <label for="">Logo Lembaga Akreditasi<span style="color: red">*</span></label>
                                    <div class="card o-hidden mb-2">
                                        <iframe id="blah" frameborder="0"></iframe>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="lembaga_logo" type="file" aria-describedby="inputGroupFileAddon01" name="lembaga_logo" required/>
                                            <label class="custom-file-label" for="lembaga_logo" id="imgLabelLembagaLogo">Choose file</label>
                                        </div>
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
    
    $("#lembaga_logo").change(function(){
        readURL(this, '#blah');
    });

    // Ketika pengguna memilih file img, perbarui label
    $('#lembaga_logo').change(function() {
        var fileName = $(this).val().split('\\').pop(); // Mengambil nama file dari path lengkap
        // Memeriksa panjang nama file
        if (fileName.length > 30) {
            // Jika lebih dari 10 karakter, singkat nama file
            var shortenedFileName = fileName.substr(0, 20) + '......' + fileName.substr(-7);
                $('#imgLabelLembagaLogo').text(shortenedFileName); // Mengatur label dengan nama file yang disingkat
        } else {
            // Jika tidak, gunakan nama file lengkap
            $('#imgLabelLembagaLogo').text(fileName); // Mengatur label dengan nama file
        }

    });


</script>

@endsection
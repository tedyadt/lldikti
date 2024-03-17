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
    <div class="separator-breadcrumb border-top"></div><!-- end of main-content -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <form action="{{ route('peringkat-akreditasi') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="peringkat_nama">Peringkat Akreditasi</label>
                                <input class="form-control" id="peringkat_nama" name="peringkat_nama" type="text" placeholder="Enter your name" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 ">
                                
                                    <div class="card-body">
                                        <label for="">Logo Peringkat<span style="color: red">*</span></label>
                                        <div class="card o-hidden mb-2">
                                            <iframe id="blah" frameborder="0"></iframe>
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input class="custom-file-input" id="peringkat_logo" type="file" aria-describedby="inputGroupFileAddon01" name="peringkat_logo" accept="image/png, image/jpeg, image/jpg" required/>
                                                <label class="custom-file-label" for="peringkat_logo" id="imgLabelPeringkatLogo">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>                           
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
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
     // Event listener untuk halaman dimuat ulang
</script>
<script>
    
    $("#peringkat_logo").change(function(){
        readURL(this, '#blah');
    });

    // // Ketika pengguna memilih file img, perbarui label
    $('#peringkat_logo').change(function() {
        var fileName = $(this).val().split('\\').pop(); // Mengambil nama file dari path lengkap
        // Memeriksa panjang nama file
        if (fileName.length > 30) {
            // Jika lebih dari 10 karakter, singkat nama file
            var shortenedFileName = fileName.substr(0, 20) + '......' + fileName.substr(-7);
                $('#imgLabelPeringkatLogo').text(shortenedFileName); // Mengatur label dengan nama file yang disingkat
        } else {
            // Jika tidak, gunakan nama file lengkap
            $('#imgLabelPeringkatLogo').text(fileName); // Mengatur label dengan nama file
        }

    });
</script>


@endsection
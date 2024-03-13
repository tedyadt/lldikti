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
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <form action="{{ route('peringkat-akreditasi') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="peringkat_nama">Peringkat Akreditasi</label>
                                <input class="form-control" id="peringkat_nama" name="peringkat_nama" type="text" placeholder="Enter your name" required />
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card text-left">
                                    <div class="card-body">
                                        <label for="">Logo Peringkat<span style="color: red">*</span></label>
                                        <div class="card o-hidden mb-2">
                                            <iframe id="blah" frameborder="0"></iframe>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input class="custom-file-input" id="peringkat_logo" type="file" aria-describedby="inputGroupFileAddon01" name="peringkat_logo" required/>
                                                <label class="custom-file-label" for="peringkat_logo" id="imgLabelPeringkatLogo">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                           
                            <div class="col-md-12">
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
</script>
<script>
    
    $("#peringkat_logo").change(function(){
        readURL(this, '#blah');
    });

    // Ketika pengguna memilih file img, perbarui label
    $('#peringkat_logo').change(function() {
        var fileName = $(this).val().split('\\').pop(); // Mengambil nama file dari path lengkap
        $('#imgLabelPeringkatLogo').text(fileName); // Mengatur label dengan nama file
    });


</script>

@endsection
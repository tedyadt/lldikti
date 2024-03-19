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
    <form action="{{ route('jabatan') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="jabatan_nama">Jabatan Nama<span style="color: red">*</span></label>
                                    <textarea class="form-control" id="jabatan_nama" rows="3" name="jabatan_nama"  required></textarea>
                                </div>
                            </div>
                        </form>
                    </div>



@endsection

@section('page-js')




@endsection
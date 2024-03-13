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
                    <form action="{{ route('user') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="name">Nama</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" required />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="email">Email address</label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter email" required/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="nip">Nip</label>
                                <input class="form-control" id="nip" name="nip"  placeholder="Enter phone" required />
                                 <!-- Input untuk password -->
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role" required>
                                    @foreach ($roles as $role)
                                    <option>{{ $role->name }}</option>    
                                    @endforeach
                                   
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <!-- Input untuk konfirmasi password -->
                            <div class="col-md-6 form-group mb-3">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select class="form-control" name="is_active" required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
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
    
@endsection
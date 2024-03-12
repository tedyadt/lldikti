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
    <form action="{{ route('role') }}" method="post" enctype="multipart/form-data">
        @csrf

        <button class="btn btn-primary ripple mb-3" type="submit">Submit</button>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="name">Nama Role<span style="color: red">*</span></label>
                                <textarea class="form-control" id="name" rows="2" name="name"  required></textarea>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <div class="row justify-content-left">
                                    <div class="col-md-4">
                                        <div class="card card-profile-1 mb-4">
                                            <div class="card-body text-center">
                                                <h5 class="m-3">User Manajemen</h5>
                                                <div class="text-left">
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[0]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[0]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[1]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[1]->name }}" /><span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="card card-profile-1 mb-4">
                                            <div class="card-body text-center">
                                                <h5 class="m-3">Badan Penyelenggara</h5>
                                                <div class="text-left">
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[2]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[2]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[3]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[3]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[4]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[4]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[5]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[5]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[6]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[6]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[7]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[7]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[8]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[8]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[9]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[9]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[10]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[10]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[11]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[11]->name }}" /><span class="slider"></span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-profile-1 mb-4">
                                            <div class="card-body text-center">
                                                <h5 class="m-3">Perguruan Tinggi</h5>
                                                <div class="text-left">

                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[12]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[12]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[13]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[13]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[14]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[14]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[15]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[15]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[16]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[16]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[17]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[17]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[18]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[18]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[19]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[19]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[20]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[20]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[21]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[21]->name }}" /><span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-profile-1 mb-4">
                                            <div class="card-body text-center">
                                                <h5 class="m-3">Pimpinan Perguruan Tinggi</h5>
                                                <div class="text-left">
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[22]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[22]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[23]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[23]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[24]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[24]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[25]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[25]->name }}" /><span class="slider"></span>
                                                    </label>
                                                    <label class="switch pr-5 switch-success mb-3 mr-3"><span>{{ $permissions[26]->name }}</span>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permissions[26]->name }}" /><span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
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
    {{-- @foreach ($permissions as $permission)
        {{ $loop->index }} | {{ $permission->id }} | {{ $permission->name }} <br>
    @endforeach --}}
</div>

@endsection

@section('page-js')
    
@endsection
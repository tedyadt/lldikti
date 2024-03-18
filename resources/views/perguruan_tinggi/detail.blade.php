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
                    <div >
                        <h4>Identitas Perguruan Tinggi</h4>
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img class="img-fluid rounded mb-2" src="{{ asset('storage/perguruan_tinggi/'.$perti->perti_logo) }}" alt="" />
                            </div>
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <h2 class="font-weight-bold text-center">{{ $perti->perti_nama }}</h2>
                            </div>   
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img class="img-fluid rounded mb-2" src="{{ asset('storage/akreditasi/akreditasi-a.jpg') }}" alt="" />
                            </div>           
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <h4>Informasi Perguruan Tinggi</h4>
                                @can('edit_data_perguruan_tinggi')
                                <div class="button-group mb-3">
                                    <button type="button" class="btn btn-sm btn-primary">Edit</button>
                                    <button type="button" class="btn btn-sm btn-secondary">Detail</button>
                                </div>
                                @endcan
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="col">Kota</th>
                                            <th>:</th>
                                            <td>{{ $perti->perti_kota }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Alamat</th>
                                            <th>:</th>
                                            <td>{{ $perti->perti_alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Email</th>
                                            <th>:</th>
                                            <td>{{ $perti->perti_email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Telepon</th>
                                            <th>:</th>
                                            <td>{{ $perti->perti_telp }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Website</th>
                                            <th>:</th>
                                            <td>{{ $perti->perti_website }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">SK Pendirian</th>
                                            <th>:</th>
                                            <td>{{ $perti->perti_sk_pendirian }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tanggal SK Pendirian</th>
                                            <th>:</th>
                                            <td>{{ $perti->perti_tgl_sk_pendirian }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Keterangan</th>
                                            <th>:</th>
                                            <td>{{ $perti->keterangan }}</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <div class="col-md-6 col-6">
                                <h4>Daftar Pimpinan Perguruan Tinggi</h4>
                                <div class="button-group mb-3">

                                <a href="{{ route('pimpinan-perti', ['id_perti' => $perti->id]) }}"><button type="button" class="btn btn-sm btn-secondary">Detail</button></a>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="col">Rektor</th>
                                            <th>:</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Wakil Rektor I</th>
                                            <th>:</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Wakil Rektor II</th>
                                            <th>:</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Wakil Rektor III</th>
                                            <th>:</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Wakil Rektor IV</th>
                                            <th>:</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Wakil Rektor V</th>
                                            <th>:</th>
                                            <td></td>
                                        </tr>
                                       
                                    </table>
                                </div>

                            </div>
                        </div>
                        <hr />
                        <h4>Daftar Program Studi </h4>
                        <p class="mb-4">Daftar program Studi di bawah {{ $perti->perti_nama }}</p>
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="main_table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>No</th>
                                        <th>Kode PS</th>
                                        <th>Nama Program Studi</th>
                                        <th>Jenjang</th>
                                        <th>Status</th>
                                        <th>Nomor SK</th>
                                        <th>Peringkat Akreditasi</th>
                                        <th>Riwayat Akreditasi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-js')

    {{-- datatable button --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            const table = $('#main_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        text:'+ Add New',
                        attr:{
                            id:'add-new-bp',
                            class:'btn btn-primary',
                        }
                    }
                ],
                // processing:true,
                // serverSide: true
                // ajax: '/badan-penyelenggara/badanpenyelenggarajson',
            })
        })
    </script>
@endsection
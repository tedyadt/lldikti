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
                        <h4>Peringkat Akreditasi</h4>
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img class="img-fluid rounded mb-2" src="{{ asset('storage/peringkat_akreditasi/'.$peringkat->peringkat_logo) }}" alt="" />
                            </div>
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <h2 class="font-weight-bold text-center">{{ $peringkat->peringkat_nama }}</h2>
                            </div>   
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <img class="img-fluid rounded mb-2" src="{{ asset('storage/akreditasi/akreditasi-a.jpg') }}" alt="" />
                            </div>           
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <h4>Peringkat Akreditasi</h4>
                                @can('edit_data_perguruan_tinggi')
                                <div class="button-group mb-3">
                                    <button type="button" class="btn btn-sm btn-primary">Edit</button>
                                    <button type="button" class="btn btn-sm btn-secondary">Detail</button>
                                </div>
                                @endcan
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="col">Peringkat Nama</th>
                                            <th>:</th>
                                            <td>{{ $peringkat->peringkat_nama }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Peringkat Logo</th>
                                            <th>:</th>
                                            <td>{{ $peringkat->peringkat_logo }}</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <hr/>
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
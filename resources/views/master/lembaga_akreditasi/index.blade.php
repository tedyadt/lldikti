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
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered" id="main_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>No</th>
                                    <th>Nama Lembaga</th>
                                    <th>Singkatan Lembaga</th>
                                    <th>Status</th>
                                    <th>Logo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-js')

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function () {
        const assetUrl = "{{ asset('storage/lembaga_akreditasi') }}";
        const table = $('#main_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    text:'+ Add New',
                    attr:{
                        id:'add-new-la',
                        class:'btn btn-primary',
                    }
                }
            ],
            processing:true,
            serverSide: true,
            ajax: '/lembaga-akreditasi/lembagaakreditasijson',
            columns: [
                { data: 'id', name: 'id', visible: false },
                {
                    data: null,
                    visible: true,
                    orderable: false,
                    width: "5%",
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'lembaga_nama', name: 'lembaga_nama'},
                { data: 'lembaga_nama_singkat', name: 'lembaga_nama_singkat'},
                { data: 'lembaga_status', name: 'lembaga_status'},
                {
                data: 'lembaga_logo',
                name: 'lembaga_logo',
                render: function(data) {
                    return '<img src="' + assetUrl + '/' +data + '" width="50" height="50">';
                }
            },
                { 
                    data: 'action', 
                    name: 'Action',
                    searchable:'false',
                    orderable: false,
                    render: function(data, type, row, meta) {
                        var detailUrl = "{{ route('perguruan-tinggi.show', ':id') }}".replace(':id', row.id);
                        var editUrl = "{{ route('perguruan-tinggi.edit',   ':id') }}".replace(':id', row.id);

                        return `
                            <div class="btn-group dropleft">
                                <button class="btn bg-primary _r_btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="_dot _r_block-dot bg-danger"></span>
                                    <span class="_dot _r_block-dot bg-warning"></span>
                                    <span class="_dot _r_block-dot bg-success"></span>
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                    <a class="dropdown-item" href="${detailUrl}">Detail</a>
                                    <a class="dropdown-item" href="${editUrl}">Edit</a>
                                </div>
                            </div>
                        `;
                    }
                },


                
            ],
            order: [[0, 'asc']] // Order by the forst column ('id') in ascending order
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#add-new-la').click(function() {
            window.location.href = '{{ route("lembaga-akreditasi.create") }}';            
        });
    });
</script>

@endsection
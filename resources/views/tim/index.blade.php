@extends('layouts.default')

@section('konten')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Daftar TIM SP2020 Online</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    @if (Session::has('message'))
    <div class="row">
        <div class="col-lg-12 m-b-10">
            <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-success btn-rounded waves-effect waves-light m-b-20" data-toggle="modal" data-target="#TambahModal" >Tambah</button>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Wilayah</th>
                                    <th>Nama Tim</th>
                                    <th>Anggota</th>
                                    <th>OPD Tugas</th>
                                    <th>Mapping</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dataTim['status'] == false)
                                    <tr>
                                        <td colspan="5" align="center">Data TIM masih kosong</td>
                                    </tr>
                                @else 
                                    @for ($i = 0; $i < count($dataTim['data']); $i++)
                                       <tr>
                                           <td>{{$i+1}}</td>
                                           <td>{{$dataTim['data'][$i]['tim_namabps']}}</td>
                                           <td>{{$dataTim['data'][$i]['tim_nama']}}</td>
                                           <td>
                                               @if ($dataTim['data'][$i]['itemPeg']['pStatus']==true)
                                                   @for ($j = 0; $j < count($dataTim['data'][$i]['itemPeg']['pData']); $j++)
                                                       <p>{{$dataTim['data'][$i]['itemPeg']['pData'][$j]['peg_nama']}}</p>
                                                   @endfor
                                               @endif
                                           </td>
                                           <td>
                                            @if ($dataTim['data'][$i]['itemOPD']['oStatus']==true)
                                                @for ($o = 0; $o < count($dataTim['data'][$i]['itemOPD']['oData']); $o++)
                                                <p>{{$dataTim['data'][$i]['itemOPD']['oData'][$o]['opd_nama']}}</p>
                                                @endfor                               
                                            @endif

                                           </td>
                                           <td>
                                            <button class="btn btn-success btn-sm btn-rounded waves-effect waves-light m-b-20" data-toggle="modal" data-timid="{{$dataTim['data'][$i]['tim_id']}}" data-timnama="{{$dataTim['data'][$i]['tim_nama']}}" data-bpskode="{{$dataTim['data'][$i]['tim_kodebps']}}" data-bpsnama="{{$dataTim['data'][$i]['tim_namabps']}}" data-target="#MappingModal">Pegawai</button>

                                            <button class="btn btn-info btn-sm btn-rounded waves-effect waves-light m-b-20" data-toggle="modal" data-timid="{{$dataTim['data'][$i]['tim_id']}}" data-timnama="{{$dataTim['data'][$i]['tim_nama']}}" data-bpskode="{{$dataTim['data'][$i]['tim_kodebps']}}" data-bpsnama="{{$dataTim['data'][$i]['tim_namabps']}}" data-target="#MapOpdModal">OPD</button>
                                           </td>
                                           <td></td>
                                       </tr> 
                                    @endfor
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    @include('tim.modaladmin')
    @include('tim.modalmap')
@endsection

@section('css')
    <!-- toast CSS -->
    <link href="{{asset('assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- page css -->
    <link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/pages/floating-label.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/node_modules/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/node_modules/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('dist/js/pages/jasny-bootstrap.js')}}"></script>
    <script src="{{asset('assets/node_modules/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/node_modules/multiselect/js/jquery.multi-select.js')}}"></script>
    <!-- This is data table -->
    <script src="{{asset('assets/node_modules/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.staticaly.com/gh/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.staticaly.com/gh/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $('#example').DataTable({
        dom: 'Bfrtip',
        "displayLength": 25,
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    @include('tim.js')
@endsection
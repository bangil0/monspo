@extends('layouts.default')

@section('konten')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor d-none d-lg-block d-xl-block">Data Pegawai</h4>
            <h4 class="text-themecolor d-block d-sm-none">Data Pegawai <br />SP2020 Online</h4>
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
    <div class="row">
    <div class="col-lg-12 col-sm-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
        @endif
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>PIC</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>NIP</th>
                          <th>JK</th>
                          <th>BPS</th>
                          <th>Unitkerja</th>
                          <th>Level</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if ($dataPegawai->isEmpty())
                                <td colspan="7" class="text-center"><b>Data pegawai tidak tersedia</b></td>
                            @else
                                @foreach ($dataPegawai as $item )
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <img class="img-circle" src="{{$item->urlfoto}}" alt="User profile picture" height="70px" width="70px">
                                        </td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->nipbaru}}</td>
                                        <td>
                                            @if ($item->jk == 1)
                                                Laki-laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td>{{$item->BPS->bps_nama}}</td>
                                        <td>{{$item->satuankerja}}</td>
                                        <td>{{$item->Level->level_nama}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            
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
@endsection
@section('js')
<!-- This is data table -->
<script src="{{asset('assets/node_modules/datatables/jquery.dataTables.min.js')}}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
$('#example').DataTable({
    dom: 'Bfrtip',
    "displayLength": 25,
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
</script>
@endsection
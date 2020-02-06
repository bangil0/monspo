<!-- modal add -->
<div id="TambahModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Dinas/OPD</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!--isi modal-->
                <form class="form-material m-t-20" name="formTIM" method="post" action="{{route('tim.simpan')}}">
                 @csrf
                @include('tim.formadmin')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-danger waves-effect waves-light">SIMPAN</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- /.add -->
<!-- modal edit -->
<div id="EditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Dinas/OPD</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!--isi modal-->
                <form class="floating-labels m-t-20" name="formOPD" method="post" action="{{route('opd.update')}}">
                 @csrf
                 <input type="hidden" name="opd_id" id="opd_id" value="" />
                 @include('opd.formadmin')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-danger waves-effect waves-light">UPDATE</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- /.edit -->
<!-- modal hapus -->
<div id="HapusModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Dinas/OPD</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!--isi modal-->
                <form class="floating-labels m-t-20" name="formOPD" method="post" action="{{route('opd.hapus')}}">
                 @csrf
                 <input type="hidden" name="opd_id" id="opd_id" value="" />
                 @include('opd.formadmin')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-danger waves-effect waves-light">HAPUS</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- /.hapus -->
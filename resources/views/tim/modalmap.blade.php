<!-- modal add pegawai -->
<div id="MappingModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Mapping Pegawai ke TIM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!--isi modal-->
                <form class="m-t-20" name="formMapping" method="post" action="{{route('tim.simpanmap')}}">
                    @csrf
                    <input type="hidden" name="tim_id" id="tim_id" value="" />
                    <input type="hidden" name="tim_kodebps" id="tim_kodebps" value="" />
                    <input type="hidden" name="tim_nama" id="tim_nama_text" value="" />
                    <input type="hidden" name="tim_bpsnama" id="tim_bpsnama_text" value="" />
                    <dl class="row">
                        <dt class="col-sm-4">Wilayah</dt>
                        <dd class="col-sm-8">: <span id="tim_bpsnama"></span></dd>
                        <dt class="col-sm-4">Nama TIM</dt>
                        <dd class="col-sm-8">: <span id="tim_nama"></span></dd>
                    </dl>
                    <div class="form-group">
                        <div class="input-group">
                            <select class="select-pegawai" id="pegawai" name="pegawai[]" multiple="multiple">
                                
                            </select>
                        </div>
                    </div>
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

<!-- modal add OPD -->
<div id="MapOpdModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Mapping OPD ke TIM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!--isi modal-->
                <form class="m-t-20" name="formMapping" method="post" action="{{route('tim.simpanopd')}}">
                    @csrf
                    <input type="hidden" name="tim_id" id="tim_id" value="" />
                    <input type="hidden" name="tim_kodebps" id="tim_kodebps" value="" />
                    <input type="hidden" name="tim_nama" id="tim_nama_text" value="" />
                    <input type="hidden" name="tim_bpsnama" id="tim_bpsnama_text" value="" />
                    <dl class="row">
                        <dt class="col-sm-4">Wilayah</dt>
                        <dd class="col-sm-8">: <span id="tim_bpsnama"></span></dd>
                        <dt class="col-sm-4">Nama TIM</dt>
                        <dd class="col-sm-8">: <span id="tim_nama"></span></dd>
                    </dl>
                    <div class="form-group">
                        <div class="input-group">
                            <select class="select-opd" id="opd" name="opd[]" multiple="multiple">
                                
                            </select>
                        </div>
                    </div>
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
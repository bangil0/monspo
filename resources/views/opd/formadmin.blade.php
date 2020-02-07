    <div class="form-group m-b-40">
        <select class="form-control p-0" id="wilayah" name="wilayah">
            <option value=""></option>
            @foreach ($dataBPS as $item)
                <option value="{{$item->bps_kode}}">{{$item->bps_nama}}</option>
            @endforeach
        </select><span class="bar"></span>
        <label for="input6">Wilayah</label>
    </div>
    <div class="form-group m-b-40">
        <input type="text" class="form-control" id="opd_nama" name="opd_nama"><span class="bar"></span>
        <label for="input9">Nama Dinas/OPD</label>
    </div>
    <div class="form-group m-b-40">
        <input type="text" class="form-control" id="opd_alamat" name="opd_alamat"><span class="bar"></span>
        <label for="opd_alamat">Alamat</label>
    </div>
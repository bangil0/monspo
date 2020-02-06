<div class="form-group">
    <div class="row">
        <label class="col-sm-12">Wilayah</label>
        <div class="col-sm-12">
            <select class="form-control" name="tim_kodebps" id="tim_kodebps">
                <option value=""></option>
                @foreach ($dataBPS as $item)
                <option value="{{$item->bps_kode}}">{{$item->bps_nama}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
    <div class="form-group">
        <div class="row">
            <label class="col-md-12" for="example-text">Nama TIM</span>
            </label>
            <div class="col-md-12">
                <input type="text" id="tim_nama" name="tim_nama" class="form-control" placeholder="Input nama TIM">
            </div>
        </div>
    </div>
    
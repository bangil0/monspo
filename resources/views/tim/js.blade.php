<script>
    $('#MappingModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var timid = button.data('timid') // Extract info from data-* attributes
    var timnama = button.data('timnama')
    var bpskode = button.data('bpskode')
    var bpsnama = button.data('bpsnama')
    $('#MappingModal .modal-body #pegawai').multiSelect('deselect_all');
    $.ajax({
        url : '{{route("pegawai.bps","")}}/'+bpskode,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data)
            {
            $('#MappingModal .modal-body #pegawai').multiSelect('refresh');
            $('#MappingModal .modal-body #tim_bpsnama').text(bpsnama);
            $('#MappingModal .modal-body #tim_nama').text(timnama);
            $('#MappingModal .modal-body #tim_bpsnama_text').val(bpsnama);
            $('#MappingModal .modal-body #tim_nama_text').val(timnama);
            $('#MappingModal .modal-body #tim_id').val(timid);
            $('#MappingModal .modal-body #tim_kodebps').val(bpskode);
            var pMax = data.peg_jumlah;
            var i;
            var dHasil = data.hasil;
            var text = '';
            for (i=0;i<pMax;i++)
            {
                //text +='<option value="'+dHasil[i].peg_nip+'">'+dHasil[i].peg_nama+'</option>';
                $('#MappingModal .modal-body #pegawai').multiSelect('addOption', { value: dHasil[i].peg_nip, text: dHasil[i].peg_nama, index: i });
            }
            
           
        },
        error: function()
        {
            alert("error");
        }

    });

    });
    $(".select2").select2();
    $('.select-pegawai').multiSelect({
        selectableHeader: "<div class='custom-header'>Pegawai BPS</div>",
        selectionHeader: "<div class='custom-header'>Pegawai Terpilih</div>",
    });
    $('.select-opd').multiSelect({
        selectableHeader: "<div class='custom-header'>Daftar OPD</div>",
        selectionHeader: "<div class='custom-header'>OPD Terpilih</div>",
    });
    $('#MapOpdModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var timid = button.data('timid') // Extract info from data-* attributes
    var timnama = button.data('timnama')
    var bpskode = button.data('bpskode')
    var bpsnama = button.data('bpsnama')
    $('#MapOpdModal .modal-body #opd').multiSelect('deselect_all');
    $.ajax({
        url : '{{route("opd.api","")}}/'+bpskode,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data)
            {
            $('#MapOpdModal .modal-body #opd').multiSelect('refresh');
            $('#MapOpdModal .modal-body #tim_bpsnama').text(bpsnama);
            $('#MapOpdModal .modal-body #tim_nama').text(timnama);
            $('#MapOpdModal .modal-body #tim_bpsnama_text').val(bpsnama);
            $('#MapOpdModal .modal-body #tim_nama_text').val(timnama);
            $('#MapOpdModal .modal-body #tim_id').val(timid);
            $('#MapOpdModal .modal-body #tim_kodebps').val(bpskode);
            var pMax = data.opd_jumlah;
            var i;
            var dHasil = data.hasil;
            var text = '';
            for (i=0;i<pMax;i++)
            {
                //text +='<option value="'+dHasil[i].peg_nip+'">'+dHasil[i].peg_nama+'</option>';
                $('#MapOpdModal .modal-body #opd').multiSelect('addOption', { value: dHasil[i].opd_id, text: dHasil[i].opd_nama, index: i });
            }
            
           
        },
        error: function()
        {
            alert("error");
        }

    });

    });
</script>
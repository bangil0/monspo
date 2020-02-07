<script>
    //data-id="{{$item->opd_id}}" data-kodebps="{{$item->opd_kodebps}}" data-nama="{{$item->opd_nama}}" data-alamat="{{$item->opd_alamat}}"
    $('#EditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var opd_id = button.data('id') // Extract info from data-* attributes
    var opd_kodebps = button.data('kodebps')
    var opd_nama = button.data('nama')
    var opd_alamat = button.data('alamat')

    var modal = $(this)
    modal.find('.modal-body #opd_id').val(opd_id)
    modal.find('.modal-body #wilayah').val(opd_kodebps)
    modal.find('.modal-body #opd_nama').val(opd_nama)
    modal.find('.modal-body #opd_alamat').val(opd_alamat)
    })

    $('#HapusModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var opd_id = button.data('id') // Extract info from data-* attributes
    var opd_kodebps = button.data('kodebps')
    var opd_nama = button.data('nama')
    var opd_alamat = button.data('alamat')

    var modal = $(this)
    modal.find('.modal-body #opd_id').val(opd_id)
    modal.find('.modal-body #wilayah').val(opd_kodebps)
    modal.find('.modal-body #opd_nama').val(opd_nama)
    modal.find('.modal-body #opd_alamat').val(opd_alamat)
    })
</script>
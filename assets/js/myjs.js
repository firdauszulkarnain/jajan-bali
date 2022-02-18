$(document).ready(function() { 
    
     // Update Modal
     $('#tambahStock').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#id_produk').attr("value", div.data('id_produk'));
      });

    var x = $('#mytabel').DataTable({
        "responsive" : true,
        "ordering": false,
        "lengthMenu": [
            [5, 10, 25, 40],
            [5, 10, 25, 40]
        ],
        "order": [[ 1, 'asc' ]],
    });
      x.on( 'order.dt search.dt', function () {
        x.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $('#mytabel tbody').on('click', '.tombol-hapus', function (e) {
        e.preventDefault();
        const form = $(this).parents('form');
        Swal.fire({
        title: 'Warning!',
        text: "Yakin Hapus Data?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#218838',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data!'
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
        })
    });

    // Flashdata
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
        title: 'Success',
        text: 'Berhasil ' + flashData,
        icon: 'success'
        });
    }


    // Flashdata Update Status
    $('#mytabel tbody tr td').on('click', '.tombol-status', function (e) {
        e.preventDefault();
        const form = $(this).parents('form');
        Swal.fire({
        title: 'Warning!',
        text: "Yakin Konfirmasi Pembayaran?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#218838',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Konfirmasi'
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
        })
    });

    // Flashdata Selesai
    $('#mytabel tbody').on('click', '.tombol-kirim', function (e) {
        e.preventDefault();
        const form = $(this).parents('form');
        Swal.fire({
        title: 'Warning!',
        text: "Yakin Kirim Pesanan?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#218838',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Kirim'
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
        })
    });

      // Flashdata Selesai
      $('#mytabel tbody').on('click', '.tombol-selesai', function (e) {
        e.preventDefault();
        const form = $(this).parents('form');
        Swal.fire({
        title: 'Warning!',
        text: "Yakin Selesaikan Pesanan?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#218838',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Selesai'
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
        })
    });

    $('.uang').mask('000.000.000.000', {
        reverse: true
      });

    var y = $('#tabel_produkBeli').DataTable({
        "responsive" : true,
        "lengthMenu": [
            [5, 10, 25, 50],
            [5, 10, 25, 50]
        ],
        "ordering": false,
        "order": [[ 1, 'asc' ]],
    });
      y.on( 'order.dt search.dt', function () {
        y.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $(".input-file").filestyle({
        'text' :'Choose File',
        'btnClass' :'btn-light border border-secondary px-4',
        'size' :'nr',
        'input' :true,
        'placeholder':'',
        'buttonBefore' :true,
    });
});
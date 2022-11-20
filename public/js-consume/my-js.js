

//======================================================================
//========================== Pilih deposit ===========================
//======================================================================
     
$('.pilih_deposit').change(function(){
     if ($(this).val() != "") {
          $('#jumlah').attr('disabled', false);
          $('.tidakinfoo').text('');
          $('.infoo').text('Form Pengisian Deposit Sudah Bisa di Isi');
          


     }
})

$('.hapus_deposit').on('click', function(e) {
     e.preventDefault();
     const hrefUrl_= $(this).attr('href')
   
     $("#btn-hapus-deposit").on("click", function(e){
          e.preventDefault();
          document.location.href=hrefUrl_;
     });

});

//======================================================================
//======================== modal tambah deposit ========================
//======================================================================

$('.tambah-deposit').click(function(){
     const id_deposit = $(this).data('id_deposit');
     const total_deposit = $(this).data('total_deposit');

     // alert(total_deposit)

     $('#id_deposit').val(id_deposit)
     $('#total_deposit').val(total_deposit)

     $("#modal_tambah_deposit").modal({
          backdrop: 'static',
          keyboard: true
     }); 

     $('#modal_tambah_deposit').modal('show')
})

//======================================================================
//======================== modal tarik tunai ===========================
//======================================================================

$('.tarik-tunai').click(function(){
     const id_deposit = $(this).data('id_deposit');
     const total_deposit = $(this).data('total_deposit');
     // alert(total_deposit)
     $('#tarik_id_deposit').val(id_deposit)
     $('#tarik_total_deposit').val(total_deposit)

     $("#modal_tarik_tunai").modal({
          backdrop: 'static',
          keyboard: true
     }); 

     $('#modal_tarik_tunai').modal('show')
})

//======================================================================
//======================== modal transfer ==============================
//======================================================================

$('.transfer').click(function(){
     const id_deposit = $(this).data('id_deposit');
     const total_deposit = $(this).data('total_deposit');
     // alert(total_deposit)
     $('#transfer_id_deposit').val(id_deposit)
     $('#transfer_total_deposit').val(total_deposit)

     $("#modal_transfer").modal({
          backdrop: 'static',
          keyboard: true
     }); 

     $('#modal_transfer').modal('show')
})


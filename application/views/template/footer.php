  </div>
  <?php
  $this->load->view('admin/v_footer');
  ?>
</div>

    <!-- jQuery 2.2.3 -->
    <script src="<?= base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
    
    <!-- <script src="<?= base_url().'assets/js/jquery-3.2.1.min.js'?>"></script> -->
 
    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
 
    <!-- DataTables -->
    <script src="<?= base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
    <script src="<?= base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url().'assets/dist/js/app.min.js'?>"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url().'assets/dist/js/demo.js'?>"></script>
    
    <script type="text/javascript" src="<?= base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>

    <!-- Chosen -->
    <script type="text/javascript" src="<?= base_url().'assets/js/chosen.jquery.js'?>"></script>

    <!-- Chosen init -->
    <script type="text/javascript" src="<?= base_url().'assets/js/init.js'?>"></script>

    <script type="text/javascript" src="<?= base_url().'assets/js/simple.money.format.js'?>"></script>
    
    <!-- page script -->
    <script>
      $(".money").simpleMoneyFormat();
      $("#transaksiBaru").hide();
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
      
      $(document).on("keypress", ".angkaSemua", function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          return false;
        }
      });

      // Add Transaksi
      $(document).on('click','#addTransaksi', function(){
        var nofak_jual ="";
        $('#transaksiBaru').hide();
        $('#transaksiSimpan').show();
        $('.cekBayar').show();
        $('#total_penjualan').val('');
        $('#total_bayar').val('');
        $('#total_kembali').val('');
        $('[name="no_faktur"]').val('');
        $("#kode_menu").val('');
        $('#kode_menu').trigger("chosen:updated");
        $('[name="qty"]').val('');
        $('[name="no_meja"]').val('');
        $('[name="no_meja"]').prop('disabled', false);
        $('.tampilkanDetails').load('<?= base_url(); ?>/admin/transaksi/transaksi_details',{nofak_jual:nofak_jual});
        $('.transaksiDetailsHapus').prop('disabled', false);
      });

      // Close Transaksi
      $(document).on('click','#transaksiClose', function(){
        $('#allTransaksi').load('<?= base_url(); ?>/admin/transaksi/transaksi_all_details');
      });

      // Transaksi Simpan
      $(document).on('click','#transaksiSimpan', function(){
        var idQty   = $('[name="qty"]').val();
        var idMeja  = $('[name="no_meja"]').val();
        if(idQty==""){
          alert('Qty belum diisi!');
          $('[name="qty"]').focus();
        }else if(idMeja==""){
          alert('No Meja belum diisi!');
          $('[name="idMeja"]').focus();
        }else{
          if(confirm('Data akan disimpaan?')){
            var no_faktur = $('[name="no_faktur"]').val();
            var data = $('#transaksiMenu').serialize();
            data = data + "&no_faktur="+no_faktur;
            $.ajax({
              method:'POST',
              data:data,
              url:"<?= base_url(); ?>/admin/transaksi/simpan_transaksi",
              cache:false,
              success:function(nofak_jual){
                $('[name="no_faktur"]').val(nofak_jual);
                $("#kode_menu").val('');
                $('#kode_menu').trigger("chosen:updated");
                $('[name="qty"]').val('');
                $('[name="no_meja"]').prop('disabled', true);
                $('.tampilkanDetails').load('<?= base_url(); ?>/admin/transaksi/transaksi_details',{nofak_jual:nofak_jual});
                $.ajax({
                  method:'POST',
                  data:{nofak_jual:nofak_jual},
                  url:"<?= base_url(); ?>/admin/transaksi/transaksi_hitung",
                  cache:false,
                  success:function(a){
                    $('[name="total_penjualan"]').val(a);
                  }
                });
              }
            });
          }else{
            preventDefault();
          }
        }
      });

      // Transaksi Hapus
      $(document).on('click','.transaksiDetailsHapus', function(){
        if(confirm('Data Yakin akan dihapus?')){
          var id          = $(this).attr('id');
          var nofak       = $(this).attr('id1');
          var nofak_jual  = $(this).attr('id1');
          $.ajax({
            method:'POST',
            data:{id:id, nofak:nofak},
            url:"<?= base_url(); ?>/admin/transaksi/transaksi_hapus",
            cache:false,
            success:function(){
              $('#allTransaksi').load('<?= base_url(); ?>/admin/transaksi/transaksi_all_details');
              $('.tampilkanDetails').load('<?= base_url(); ?>/admin/transaksi/transaksi_details',{nofak_jual:nofak_jual});
              $.ajax({
                  method:'POST',
                  data:{nofak_jual:nofak_jual},
                  url:"<?= base_url(); ?>/admin/transaksi/transaksi_hitung",
                  cache:false,
                  success:function(a){
                    $('[name="total_penjualan"]').val(a);
                  }
                });
            }
          });
        }else{
          preventDefault();
        }
      });

      // Cari Laporan
      $(document).on('click','.lapCari', function(){
        var pengguna_id = $('[name="pengguna_id"]').val();
        var tglDari     = $('[name="tglDari"]').val();
        var tglSampai   = $('[name="tglSampai"]').val();
        $.ajax({
          method:'POST',
          data:{tglDari:tglDari, tglSampai:tglSampai, pengguna_id:pengguna_id},
          url:"<?= base_url(); ?>/admin/laporan/laporan_details",
          cache:false,
          success:function(){
            $('#transPeriode').load('<?= base_url(); ?>/admin/laporan/laporan_details', {tglDari:tglDari, tglSampai:tglSampai, pengguna_id:pengguna_id});
          }
        });

      });

      // Cari Laporan Transaksi
      $(document).on('click','.lapCariTransaksi', function(){
        var pengguna_id = $('[name="pengguna_id"]').val();
        var tglDari     = $('[name="tglDari"]').val();
        var tglSampai   = $('[name="tglSampai"]').val();
        $.ajax({
          method:'POST',
          data:{tglDari:tglDari, tglSampai:tglSampai, pengguna_id:pengguna_id},
          url:"<?= base_url(); ?>/admin/transaksi/laporan_transaksi_details",
          cache:false,
          success:function(){
            $('#allTransaksi').load('<?= base_url(); ?>/admin/transaksi/laporan_transaksi_details', {tglDari:tglDari, tglSampai:tglSampai, pengguna_id:pengguna_id});
          }
        });

      });

      $(document).on('keyup', '#total_bayar', function() {
        var total_penjualan = $('#total_penjualan').val();
        var ttl_penjualan = total_penjualan.replace(",", "");
        var total_bayar = $('#total_bayar').val();
        var ttl_bayar = total_bayar.replaceAll(",", "");
        var a = parseInt(ttl_penjualan) - parseInt(ttl_bayar);
        const format = a.toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        const b = convert.join(',').split('').reverse().join('');
        $('[name="total_kembali"]').val(b);
      });

      $(document).on('click', '.cekBayar', function() {
        var total_penjualan = $('#total_penjualan').val();
        var total_bayar     = $('#total_bayar').val();
        if(total_penjualan ==""){
          alert('Belum ada transaksi!');
          return false;
        }else if(total_bayar=="" || total_bayar=="0"){
          return false;
        }else{
          $('#transaksiBaru').show();
          $('#transaksiSimpan').hide();
          $('.cekBayar').hide();
          $('.transaksiDetailsHapus').prop('disabled', true);
          return;
        }
      });

      $(document).on('click', '#transaksiBaru', function() {
        var nofak_jual = "";
        $('#transaksiBaru').hide();
        $('#transaksiSimpan').show();
        $('.cekBayar').show();
        $('#total_penjualan').val('');
        $('#total_bayar').val('');
        $('#total_kembali').val('');
        $('[name="no_faktur"]').val('');
        $("#kode_menu").val('');
        $('#kode_menu').trigger("chosen:updated");
        $('[name="qty"]').val('');
        $('[name="no_meja"]').val('');
        $('[name="no_meja"]').prop('disabled', false);
        $('.tampilkanDetails').load('<?= base_url(); ?>/admin/transaksi/transaksi_details',{nofak_jual:nofak_jual});
        $('.transaksiDetailsHapus').prop('disabled', false);
      });
    </script>

    <?php if($this->session->flashdata('msg')=='error'):?>
      <script type="text/javascript">
        $.toast({
          heading: 'Error',
          text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
          showHideTransition: 'slide',
          icon: 'error',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#FF4859'
        });
      </script>

    <!-- Simpan Sukses -->
    <?php elseif($this->session->flashdata('msg')=='success'):?>
      <script type="text/javascript">
        $.toast({
          heading: 'Success',
          text: "Data berhasil disimpan ke database.",
          showHideTransition: 'slide',
          icon: 'success',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#7EC857'
        });
      </script>

    <!-- Update -->
    <?php elseif($this->session->flashdata('msg')=='info'):?>
      <script type="text/javascript">
        $.toast({
          heading: 'Info',
          text: "Data berhasil diupdate",
          showHideTransition: 'slide',
          icon: 'info',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#00C9E6'
        });
      </script>

    <!-- Hapus -->
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
      <script type="text/javascript">
        $.toast({
          heading: 'Success',
          text: "Data berhasil dihapus.",
          showHideTransition: 'slide',
          icon: 'success',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#7EC857'
        });
      </script>
    
    <!-- Failed -->
    <?php elseif($this->session->flashdata('msg')=='failed'):?>
      <script type="text/javascript">
        $.toast({
          heading: 'Error',
          text: "Data gagal dieksekusi!",
          showHideTransition: 'slide',
          icon: 'error',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: 'red'
        });
      </script>

    <?php else:?>

    <?php endif;?>
  </body>
</html>

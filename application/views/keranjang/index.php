<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5><?php echo $judul; ?></h5>
              <div class="ibox-tools">
                  <a class="collapse-link">
                      <i class="fa fa-chevron-up"></i>
                  </a>
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-wrench"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><a href="#">Config option 1</a>
                      </li>
                      <li><a href="#">Config option 2</a>
                      </li>
                  </ul>
                  <a class="close-link">
                      <i class="fa fa-times"></i>
                  </a>
              </div>
          </div>
          <div class="ibox-content">
            <form id="transaksiForm" class="form-horizontal">
              <div class="form-group"><label class="col-sm-2 control-label">Id Barang</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_barang" name="id_barang" required="">
                  </div>
              </div>

              <!-- ################## AUTO COMPLETE ########################### -->
              <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required="">
                  </div>
              </div>

              <div class="form-group"><label class="col-sm-2 control-label">Stok</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="stok" required="">
                  </div>
              </div>

              <div class="form-group"><label class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="harga" required="">
                  </div>
              </div>

              <!-- ############################################################## -->

              <div class="form-group"><label class="col-sm-2 control-label">Jumlah Beli</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="jumlah" name="jumlah" required="">
                  </div>
              </div>

              <div class="form-group"><label class="col-sm-2 control-label">Total Harga</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="total">
                  </div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                  <a href="javascript:void(0);" class="btn btn-info" onclick="addChart()">Tambah</a>
                  </div>
              </div>
            </form>
            <br><br>

          <table id="table" class="table table-bordered table-hover" >
          <thead>
          <tr>
            <th>No</th>
      			<th>Nama Barang</th>
      			<th>Jumlah</th>
      			<th>Sub Total</th>
      			<th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
          </table>
            <a class="btn btn-success " href="javascript:void(0);" onclick="checkout()">Checkout</a><br><br>
          </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var table;
  $(document).ready(function(){

    $("#id_barang").keyup(function() {
      var barang = $('#id_barang').val();

        $.ajax({
          type      : 'POST',
          dataType  :'JSON',
          url       : '<?php echo site_url('keranjang/load_data_barang')?>',
          data      : 'parent_id='+barang,
          success:function(data){
              $('#nama_barang').val(data[0].nama_barang);
              $('#stok').val(data[0].stok);
              $('#harga').val(data[0].harga_jual);
          }
        });
    });

    function hitung() {

      var harga = $("#harga").val();
      var jumlah = $("#jumlah").val();

        if(harga>0 && jumlah>0){
        var total = parseInt(harga)*parseInt(jumlah);
        $("#total").val(total);

        }else{
        $("#total").val('');
        }
      }

      $("#harga").keyup(function(){
        hitung();
      });

      $("#jumlah").keyup(function(){
        hitung();
      });

      table = $('#table').DataTable({

        "processing"    : false,
        "serverSide"    : true,
        "order"         : [],

        "ajax"          : {
            "url"       : "<?php echo site_url('keranjang/ajax_list')?>",
            "type"      : "POST"
        },

        "columnDefs"    : [
        {
            "targets"   : [ -1 ],
            "orderable" : false,
        },
        ],

      });

    });

    function update(id_keranjang){
      var jumlah = $('#jumlahChart'+id_keranjang).val();
      var harga = $('#hargaChart'+id_keranjang).val();
      var total = jumlah*harga;
      // var id_keranjang = $('#id_keranjangChart').val();

      $.ajax({
        type    : 'POST',
        url     : '<?php echo site_url('keranjang/updateChart'); ?>',
        data    : 'sub_total='+total+'&jumlah='+jumlah+'&id_keranjang='+id_keranjang,
        success :function(msg){
          if(msg == 'success'){
              reload_table();
          }else{
              alert('Gagal update stok.');
          }
        }
      })
    }

    function checkout(){
      var total_final = $('#total_final').val();
      // alert(total_final);

      $.ajax({
        type    : 'POST',
        url     : '<?php echo site_url('penjualan/tambah'); ?>',
        data    : 'total_final='+total_final,
        success :function(msg){
          if(msg == 'success'){
            reload_table();
            alert('Berhasil checkout');
          }else{
            alert('Gagal checkout');
          }
        }
      });
    }

    function hapus(id){
      $.ajax({
        type    : 'POST',
        url     : '<?php echo site_url('keranjang/hapus'); ?>',
        data    : 'id='+id,
        success :function(msg){
          if(msg == 'success'){
              reload_table();
          }else{
              alert('Gagal menghapus data.');
          }
        }
      });
    }

    function addChart(){
      $.ajax({
        type    : 'POST',
        url     : '<?php echo site_url('keranjang/tambah'); ?>',
        data    : $('#transaksiForm').serialize(),
        success :function(msg){
          if(msg == 'success'){
            $('#transaksiForm')[0].reset();
            reload_table();
          }else{
            alert('Gagal insert data');
          }
        }
        });
    }


    function reload_table(){
      table.ajax.reload(null,false);
    }

</script>

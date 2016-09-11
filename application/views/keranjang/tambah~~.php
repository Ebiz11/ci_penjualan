<script type="text/javascript">
  $(document).ready(function(){

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

});
</script>

<div class="row">
  <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5><?php echo $judul; ?></small></h5>
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
      <?php
      if (isset($_SESSION['gagal']) && $_SESSION['gagal'] <> '') {
      echo  '<div class="gagal alert alert-danger alert-dismissable ">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="fa fa-exclamation-circle"></i>
      '.$_SESSION['gagal'].'</div>';
      }
      $_SESSION['gagal'] = '';

      ?>

    <form method="post" class="form-horizontal">
    <?php echo form_open('keranjang/tambah'); ?>
        <div class="form-group"><label class="col-sm-2 control-label">Id Barang</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?php echo @$_SESSION['post']['id_barang'] ?>" required="">
            </div>
        </div>

        <!-- ################## AUTO COMPLETE ########################### -->
        <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="nama_barang" required="">
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
              <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo @$_SESSION['post']['jumlah'] ?>" required="">
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
                <button class="btn btn-primary" type="submit" name="submit">Save </button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </form>
    </div>
    </div>
    </div>
    </div>

<script type="text/javascript">

  $(document).ready(function() {
    $("#id_barang").keyup(function() {
      var barang = $('#id_barang').val();
        $.post('<?php echo site_url('keranjang/load_data_barang')?>',
        {parent_id: barang},
        function(data){
           $('#nama_barang').val(data[0].nama_barang);
           $('#stok').val(data[0].stok);
           $('#harga').val(data[0].harga_jual);
        },'json'
          );
    });
  });
</script>

<?php
$no=1;
$total=0;
foreach ($keranjang as $row) { ?>

  <tr class="gradeX">
    <td> <?php echo $no++ ?></td>
    <td><?php echo $row['nama_barang'];?></td>
    <td><?php echo $row['jumlah'];?></td>
    <td><?php echo $hasil=$row['sub_total']/$row['jumlah'];?></td>
    <td><?php echo $row['sub_total'];?></td>
    <td><?php echo date("d-m-Y",strtotime($row['tanggal']));?></td>
    <td>
      <a href=" <?php echo site_url('keranjang/hapus/'.$row['id_keranjang']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
    </td>
  </tr>
  <?php
  $total=$total+$row['sub_total'];
 } ?>

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

            <div id="addForm">
              <form class="form-horizontal" id="form-insert">
                  <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Harga Beli</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Harga Jual</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Jumlah</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="stok" name="stok" required="">
                      </div>
                  </div>

                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                          <a href="javascript:void(0);" class="btn btn-primary" onclick="add()">Save </a>
                      </div>
                  </div>
              </form>
              <hr>
            </div>

            <div id="editForm">
              <form class="form-horizontal" id="form-update">
                  <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_barangEdit" name="nama_barangEdit" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Harga Beli</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="harga_beliEdit" name="harga_beliEdit" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Harga Jual</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="harga_jualEdit" name="harga_jualEdit" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Jumlah</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="stokEdit" name="stokEdit" required="">
                      </div>
                  </div>

                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                          <input type="hidden" class="form-control" id="id_barangEdit" name="id_barangEdit" required="">
                          <a href="javascript:void(0);" class="btn btn-primary" onclick="update()">Save </a>
                      </div>
                  </div>
              </form>
              <hr>
            </div>

            <a class="btn btn-primary" href="javascript:void(0);" onclick="$('#addForm').slideToggle();">Tambah</a>
            <br><br>
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Stok</th>
              <th>Tanggal</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody id="userData">
              <?php
              $no=1;
              foreach ($barang as $row) { ?>

                <tr class="gradeX">
                <td> <?php echo $no++ ?></td>
                <td><?php echo $row['nama_barang'];?></td>
                <td><?php echo number_format($row['harga_beli'],0,',','.');?></td>
                <td><?php echo number_format($row['harga_jual'],0,',','.');?></td>
                <td><?php echo $row['stok'];?></td>
                <td><?php echo date("d-m-Y",strtotime($row['tanggal']));?></td>
                <td>
                  <a href="<?php echo site_url('pembelian/tambah_stok/'.$row['id_barang'])?>" class="btn btn-xs btn-info">Tambah</a>
                </td>
                <td>
                  <a href="javascript:void(0);"  onclick="editBarang('<?php echo $row['id_barang']; ?>')" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                  <a href="javascript:void(0);"  onclick="return confirm('Are you sure to delete data?')? hapus('<?php echo $row['id_barang']; ?>'):false;" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>

<script>

  $(document).ready(function(){
    $('#addForm').hide();
    $('#editForm').hide();
  });

  function getData(){
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('barang/getData'); ?>',
      data: 'data=load',
      success:function(html){
        $('#userData').html(html);
      }
    });
  }

  function add(){
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('barang/tambah'); ?>',
      data: $('#form-insert').serialize(),
      success:function(msg){
        if(msg == 'success'){
          $('#form-insert')[0].reset();
          getData();
          $('#addForm').slideUp();
        }else{
          alert('Gagal insert data');
        }
      }
      });
    }

  function editBarang(id){
    $.ajax({
      type: 'POST',
      dataType:'JSON',
      url: '<?php echo site_url('barang/detail_barang'); ?>',
      data: 'id='+id,
      success:function(data){
        $('#id_barangEdit').val(data.id_barang);
        $('#nama_barangEdit').val(data.nama_barang);
        $('#harga_beliEdit').val(data.harga_beli);
        $('#harga_jualEdit').val(data.harga_jual);
        $('#stokEdit').val(data.stok);
        $('#editForm').slideDown();
      }
    });
  }

  function update(){
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('barang/update'); ?>',
      data: $('#form-update').serialize(),
      success:function(msg){
        if(msg == 'success'){
            $('#form-update')[0].reset();
            getData();
            $('#editForm').slideUp();
        }else{
            alert('Gagal update data.');
        }
      }
    });
  }

  function hapus(id){
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('barang/hapus'); ?>',
      data: 'id='+id,
      success:function(msg){
        if(msg == 'success'){
            getData();
        }else{
            alert('Gagal menghapus data.');
        }
      }
    });
  }

</script>

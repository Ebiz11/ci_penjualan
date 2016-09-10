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
              <form method="post" class="form-horizontal">
              <?php echo form_open('barang/tambah'); ?>
                  <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_barang" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Harga Beli</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" name="harga_beli" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Harga Jual</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" name="harga_jual" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Stok</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" name="stok" required="">
                      </div>
                  </div>

                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                          <a class="btn  btn-primary" href="<?php echo site_url('admin/barang')?>">Cancel </a>
                          <button class="btn  btn-primary" type="submit" name="submit">Save </button>
                      </div>
                  </div>
                  <?php echo form_close(); ?>
              </form>
          </div>
      </div>
  </div>
</div>

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

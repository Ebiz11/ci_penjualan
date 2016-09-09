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
              <?php echo form_open('barang/edit/'. $edit['id_barang']); ?>
                  <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_barang" required="" value="<?php echo $edit['nama_barang'] ?>">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Harga Beli</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="harga_beli" required="" value="<?php echo $edit['harga_beli'] ?>">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Harga Jual</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="harga_jual" required="" value="<?php echo $edit['harga_jual'] ?>">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Stok</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="stok" required="" value="<?php echo $edit['stok'] ?>">
                      </div>
                  </div>

                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                          <a class="btn btn-xs btn-primary" href="<?php echo site_url('admin/barang')?>">Cancel </a>
                          <button class="btn btn-xs btn-primary" type="submit" name="submit">Save </button>
                      </div>
                  </div>
                  <?php echo form_close(); ?>
              </form>
          </div>
      </div>
  </div>
</div>

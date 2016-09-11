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
              <?php echo form_open('pembelian/tambah_stok'); ?>
                  <!-- <div class="form-group"><label class="col-sm-2 control-label">Id Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_barang" required="">
                      </div>
                  </div> -->

                  <!-- <div class="form-group"><label class="col-sm-2 control-label">Id Transaksi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_transaksi" required="">
                      </div>
                  </div> -->

                  <div class="form-group"><label class="col-sm-2 control-label">Jumlah</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="jumlah" required="">
                      </div>
                  </div>

                  <div class="form-group"><label class="col-sm-2 control-label">Sub Total</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="sub_total" required="">
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

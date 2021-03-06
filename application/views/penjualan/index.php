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
          <table class="table table-striped table-bordered table-hover dataTables-example" >
          <thead>
          <tr>
            <th>No</th>
      			<th>Id Transaksi</th>
      			<th>Total</th>
      			<th>Details</th>
      			<th>Tanggal</th>
      			<th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
        		foreach ($penjualan as $row) { ?>

              <tr class="gradeX">
                <td> <?php echo $no++ ?></td>
          			<td><?php echo $row['id_transaksi'];?></td>
          			<td><?php echo number_format($row['total'],0,',','.');?></td>
                <td><a href="<?php echo site_url('penjualan/details/'.$row['id_transaksi']) ?>" >detail</a></td>
          			<td><?php echo date("d-m-Y",strtotime($row['tanggal']));?></td>
                <td>
                  <a href=" <?php echo site_url('penjualan/hapus/'.$row['id_penjualan']); ?>" disabled="" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                </td>
          		</tr>
          		<?php } ?>
          </table>
          </div>
      </div>
    </div>
  </div>
</div>

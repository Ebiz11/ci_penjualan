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
      			<th>Nama Barang</th>
      			<th>Jumlah</th>
      			<th>Harga Satuan</th>
      			<th>Sub Total</th>
      			<th>Tanggal</th>
      			<th>Aksi</th>
          </tr>
          </thead>
          <tbody>
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
          </table>
            <a class="btn btn-success " href="<?php echo site_url('penjualan/tambah/'.$total)?>">Checkout</a><br><br>
          </div>
      </div>
    </div>
  </div>
</div>

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
                          <a href="javascript:void(0);" class="btn btn-white" onclick="$('#addForm').slideUp()">Cancel</a>
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
                        <a href="javascript:void(0);" class="btn btn-white" onclick="$('#editForm').slideUp()">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="update()">Save </a>
                    </div>
                </div>
            </form>
            <hr>
          </div>

          <div id="stokForm">
            <form class="form-horizontal" id="updateStok">
              <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-5">
                    <input type="text" disabled="" class="form-control" id="nama_barangStok" name="jumlah" required="">
                  </div>
              </div>

              <div class="form-group"><label class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="jumlahStok" name="jumlahStok" required="">
                  </div>
              </div>

              <div class="form-group"><label class="col-sm-2 control-label">Sub Total</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="sub_totalStok" name="sub_totalStok" required="">
                  </div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                      <input type="hidden" class="form-control" id="id_barangStok" name="id_barangStok" required="">
                      <a href="javascript:void(0);" class="btn btn-white" onclick="$('#stokForm').slideUp()">Cancel</a>
                      <a href="javascript:void(0);" class="btn btn-primary" onclick="updateStok()">Update</a>
                  </div>
              </div>
            </form>
            <hr>
          </div>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="$('#addForm').slideToggle(); $('#editForm').slideUp(); $('#stokForm').slideUp();">Tambah</a>
          <br><br>
          <table id="table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  <th>Stok</th>
                  <!-- <th>Tanggal</th> -->
                  <th>Tambah Stok</th>
                  <th>Aksi</th>
                </tr>
            </thead>
          <tbody>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var table;

  $(document).ready(function(){

    table = $('#table').DataTable({

      "processing"    : false,
      "serverSide"    : true,
      "order"         : [],

      "ajax"          : {
          "url"       : "<?php echo site_url('barang/ajax_list')?>",
          "type"      : "POST"
      },

      "columnDefs"    : [
      {
          "targets"   : [ -1 ],
          "orderable" : false,
      },
      ],

    });

    $('#addForm').hide();
    $('#editForm').hide();
    $('#stokForm').hide();
  });

  function reload_table(){
    table.ajax.reload(null,false);
  }

  function add(){
    if ($('#form-insert').find('#harga_jual').val() < $('#form-insert').find('#harga_beli').val()) {
      alert('Harga jual tidak boleh lebih kecil dari harga beli!');
    }else{
      $.ajax({
        type    : 'POST',
        url     : '<?php echo site_url('barang/tambah'); ?>',
        data    : $('#form-insert').serialize(),
        success :function(msg){
          if(msg == 'success'){
            $('#form-insert')[0].reset();
            reload_table();
            $('#addForm').slideUp();
          }else{
            alert('Gagal insert data');
          }
        }
        });
      }
    }

  function editBarang(id){
    $('#addForm').slideUp();
    $('#stokForm').slideUp();
    $.ajax({
      type      : 'POST',
      dataType  :'JSON',
      url       : '<?php echo site_url('barang/detail_barang'); ?>',
      data      : 'id='+id,
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

  function addStok(id){
    $('#addForm').slideUp();
    $('#editForm').slideUp();

    $.ajax({
      type      : 'POST',
      dataType  : 'JSON',
      url       : '<?php echo site_url('barang/detail_barang'); ?>',
      data      : 'id='+id,
      success:function(data){
        $('#id_barangStok').val(data.id_barang);
        $('#nama_barangStok').val(data.nama_barang);
        $('#stokForm').slideDown();
      }
    })
  }

  function updateStok(){
    $.ajax({
      type    : 'POST',
      url     : '<?php echo site_url('barang/update_stok'); ?>',
      data    : $('#updateStok').serialize(),
      success :function(msg){
        if(msg == 'success'){
            $('#updateStok')[0].reset();
            reload_table();
            $('#stokForm').slideUp();
        }else{
            alert('Gagal update stok.');
        }
      }
    })
  }

  function update(){
    $.ajax({
      type    : 'POST',
      url     : '<?php echo site_url('barang/update'); ?>',
      data    : $('#form-update').serialize(),
      success :function(msg){
        if(msg == 'success'){
            $('#form-update')[0].reset();
            reload_table();
            $('#editForm').slideUp();
        }else{
            alert('Gagal update data.');
        }
      }
    });
  }

  function hapus(id){
    $.ajax({
      type    : 'POST',
      url     : '<?php echo site_url('barang/hapus'); ?>',
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

</script>

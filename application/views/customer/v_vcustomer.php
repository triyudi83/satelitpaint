<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Customer
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('customer'); ?>">Data Customer</a></li>>
        <li class="active">Lihat Data Customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lihat Data Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_Customer/editc')?>">
              <div class="box-body">
                <?php foreach ($customer as $customer) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Customer</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="namacustomer" value="<?php echo $customer->namacustomer ?>" readonly>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $customer->id_customer ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="prov" name="prov" style="width: 100%;" readonly>
                      <option value="<?php echo $customer->id_provinsi ?>"><?php echo $customer->name_prov ?></option>
                      <?php foreach ($provinsi as $provinsi) { ?>
                      <option value="<?php echo $provinsi->id_provinsi ?>"><?php echo $provinsi->name_prov ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kota" name="kota" style="width: 100%;" readonly>
                      <option value="<?php echo $customer->id_kota ?>"><?php echo $customer->name_kota ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;" readonly>
                      <option value="<?php echo $customer->id_kecamatan ?>"><?php echo $customer->kecamatan ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" readonly><?php echo $customer->alamat ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telepon </label>
                  <div class="col-xs-4 ">
                    <input type="text" class="form-control col-xs-4" id="tlp_Customer" name="tlp" value="<?php echo $customer->tlp ?>"  maxlength="12" minlength="8" onkeypress="return Angkasaja(event)" readonly>
                  </div>
                  <label for="inputEmail3" class="col-sm-1 control-label">Hp </label>
                  <div class="col-xs-4 ">
                    <input type="text" class="form-control col-xs-4" id="tlp_Customer" name="hp" placeholder="HP"  maxlength="12" minlength="8" value="<?php echo $customer->hp ?>" readonly onkeypress="return Angkasaja(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Limit</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="rupiah" name="limit" readonly value=" Rp. <?php echo number_format($customer->limit,0,",","."); ?>">
                    <input type="hidden" class="form-control" id="hutang" name="hutang" value="<?php echo $customer->hutang; ?>">
                  </div>
                </div>
              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('customer'); ?>" class="btn btn-default">Kembali</a>
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
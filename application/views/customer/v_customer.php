<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Customer
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('customer'); ?>">Data Master</a></li>
        <li class="active">Data Customer</li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('SUCCESS')) { ?>
       <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Success!</h5>
          Data berhasil di perbarui.
        </div>                 
      <?php } ?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Customer</h3>
            </div>

            <?php if($aksesedit == 'aktif'){?>
            <div class="box-header">
              <a href="<?php echo site_url('customer-add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
          <?php } ?>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Tlp</th>
                  <th>Limit</th>
                  <th>Hutang</th>
                  <th>Sisa Limit</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($customer as $customer) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $customer->namacustomer; ?></td>
                  <td><?php echo $customer->alamat.','.$customer->name_prov.', '.$customer->name_kota.', '.$customer->kecamatan ; ?></td>
                  <td><?php echo $customer->tlp.' / '.$customer->hp; ?></td>
                  <td><?php echo 'Rp. '.number_format($customer->limit); ?></td>
                  <td><?php echo 'Rp. '.number_format($customer->hutang); ?></td>
                  <td><?php echo 'Rp. '.number_format($customer->sisalimit); ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('customer-view/'.$customer->id_customer); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <?php if($aksesedit == 'aktif'){?>
                      <a href="<?php echo site_url('customer-edit/'.$customer->id_customer); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                    <?php } if($akseshapus == 'aktif'){ ?>
                      <a href="<?php echo site_url('C_Customer/hapus/'.$customer->id_customer); ?>" onclick="return confirm('Apakah Anda Yakin ?')"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                    <?php } ?>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hak Akses Login
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('setting'); ?>">Setting</a></li>
        <li class="active">Hak Akses Login</li>
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
              <h3 class="box-title">Hak Akses Login</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tipe User</th>
                  <th width="120">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td><?php echo '1'; ?></td>
                  <td><?php echo 'Administrator'; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('akses-admin'); ?>"><button type="button" class="btn btn-success">Hak Akses Login</button></a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><?php echo '2'; ?></td>
                  <td><?php echo 'Kasir'; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('akses-kasir'); ?>"><button type="button" class="btn btn-success">Hak Akses Login</button></a>
                    </div>
                  </td>
                </tr>
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
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_User'); ?>">Data User</a></li>>
        <li class="active">Lihat Data User</li>
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
              <h3 class="box-title">Lihat Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_User/edituser')?>">
              <div class="box-body">
                <?php foreach ($user as $user) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user->nama ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user->id_user ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tipe User</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="tipeuser" name="tipeuser" style="width: 100%;">
                      
                      <option value="Administrator" <?php if ($user->tipeuser == 'administrator' ){ echo "selected"; } ?> >Administrator</option>
                      <option value="Kasir" <?php if ($user->tipeuser == 'kasir' ){ echo "selected"; } ?> >Kasir</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user->username ?>">
                  <span id="pesan"></span>
                  </div>
                </div>
              <?php } ?>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('user'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Simpan Data</button>
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
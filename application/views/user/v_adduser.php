 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i>Data Master</a></li>
        <li><a href="<?php echo site_url('user'); ?>">Data User</a></li>
        <li class="active">Tambah Data User</li>
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
              <h3 class="box-title">Tambah Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_User/tambah')?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namauser" name="nama" placeholder="Nama">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tipe User</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="tipeuser" name="tipeuser" style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <option value="administrator">administrator</option>
                      <option value="kasir">Kasir</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" maxlength="8" name="username" placeholder="Username" onkeyup="cek_username()">
                  <span id="pesanusername"></span>
                  <span style="color: red;" id="makkarakter">8 Karakter</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" maxlength="8" id="password" name="password" placeholder="Password">
                  <span style="color: red;">8 Karakter</span>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('user'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info" id="tambah">Tambah Data</button>
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
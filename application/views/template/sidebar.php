
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">&nbsp;
          <img src="<?php echo base_url() ?>assets/images/administrator.jpg" class="img-circle" alt="User Image">
        </div>
        <p>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama');
          $id = $this->session->userdata('id_user');?>
          </p>

          <a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-circle text-success"></i>
            </a>
        </div></p>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($master as $master) { 
          ?>
          <li <?php if($activeMenu == $master->id_menu){echo 'class="active"';} ?> >
            <a href="<?php echo site_url($master->linkmenu); ?>">
              <i class="<?php echo $master->icon; ?>"></i> <span><?php echo $master->menu; ?></span>
            </a>
          </li>
        <?php } ?>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa  fa-circle-o"></i> <span>Stok</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($stok as $stok) { ?>
          <li <?php if($activeMenu == $stok->id_menu){echo 'class="active"';} ?> >
            <a href="<?php echo site_url($stok->linkmenu); ?>">
              <i class="<?php echo $stok->icon; ?>"></i> <span><?php echo $stok->menu; ?></span>
            </a>
          </li>
        <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-circle-o"></i> <span>Produksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($produksi as $produksi) { ?>
          <li <?php if($activeMenu == $produksi->id_menu){echo 'class="active"';} ?> >
            <a href="<?php echo site_url($produksi->linkmenu); ?>">
              <i class="<?php echo $produksi->icon; ?>"></i> <span><?php echo $produksi->menu; ?></span>
            </a>
          </li>
        <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-circle-o"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($transaksi as $transaksi) { ?>
          <li <?php if($activeMenu == $transaksi->id_menu){echo 'class="active"';} ?> >
            <a href="<?php echo site_url($transaksi->linkmenu); ?>">
              <i class="<?php echo $transaksi->icon; ?>"></i> <span><?php echo $transaksi->menu; ?></span>
            </a>
          </li>
        <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-circle-o"></i> <span>Accounting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($acc as $acc) { ?>
          <li <?php if($activeMenu == $acc->id_menu){echo 'class="active"';} ?> >
            <a href="<?php echo site_url($acc->linkmenu); ?>">
              <i class="<?php echo $acc->icon; ?>"></i> <span><?php echo $acc->menu; ?></span>
            </a>
          </li>
        <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-circle-o"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($laporan as $laporan) { ?>
          <li <?php if($activeMenu == $laporan->id_menu){echo 'class="active"';} ?> >
            <a href="<?php echo site_url($laporan->linkmenu); ?>">
              <i class="<?php echo $laporan->icon; ?>"></i> <span><?php echo $laporan->menu; ?></span>
            </a>
          </li>
        <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-circle-o"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($setting as $setting) { ?>
          <li <?php if($activeMenu == $setting->id_menu){echo 'class="active"';} ?> >
            <a href="<?php echo site_url($setting->linkmenu); ?>">
              <i class="<?php echo $setting->icon; ?>"></i> <span><?php echo $setting->menu; ?></span>
            </a>
          </li>
        <?php } ?>

          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
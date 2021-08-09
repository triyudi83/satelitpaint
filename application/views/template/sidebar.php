
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
            <?php $level = $this->db->query("select * from tb_anggota where id_anggota = '$id'");
              $querydonasi = $level->result();
              if ($id != '1'){
                foreach ($querydonasi as $key) {
                  echo 'Level '.$key->level;
                } }
               ?></a>
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
        <li <?php if($menujenis == 'komunitas'){echo 'class="treeview active"';} else { echo 'class = 
        "treeview"'; } ?> >
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>Komunitas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($menukom as $menu) { 
          $a = $menu->id_menu; 
          ?>
          <li <?php if($activeMenu == $menu->id_menu){echo 'class="active"';} ?> >
            <a href="<?php echo site_url($menu->link); ?>">
              <i class="<?php echo $menu->icon; ?>"></i> <span><?php echo $menu->menu; ?></span>
            </a>
          </li>
        <?php } ?>
          </ul>
        </li>
        <li <?php if($menujenis == 'pos'){echo 'class="treeview active"';} else { echo 'class = 
        "treeview"'; } ?> >
          <a href="#">
            <i class="fa fa-money"></i> <span>POS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($menupos as $menupos) { 
          $a = $menupos->id_menu; 
          ?>
          <li <?php if($activeMenu == $menupos->id_menu){echo 'class="active"';} ?> >
            <a href="<?php echo site_url($menupos->link); ?>">
              <i class="<?php echo $menupos->icon; ?>"></i> <span><?php echo $menupos->menu; ?></span>
            </a>
          </li>
        <?php } ?>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
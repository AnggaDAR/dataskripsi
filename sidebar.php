<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['profpic'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
          	<?php echo $_SESSION['username']; ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a>          
        </li>
		<?php
        if ($_SESSION['role']=="admin") {
        ?> 
		<li>
          <a href="input_dosen_form.php">
            <i class="fa fa-files-o"></i>
            <span>Input Data Dosen</span>
          </a>          
        </li>
        <li>
          <a href="input_form.php">
            <i class="fa fa-files-o"></i>
            <span>Input Data Skripsi</span>
          </a>          
        </li>
		<li>
          <a href="input_form.php">
            <i class="fa fa-files-o"></i>
            <span>Cek Data Skripsi</span>
          </a>          
        </li>
        <li>
          <a href="data_view_simondec.php">
            <i class="fa fa-table"></i> 
            <span>Cetak Laporan</span>
          </a>          
        </li>       
        <?php
        } else if($_SESSION['role']=="student"){
        ?>
        <li>
          <a href="input_form.php">
            <i class="fa fa-files-o"></i>
            <span>Upload Data Skripsi</span>
          </a>          
        </li>
        <li>
          <a href="data_view_simondec.php">
            <i class="fa fa-table"></i> 
            <span>Cetak Laporan</span>
          </a>          
        </li>   
		<?php
        } 
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="main-sidebar-bg"></div>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">REKAMJASA <sup>v1</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Beranda -->
    <li class="nav-item <?=isset($home)?'active':'';?>">
        <a class="nav-link" href="?#">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <?php if($_SESSION['level']=='Admin' || $_SESSION['level']=='User'):?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?=isset($master)?'active':'';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true"
            aria-controls="master">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master</span>
        </a>
        <div id="master" class="collapse <?=isset($master)?'show':'';?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?=isset($jenis_jasa)?'active':'';?>" href="?jenis_jasa">Jenis Jasa</a>
                <?php if($_SESSION['level']=='Admin'):?>
                <a class="collapse-item <?=isset($pengguna)?'active':'';?>" href="?pengguna">Pengguna</a>
                <?php endif; ?>
            </div>
        </div>
    </li>
    <?php endif; ?>
    <?php if($_SESSION['level']=='Admin' || $_SESSION['level']=='User'):?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?=isset($transaksi)?'active':'';?>">
        <a class="nav-link" href="?transaksi">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Transaksi</span>
        </a>
    </li>
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <!-- <img alt="image" class="img-circle" src="img/profile_small.jpg" /> -->
                         </span>
                    <!-- <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Lustria Ebiz</strong>
                         </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a> -->
                    <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul> -->
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li>
                <a href="<?php echo site_url('admin/index')?>"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
                <a href="<?php echo site_url('admin/transaksi')?>"><i class=" fa fa-exchange"></i> <span class="nav-label">Transaksi</span></a>
                <a href="<?php echo site_url('admin/keranjang')?>"><i class=" fa fa-money"></i> <span class="nav-label">Keranjang</span></a>
                <a href="<?php echo site_url('admin/barang')?>"><i class="fa fa-folder-o"></i> <span class="nav-label">Master Barang</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo site_url('admin/penjualan')?>">Penjualan</a></li>
                    <li><a href="<?php echo site_url('admin/pembelian')?>">Pembelian</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Chart</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo site_url('penjualan/chart')?>">Penjualan</a></li>
                    <li><a href="<?php echo site_url('pembelian/chart')?>">Pembelian</a></li>
                    <li><a href="<?php echo site_url('barang/chart')?>">Stok Barang</a></li>
                </ul>
            </li>

        </ul>

    </div>
</nav>


        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?php echo base_url('login/logout'); ?>">
                        <i class="fa fa-sign-out"></i> Log out
                        <!-- {elapsed_time} -->
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Admnistrator</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Aplikasi</a>
                        </li>
                        <li class="active">
                            <strong>Administrator</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

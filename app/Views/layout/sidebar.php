<style>

</style>
<!-- Page Wrapper -->
<div id="wrapper">

    <?php if (session()->get('role_id') == 1) : ?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-text mx-3"><sup>LP</sup>UG</div>
                <div class="sidebar-brand-icon rotate-n-1">
                    <i class="fas fa-graduation-cap"></i>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fab fa-fw fa-google-wallet"></i>
                    <span>Waiting List</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-cyan py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item purple" href="/admin/woracle"><sup><i class="fas fa-fw fa-database"></sup></i></i>Oracle</a>
                        <a class="collapse-item purple" href="/admin/wsap"><sup><i class="fas fa-fw fa-tasks"></i></sup>Sap</a>
                        <a class="collapse-item purple" href="/admin/wciscomlm"><sup><i class="fas fa-fw fa-network-wired"></i></sup>Cisco Malam</a>
                        <a class="collapse-item purple" href="/admin/wciscosabtu"><sup><i class="fas fa-fw fa-network-wired"></i></sup>Cisco Sabtu</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-usd"></i>
                    <span>Blanko</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-cyan py-2 collapse-inner rounded">

                        <a class="collapse-item purple" href="/admin/Boracle"> <sup><i class="fas fa-fw fa-database"></sup></i></i>Oracle</a>
                        <a class="collapse-item purple" href="/admin/Bsap"><sup><i class="fas fa-fw fa-tasks"></i></sup>Sap</a>
                        <a class="collapse-item purple" href="/admin/Bciscom"><sup><i class="fas fa-fw fa-network-wired"></i></sup>Cisco Malam</a>
                        <a class="collapse-item purple" href="/admin/Bciscos"><sup><i class="fas fa-fw fa-network-wired"></i></sup>Cisco Sabtu</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUt" aria-expanded="true" aria-controls="collapseUt">
                    <i class="fas fa-fw fa-play"></i>
                    <span>OnGoing</span>
                </a>
                <div id="collapseUt" class="collapse" aria-labelledby="headingUt" data-parent="#accordionSidebar">
                    <div class="bg-cyan py-2 collapse-inner rounded">

                        <a class="collapse-item purple" href="/admin/onproveorac"> <sup><i class="fas fa-fw fa-database"></sup></i></i>Oracle</a>
                        <a class="collapse-item purple" href="/admin/onprovesap"><sup><i class="fas fa-fw fa-tasks"></i></sup>Sap</a>
                        <a class="collapse-item purple" href="/admin/onprovecism"><sup><i class="fas fa-fw fa-network-wired"></i></sup>Cisco Malam</a>
                        <a class="collapse-item purple" href="/admin/onproveciss"><sup><i class="fas fa-fw fa-network-wired"></i></sup>Cisco Sabtu</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->

            <!-- <hr class="sidebar-divider">
            <div class="dropdown">
                <button class="btn ini  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-stopwatch"></i> Periode
                </button>
                <div class="dropdown-menu ini" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item bie" href="/admin/periodora">Oracle</a>
                    <a class="dropdown-item bie" href="/admin/periodsap">Sap</a>
                    <a class="dropdown-item bie" href="/admin/periodcisco">Cisco</a>
                </div>
            </div> -->

            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
    <?php endif; ?>

    <!--  ========================================================================================== -->
    <?php if (session()->get('role_id') == 2) : ?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">

                <div class="sidebar-brand-text mx-3"><sup>LP</sup>UG</div>
                <div class="sidebar-brand-icon rotate-n-1">
                    <i class="fas fa-graduation-cap"></i>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/user/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>
            <?php if (session()->get('oracle') == 1 or session()->get('sap') == 1 or session()->get('cisco_malam') == 1 or session()->get('cisco_sabtu') == 1) : ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fab fa-fw fa-google-wallet"></i>
                        <span>Waiting List</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-cyan py-2 collapse-inner rounded">
                            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                            <?php if (session()->get('oracle') == 1) : ?>
                                <a class="collapse-item purple" href="/user/woracle"><sup><i class="fas fa-fw fa-database"></sup></i></i>Oracle</a>
                            <?php endif; ?>
                            <?php if (session()->get('sap') == 1) : ?>
                                <a class="collapse-item purple" href="/user/wsap"><sup><i class="fas fa-fw fa-tasks"></i></sup>Sap</a>
                            <?php endif; ?>
                            <?php if (session()->get('cisco_malam') == 1) : ?>
                                <a class="collapse-item purple" href="/user/wciscomlm"><sup><i class="fas fa-fw fa-network-wired"></i></sup>Cisco Malam</a>
                            <?php endif; ?>
                            <?php if (session()->get('cisco_sabtu') == 1) : ?>
                                <a class="collapse-item purple" href="/user/wciscosabtu"><sup><i class="fas fa-fw fa-network-wired"></i></sup>Cisco Sabtu</a>
                            <?php endif; ?>

                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <!-- Nav Item - Utilities Collapse Menu -->
            <?php if (session()->get('oracle') == 2 or session()->get('sap') == 2 or session()->get('cisco_malam') == 2 or session()->get('cisco_sabtu') == 2 or session()->get('oracle') == session()->get('npm') or session()->get('sap') == session()->get('npm') or session()->get('cisco_malam') == session()->get('npm') or session()->get('cisco_sabtu') == session()->get('npm')) : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-usd"></i>
                        <span>Blanko</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-cyan py-2 collapse-inner rounded">

                            <?php if (session()->get('oracle') == 2 or session()->get('oracle') == session()->get('npm')) : ?>
                                <a class="collapse-item" href="/user/boracle"> <sup><i class="fas fa-fw fa-database"></sup></i></i>Oracle</a>
                            <?php endif; ?>
                            <?php if (session()->get('sap') == 2 or session()->get('sap') == session()->get('npm')) : ?>
                                <a class="collapse-item" href="/user/bsap"><sup><i class="fas fa-fw fa-tasks"></i></sup>Sap</a>
                            <?php endif; ?>
                            <?php if (session()->get('cisco_malam') == 2 or session()->get('cisco_malam') == session()->get('npm')) : ?>
                                <a class="collapse-item" href="/user/bciscomlm"><sup><i class="fas fa-fw fa-network-wired"></i></sup>Cisco Malam</a>
                            <?php endif; ?>
                            <?php if (session()->get('cisco_sabtu') == 2 or session()->get('cisco_sabtu') == session()->get('npm')) : ?>
                                <a class="collapse-item" href="/user/bciscosabtu"><sup><i class="fas fa-fw fa-network-wired"></i></sup>Cisco Sabtu</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>-->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
    <?php endif; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
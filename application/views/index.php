<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>API SIM RS Persahabatan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">API Sim RS</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="<?= base_url('api/dashboard') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="<?= base_url('api/index') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Data
                            </a>
                            <a class="nav-link" href="<?= base_url('api/ListData') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                List File
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">LIST DATA API RS PERSAHABATAN</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">TABLE DATA ALL</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Table Api
                            </div>
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No RM</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Dokumen</th>
                                            <th>Tanggal Masuk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($data as $data)
                                    {
                                    ?>
                                        <tr>
                                        <td><?php echo $data['id'] ?></td>
                                        <td><?php
                                        $nama_pasien="";
                                        foreach ($data['metadata'] as $metadata){
                                                if ($metadata['properties']['item_type']=="rm_pasien"){
                                                    $no_field=1;
                                                    foreach ($metadata['properties']['fields'] as $fields){
                                                        if ($no_field==2){
                                                            echo $fields['value'];
                                                            $nama_pasien=$fields['value'];
                                                        }
                                                        $no_field++;
                                                    }
                                                }
                                        }
                                        ?></td>
                                        <td><?php
                                        $no_rekam_medik="";
                                        foreach ($data['metadata'] as $metadata){
                                                if ($metadata['properties']['item_type']=="rm_pasien"){
                                                    $no_field=1;
                                                    foreach ($metadata['properties']['fields'] as $fields){
                                                        if ($no_field==1){
                                                            echo $fields['value'];
                                                            $no_rekam_medik=$fields['value'];
                                                        }
                                                        $no_field++;
                                                    }
                                                }
                                        }
                                        ?></td>
                                        <td><?php
                                        $tanggal_lahir="";
                                        foreach ($data['metadata'] as $metadata){
                                                if ($metadata['properties']['item_type']=="rm_pasien"){
                                                    $no_field=1;
                                                    foreach ($metadata['properties']['fields'] as $fields){
                                                        if ($no_field==3){
                                                            echo $fields['value'];
                                                            $tanggal_lahir=$fields['value'];
                                                        }
                                                        $no_field++;
                                                    }
                                                }
                                        }
                                        ?></td>
                                        <td><?php
                                        $jenis_dokumen="";
                                        foreach ($data['metadata'] as $metadata){
                                                if ($metadata['properties']['item_type']=="rm_pasien"){
                                                    $no_field=1;
                                                    foreach ($metadata['properties']['fields'] as $fields){
                                                        if ($no_field==4){
                                                            echo $fields['value'];
                                                            $jenis_dokumen=$fields['value'];
                                                        }
                                                        $no_field++;
                                                    }
                                                }
                                        }
                                        ?></td>
                                        <td><?php
                                        $tanggal_masuk="";
                                        foreach ($data['metadata'] as $metadata){
                                                if ($metadata['properties']['item_type']=="rm_pasien"){
                                                    $no_field=1;
                                                    foreach ($metadata['properties']['fields'] as $fields){
                                                        if ($no_field==5){
                                                            echo $fields['value'];
                                                            $tanggal_masuk=$fields['value'];
                                                        }
                                                        $no_field++;
                                                    }
                                                }
                                        }
                                        ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>assets/js/datatables-simple-demo.js"></script>
    </body>
</html>

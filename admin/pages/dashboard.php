<div class="container">
    <div class="page-inner">

        <!-- HEADER -->
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-3">
            <div>
                <h3 class="fw-bold mb-2">Dashboard</h3>
                <h6 class="op-7 mb-0">Selamat Datang di Halaman Admin!</h6>
            </div>
        </div>

        <!-- STAT CARD -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="card card-stats card-round">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">

                            <!-- ICON -->
                            <div class="d-flex align-items-center">
                                <div class="icon-big text-center icon-primary bubble-shadow-small me-3">
                                    <i class="fas fa-users"></i>
                                </div>

                                <!-- TEXT -->
                                <div class="numbers">
                                    <p class="card-category mb-1">Visitors</p>
                                    <h4 class="card-title mb-0">1,294</h4>
                                </div>
                            </div>

                            <!-- OPTIONAL RIGHT INFO (BIAR BALANCE) -->
                            <div class="text-end">
                                <small class="text-muted">Today</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- CHART + NOTIFICATION (SEJAJAR) -->
        <div class="row">

            <!-- CHART -->
            <div class="col-md-8">
                <div class="card card-round h-100">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">User Statistics</div>
                            <div class="card-tools">
                                <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                    <span class="btn-label">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    Export
                                </a>
                                <a href="#" class="btn btn-label-info btn-round btn-sm">
                                    <span class="btn-label">
                                        <i class="fa fa-print"></i>
                                    </span>
                                    Print
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="min-height: 300px;">
                            <canvas id="statisticsChart"></canvas>
                        </div>
                        <div id="myChartLegend"></div>
                    </div>
                </div>
            </div>

            <!-- NOTIFICATION -->
            <div class="col-md-4">
                <div class="card card-round h-100">
                    <div class="card-body">
                        <div class="card-head-row card-tools-still-right mb-3">
                            <div class="card-title">Notification Form</div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <button
                                        class="btn btn-icon btn-clean me-0"
                                        type="button"
                                        id="dropdownMenuButton"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-list py-2">
                            <div class="item-list">
                                <div class="avatar">
                                    <img
                                        src="../template/admin/assets/img/jm_denis.jpg"
                                        alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                                <div class="info-user ms-3">
                                    <div class="username">Jimmy Denis</div>
                                    <div class="status">Graphic Designer</div>
                                </div>
                                <button class="btn btn-icon btn-link op-8 me-1">
                                    <i class="far fa-envelope"></i>
                                </button>
                                <button class="btn btn-icon btn-link btn-danger op-8">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
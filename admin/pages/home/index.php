<?php
include "../connection.php";
$ambil = $conn->query("SELECT * FROM home");
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">DataTables.Net</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <!-- Modal -->
                        <div
                            class="modal fade"
                            id="addRowModal"
                            tabindex="-1"
                            role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold"> New</span>
                                            <span class="fw-light"> Row </span>
                                        </h5>
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="small">
                                            Create a new row using this form, make sure you
                                            fill them all
                                        </p>
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Name</label>
                                                        <input
                                                            id="addName"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="fill name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pe-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Position</label>
                                                        <input
                                                            id="addPosition"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="fill position" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Office</label>
                                                        <input
                                                            id="addOffice"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="fill office" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button
                                            type="button"
                                            id="addRowButton"
                                            class="btn btn-primary">
                                            Add
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-danger"
                                            data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                id="add-row"
                                class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Job</th>
                                        <th>Image</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    $data = mysqli_query($conn, "SELECT * FROM home");
                                    while ($row = mysqli_fetch_assoc($data)) {

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= htmlspecialchars ($row['title']) ?></td>
                                            <td><?= $row['job'] ?></td>
                                            <td><?= $row['image'] ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="index.php?fitur=home-update&id=<?= $row['id'] ?>" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                                    <a href="index.php?fitur=home-delete=<?= $row['id'] ?>" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "../connection.php";

//RUMUS CREATE
if (isset($_POST['create'])) {
    $list = $_POST['list'];
    $sublist = $_POST['sublist'];
    $query = "INSERT INTO about (list,sublist) VALUES ('$list', '$sublist')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil ditambahin!');
            window.location.href='index.php?fitur=about';
            </script>";
        exit;
    } else {
        echo "Gagal menambah data!";
    }
}

//RUMUS READ ONLY
$data = mysqli_query($conn, "SELECT * FROM about ORDER BY id ASC");
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
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Add Row</h4>
                            <button
                                class="btn btn-primary btn-round ms-auto"
                                data-bs-toggle="modal"
                                data-bs-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Add Row
                            </button>
                        </div>
                    </div>
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
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>List</label>
                                                        <input
                                                            type="text"
                                                            name="list"
                                                            class="form-control"
                                                            placeholder="fill name"
                                                            required />
                                                    </div>

                                                    <div class="form-group form-group-default">
                                                        <label>sublist</label>
                                                        <input
                                                            id="sublist"
                                                            type="text"
                                                            name="sublist"
                                                            class="form-control"
                                                            placeholder="fill sublist"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button
                                                    type="submit"
                                                    name="create"
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
                                        </form>
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
                                        <td>Image</td>
                                        <th>title</th>
                                        <th>Desc-Title</th>
                                        <th>Sub-Title</th>
                                        <th>Desc-Sub-Title</th>
                                        <th>List</th>
                                        <th>Sub-List</th>
                                        <th>Desc-Closing</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    $data = mysqli_query($conn, "SELECT * FROM about");
                                    while ($row = mysqli_fetch_assoc($data)) {

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <?php if (!empty($row['image'])) : ?>
                                                    <img src="/personal-profile-native-akel/public/about/<?= $row['image'] ?>"
                                                        width="60" class="rounded">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $row['title'] ?></td>
                                            <td><?= $row['desctitle'] ?></td>
                                            <td><?= $row['subtitle'] ?></td>
                                            <td><?= $row['descsubtitle'] ?></td>
                                            <td><?= $row['list'] ?></td>
                                            <td><?= $row['sublist'] ?></td>
                                            <td><?= $row['closingdesc'] ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="index.php?fitur=about-update&id=<?= $row['id'] ?>" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                                    <a href="index.php?fitur=about-delete=<?= $row['id'] ?>" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
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
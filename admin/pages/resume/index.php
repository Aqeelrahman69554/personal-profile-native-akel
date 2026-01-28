<?php
include "../connection.php";

// rumus create
if (isset($_POST['create'])) {
    $listsubtitle1 = $_POST['listsubtitle-1'];
    $listsubtitle2 = $_POST['listsubtitle-2'];
    $listsubtitle3 = $_POST['listsubtitle-3'];
    $listsubtitle4 = $_POST['listsubtitle-4'];


    $query = "INSERT INTO resum (`listsubtitle-1`, `listsubtitle-2`, `listsubtitle-3`, `listsubtitle-4`) VALUES ('$listsubtitle1', '$listsubtitle2', '$listsubtitle3', '$listsubtitle4')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
        alert('Data berhasil Ditambahkan');
        window.location.href='index.php?fitur=resume';
        </script>";
        exit;
    } else {
        echo "data gagal ditambahkan";
    }
}


$ambil = $conn->query("SELECT * FROM resum");
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
                    <a href="#">Data About</a>
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
                                                        <label>List Subtitle-1</label>
                                                        <input
                                                            id="addName"
                                                            type="text"
                                                            name="listsubtitle-1"
                                                            class="form-control"
                                                            placeholder="fill list" />
                                                    </div>

                                                    <div class="form-group form-group-default">
                                                        <label>List Subtitle-2</label>
                                                        <input
                                                            id="addName"
                                                            type="text"
                                                            name="listsubtitle-2"
                                                            class="form-control"
                                                            placeholder="fill list" />
                                                    </div>

                                                    <div class="form-group form-group-default">
                                                        <label>List Subtitle-3</label>
                                                        <input
                                                            id="addName"
                                                            type="text"
                                                            name="listsubtitle-3"
                                                            class="form-control"
                                                            placeholder="fill list" />
                                                    </div>

                                                    <div class="form-group form-group-default">
                                                        <label>List Subtitle-4</label>
                                                        <input
                                                            id="addName"
                                                            type="text"
                                                            name="listsubtitle-4"
                                                            class="form-control"
                                                            placeholder="fill list" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pe-0">
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
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>

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
                                        <th>Title Resume</th>
                                        <th>Description Title Resume</th>
                                        <th>Title-1</th>
                                        <th>Subtitle-1</th>
                                        <th>Year-1</th>
                                        <th>Description Subtitle-1</th>
                                        <th>List Subtitle-1</th>
                                        <th>Title-2</th>
                                        <th>Subtitle-2</th>
                                        <th>Year-2</th>
                                        <th>Description Subtitle-2</th>
                                        <th>List Subtitle-2</th>
                                        <th>Title-3</th>
                                        <th>Subtitle-3</th>
                                        <th>Year-3</th>
                                        <th>Description Subtitle-3</th>
                                        <th>List Subtitle-3</th>
                                        <th>Subtitle-4</th>
                                        <th>Year-4</th>
                                        <th>Description Subtitle-4</th>
                                        <th>List Subtitle-4</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $no = 1;
                                    $data = mysqli_query($conn, "SELECT * FROM resum");
                                    while ($row = mysqli_fetch_assoc($data)) {

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['resume'] ?></td>
                                            <td><?= $row['descresume'] ?></td>
                                            <td><?= $row['title-1'] ?></td>
                                            <td><?= $row['subtitle-1'] ?></td>
                                            <td><?= $row['year-1'] ?></td>
                                            <td><?= $row['descsubtitle-1'] ?></td>
                                            <td><?= $row['listsubtitle-1'] ?></td>
                                            <td><?= $row['title-2'] ?></td>
                                            <td><?= $row['subtitle-2'] ?></td>
                                            <td><?= $row['year-2'] ?></td>
                                            <td><?= $row['descsubtitle-2'] ?></td>
                                            <td><?= $row['listsubtitle-2'] ?></td>
                                            <td><?= $row['title-3'] ?></td>
                                            <td><?= $row['subtitle-3'] ?></td>
                                            <td><?= $row['year-3'] ?></td>
                                            <td><?= $row['descsubtitle-3'] ?></td>
                                            <td><?= $row['listsubtitle-3'] ?></td>
                                            <td><?= $row['subtitle-4'] ?></td>
                                            <td><?= $row['year-4'] ?></td>
                                            <td><?= $row['descsubtitle-4'] ?></td>
                                            <td><?= $row['listsubtitle-4'] ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="index.php?fitur=resume-update&id=<?= $row['id'] ?>" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                                    <a href="index.php?fitur=resume-delete&id=<?= $row['id'] ?>" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
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
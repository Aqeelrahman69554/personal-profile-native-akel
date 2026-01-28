<?php
include "../connection.php";

// rumus create
if (isset($_POST['create'])) {
    $skill = $_POST['skilltitle'];
    $query = "INSERT INTO skills (skillTitle) VALUES ('$skill')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil ditambahin!');
            window.location.href='index.php?fitur=skill';
            </script>";
        exit;
    } else {
        echo "gagal menambah data";
    }
}
$ambil = $conn->query("SELECT * FROM skills");
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
                                                        <label>Skill Title</label>
                                                        <input
                                                            id="addName"
                                                            type="text"
                                                            name="skilltitle"
                                                            class="form-control"
                                                            placeholder="fill name" />
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
                                            data-bs-dismiss="modal">
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Skill Title</th>
                                        <th>Percentage</th>
                                        <th>Icon</th>
                                        <th>Icon Number</th>
                                        <th>Icon Description</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    $data = mysqli_query($conn, "SELECT * FROM skills");
                                    while ($row = mysqli_fetch_assoc($data)) {

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><?= $row['description'] ?></td>
                                            <td><?= $row['skillTitle'] ?></td>
                                            <td><?= $row['percentage'] ?></td>
                                            <td><?= $row['icon'] ?></td>
                                            <td><?= $row['iconNumber'] ?></td>
                                            <td><?= $row['iconDescription'] ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="index.php?fitur=skill-update&id=<?= $row['id'] ?>" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                                    <a href="index.php?fitur=skill-delete&id=<?= $row['id'] ?>" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
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
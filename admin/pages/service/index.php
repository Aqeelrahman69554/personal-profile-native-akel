<?php
include "../connection.php";

if (isset($_POST['create'])) {
    $id    = $_POST['id'];
    $title1 = $_POST['title-1'];
    $desctitle1 = $_POST['desctitle-1'];
    $icon = $_POST['icon'];
    $subtitle1 = $_POST['subtitle-1'];
    $descsubtitle1 = $_POST['descsubtitle-1'];
    $title2 = $_POST['title-2'];
    $desctitle2 = $_POST['desctitle-2'];
    $coment = $_POST['coment'];
    $imgcoment = $_POST['image-coment'];
    $name = $_POST['name'];
    $status  = $_POST['status'];

    $query = "INSERT INTO services (`title-1`,`desctitle-1`,icon,`subtitle-1`,`descsubtitle-1`,`title-2`,`desctitle-2`,`coment`,`image-coment`,name,status) VALUES ('$title1','$desctitle1','$icon','$subtitle1','$descsubtitle1','$title2','$desctitle2','$coment','$imgcoment','$status','$status')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil ditambahin!');
            window.location.href='index.php?fitur=service';
            </script>";
        exit;
    } else {
        echo "Gagal menambah data!";
    }
}
$ambil = $conn->query("SELECT * FROM services");
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
                                        <th>Title-1</th>
                                        <th>Description Title-1</th>
                                        <th>Icon</th>
                                        <th>Subtitle-1</th>
                                        <th>Description Subtitle-1</th>
                                        <th>Title-2</th>
                                        <th>Description Title-2</th>
                                        <th>Coment</th>
                                        <th>Image Coment</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    $data = mysqli_query($conn, "SELECT * FROM services");
                                    while ($row = mysqli_fetch_assoc($data)) {

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['title-1'] ?></td>
                                            <td><?= $row['desctitle-1'] ?></td>
                                            <td><?= $row['icon'] ?></td>
                                            <td><?= $row['subtitle-1'] ?></td>
                                            <td><?= $row['descsubtitle-1'] ?></td>
                                            <td><?= $row['title-2'] ?></td>
                                            <td><?= $row['desctitle-2'] ?></td>
                                            <td><?= $row['coment'] ?></td>
                                            <td>
                                                <?php if (!empty($row['image-coment'])) : ?>
                                                    <img src="/personal-profile-native-akel/public/servi/<?= $row['image-coment'] ?>"
                                                        width="60" class="rounded">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['status'] ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="index.php?fitur=service-update&id=<?= $row['id'] ?>" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                                    <a href="index.php?fitur=service-delete=<?= $row['id'] ?>" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
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
<?php
include __DIR__ . "/../../../connection.php";
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "id tidak ditemukan";
    exit;
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $percentage = $_POST['percentage'];
    $icon = $_POST['icon'];
    $iconnumber = $_POST['iconNumber'];
    $icondesc = $_POST['iconDescription'];

    $query = "UPDATE skills SET title='$title', description='$desc', percentage='$percentage', icon='$icon', iconNumber='$iconnumber', iconDescription='$icondesc' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href='index.php?fitur=skill';
            </script>";
        exit;
    } else {
        echo "ID tidak ditemukan";
        exit;
    }
}


$data = mysqli_query($conn, "SELECT * FROM skills WHERE id='$id'");
$row  = mysqli_fetch_assoc($data);

?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Resume</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Update Data Resume</div>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['title'] ?? ''); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Skill Title</label>
                                        <input type="text" name="description"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['skillTitle'] ?? ''); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="description"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['description'] ?? ''); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Percentage</label>
                                        <input type="text" name="percentage"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['percentage'] ?? ''); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Icon</label>
                                        <input type="text" name="icon"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['icon'] ?? ''); ?>">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Icon Number</label>
                                        <input type="text" name="iconNumber"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['iconNumber'] ?? ''); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Icon Description</label>
                                        <input type="text" name="iconDescription"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['iconDescription'] ?? ''); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" name="update" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update
                                </button>
                                <a href="index.php?fitur=skill" class="btn btn-danger">
                                    Batal
                                </a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
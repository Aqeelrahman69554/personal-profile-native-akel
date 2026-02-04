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

                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <div class="card-title text-white">Update Data Resume</div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 border-end">
                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Title</label>
                                        <input type="text" name="title" class="form-control"
                                            value="<?= htmlspecialchars($row['title'] ?? ''); ?>">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Skill Title</label>
                                        <input type="text" name="skillTitle" class="form-control"
                                            value="<?= htmlspecialchars($row['skillTitle'] ?? ''); ?>">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Description</label>
                                        <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($row['description'] ?? ''); ?></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Percentage</label>
                                        <input type="text" name="percentage" class="form-control"
                                            value="<?= htmlspecialchars($row['percentage'] ?? ''); ?>">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Icon</label>
                                        <input type="text" name="icon" class="form-control"
                                            value="<?= htmlspecialchars($row['icon'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6 bg-light p-3">
                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Icon Number</label>
                                        <input type="text" name="iconNumber" class="form-control"
                                            value="<?= htmlspecialchars($row['iconNumber'] ?? ''); ?>">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Icon Description</label>
                                        <textarea name="iconDescription" class="form-control" rows="4"><?= htmlspecialchars($row['iconDescription'] ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top text-end">
                            <a href="index.php?fitur=skill" class="btn btn-outline-danger me-2">
                                <i class="fa fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" name="update" class="btn btn-primary px-4">
                                <i class="fa fa-save me-1"></i> Update Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
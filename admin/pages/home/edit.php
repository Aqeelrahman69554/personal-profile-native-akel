<?php
ob_start();
include __DIR__ . "/../../../connection.php";

if (isset($_POST['update'])) {
    $id    = $_POST['id'];
    $title = $_POST['title'];
    $job   = $_POST['job'];

    // IMAGE
    if (!empty($_FILES['image']['name'])) {
        $image = time() . "_" . $_FILES['image']['name'];
        $tmp   = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp,  __DIR__ . "/../../../public/home/" . $image);

        $query = "UPDATE home SET title='$title', job='$job', image='$image' WHERE id='$id'";
    } else {
        $query = "UPDATE home SET title='$title', job='$job' WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href='index.php?fitur=home';
          </script>";
        exit;
    } else {
        echo "Gagal update data!";
    }
}
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}
$data = mysqli_query($conn, "SELECT * FROM home WHERE id='$id'");
$row  = mysqli_fetch_assoc($data);
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Home</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Update Data Home</div>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['title']); ?>"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label>Job</label>
                                        <input type="text" name="job"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['job']); ?>"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control">

                                        <?php if (!empty($row['image'])) : ?>
                                            <small class="text-muted d-block mt-2">
                                                Current Image
                                            </small>
                                            <img src="../../../uploads/<?= $row['image']; ?>"
                                                width="120"
                                                class="rounded mt-1">
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" name="update" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a href="index.php" class="btn btn-danger">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
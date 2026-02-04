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

                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <div class="card-title text-white">Update Data Home</div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 border-end">
                                    <h5 class="text-primary mb-3 fw-bold">
                                        <i class="fas fa-home me-2"></i> Informasi Utama
                                    </h5>
                                    
                                    <div class="row">
                                        <div class="col-md-12 form-group mb-3">
                                            <label class="fw-bold">Title</label>
                                            <input type="text" name="title"
                                                class="form-control"
                                                value="<?= htmlspecialchars($row['title']); ?>"
                                                required>
                                        </div>

                                        <div class="col-md-12 form-group mb-3">
                                            <label class="fw-bold">Job</label>
                                            <input type="text" name="job"
                                                class="form-control"
                                                value="<?= htmlspecialchars($row['job']); ?>"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 bg-light p-3">
                                    <h5 class="text-primary mb-3 fw-bold">
                                        <i class="fas fa-image me-2"></i> Media Visual
                                    </h5>
                                    <div class="alert alert-info py-2 mb-3" style="font-size: 0.85rem;">
                                        <i class="fas fa-info-circle"></i> Gunakan gambar dengan resolusi yang baik untuk tampilan maksimal.
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Image Profile</label>
                                        <input type="file" name="image" class="form-control shadow-sm">
                                        
                                        <?php if (!empty($row['image'])) : ?>
                                            <div class="mt-3 text-center">
                                                <small class="text-muted d-block mb-2">Current Image</small>
                                                <img src="../../../uploads/<?= $row['image']; ?>"
                                                    width="150"
                                                    class="rounded shadow-sm border">
                                                <div class="mt-1">
                                                    <small class="text-primary fw-bold"><?= $row['image']; ?></small>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top text-end">
                            <a href="index.php?fitur=home" class="btn btn-outline-danger me-2">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" name="update" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
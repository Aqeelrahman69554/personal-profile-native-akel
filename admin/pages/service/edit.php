<?php
include __DIR__ . "/../../../connection.php";

if (isset($_POST['update'])) {
    $id    = $_POST['id'];
    $title1 = $_POST['title-1'];
    $desctitle1 = $_POST['desctitle-1'];
    $icon = $_POST['icon'];
    $subtitle1 = $_POST['subtitle-1'];
    $descsubtitle1 = $_POST['descsubtitle-1'];
    $title2 = $_POST['title-2'];
    $desctitle2 = $_POST['desctitle-2'];
    $coment = $_POST['coment'];
    $name = $_POST['name'];
    $status  = $_POST['status'];

    // IMAGE
    if (!empty($_FILES['image-coment']['name'])) {
        $image = time() . "_" . $_FILES['image-coment']['name'];
        $tmp   = $_FILES['image-coment']['tmp_name'];
        move_uploaded_file($tmp,  __DIR__ . "/../../../public/servi/" . $image);

        $query = "UPDATE services SET `title-1`='$title1', `desctitle-1`='$desctitle1', icon='$icon', `subtitle-1`='$subtitle1', `descsubtitle-1`='$descsubtitle1', `title-2`='$title2', `desctitle-2`='$desctitle2', coment='$coment', `image-coment`='$image', name='$name', status='$status' WHERE id='$id'";
    } else {
        $query = "UPDATE services SET `title-1`='$title1', `desctitle-1`='$desctitle1', icon='$icon', `subtitle-1`='$subtitle1', `descsubtitle-1`='$descsubtitle1', `title-2`='$title2', `desctitle-2`='$desctitle2', coment='$coment', name='$name', status='$status' WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href='index.php?fitur=service';
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
$data = mysqli_query($conn, "SELECT * FROM services WHERE id='$id'");
$row  = mysqli_fetch_assoc($data);

// Tentukan kategori berdasarkan ID
$isHeader      = ($row['id'] == 1);
$isContent     = ($row['id'] >= 2 && $row['id'] <= 7);
$isTestimonial = ($row['id'] > 7);

function setStatus($condition)
{
    return $condition ? '' : 'disabled style="background-color: #e9ecef; cursor: not-allowed;"';
}
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Service</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <div class="card-title text-white">Update Data Service</div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 border-end">
                                    <h5 class="text-primary mb-3 fw-bold"><i class="fas fa-heading me-2"></i> Kategori 1: Header</h5>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="fw-bold">Title-1</label>
                                            <input type="text" name="title-1" class="form-control"
                                                value="<?= htmlspecialchars($row['title-1'] ?? ''); ?>" <?= setStatus($isHeader) ?>>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="fw-bold">Title-2</label>
                                            <input type="text" name="title-2" class="form-control"
                                                value="<?= htmlspecialchars($row['title-2'] ?? ''); ?>" <?= setStatus($isHeader) ?>>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="fw-bold">Desc Title-1</label>
                                            <textarea name="desctitle-1" class="form-control" rows="5" placeholder="Masukkan deskripsi header di sini..." <?= setStatus($isHeader) ?>><?= htmlspecialchars($row['desctitle-1'] ?? ''); ?></textarea>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <h5 class="text-primary mb-3 fw-bold"><i class="fas fa-concierge-bell me-2"></i> Kategori 2: Service Content</h5>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="fw-bold">Icon Class</label>
                                            <input type="text" name="icon" class="form-control"
                                                value="<?= htmlspecialchars($row['icon'] ?? ''); ?>" <?= setStatus($isContent) ?>>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="fw-bold">Subtitle-1</label>
                                            <input type="text" name="subtitle-1" class="form-control"
                                                value="<?= htmlspecialchars($row['subtitle-1'] ?? ''); ?>" <?= setStatus($isContent) ?>>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="fw-bold">Desc Subtitle-1</label>
                                            <textarea name="descsubtitle-1" class="form-control" rows="3" <?= setStatus($isContent) ?>><?= htmlspecialchars($row['descsubtitle-1'] ?? ''); ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 bg-light p-3">
                                    <h5 class="text-primary mb-3 fw-bold"><i class="fas fa-quote-left me-2"></i> Kategori 3: Testimonials</h5>
                                    <div class="alert alert-info py-2 mb-3" style="font-size: 0.85rem;">
                                        <i class="fas fa-info-circle"></i> Bagian ini khusus untuk manajemen ulasan dan testimoni klien.
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Name</label>
                                        <input type="text" name="name" class="form-control shadow-sm"
                                            value="<?= htmlspecialchars($row['name'] ?? ''); ?>" <?= setStatus($isTestimonial) ?>>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Status/Job</label>
                                        <input type="text" name="status" class="form-control shadow-sm"
                                            value="<?= htmlspecialchars($row['status'] ?? ''); ?>" <?= setStatus($isTestimonial) ?>>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Coment</label>
                                        <textarea name="coment" class="form-control shadow-sm" rows="4" <?= setStatus($isTestimonial) ?>><?= htmlspecialchars($row['coment'] ?? ''); ?></textarea>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label class="fw-bold">Image Coment</label>
                                        <input type="file" name="image-coment" class="form-control shadow-sm" <?= setStatus($isTestimonial) ?>>
                                        <?php if(!empty($row['image-coment'])): ?>
                                            <div class="mt-2">
                                                <small class="text-primary fw-bold">Current Image: <?= $row['image-coment'] ?></small>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top text-end">
                            <a href="index.php?fitur=service" class="btn btn-outline-danger me-2">
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
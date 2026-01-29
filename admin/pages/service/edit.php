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

//rumus 3 kategori

// Tentukan kategori berdasarkan ID sesuai data di SQL Anda
$isHeader      = ($row['id'] == 1); 
$isContent     = ($row['id'] >= 2 && $row['id'] <= 7);
$isTestimonial = ($row['id'] > 7);

// Fungsi pembantu agar kode HTML lebih bersih
function setStatus($condition) {
    return $condition ? '' : 'disabled style="background-color: #e9ecef; cursor: not-allowed;"';
}

// Contoh Logika PHP agar data lama tetap terjaga
$title1 = $_POST['title-1'] ?? $row['title-1'];
$icon   = $_POST['icon'] ?? $row['icon'];
$name   = $_POST['name'] ?? $row['name'];

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

    <div class="row">
        <div class="col-md-4">
            <h5 class="fw-bold">Kategori 1: Header</h5>
            <div class="form-group">
                <label>Title-1</label>
                <input type="text" name="title-1" class="form-control" 
                       value="<?= htmlspecialchars($row['title-1'] ?? ''); ?>" <?= setStatus($isHeader) ?>>
            </div>
            <div class="form-group">
                <label>Desc Title-1</label>
                <textarea name="desctitle-1" class="form-control" <?= setStatus($isHeader) ?>><?= htmlspecialchars($row['desctitle-1'] ?? ''); ?></textarea>
            </div>
            <div class="form-group">
                <label>Title-2</label>
                <input type="text" name="title-2" class="form-control" 
                       value="<?= htmlspecialchars($row['title-2'] ?? ''); ?>" <?= setStatus($isHeader) ?>>
            </div>
        </div>

        <div class="col-md-4">
            <h5 class="fw-bold">Kategori 2: Service Content</h5>
            <div class="form-group">
                <label>Icon Class</label>
                <input type="text" name="icon" class="form-control" 
                       value="<?= htmlspecialchars($row['icon'] ?? ''); ?>" <?= setStatus($isContent) ?>>
            </div>
            <div class="form-group">
                <label>Subtitle-1</label>
                <input type="text" name="subtitle-1" class="form-control" 
                       value="<?= htmlspecialchars($row['subtitle-1'] ?? ''); ?>" <?= setStatus($isContent) ?>>
            </div>
            <div class="form-group">
                <label>Desc Subtitle-1</label>
                <textarea name="descsubtitle-1" class="form-control" <?= setStatus($isContent) ?>><?= htmlspecialchars($row['descsubtitle-1'] ?? ''); ?></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <h5 class="fw-bold">Kategori 3: Testimonials</h5>
            <div class="form-group">
                <label>Coment</label>
                <textarea name="coment" class="form-control" <?= setStatus($isTestimonial) ?>><?= htmlspecialchars($row['coment'] ?? ''); ?></textarea>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" 
                       value="<?= htmlspecialchars($row['name'] ?? ''); ?>" <?= setStatus($isTestimonial) ?>>
            </div>
            <div class="form-group">
                <label>Status/Job</label>
                <input type="text" name="status" class="form-control" 
                       value="<?= htmlspecialchars($row['status'] ?? ''); ?>" <?= setStatus($isTestimonial) ?>>
            </div>
            <div class="form-group">
                <label>Image Coment</label>
                <input type="file" name="image-coment" class="form-control" <?= setStatus($isTestimonial) ?>>
            </div>
        </div>
    </div>

    <div class="card-footer text-end mt-3">
        <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
    </div>
</form>
            </div>
        </div>
    </div>
</div>
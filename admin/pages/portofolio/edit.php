<?php
include __DIR__ . "/../../../connection.php";

if (isset($_POST['update'])) {
    $id    = $_POST['id'];

    if ($id == 1) {
        $title = $_POST['title'];
        $desctitle = $_POST['desctitle'];

        $query = "UPDATE portofolio SET
        title='$title',
        desctitle='$desctitle'
        WHERE id=$id";
    } else {
        $tagline = $_POST['tagline'];
        $image = $_POST['image_old'];
        $titleimg = $_POST['title_image'];
        $titledesc = $_POST['title_description'];
        $category = $_POST['category'];
        $client = $_POST['client'];
        $date = $_POST['date'];
        $url = $_POST['url'];
        $subdetail = $_POST['sub_detail'];
        $descdetail = $_POST['desc_detail'];

        if (!empty($_FILES['image']['name'])) {
            $image = time() . "_" . $_FILES['image']['name'];
            $tmp   = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp,  __DIR__ . "/../../../public/portofolio/" . $image);
        }
        $query = "UPDATE portofolio SET
        tagline='$tagline',
        image='$image',
        title_image='$titleimg',
        title_description='$titledesc',
        category='$category',
        client='$client',
        date='$date',
        url='$url',
        subdetail='$subdetail',
        desc_detail='$descdetail'
        WHERE id=$id";
    }



    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href='index.php?fitur=portofolio';
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
$data = mysqli_query($conn, "SELECT * FROM portofolio WHERE id='$id'");
$row  = mysqli_fetch_assoc($data);

$isHeader = ($row['id'] == 1);
$isContent = ($row['id'] >= 2);

function setData($condition)
{
    return $condition ? '' : 'disabled style="background-color: #e9ecef; cursor: not-allowed;"';
}
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Portofolio</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <div class="card-title text-white">Update Data Portofolio</div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 border-end">
                                    <h5 class="text-primary mb-3 fw-bold"><i class="fas fa-info-circle me-2"></i> Kategori 1: Informasi Utama</h5>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="fw-bold">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                value="<?= htmlspecialchars($row['title'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="fw-bold">Description Title</label>
                                            <input type="text" name="desctitle" class="form-control"
                                                value="<?= htmlspecialchars($row['desctitle'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                        </div>

                                    <?php if ($row['id'] != 1) : ?>
                                            <div class="col-md-12 form-group">
                                                <label class="fw-bold">Tagline</label>
                                                <input type="text" name="tagline" class="form-control"
                                                    value="<?= htmlspecialchars($row['tagline'] ?? ''); ?>" <?= setData($isContent) ?>>
                                            </div>
                                    </div>

                                    <hr class="my-4">

                                    <h5 class="text-primary mb-3 fw-bold"><i class="fas fa-images me-2"></i> Kategori 2: Media & Detail</h5>
                                    <div class="row">

                                        <div class="col-md-6 form-group">
                                            <label class="fw-bold">Image</label>
                                            <input type="file" name="image" class="form-control">
                                            <?php if (!empty($row['image'])) : ?>
                                                <div class="mt-2">
                                                    <small class="text-muted d-block">Current Image</small>
                                                    <img src="../../../public/portofolio/<?= $row['image']; ?>" <?= setData($isContent) ?> width="120" class="rounded mt-1 shadow-sm">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="fw-bold">Title Image</label>
                                            <input type="text" name="title_image" class="form-control"
                                                value="<?= htmlspecialchars($row['title_image'] ?? ''); ?>" <?= setData($isContent) ?>>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="fw-bold">Title Description</label>
                                            <textarea name="title_description" class="form-control" rows="3" <?= setData($isContent) ?>><?= htmlspecialchars($row['title_description'] ?? ''); ?></textarea>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-lg-4 bg-light p-3">
                                    <h5 class="text-primary mb-3 fw-bold"><i class="fas fa-list-alt me-2"></i> Kategori 3: Metadata</h5>
                                    <div class="alert alert-info py-2 mb-3" style="font-size: 0.85rem;">
                                        <i class="fas fa-info-circle"></i> Bagian ini berisi informasi detail tambahan mengenai proyek portofolio.
                                    </div>

                                    <?php if ($row['id'] != 1) : ?>
                                        <div class="form-group mb-3">
                                            <label class="fw-bold">Category</label>
                                            <input type="text" name="category" class="form-control shadow-sm"
                                                value="<?= htmlspecialchars($row['category'] ?? ''); ?>" <?= setData($isContent) ?>>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="fw-bold">Client</label>
                                            <input type="text" name="client" class="form-control shadow-sm"
                                                value="<?= htmlspecialchars($row['client'] ?? ''); ?>" <?= setData($isContent) ?>>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="fw-bold">Date</label>
                                            <input type="text" name="date" class="form-control shadow-sm"
                                                value="<?= htmlspecialchars($row['date'] ?? ''); ?>" <?= setData($isContent) ?>>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="fw-bold">Url Project</label>
                                            <input type="text" name="url" class="form-control shadow-sm"
                                                value="<?= htmlspecialchars($row['url'] ?? ''); ?>" <?= setData($isContent) ?>>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top text-end">
                            <a href="index.php?fitur=portofolio" class="btn btn-outline-danger me-2">
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
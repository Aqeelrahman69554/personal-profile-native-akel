<?php
include __DIR__ . "/../../../connection.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}
$data = mysqli_query($conn, "SELECT * FROM about WHERE id='$id'");
$row  = mysqli_fetch_assoc($data);

$isHeader = ($row['id'] == 1);
$isContent = ($row['id'] >= 2);

function setAbout($condition)
{
    return $condition ? '' : 'disabled style= "background-color: #e9ecef; cursor: not-allowed;"';
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    if ($id == 1) {
        $image = $_POST['image'];
        $title = $_POST['title'];
        $desctitle = $_POST['desctitle'];
        $subtitle = $_POST['subtitle'];
        $descsubtitle = $_POST['descsubtitle'];
        $closingdesc = $_POST['closingdesc'];

        if (!empty($_FILES['image']['name'])) {
            $image = time() . "_" . $_FILES['image']['name'];
            $tmp   = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp,  __DIR__ . "/../../../public/about/" . $image);
        }

        $query = "UPDATE about SET 
        image='$image',
        title='$title',
        desctitle='$desctitle',
        subtitle='$subtitle',
        descsubtitle='$descsubtitle',
        closingdesc='$closingdesc'
        WHERE id='$id'";
    } else {
        $list = $_POST['list'];
        $sublist = $_POST['sublist'];

        $query = "UPDATE about SET
        list='$list',
        sublist='$sublist'
        WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href='index.php?fitur=about';
            </script>";
        exit;
    } else {
        echo "Gagal update data!";
    }
}

?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit About</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <div class="card-title text-white">Update Data About</div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 border-end">
                                    <h5 class="text-primary mb-3 fw-bold">
                                        <i class="fas fa-file-alt me-2"></i> Informasi Deskripsi
                                    </h5>

                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label class="fw-bold">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                value="<?= htmlspecialchars($row['title']); ?>" <?= setAbout($isHeader) ?>>
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label class="fw-bold">Sub-Title</label>
                                            <input type="text" name="subtitle" class="form-control"
                                                value="<?= htmlspecialchars($row['subtitle']); ?>" <?= setAbout($isHeader) ?>>
                                        </div>

                                        <div class="col-md-12 form-group mb-3">
                                            <label class="fw-bold">Description Title</label>
                                            <textarea name="desctitle" class="form-control" rows="3" <?= setAbout($isHeader) ?>><?= htmlspecialchars($row['desctitle']); ?></textarea>
                                        </div>

                                        <div class="col-md-12 form-group mb-3">
                                            <label class="fw-bold">Description-SubTitle</label>
                                            <textarea name="descsubtitle" class="form-control" rows="3" <?= setAbout($isHeader) ?>><?= htmlspecialchars($row['descsubtitle']); ?></textarea>
                                        </div>

                                        <hr class="my-4">
                                        <h5 class="text-primary mb-3 fw-bold">
                                            <i class="fas fa-list me-2"></i> Detail & Penutup
                                        </h5>

                                        <div class="col-md-6 form-group mb-3">
                                            <label class="fw-bold">List</label>
                                            <input type="text" name="list" class="form-control"
                                                value="<?= htmlspecialchars($row['list']); ?>" <?= setAbout($isContent) ?>>
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label class="fw-bold">Sub List</label>
                                            <input type="text" name="sublist" class="form-control"
                                                value="<?= htmlspecialchars($row['sublist']); ?>" <?= setAbout($isContent) ?>>
                                        </div>

                                        <div class="col-md-12 form-group mb-3">
                                            <label class="fw-bold">Description Closing</label>
                                            <textarea name="closingdesc" class="form-control" rows="2" <?= setAbout($isHeader) ?>><?= htmlspecialchars($row['closingdesc']); ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 bg-light p-3">
                                    <h5 class="text-primary mb-3 fw-bold">
                                        <i class="fas fa-image me-2"></i> Media About
                                    </h5>
                                    <div class="alert alert-info py-2 mb-3" style="font-size: 0.85rem;">
                                        <i class="fas fa-info-circle"></i> Disarankan menggunakan gambar dengan rasio seimbang untuk halaman About.
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Upload Image</label>
                                        <input type="file" name="image" class="form-control shadow-sm" <?= setAbout($isHeader) ?>>

                                        <?php if (!empty($row['image'])) : ?>
                                            <div class="mt-4 text-center">
                                                <small class="text-muted d-block mb-2">Current Image Preview</small>
                                                <img src="../../../public/about/<?= $row['image']; ?>" 
                                                    style="max-width: 100%; height: auto;"
                                                    class="rounded shadow-sm border">
                                                <div class="mt-2">
                                                    <code class="small text-primary"><?= $row['image']; ?></code>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top text-end">
                            <a href="index.php?fitur=about" class="btn btn-outline-danger me-2">
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
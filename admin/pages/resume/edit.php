<?php
include __DIR__ . "/../../../connection.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "id tidak ditemukan";
    exit;
}

// 1. AMBIL DATA DULU (Agar kita tahu ini ID berapa)
$data = mysqli_query($conn, "SELECT * FROM resum WHERE id='$id'");
$row  = mysqli_fetch_assoc($data);

if (!$row) {
    echo "Data tidak ditemukan";
    exit;
}

// 2. TENTUKAN KONDISI LOCK
$isHeader = ($row['id'] == 1);
$isContent = ($row['id'] >= 2);

function setData($condition)
{
    return $condition ? '' : 'disabled style="background-color: #e9ecef; cursor: not-allowed;"';
}

// 3. PROSES UPDATE (DIBAGI DUA)
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    if ($id == 1) {
        // JIKA ID 1: Hanya ambil & update data Kategori 1
        $resume = $_POST['resume'];
        $descresume = $_POST['descresume'];
        $title = $_POST['title-1'];
        $subtitle1 = $_POST['subtitle-1'];
        $year1 = $_POST['year-1'];
        $descsubtitle1 = $_POST['descsubtitle-1'];
        $title2 = $_POST['title-2'];
        $subtitle2 = $_POST['subtitle-2'];
        $year2 = $_POST['year-2'];
        $descsubtitle2 = $_POST['descsubtitle-2'];
        $title3 = $_POST['title-3'];
        $subtitle3 = $_POST['subtitle-3'];
        $year3 = $_POST['year-3'];
        $descsubtitle3 = $_POST['descsubtitle-3'];
        $subtitle4 = $_POST['subtitle-4'];
        $year4 = $_POST['year-4'];
        $descsubtitle4 = $_POST['descsubtitle-4'];

        $query = "UPDATE resum SET 
            resume='$resume', 
            descresume='$descresume', 
            `title-1`='$title', 
            `subtitle-1`='$subtitle1', 
            `year-1`='$year1', 
            `descsubtitle-1`='$descsubtitle1',
            `title-2`='$title2',
            `subtitle-2`='$subtitle2',
            `year-2`='$year2',
            `descsubtitle-2`='$descsubtitle2',
            `title-3`='$title3',
            `subtitle-3`='$subtitle3',
            `year-3`='$year3',
            `descsubtitle-3`='$descsubtitle3',
            `subtitle-4`='$subtitle4',
            `year-4`='$year4',
            `descsubtitle-4`='$descsubtitle4'
            WHERE id=$id";
    } else {
        // JIKA ID >= 2: Hanya ambil & update data Kategori 2 (List)
        $listsubtitle1 = $_POST['listsubtitle-1'];
        $listsubtitle2 = $_POST['listsubtitle-2'];
        $listsubtitle3 = $_POST['listsubtitle-3'];
        $listsubtitle4 = $_POST['listsubtitle-4'];

        $query = "UPDATE resum SET 
            `listsubtitle-1`='$listsubtitle1', 
            `listsubtitle-2`='$listsubtitle2', 
            `listsubtitle-3`='$listsubtitle3', 
            `listsubtitle-4`='$listsubtitle4' 
            WHERE id=$id";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href='index.php?fitur=resume';
            </script>";
        exit;
    } else {
        echo "GAGAL MENG-UPDATE DATA: " . mysqli_error($conn);
        exit;
    }
}
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
                        <div class="card-header bg-primary text-white">
                            <div class="card-title text-white">Update Data Resume</div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 border-end">
                                    <h5 class="text-primary mb-3"><i class="fas fa-file-alt"></i> Kategori 1: Informasi Utama</h5>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>Title Resume</label>
                                            <input type="text" name="resume" class="form-control" value="<?= htmlspecialchars($row['resume'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Description Title Resume</label>
                                            <input type="text" name="descresume" class="form-control" value="<?= htmlspecialchars($row['descresume'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="p-2 border rounded bg-light mb-3">
                                                <h6 class="fw-bold text-secondary">Section Title-1</h6>
                                                <div class="form-group p-1">
                                                    <label>Title-1</label>
                                                    <input type="text" name="title-1" class="form-control form-control-sm" value="<?= htmlspecialchars($row['title-1'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Subtitle-1</label>
                                                    <input type="text" name="subtitle-1" class="form-control form-control-sm" value="<?= htmlspecialchars($row['subtitle-1'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Year-1</label>
                                                    <input type="text" name="year-1" class="form-control form-control-sm" value="<?= htmlspecialchars($row['year-1'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Description Subtitle-1</label>
                                                    <input type="text" name="descsubtitle-1" class="form-control form-control-sm" value="<?= htmlspecialchars($row['descsubtitle-1'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                            </div>

                                            <div class="p-2 border rounded bg-light mb-3">
                                                <h6 class="fw-bold text-secondary">Section Title-2</h6>
                                                <div class="form-group p-1">
                                                    <label>Title-2</label>
                                                    <input type="text" name="title-2" class="form-control form-control-sm" value="<?= htmlspecialchars($row['title-2'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Subtitle-2</label>
                                                    <input type="text" name="subtitle-2" class="form-control form-control-sm" value="<?= htmlspecialchars($row['subtitle-2'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Year-2</label>
                                                    <input type="text" name="year-2" class="form-control form-control-sm" value="<?= htmlspecialchars($row['year-2'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Description Subtitle-2</label>
                                                    <input type="text" name="descsubtitle-2" class="form-control form-control-sm" value="<?= htmlspecialchars($row['descsubtitle-2'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="p-2 border rounded bg-light mb-3">
                                                <h6 class="fw-bold text-secondary">Section Title-3</h6>
                                                <div class="form-group p-1">
                                                    <label>Title-3</label>
                                                    <input type="text" name="title-3" class="form-control form-control-sm" value="<?= htmlspecialchars($row['title-3'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Subtitle-3</label>
                                                    <input type="text" name="subtitle-3" class="form-control form-control-sm" value="<?= htmlspecialchars($row['subtitle-3'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Year-3</label>
                                                    <input type="text" name="year-3" class="form-control form-control-sm" value="<?= htmlspecialchars($row['year-3'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Description Subtitle-3</label>
                                                    <input type="text" name="descsubtitle-3" class="form-control form-control-sm" value="<?= htmlspecialchars($row['descsubtitle-3'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                            </div>

                                            <div class="p-2 border rounded bg-light mb-3">
                                                <h6 class="fw-bold text-secondary">Section Title-4</h6>
                                                <div class="form-group p-1">
                                                    <label>Subtitle-4</label>
                                                    <input type="text" name="subtitle-4" class="form-control form-control-sm" value="<?= htmlspecialchars($row['subtitle-4'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Year-4</label>
                                                    <input type="text" name="year-4" class="form-control form-control-sm" value="<?= htmlspecialchars($row['year-4'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Description Subtitle-4</label>
                                                    <input type="text" name="descsubtitle-4" class="form-control form-control-sm" value="<?= htmlspecialchars($row['descsubtitle-4'] ?? ''); ?>" <?= setData($isHeader) ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 bg-light-gray p-3">
                                    <h5 class="text-primary mb-3"><i class="fas fa-list"></i> Kategori 2: List Subtitle</h5>
                                    <div class="alert alert-info py-2" style="font-size: 0.8rem;">
                                        Gunakan bagian ini untuk menambahkan detail list tambahan.
                                    </div>

                                    <div class="form-group">
                                        <label>List Subtitle-1</label>
                                        <input type="text" name="listsubtitle-1" class="form-control shadow-sm" value="<?= htmlspecialchars($row['listsubtitle-1'] ?? ''); ?>" <?= setData($isContent) ?>>
                                    </div>

                                    <div class="form-group">
                                        <label>List Subtitle-2</label>
                                        <input type="text" name="listsubtitle-2" class="form-control shadow-sm" value="<?= htmlspecialchars($row['listsubtitle-2'] ?? ''); ?>" <?= setData($isContent) ?>>
                                    </div>

                                    <div class="form-group">
                                        <label>List Subtitle-3</label>
                                        <input type="text" name="listsubtitle-3" class="form-control shadow-sm" value="<?= htmlspecialchars($row['listsubtitle-3'] ?? ''); ?>" <?= setData($isContent) ?>>
                                    </div>

                                    <div class="form-group">
                                        <label>List Subtitle-4</label>
                                        <input type="text" name="listsubtitle-4" class="form-control shadow-sm" value="<?= htmlspecialchars($row['listsubtitle-4'] ?? ''); ?>" <?= setData($isContent) ?>>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top text-end">
                            <a href="index.php?fitur=resume" class="btn btn-outline-danger me-2">
                                <i class="fa fa-times"></i> Batal
                            </a>
                            <button type="submit" name="update" class="btn btn-primary px-4">
                                <i class="fa fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
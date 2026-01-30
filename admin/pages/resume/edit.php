<?php
include __DIR__ . "/../../../connection.php";
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "id tidak ditemukan";
    exit;
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $resume = $_POST['resume'];
    $descresume = $_POST['descresume'];
    $title = $_POST['title-1'];
    $subtitle1 = $_POST['subtitle-1'];
    $year1 = $_POST['year-1'];
    $descsubtitle1 = $_POST['descsubtitle-1'];
    $listsubtitle1 = $_POST['listsubtitle-1'];
    $title2 = $_POST['title-2'];
    $subtitle2 = $_POST['subtitle-2'];
    $year2 = $_POST['year-2'];
    $descsubtitle2 = $_POST['descsubtitle-2'];
    $listsubtitle2 = $_POST['listsubtitle-2'];
    $title3 = $_POST['title-3'];
    $subtitle3 = $_POST['subtitle-3'];
    $year3 = $_POST['year-3'];
    $descsubtitle3 = $_POST['descsubtitle-3'];
    $listsubtitle3 = $_POST['listsubtitle-3'];
    $subtitle4 = $_POST['subtitle-4'];
    $year4 = $_POST['year-4'];
    $descsubtitle4 = $_POST['descsubtitle-4'];
    $listsubtitle4 = $_POST['listsubtitle-4'];


    $query = "UPDATE resum SET resume='$resume', descresume='$descresume', `title-1`='$title', `subtitle-1`='$subtitle1', `year-1`='$year1', `descsubtitle-1`='$descsubtitle1', `listsubtitle-1`='$listsubtitle1', `title-2`='$title2', `subtitle-2`='$subtitle2', `year-2`='$year2', `descsubtitle-2`='$descsubtitle2', `listsubtitle-2`='$listsubtitle2', `title-3`='$title3', `subtitle-3`='$subtitle3', `year-3`='$year3', `descsubtitle-3`='$descsubtitle3', `listsubtitle-3`='$listsubtitle3', `subtitle-4`='$subtitle4', `year-4`='$year4', `descsubtitle-4`='$descsubtitle4', `listsubtitle-4`='$listsubtitle4' where id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href='index.php?fitur=resume';
            </script>";
        exit;
    } else {
        echo "GAGAL MENG-UPDATE DATA";
        exit;
    }
}
$id = $_GET['id'] ?? null;
if(!$id){
    echo "ID Tidak Ditemukan";
    exit;
}

$isHeader = ($row['id']==1);
$isContent = ($row['id']>=2);

function setData($condition)
{
    return $condition ? '' : 'disabled style="background-color: #e9ecef; cursor: not-allowed;"';
}

$data = mysqli_query($conn, "SELECT * FROM resum WHERE id='$id'");
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

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Title Resume</label>
                                        <input type="text" name="resume"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['resume'] ?? ''); ?>"
                                            >
                                    </div>
                                    <div class="form-group">
                                        <label>Description Title Resume</label>
                                        <input type="text" name="descresume"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['descresume'] ?? ''); ?>"
                                            >
                                    </div>

                                    <h4>Title-1</h4>

                                    <div class="form-group">
                                        <label>Title-1</label>
                                        <input type="text" name="title-1"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['title-1'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Subtitle-1</label>
                                        <input type="text" name="subtitle-1"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['subtitle-1'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Year-1</label>
                                        <input type="text" name="year-1"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['year-1'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Description Subtitle-1</label>
                                        <input type="text" name="descsubtitle-1"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['descsubtitle-1'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>List Subtitle-1</label>
                                        <input type="text" name="listsubtitle-1"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['listsubtitle-1'] ?? ''); ?>"
                                            >
                                    </div>

                                    <hr>

                                    <h4>Title-2</h4>

                                    <div class="form-group">
                                        <label>Title-2</label>
                                        <input type="text" name="title-2"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['title-2'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Subtitle-2</label>
                                        <input type="text" name="subtitle-2"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['subtitle-2'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Year-2</label>
                                        <input type="text" name="year-2"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['year-2'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Description Subtitle-2</label>
                                        <input type="text" name="descsubtitle-2"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['descsubtitle-2'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>List Subtitle-2</label>
                                        <input type="text" name="listsubtitle-2"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['listsubtitle-2'] ?? ''); ?>"
                                            >
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <hr>
                                    <h4>Title-3</h4>
                                    <div class="form-group">
                                        <label>Title-3</label>
                                        <input type="text" name="title-3"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['title-3'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Subtitle-3</label>
                                        <input type="text" name="subtitle"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['subtitle-3'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Year-3</label>
                                        <input type="text" name="year-3"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['year-3'] ?? ''); ?>"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>Description Subtitle-3</label>
                                        <input type="text" name="descsubtitle-3"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['descsubtitle-3'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>List Subtitle-3</label>
                                        <input type="text" name="listsubtitle-3"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['listsubtitle-3'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Subtitle-4</label>
                                        <input type="text" name="subtitle-4"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['subtitle-4'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Year-4</label>
                                        <input type="text" name="year-4"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['year-4'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>Description Subtitle-4</label>
                                        <input type="text" name="descsubtitle-4"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['descsubtitle-4'] ?? ''); ?>"
                                            >
                                    </div>

                                    <div class="form-group">
                                        <label>List Subtitle-4</label>
                                        <input type="text" name="listsubtitle-4"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['listsubtitle-4'] ?? ''); ?>"
                                            >
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" name="update" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a href="index.php?fitur=resume" class="btn btn-danger">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
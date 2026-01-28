<?php
include __DIR__ . "/../../../connection.php";

if (isset($_POST['update'])) {
    $id    = $_POST['id'];
    $title = $_POST['title'];
    $desctitle = $_POST['desctitle'];
    $tagline = $_POST['tagline'];
    $image = $_POST['image'];
    $titleimg = $_POST['title_image'];
    $titledesc = $_POST['title_description'];
    $category = $_POST['category'];
    $client = $_POST['client'];
    $date = $_POST['date'];
    $url = $_POST['url'];
    $subdetail = $_POST['sub_detail'];
    $descdetail = $_POST['desc_detail'];


    // IMAGE
    if (!empty($_FILES['image']['name'])) {
        $image = time() . "_" . $_FILES['image']['name'];
        $tmp   = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp,  __DIR__ . "/../../../public/portofolio/" . $image);

        $query = "UPDATE portofolio SET image='$image', title='$title', desctitle='$desctitle', tagline='$tagline', title_image='$titleimage', title_description='$titledesc', category='$category', client='$client', date='$date', url='$url', sub_detail='$subdetail' WHERE id='$id'";
    } else {
        $query = "UPDATE portofolio SET title='$title', desctitle='$desctitle', tagline='$tagline', title_image='$titleimage', title_description='$titledesc', category='$category', client='$client', date='$date', url='$url', sub_detail='$subdetail' WHERE id='$id'";
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
                            <div class="card-title">Update Data About</div>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control">

                                        <?php if (!empty($row['image'])) : ?>
                                            <small class="text-muted d-block mt-2">
                                                Current Image
                                            </small>
                                            <img src="../../../public/portofolio/<?= $row['image']; ?>"
                                                width="120"
                                                class="rounded mt-1">
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['title']); ?>"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label>List</label>
                                        <input type="text" name="list"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['list']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Sub List</label>
                                        <input type="text" name="sublist"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['sublist']); ?>">
                                    </div>


                                </div>





                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description Title</label>
                                        <input type="text" name="desctitle"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['desctitle']); ?>"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label>Sub-Title</label>
                                        <input type="text" name="subtitle"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['subtitle']); ?>"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label>Description-SubTitle</label>
                                        <input type="text" name="descsubtitle"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['descsubtitle']); ?>"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label>Description Closing</label>
                                        <input type="text" name="closingdesc"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['closingdesc']); ?>"
                                            required>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" name="update" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a href="index.php?fitur=portofolio" class="btn btn-danger">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
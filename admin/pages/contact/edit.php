<?php
include __DIR__ . "/../../../connection.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $address = $_POST['address'];
    $descaddress = $_POST['descaddress'];
    $call= $_POST['callus'];
    $desccall= $_POST['desccall'];
    $email= $_POST['email'];
    $descemail= $_POST['descemail'];
    $gmaps= $_POST['gmaps'];



    // IMAGE
    if (!empty($_FILES['image']['name'])) {
        $image = time() . "_" . $_FILES['image']['name'];
        $tmp   = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp,  __DIR__ . "/../../../public/contact/" . $image);

        $query = "UPDATE contact SET image='$image', title='$title', desctitle='$desctitle', subtitle='$subtitle', descsubtitle='$descsubtitle', list='$list', sublist='$sublist', closingdesc='$closingdesc' WHERE id='$id'";
    } else {
        $query = "UPDATE contact SET title='$title', desctitle='$desctitle', subtitle='$subtitle', descsubtitle='$descsubtitle', list='$list', sublist='$sublist', closingdesc='$closingdesc' WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href='index.php?fitur=contact';
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
$data = mysqli_query($conn, "SELECT * FROM contact WHERE id='$id'");
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
                            <div class="card-title">Update Data Contact</div>
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
                                        <label>Description</label>
                                        <input type="text" name="desc"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['desc']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="sublist"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['address']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Description Address</label>
                                        <input type="text" name="sublist"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['descaddress']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Call Us</label>
                                        <input type="text" name="sublist"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['callus']); ?>">
                                    </div>




                                </div>





                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Description Call Us</label>
                                        <input type="text" name="sublist"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['desccall']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="sublist"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['email']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Description Email</label>
                                        <input type="text" name="subtitle"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['descemail']); ?>"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label>Google Maps</label>
                                        <input type="text" name="descsubtitle"
                                            class="form-control"
                                            value="<?= htmlspecialchars($row['gmaps']); ?>"
                                            required>
                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" name="update" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a href="index.php?fitur=contact" class="btn btn-danger">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
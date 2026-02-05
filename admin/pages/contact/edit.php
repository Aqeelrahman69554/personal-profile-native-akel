<?php
include __DIR__ . "/../../../connection.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}
$data = mysqli_query($conn, "SELECT * FROM contact WHERE id='$id'");
$row  = mysqli_fetch_assoc($data);

$isHeader = ($row['id'] == 1);
$isContent = ($row['id'] >= 2);

function setContact($condition)
{
    return $condition ? '' : 'readonly style= "background-color: rgba(121, 124, 121, 1); cursor: not-allowed;"';
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    if ($id == 1) {
        $title = $_POST['title'];
        $desc = $_POST['desc'];

        $query = "UPDATE contact SET
        title='$title',
        `desc`='$desc'
        WHERE id=$id";
    } else {
        $address = $_POST['address'];
        $descaddress = $_POST['descaddress'];
        $call = $_POST['callus'];
        $desccall = $_POST['desccall'];
        $email = $_POST['email'];
        $descemail = $_POST['descemail'];
        $gmaps = $_POST['gmaps'];

        $query = "UPDATE contact SET
        `address`='$address',
        descaddress='$descaddress',
        `callus`='$call',
        desccall='$desccall',
        `email`='$email',
        descemail='$descemail',
        gmaps='$gmaps'
        WHERE id=$id";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href='index.php?fitur=contact';
            </script>";
        exit;
    } else {
        echo "Gagal update data!" . mysqli_error($conn);
    }
}

?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Contact</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <div class="card-title text-white">Update Data Contact</div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 border-end">
                                    <h5 class="text-primary mb-3"><i class="fas fa-id-card"></i> Kategori 1: Header Contact</h5>
                                    
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($row['title']); ?>" <?= setContact($isHeader) ?>>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Description Header</label>
                                            <input type="text" name="desc" class="form-control" value="<?= htmlspecialchars($row['desc']); ?>" <?= setContact($isHeader) ?>>
                                        </div>
                                    </div>

                                    <hr>

                                    <h5 class="text-primary mb-3"><i class="fas fa-map-marker-alt"></i> Kategori 2: Detail Lokasi & Komunikasi</h5>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="p-2 border rounded bg-light mb-3">
                                                <h6 class="fw-bold text-secondary">Alamat Kantor</h6>
                                                <div class="form-group p-1">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control form-control-sm" value="<?= htmlspecialchars($row['address']); ?>" <?= setContact($isContent) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Description Address</label>
                                                    <input type="text" name="descaddress" class="form-control form-control-sm" value="<?= htmlspecialchars($row['descaddress']); ?>" <?= setContact($isContent) ?>>
                                                </div>
                                            </div>

                                            <div class="p-2 border rounded bg-light mb-3">
                                                <h6 class="fw-bold text-secondary">Telepon / Call Us</h6>
                                                <div class="form-group p-1">
                                                    <label>Call Us (Nomor)</label>
                                                    <input type="text" name="callus" class="form-control form-control-sm" value="<?= htmlspecialchars($row['callus']); ?>" <?= setContact($isContent) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Description Call Us</label>
                                                    <input type="text" name="desccall" class="form-control form-control-sm" value="<?= htmlspecialchars($row['desccall']); ?>" <?= setContact($isContent) ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="p-2 border rounded bg-light mb-3">
                                                <h6 class="fw-bold text-secondary">Email Support</h6>
                                                <div class="form-group p-1">
                                                    <label>Email Address</label>
                                                    <input type="text" name="email" class="form-control form-control-sm" value="<?= htmlspecialchars($row['email']); ?>" <?= setContact($isContent) ?>>
                                                </div>
                                                <div class="form-group p-1">
                                                    <label>Description Email</label>
                                                    <input type="text" name="descemail" class="form-control form-control-sm" value="<?= htmlspecialchars($row['descemail']); ?>" <?= setContact($isContent) ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 bg-light-gray p-3">
                                    <h5 class="text-primary mb-3"><i class="fas fa-map"></i> Kategori 3: Integrasi Maps</h5>
                                    <div class="alert alert-info py-2" style="font-size: 0.8rem;">
                                        Gunakan bagian ini untuk memperbarui link iframe Google Maps Anda.
                                    </div>

                                    <div class="form-group">
                                        <label>Google Maps Link/Iframe</label>
                                        <textarea name="gmaps" class="form-control shadow-sm" rows="12" <?= setContact($isContent) ?>><?= htmlspecialchars($row['gmaps']); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top text-end">
                            <a href="index.php?fitur=contact" class="btn btn-outline-danger me-2">
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
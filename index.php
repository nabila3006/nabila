<?php
session_start();
include 'config/koneksi.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>galeri foto</title>
    <link rel="shortcut icon" href="assets/ico/galer.ico" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Galeri Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                </div>
                <a href="register.php" class="btn btn-outline-primary m-1">daftar</a>
                <a href="login.php" class="btn btn-outline-success m-1">masuk</a>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <?php
            if (isset($_GET['albumid'])) {
                $albumid = $_GET['albumid'];
                $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE albumid='$albumid'");
            } else {
                $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
            }

            while ($data = mysqli_fetch_array($query)) {
                $fotoid = $data['fotoid'];
                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                $isLiked = mysqli_num_rows($ceksuka) == 1;

            ?>
                <div class="col-md-3 mt-2">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">

                        <div class="card mb-2">
                            <img style="height: 12rem" src="assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                            <div class="card-footer text-center">
                                <a href="config/proses-like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="<?php echo $isLiked ? 'batalsuka' : 'suka' ?>">
                                    <?php if ($isLiked) { ?>
                                        <i class="fa fa-heart"></i>
                                    <?php } else { ?>
                                        <i class="fa-regular fa-heart"></i>
                                    <?php } ?>
                                </a>
                                <?php
                                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($like) . ' Suka';
                                ?>
                                <a href="" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
                                    <i class="fa-regular fa-comment"></i></a>
                                <?php
                                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid=$fotoid");
                                echo mysqli_num_rows($jmlkomen) . ' Komentar';
                                ?>
                            </div>
                        </div>
                    </a>
                    <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <img src="assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="m-2">
                                                <div class="overflow-auto">
                                                    <div class="sticky-top">
                                                        <strong><?php echo $data['judulfoto'] ?></strong><br>
                                                        <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                                                        <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                                                        <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
                                                    </div>
                                                    <hr>
                                                    <p align="left">
                                                        <b>Deskripsi</b><br>
                                                        <?php echo $data['deskripsifoto'] ?>
                                                    </p>
                                                    <hr>
                                                    <?php
                                                    $fotoid = $data['fotoid'];
                                                    $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                    while ($row = mysqli_fetch_array($komentar)) {
                                                    ?>
                                                        <p align="left">
                                                            <strong><?php echo $row['namalengkap'] ?></strong>
                                                            <?php echo $row['isikomentar'] ?>

                                                        </p>
                                                    <?php } ?>
                                                    <hr>
                                                    <!-- <div class="sticky-bottom">
                                                        <form action="config/proses-komentar.php" method="POST">
                                                            <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                            <br>
                                                            <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
                                                            <div class="input-grup-prepend">
                                                                <br>
                                                                <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                                                            </div>
                                                        </form>
                                                        </form>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
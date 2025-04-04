<?php

    require('configure.php');

    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }

    $username = $_SESSION['username'];
    $no = 1;

    $row = query("SELECT * FROM tabel_barang");
    
    if( isset($_POST['bsimpan'])){
        if(tambahBarang($_POST) > 0){
            echo "  <script>
                        alert('Barang Berhasil Ditambahkan!');
                        document.location.href = 'index.php';
                    </script>";
        }
    }

    if ( isset($_POST['bedit'])){
        if(editBarang($_POST) > 0){
            echo "  <script>
                        alert('Barang Berhasil Diedit!');
                        document.location.href = 'index.php';
                    </script>";
        }
    }
    
    if(isset ($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM tabel_barang WHERE id_barang = '$id'";

        $result = mysqli_query($connect,$query);
        $fetch = mysqli_fetch_assoc($result);
    }

    if(isset($_GET['hal'])){
        
        if($_GET['hal'] === 'hapus'){
            if(hapusBarang($_GET) > 0){
                echo "  <script>
                            alert('Barang Berhasil Dihapus!');
                            document.location.href = 'index.php';
                        </script>";
            }
        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Container -->
    <div class="container">
        <h1 class="text-center">CRUD PENERIMAAN BARANG</h1>
        <h2 class="text-center">Hallo <?= $username; ?>, selamat datang</h2>
        <hr>

        <!-- Row -->
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card ">
                    <div class="card-header text-center bg-info text-light">
                        Input data barang disini yagesyaa
                    </div>
                    <div class="card-body ">

                        <!-- Form -->
                        <form action="" method="POST">
                            <?php if(isset($_GET['id'])) : ?>
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                            <?php endif; ?>
                            <div class="mb-3">
                                <label class="form-label">Kode barang</label>
                                <?php if ( isset($fetch)) : ?>
                                <input type="text" name="tkode" value="<?= $fetch['kode_barang']?>" class="form-control"
                                    placeholder="Masukkan kode barang">
                                <?php else: ?>
                                <input type="text" name="tkode" class="form-control" placeholder="Masukkan kode barang">
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama barang</label>
                                <?php if ( isset($fetch)) : ?>
                                <input type="text" name="tnama" value="<?= $fetch['nama_barang']?>" class="form-control"
                                    placeholder="Masukkan nama barang">
                                <?php else :?>
                                <input type="text" name="tnama" class="form-control" placeholder="Masukkan nama barang">
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Asal barang</label>
                                <select class="form-select" name="tasal">
                                    <?php if ( isset($fetch)) : ?>
                                    <option value="<?= $fetch['asal']?>"> <?= $fetch['asal']?> </option>
                                    <?php endif; ?>
                                    <option value="Dc Cakung">Dc Cakung</option>
                                    <option value="Dc Karawang">Dc Karawang</option>
                                    <option value="Gudang Pusat">Gudang Pusat</option>
                                    <option value="Gudang Regional">Gudang Regional</option>
                                    <option value="Gudang Cabang">Gudang Cabang</option>
                                    <option value="Polimedia">Polimedia</option>
                                    <option value="Pt Freeport">Pt Freeport</option>
                                    <option value="Supplier A">Supplier A</option>
                                    <option value="Supplier B">Supplier B</option>
                                    <option value="Vendor X">Vendor X</option>
                                    <option value="Vendor Y">Vendor Y</option>
                                    <option value="Pabrik A">Pabrik B</option>
                                    <option value="Toko Mitra">Toko Mitra</option>
                                    <option value="Marketplace">Marketplace</option>
                                    <option value="Import">Import</option>
                                    <option value="Produksi Lokal Indonesia">Produksi Lokal Indonesia</option>
                                    <option value="Cabang Retail">Cabang Retail</option>
                                    <option value="Distributor Resmi">Distributor Resmi</option>
                                    <option value="Kantor Pusat">Kantor Pusat</option>
                                </select>
                            </div>


                            <!--Row  -->
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <?php if( isset ($fetch)) : ?>
                                        <input type="number" name="tjumlah" value="<?=$fetch['jumlah']?>"
                                            class="form-control" placeholder="Masukkan jumlah barang">
                                        <?php else: ?>
                                        <input type="number" name="tjumlah" class="form-control"
                                            placeholder="Masukkan jumlah barang">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Satuan</label>
                                        <select class="form-select" name="tsatuan">
                                            <?php if( isset ($fetch)) : ?>
                                            <option value="<?= $fetch['satuan']?>"><?= $fetch['satuan']?></option>
                                            <?php endif; ?>
                                            <option value="Pcs">Pcs</option>
                                            <option value="Box">Box</option>
                                            <option value="Unit">Unit</option>
                                            <option value="Set">Set</option>
                                            <option value="Kotak">Kotak</option>
                                            <option value="Pack">Pack</option>
                                            <option value="Bungkus">Bungkus</option>
                                            <option value="Ton">Ton</option>
                                            <option value="Kilogram (Kg)">Kilogram (Kg)</option>
                                            <option value="Gram">Gram</option>
                                            <option value="Liter">Liter</option>
                                            <option value="Mililiter (ml)">Mililiter (ml)</option>
                                            <option value="Lembar">Lembar</option>
                                            <option value="Kaleng">Kaleng</option>
                                            <option value="Botol">Botol</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal diterima</label>
                                        <?php if( isset ($fetch)) : ?>
                                        <input type="date" name="ttanggal" value="<?= $fetch['tanggal_diterima']?>"
                                            class="form-control" placeholder="Masukkan jumlah barang">
                                        <?php else: ?>
                                        <input type="date" name="ttanggal" value="<?= $vtanggal?>" class="form-control"
                                            placeholder="Masukkan jumlah barang">
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <?php if (isset ($_GET['hal'])) : ?>
                                    <button class="btn btn-primary" name="bedit" type="submit">Edit</button>
                                    <?php else: ?>
                                    <button class="btn btn-primary" name="bsimpan" type="submit">Simpan</button>
                                    <?php endif; ?>
                                    <button class="btn btn-danger" name="bulangi" type="reset">Ulangi</button>
                                </div>

                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Row 2-->
        <hr>
        <div class="card text-center mt-5">
            <div class="card-header bg-info text-light">

                <div class="col-md-6 mx-auto">
                    <form class="POST">
                        <div class="input-group" mb-3>
                            <input type="text" name="tcari" value="<?= @$_POST['tcari']?>" class="form-control"
                                placeholder="Cari disini">
                            <button class="btn btn-primary" name="bcari" type="submit">Cari</button>
                            <button class="btn btn-danger" name="breset" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-striped table-hover table-bordered ">
                    <tr>
                        <th>No.</th>
                        <th>Kode barang</th>
                        <th>Nama barang</th>
                        <th>Asal barang</th>
                        <th>Jumlah barang</th>
                        <th>Satuan</th>
                        <th>Tanggal diterima</th>
                        <th>Aksi</th>
                    </tr>

                    <!--  Penampilan data -->
                    <?php
                        $no = 1;
                    // pencarian data
if (isset($_POST['bcari'])){
    $keyword = $_POST['bcari'];
    $q = "SELECT * FROM tabel_barang WHERE kode_barang LIKE '%$keyword%' or nama_barang LIKE '%$keyword%' or asal_barang LIKE '%$keyword%' order by id_barang desc";
}else{
    $q = "SELECT * FROM tabel_barang order by id_barang desc";
}
                    
                    ?>
                    <?php foreach ($row as $data) :?>
                    <tr>
                        <td><?= $no++ ?>
                        </td>
                        <td><?= $data ['kode_barang'] ?></td>
                        <td><?= $data ['nama_barang'] ?></td>
                        <td><?= $data ['asal'] ?></td>
                        <td><?= $data ['jumlah'] ?></td>
                        <td><?= $data ['satuan'] ?></td>
                        <td><?= $data ['tanggal_diterima'] ?></td>
                        <td>
                            <a href="index.php?hal=edit&id=<?=$data['id_barang'] ?>" class="btn btn-warning">Edit</a>
                            <a href="index.php?hal=hapus&id=<?=$data['id_barang'] ?>" class="btn btn-danger"
                                onclick="return confirm('Peringatan bro! File ini akan di hapus, apakah anda bersedia?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
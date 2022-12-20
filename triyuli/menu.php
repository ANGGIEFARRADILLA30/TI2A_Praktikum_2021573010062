            <style>
                .card>menu {
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                    max-width: 300px;
                    margin: auto;
                    text-align: center;
                    font-family: arial;
                }

                .price {
                    color: grey;
                    font-size: 22px;
                }

                .card button {
                    border: none;
                    outline: 0;
                    padding: 12px;
                    color: white;
                    background-color: #000;
                    text-align: center;
                    cursor: pointer;
                    width: 100%;
                    font-size: 18px;
                }

                .card button:hover {
                    opacity: 0.7;
                }
            </style>
            <!-- Content -->

            <body style="background: #FCDDB0;">
                <?php
                include "proses/connect.php";
                $query = mysqli_query($conn, "SELECT * FROM tb_daftar_menu LEFT JOIN tb_kategori_menu ON tb_kategori_menu.id_ket_menu = tb_daftar_menu.kategori");
                while ($record = mysqli_fetch_array($query)) {
                    $result[] = $record;
                }

                $select_ket_menu = mysqli_query($conn, "SELECT id_ket_menu,kategori_menu FROM tb_kategori_menu");
                ?>

                <div class="col-10 mt-2 rounded-3" style="padding-left: 240px;">
                    <div class="card">
                        <div class="card-header">
                            Halaman Daftar Menu
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahMenu">Tambah Menu</button>
                                </div>
                            </div>

                            <!-- Modal Tambah Menu Baru -->
                            <div class="modal fade" id="ModalTambahMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">

                                            <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data">
                                                <div class="row">

                                                    <div class="col-lg-7">



                                                        <div class="input-group mb-3">
                                                            <input type="file" class="form-control py-3" id="upload_foto" placeholder="Your Name" name="foto" required>
                                                            <label class="input-group-text" for="upload_foto">Upload Foto Menu</label>
                                                            <div class="invalid-feedback">
                                                                Masukkan Foto Menu
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-5">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_menu" required>
                                                            <label for="floatingInput">Nama Menu</label>
                                                            <div class="invalid-feedback">
                                                                Masukkan Nama Menu
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan">
                                                            <label for="floatingPassword">Keterangan</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">

                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" aria-label="Default select example" name="ket_menu" required>
                                                                <option selected hidden value="">Pilih Kategori Menu</option>
                                                                <?php foreach ($select_ket_menu as $value) {
                                                                    echo "<option value=" . $value['id_ket_menu'] . ">$value[kategori_menu]</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                                            <div class="invalid-feedback">
                                                                Pilih Kategori Makanan atau Minuman
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required>
                                                            <label for="floatingInput">Harga</label>
                                                            <div class="invalid-feedback">
                                                                Masukkan Harga Menu
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok" required>
                                                            <label for="floatingInput">Stok</label>
                                                            <div class="invalid-feedback">
                                                                Masukkan Stok
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Tambah Menu Baru  -->


                            <?php
                            if (empty($result)) {
                                echo "Data user tidak ada";
                            } else {
                                foreach ($result as $row) {
                            ?>

                                    <!--  ------------------------------------------------- Modal View ---------------------------------------------------------------------->

                                    <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data">
                                                        <div class="row">

                                                            <div class="col-lg-12">
                                                                <div class="form-floating mb-3">
                                                                    <input disabled type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" value="<?php echo $row['nama_menu']; ?>">
                                                                    <label for="floatingInput">Nama Menu</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukkan Nama Menu
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-lg-12">
                                                                <div class="form-floating mb-3">
                                                                    <input disabled type="text" class="form-control" id="floatingInput" placeholder="Keterangan" value="<?php echo $row['keterangan']; ?>">
                                                                    <label for="floatingPassword">Keterangan</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">

                                                                <div class="form-floating mb-3">
                                                                    <select disabled class="form-select" aria-label="Default select example" name="ket_menu" required>
                                                                        <option selected hidden value="">Pilih Kategori Menu</option>
                                                                        <?php
                                                                        foreach ($select_ket_menu as $value) {
                                                                            if ($row['kategori'] == $value['id_ket_menu']) {
                                                                                echo "<option selected value=" . $value['id_ket_menu'] . ">$value[kategori_menu]</option>";
                                                                            } else {
                                                                                echo "<option value=" . $value['id_ket_menu'] . ">$value[kategori_menu]</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                                                    <div class="invalid-feedback">
                                                                        Pilih Kategori Makanan atau Minuman
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-4">
                                                                <div class="form-floating mb-3">
                                                                    <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['harga']; ?>">
                                                                    <label for="floatingInput">Harga</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukkan Harga Menu
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="form-floating mb-3">
                                                                    <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['stok']; ?>">
                                                                    <label for="floatingInput">Stok</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukkan Stok
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                    <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal View-->


                                    <!------------------------------------------------- Modal Edit Menu ------------------------------------------------------------>

                                    <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu Makanan dan Minuman</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <form class="needs-validation" novalidate action="proses/proses_edit_menu.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                        <input type="hidden" value="<?php echo $row['foto']; ?>" name="id">
                                                        <div class="row">

                                                            <div class="col-lg-7">



                                                                <div class="input-group mb-3">
                                                                    <input type="file" class="form-control py-3" id="upload_foto" placeholder="Your Name" name="foto" required>
                                                                    <label class="input-group-text" for="upload_foto">Upload Foto Menu</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukkan Foto Menu
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-5">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_menu" required value="<?php echo $row['nama_menu']; ?>">
                                                                    <label for="floatingInput">Nama Menu</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukkan Nama Menu
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-lg-12">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan" value="<?php echo $row['keterangan']; ?>">
                                                                    <label for="floatingPassword">Keterangan</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">

                                                                <div class="form-floating mb-3">
                                                                    <select class="form-select" aria-label="Default select example" name="ket_menu" required>
                                                                        <option selected hidden value="">Pilih Kategori Menu</option>
                                                                        <?php
                                                                        foreach ($select_ket_menu as $value) {
                                                                            if ($row['kategori'] == $value['id_ket_menu']) {
                                                                                echo "<option selected value=" . $value['id_ket_menu'] . ">$value[kategori_menu]</option>";
                                                                            } else {
                                                                                echo "<option value=" . $value['id_ket_menu'] . ">$value[kategori_menu]</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                                                    <div class="invalid-feedback">
                                                                        Pilih Kategori Makanan atau Minuman
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-4">
                                                                <div class="form-floating mb-3">
                                                                    <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required value="<?php echo $row['harga']; ?>">
                                                                    <label for="floatingInput">Harga</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukkan Harga Menu
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="form-floating mb-3">
                                                                    <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok" required value="<?php echo $row['stok']; ?>">
                                                                    <label for="floatingInput">Stok</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukkan Stok
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                    <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Edit-->

                                    <!-- Modal Delete -->

                                    <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" novalidate action="proses/proses_delete_menu.php" method="post">
                                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">

                                                        <div class="col-lg-12">
                                                            Apakah anda menghapus menu <b><?php echo $row['nama_menu'] ?></b>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Delete-->
                                <?php
                                }
                                ?>

                            <?php
                            }
                            if (empty($result)) {
                                echo "Data user tidak ada";
                            } else {
                            ?>

                            <?php
                            }
                            ?>
                        </div>

                        <?php

                        foreach ($result as $row) {
                        ?>
                            <div class="">
                            </div>
                            <div class="col-sm-10 mb-2" style="padding-left:150px; ">
                                <div class="menu card" style="background: #EEEEEE; border-style: dashed;">
                                    <img src="assets/img/<?php echo $row['foto'] ?>" class="card-img" alt="...">
                                    <div class="card-body">
                                        <h1 class="card-title">
                                            <center><b><?php echo $row['nama_menu'] ?></b></center>
                                        </h1>
                                        <h6 class="price">
                                            <center><?php echo ($row['harga']) ?></center>
                                        </h6>
                                        <button class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>">Edit</button>
                                        <button class="btn btn-info mb-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>">Lihat</button>
                                        <button class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>">Delete</button>

                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </body>
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
    $query = mysqli_query($conn, "SELECT * FROM tb_kategori_menu");
    while ($record = mysqli_fetch_array($query)) {
        $result[] = $record;
    }
    ?>
    <div class="col-12 mt-2 rounded-3" style="padding-left: 240px;">
        <div class="card">
            <div class="card-header">
                Halaman Kategori Menu
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahKetmenu">Tambah Kategori Menu</button>
                    </div>
                </div>

                <!-- Modal Tambah Kategori Menu Baru -->
                <div class="modal fade" id="ModalTambahKetmenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <form class="needs-validation" novalidate action="proses/proses_input_ketmenu.php" method="POST">
                                    <div class="row">

                                        <div class="col-lg-6">

                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="jenismenu">
                                                    <option value="1">Makanan</option>
                                                    <option value="2">Minuman</option>
                                                </select>
                                                <label for="floatingInput">Jenis Menu</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Jenis Menu
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Menu" name="ketmenu" required>
                                                <label for="floatingInput">Kategori Menu</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Kategori Menu
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <button type="submit" class="btn btn-primary" name="input_ketmenu_validate" value="12345">Save changes</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Tambah Kategori Menu Baru  -->

                <?php
                foreach ($result as $row) {
                ?>

                    <!-- Modal Edit -->

                    <div class="modal fade" id="ModalEditKetmenu<?php echo $row['id_ket_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <form class="needs-validation" novalidate action="proses/proses_edit_ketmenu.php" method="POST">
                                        <div class="row">
                                            <input type="hidden" value="<?php echo $row['id_ket_menu']; ?>" name="id">
                                            <div class="col-lg-6">

                                                <div class="form-floating mb-3">
                                                    <select name="jenismenu" class="form-select" aria-label="Default select example" id="" required>
                                                        <?php
                                                        $data = array("Makanan", "Minuman");
                                                        foreach ($data as $key => $value) {
                                                            if ($row['jenis_menu'] == $key + 1) {
                                                                echo "<option selected value = " . ($key + 1) . ">$value</option>";
                                                            } else {
                                                                echo "<option value = " . ($key + 1) . ">$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Jenis Menu</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Jenis Menu
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Menu" name="ketmenu" required value="<?php echo $row['kategori_menu'] ?>">
                                                    <label for="floatingInput">Kategori Menu</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Kategori Menu
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    <button type="submit" class="btn btn-primary" name="input_ketmenu_validate" value="12345">Save changes</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Edit-->

                    <!-- Modal Delete -->

                    <div class="modal fade" id="ModalDelete<?php echo $row['id_ket_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Kategori Menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_ketmenu.php" method="post">
                                        <input type="hidden" value="<?php echo $row['id_ket_menu'] ?>" name="id">

                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus kategori <b><?php echo $row['kategori_menu']; ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            <button type="submit" class="btn btn-danger" name="hapus_kategori_validate" value="12345">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Delete-->

                <?php
                }
                if (empty($result)) {
                    echo "Data user tidak ada";
                } else {


                ?>
                    <!-- tabel kategori menu -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jenis Menu </th>
                                    <th scope="col">Kategori Menu</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($result as $row) {

                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?> </th>
                                        <td> <?php echo ($row['jenis_menu'] == 1) ? "Makanan" : "Minuman" ?> </td>
                                        <td><?php echo $row['kategori_menu']; ?></td>

                                        <td class="d-flex">
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEditKetmenu<?php echo $row['id_ket_menu'] ?>"><i class="bi bi-pencil-square"></i></i></button>

                                            <button class="btn btn-danger btn-sm me-1 " data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_ket_menu'] ?>"><i class="bi bi-trash3-fill"></i></i></button>

                                        </td>

                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- akhir tabel kategori menu -->
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
<!-- end Content -->
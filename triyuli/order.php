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
                $query = mysqli_query($conn, "SELECT * FROM tb_order");
                while ($record = mysqli_fetch_array($query)) {
                    $result[] = $record;
                }
                ?>
                <div class="col-12 mt-2 rounded-3" style="padding-left: 240px;">
                    <div class="card">
                        <div class="card-header">
                            Halaman Order
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahOrder">Tambah Order</button>
                                </div>
                            </div>

                            <!-- Modal Tambah Order Baru -->
                            <div class="modal fade" id="ModalTambahOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">

                                            <form class="needs-validation" novalidate action="proses/proses_input_order.php" method="POST">

                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama_menu" required>
                                                            <label for="floatingInput">Nama Menu</label>
                                                            <div class="invalid-feedback">
                                                                Masukkan Nama Menu
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput" placeholder="08xxxx" name="jumlah">
                                                            <label for="floatingInput">Jumlah</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="08xxxx" name="harga">
                                                        <label for="floatingInput">Harga</label>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save changes</button>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Tambah User Baru  -->

                            <?php
                            foreach ($result as $row) {
                            ?>

                                <!-- Modal View -->

                                <div class="modal fade" id="ModalView<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Order</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-floating mb-3">
                                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="your name" name="nama" value="<?php echo $row['nama_menu'] ?>">
                                                                <label for="floatingInput">Nama</label>
                                                                <div class="invalid-feedback">
                                                                    Masukkan Nama
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-floating mb-3">
                                                                <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $row['jumlah'] ?>">
                                                                <label for="floatingInput">Jumlah Menu</label>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $row['harga'] ?>">
                                                            <label for="floatingInput"> Harga Total</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="input_order_validate" value="12345">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal View-->


                                <!-- Modal Edit -->

                                <div class="modal fade" id="ModalEdit<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Order</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" novalidate action="proses/proses_edit_order.php" method="post">
                                                    <input type="hidden" value="<?php echo $row['id_order'] ?>" name="id">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="floatingInput" placeholder="your name" name="nama_menu" value="<?php echo $row['nama_menu'] ?>" required>
                                                                <label for="floatingInput">Nama</label>
                                                                <div class="invalid-feedback">
                                                                    Masukkan Nama Menu
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">

                                                        <div class="col-lg-8">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="floatingInput" placeholder="08xxxx" name="jumlah" value="<?php echo $row['jumlah'] ?>">
                                                                <label for="floatingInput"> Jumlah</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-floating">
                                                        <div class="col-lg-8">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="floatingInput" placeholder="08xxxx" name="harga" value="<?php echo $row['harga'] ?>">
                                                                <label for="floatingInput"> Total Harga</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                        <button type="submit" class="btn btn-primary" name="input_order_validate" value="12345">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Edit-->

                                <!-- Modal Delete -->

                                <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Order</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" novalidate action="proses/proses_delete_order.php" method="post">
                                                    <input type="hidden" value="<?php echo $row['id_order'] ?>" name="id_order">
                                                    hapus order <?php echo $row['nama_menu'] ?>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                        <button type="submit" class="btn btn-danger" name="input_order_validate" value="12345">Delete</button>
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
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Menu</th>
                                                <th scope="col">Jumlah Order</th>
                                                <th scope="col">Harga</th>
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
                                                    <td> <?php echo $row['nama_menu']; ?></td>
                                                    <td><?php echo $row['jumlah']; ?></td>
                                                    <td><?php echo $row['harga']; ?></td>

                                                    <td class="d-flex">
                                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id_order'] ?>"><i class="bi bi-eye-fill"></i></button>

                                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_order'] ?>"><i class="bi bi-pencil-square"></i></i></button>

                                                        <button class="btn btn-danger btn-sm me-1 " data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_order'] ?>"><i class="bi bi-trash3-fill"></i></i></button>

                                                    </td>

                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </body>
            <!-- end Content -->
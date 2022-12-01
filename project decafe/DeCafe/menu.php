<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM daftar_menu
    LEFT JOIN kategori ON kategori.id_kat_menu = daftar_menu.kategori");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM kategori");
?>

<div class="col col-md-9 mt-3">
  <div class="card">
    <div class="card-header">
      Halaman Daftar Menu
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah Menu</button> 
        </div>
      </div>
      <!-- Modal tambah menu baru-->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="../DeCafe/proses/proses_input_menu.php"
              method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group mb-3">
                      <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto"
                        required>
                      <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                      <div class="invalid-feedback">
                        Masukkan Foto Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu"
                        name="nama_menu" required>
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
                      <input type="text" class="form-control" id="floatingInput" placeholder="keterangan"
                        name="keterangan">
                      <label for="floatingPassword">Keterangan</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example"
                      name="kat_menu" required>
                      <option selected hidden value="">Pilih Kategori</option>
                        <?php
foreach ($select_kat_menu as $value) {
    echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
}
?>
                      </select>
                      <label for="floatingInput">Kategori Menu Makanan atau Minuman</label>
                      <div class="invalid-feedback">
                        Pilih Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Harga"
                        name="harga" required>
                      <label for="floatingInput">Harga</label>
                      <div class="invalid-feedback">
                        Masukkan Harga Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Stok"
                        name="stok" required>
                      <label for="floatingInput">Stok</label>
                      <div class="invalid-feedback">
                        Masukkan Stok
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save
                    changes</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
      <!-- Akkhir modal tambah menu baru -->

      <?php
if (empty($result)) {
    echo "Data menu makanan dan minuman tidak ada";
} else {
    foreach ($result as $row) {
        ?>
      <!-- Modal view -->
      <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="../DeCafe/proses/proses_input_menu.php"
              method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input disabled type="text" class="form-control" id="floatingInput"
                        value="<?php echo $row['nama_menu'] ?>">
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
                      <input disabled type="text" class="form-control" id="floatingInput"
                      value="<?php echo $row['keterangan'] ?>">
                      <label for="floatingPassword">Keterangan</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <select disabled class="form-select" aria-label="Default select example"
                      >
                      <option selected hidden value="">Pilih Kategori</option>
                        <?php
foreach ($select_kat_menu as $value) {
            if ($row['kategori'] == $value['id_kat_menu']) {
                echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
            } else {
                echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
            }
        }
        ?>
                      </select>
                      <label for="floatingInput">Kategori Menu Makanan atau Minuman</label>
                      <div class="invalid-feedback">
                        Pilih Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-floating mb-3">
                      <input disabled type="number" class="form-control" id="floatingInput"
                      value="<?php echo $row['harga'] ?>">
                      <label for="floatingInput">Harga</label>
                      <div class="invalid-feedback">
                        Masukkan Harga Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-floating mb-3">
                      <input disabled type="number" class="form-control" id="floatingInput"
                      value="<?php echo $row['stock'] ?>">
                      <label for="floatingInput">Stok</label>
                      <div class="invalid-feedback">
                        Masukkan Stok
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save
                    changes</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
      <!-- Akhir modal view -->

      <!-- Modal Edit -->
      <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="../DeCafe/proses/proses_edit_menu.php"
              method="POST" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group mb-3">
                      <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto"
                        required>
                      <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                      <div class="invalid-feedback">
                        Masukkan Foto Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu"
                        name="nama_menu" required value="<?php echo $row['nama_menu'] ?>">
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
                      <input type="text" class="form-control" id="floatingInput" placeholder="keterangan"
                        name="keterangan" value="<?php echo $row['keterangan'] ?>">
                      <label for="floatingPassword">Keterangan</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example"
                     name="kat_menu" >
                      <option selected hidden value="">Pilih Kategori</option>
                        <?php
foreach ($select_kat_menu as $value) {
            if ($row['kategori'] == $value['id_kat_menu']) {
                echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
            } else {
                echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
            }
        }
        ?>
                      </select>
                      <label for="floatingInput">Kategori Menu Makanan atau Minuman</label>
                      <div class="invalid-feedback">
                        Pilih Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Harga"
                        name="harga" required value="<?php echo $row['harga'] ?>">
                      <label for="floatingInput">Harga</label>
                      <div class="invalid-feedback">
                        Masukkan Harga Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Stok"
                        name="stok" required value="<?php echo $row['stok'] ?>">
                      <label for="floatingInput">Stok</label>
                      <div class="invalid-feedback">
                        Masukkan Stok
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save
                    changes</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
      <!-- Akhir modal edit -->

      <!-- Modal delete -->
      <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_delete_menu.php" method="POST">
                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                <div class="col-lg-12">
                  Apakah anda ingin menu <b> <?php echo $row['nama_menu'] ?></b>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345">
                    Hapus
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir modal delete -->

      <?php
}

    ?>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="text-nowrap">
              <th scope="col">No</th>
              <th scope="col">Foto Menu</th>
              <th scope="col">Nama Menu</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Jenis Menu</th>
              <th scope="col">Kategori</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
$no = 1;
    foreach ($result as $row) {

        ?>
            <tr>
              <th scope="row">
                <?php echo $no++ ?>
              </th>
              <td>
                <div style="width:100px">
                  <img src="img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                </div>
              </td>
              <td>
                <?php echo $row['nama_menu'] ?>
              </td>
              <td>
                <?php echo $row['keterangan'] ?>
              </td>
              <td>
                <?php echo ($row['jenis_menu'] == 1) ? "Makanan" : "Minuman" ?>
              </td>
              <td>
                <?php echo $row['kategori_menu'] ?>
              </td>
              <td>
                <?php echo $row['harga'] ?>
              </td>
              <td>
                <?php echo $row['stock'] ?>
              </td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                    data-bs-target="#ModalView<?php echo $row['id'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
                      viewBox="0 0 16 16">
                      <path
                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                      <path
                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                    </svg>
                  </button>
                  <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                    data-bs-target="#ModalEdit<?php echo $row['id'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path
                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                      <path fill-rule="evenodd"
                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                  </button>
                  <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                    data-bs-target="#ModalDelete<?php echo $row['id'] ?>">
                    <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-trash" viewBox="0 0 16 16">
                      <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                      <path fill-rule="evenodd"
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
      <?php }?>
    </div>
  </div>
</div>
</div>
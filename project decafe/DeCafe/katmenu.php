<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM kategori");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col col-md-9 mt-3">
  <div class="card">
    <div class="card-header">
      Halaman Kategori Menu
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah Kategori Menu</button>
        </div>
      </div>
      <!-- Modal tambah user -->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="../DeCafe/proses/proses_input_katmenu.php" method="POST">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                    <select class="form-select" name="jenismenu" id="">
                        <option value="1">Makanan</option>
                        <option value="2">Minuman</option>
                      </select>
                      <label for="floatingInput">Jenis Menu</label>
                      <div class="invalid-feedback">
                        Jenis Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Menu"
                        name="katmenu" required>
                      <label for="floatingInput">Katergori Menu</label>
                      <div class="invalid-feedback">
                        Masukkan Kategori Menu
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_katmenu_validate" value="12345">Save
                    changes</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
      <!-- Akkhir modal tambah user -->

      <?php
foreach ($result as $row) {
    ?>

      <!-- Modal Edit -->
      <div class="modal fade" id="ModalEdit<?php echo $row['id_kat_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kategori Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="needs-validation" novalidate action="../DeCafe/proses/proses_edit_katmenu.php" method="POST">
              <input type="hidden" value="<?php echo $row['id_kat_menu'] ?>" name="id">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example" required name="jenismenu" id="">
                        <?php
                              $data = array("Makanan", "Minuman");
                                  foreach ($data as $key => $value) {
                                      if ($row['jenis_menu'] == $key + 1) {
                                          echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                      } else {
                                          echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                      }}
                                  ?>
                      </select>
                      <label for="floatingInput">Jenis Menu</label>
                      <div class="invalid-feedback">
                        Jenis Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Menu"
                        name="katmenu" required value="<?php echo $row['kategori_menu'] ?>">
                      <label for="floatingInput">Katergori Menu</label>
                      <div class="invalid-feedback">
                        Masukkan Kategori Menu
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_katmenu_validate" value="12345">Save
                    changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir modal edit -->

      <!-- Modal delete -->
      <div class="modal fade" id="ModalDelete<?php echo $row['id_kat_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete  Data Kategori Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_delete_katmenu.php" method="POST">
                <input type="hidden" value="<?php echo $row['id_kat_menu'] ?>" name="id">
                <div class="col-lg-12">
                  Apakah Anda Ingin Menghapus Kategori?<b><?php echo $row['kategori_menu'] ?></b>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="hapus_kategori_validate" value="12345">Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir modal delete -->

      <?php
}
if (empty($result)) {
    echo "Data User tidak ada";
} else {
    ?>
    <!-- Tabel daftar kategori Menu -->
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Jenis Menu</th>
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
              <th scope="row"><?php echo $no++ ?></th>
              <td><?php echo ($row['jenis_menu'] == 1 ? "Makanan" : "Minuman") ?></td>
              <td><?php echo $row['kategori_menu'] ?></td>
              <td class="d-flex">
                <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                  data-bs-target="#ModalEdit<?php echo $row['id_kat_menu'] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path
                      d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd"
                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                  </svg>
                </button>
                <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                  data-bs-target="#ModalDelete<?php echo $row['id_kat_menu'] ?>">
                  <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-trash" viewBox="0 0 16 16">
                    <path
                      d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd"
                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                  </svg>
                </button>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
      <!-- Akhir Tabel Daftar Kategori Menu -->
      <?php }?>
    </div>
  </div>
</div>
</div>
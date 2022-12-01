<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM user");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col col-md-9 mt-3">
  <div class="card">
    <div class="card-header">
      Halaman User
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah User</button>
        </div>
      </div>
      <!-- Modal tambah user -->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="../DeCafe/proses/proses_input_user.php" method="POST">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama"
                        required>
                      <label for="floatingInput">Nama</label>
                      <div class="invalid-feedback">
                        Masukkan Nama
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="username" required>
                      <label for="floatingInput">Username</label>
                      <div class="invalid-feedback">
                        Masukkan Username
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example" name="level" required>
                        <option selected hidden value="">Pilih Level User</option>
                        <option value="1">Owner/Admin</option>
                        <option value="2">Kasir</option>
                        <option value="3">Pelayan</option>
                        <option value="4">Dapur</option>
                      </select>
                      <label for="floatingInput">Level User</label>
                      <div class="invalid-feedback">
                        Masukkan Level
                      </div>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx"
                        name="nohp">
                      <label for="floatingInput">No HP</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="floatingInput" placeholder="Password" disabled
                        value="12345" name="password">
                      <label for="floatingPassword">Password</label>
                    </div>
                  </div>
                </div>
                <div class="form-floating">
                  <textarea class="form-control" id="" style="height: 100px;" name="alamat"></textarea>
                  <label for="floatingInput">Alamat</label>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save
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
      <!-- Modal view -->
      <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="../DeCafe/proses/proses_input_user.php" method="POST">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name"
                        name="nama" value="<?php echo $row['nama'] ?>">
                      <label for="floatingInput">Nama</label>
                      <div class="invalid-feedback">
                        Masukkan Nama
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input disabled type="email" class="form-control" id="floatingInput"
                        placeholder="name@example.com" name="username" value="<?php echo $row['username'] ?>">
                      <label for="floatingInput">Username</label>
                      <div class="invalid-feedback">
                        Masukkan Username
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <select disabled class="form-select" aria-label="Default select example" required name="level"
                        id="">
                        <?php
$data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
    foreach ($data as $key => $value) {
        if ($row['level'] == $key + 1) {
            echo "<option selected value='$key'>$value</option>";
        } else {
            echo "<option selected value='$key'>$value</option>";
        }}
    ?>
                      </select>
                      <label for="floatingInput">Level User</label>
                      <div class="invalid-feedback">
                        Masukkan Level
                      </div>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="form-floating mb-3">
                      <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx"
                        name="nohp" value="<?php echo $row['nohp'] ?>">
                      <label for="floatingInput">No HP</label>
                    </div>
                  </div>
                </div>
                <div class="form-floating">
                  <textarea disabled class="form-control" id="" style="height: 100px;"
                    name="alamat"><?php echo $row['alamat'] ?></textarea>
                  <label for="floatingInput">Alamat</label>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir modal view -->

      <!-- Modal Edit -->
      <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_edit_user.php" method="POST">
                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama"
                        required value="<?php echo $row['nama'] ?>">
                      <label for="floatingInput">Nama</label>
                      <div class="invalid-feedback">
                        Masukkan Nama
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input <?php echo ($row['username'] == $_SESSION['username_decafe']) ?
    'disabled' : ''; ?> type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="username" required value="<?php echo $row['username'] ?>">
                      <label for="floatingInput">Username</label>
                      <div class="invalid-feedback">
                        Masukkan Username
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example" required name="level" id="">
                        <?php
$data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
    foreach ($data as $key => $value) {
        if ($row['level'] == $key + 1) {
            echo "<option selected value=" . ($key + 1) . ">$value</option>";
        } else {
            echo "<option selected value=" . ($key + 1) . ">$value</option>";
        }}
    ?>
                      </select>
                      <label for="floatingInput">Level User</label>
                      <div class="invalid-feedback">
                        Masukkan Level
                      </div>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx"
                        name="nohp" value="<?php echo $row['nohp'] ?>">
                      <label for="floatingInput">No HP</label>
                    </div>
                  </div>
                </div>
                <div class="form-floating">
                  <textarea class="form-control" id="" style="height: 100px;"
                    name="alamat"><?php echo $row['alamat'] ?></textarea>
                  <label for="floatingInput">Alamat</label>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save
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
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete  Data User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_delete_user.php" method="POST">
                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                <div class="col-lg-12">
                  <?php
if ($row['username'] == $_SESSION['username_decafe']) {
        echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun sendiri</div>";
    } else {
        echo "Apakah anda yakin ingin menghapus user <b>$row[username]</b>";
    }
    ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_decafe']) ?
    'disabled' : ''; ?>>Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir modal delete -->

      <!-- Modal Reset Password -->
      <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-fullscreen-md-down">
          <div class="modal-content">
            <div class= "modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_reset_password.php" method="POST">
                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                <div class="col-lg-12">
                  <?php
if ($row['username'] == $_SESSION['username_decafe']) {
        echo "<div class='alert alert-danger'>Anda tidak dapat reset password sendiri</div>";
    } else {
        echo "Apakah anda yakin ingin mereset password <b>$row[username]</b> menjadi password bawaan sistem yaitu<b>password</b>";
    }
    ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_decafe']) ?
    'disabled' : ''; ?>>Reset Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir modal Reset Password -->

      <?php
}
if (empty($result)) {
    echo "Data User tidak ada";
} else {
    ?>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Username</th>
              <th scope="col">Level</th>
              <th scope="col">No Hp</th>
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
              <td><?php echo $row['nama'] ?></td>
              <td><?php echo $row['username'] ?></td>
              <td><?php
if ($row['level'] == 1) {
            echo "Admin";
        } elseif ($row['level'] == 2) {
            echo "Kasir";
        } elseif ($row['level'] == 3) {
            echo "Pelayan";
        } elseif ($row['level'] == 4) {
            echo "Dapur";
        }
        ?>
              </td>
              <td><?php echo $row['nohp'] ?></td>
              <td class="d-flex">
                <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                  data-bs-target="#ModalView<?php echo $row['id'] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
                    viewBox="0 0 16 16">
                    <path
                      d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
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
                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                  data-bs-target="#ModalResetPassword<?php echo $row['id'] ?>">
                  <i class="bi bi-key-fill"></i>
                </button>
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
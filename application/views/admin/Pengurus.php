 <div class="container-fluid">
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
        <div class="card-body">
        <div class="table-responsive">
        <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert"> Data
          <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>

        <button class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#tambah">
        <i class="fa fa-plus fa-sm"></i> Tambah pengurus</button>
        </button>
        </div>
        <table id="data" class="table table-bordered table-hover">
        <thead class="table-info">
      <tr>
            <th>No</th>
            <th>Nip</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>No.Hp</th>
            <th>Foto</th>
        <th style="width: 20%">Opsi</th>
      </tr>
        </thead>
    <tbody">
      <?php
      $no = 1;
      foreach ($pengurus as $row) : ?>
        <tr>
        <td width="20px"><?= $no++;?></td>
            <td><?= $row->nip; ?></td>
            <td><?= $row->nama; ?></td>
            <td><?= $row->j_kelamin; ?></td>
            <td><?= $row->jabatan; ?></td>
            <td width="70px"><?= $row->no_hp; ?></td>
            <td><img src="<?=base_url('assets/img/'.$row->foto) ?>" style="width: 50px;"></td>
            <td class="text-center">
                <a id="detail_pengurus" href="#" 
                class="badge badge-pill badge-info" data-toggle="modal"data-target="#detail" 
                data-nip="<?=$row->nip; ?>" 
                data-nama="<?=$row->nama; ?>" 
                data-j_kelamin="<?=$row->j_kelamin; ?>" 
                data-tgl_lahir="<?=date('d M Y',strtotime($row->tgl_lahir)); ?>" 
                data-jabatan="<?=$row->jabatan; ?>" 
                data-no_hp="<?=$row->no_hp; ?>" 
                data-foto="<?=$row->foto; ?>" 
                data-username="<?=$row->username; ?>" 
                data-password="<?=$row->password; ?>">
                <i class="fa fa-eye"></i> Detail</a>
                <a href="<?=base_url(); ?>admin/pengurus/edit/<?= $row->nip; ?>" 
                class="badge badge-pill badge-warning"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?=base_url(); ?>admin/pengurus/hapus/<?= $row->nip; ?>"
                class="badge badge-pill badge-danger" onclick="return confirm('yakin?');">
                <i class="fa fa-trash"></i> Hapus</a>    
            </td>
        </tr>  
        <?php endforeach; ?>
    </tbody>
    </table>

</div>
</div>
</div>
</div>

</div> 

<!-- Modal tambah-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" enctype="multipart/form-data" action="<?=base_url() .'admin/pengurus/tambah_aksi'; ?>">
            <div class="modal-body">
              <div class="container-fluid">
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <span>BIODATA PENGURUS</span>
                    <hr>
                      <div class="form-group">
                        <label>Nip</label>
                        <input type="number" class="form-control" id="nip" name="nip" 
                        required oninvalid="this.setCustomValidity('Nip harus diisi!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                        required oninvalid="this.setCustomValidity('Nama harus diisi!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" id="j_kelamin" name="j_kelamin">
                          <option selected>--Pilih Jenis Kelamin--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= date('Y-m-d')?>" 
                        required oninvalid="this.setCustomValidity('Tanggal Lahir harus diisi!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                          <option selected>--Pilih Jabatan--</option>
                          <?php foreach ($jabatan as $row) : ?>
                            <option value="<?=$row->id_jabatan; ?>">
                             <?=$row->jabatan; ?>
                            </option>
                          <?php endforeach; ?> 
                        </select>
                    </div>
                      <div class="form-group">
                        <label>No Hp</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp"
                        required oninvalid="this.setCustomValidity('Nomor HP harus diisi!')" oninput="setCustomValidity('')">
                      </div>
                    <!-- <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div> -->
                    </div>
                    <div class="col-4 col-sm-6">
                    <span>AKUN PENGURUS</span>
                    <hr>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                        required oninvalid="this.setCustomValidity('Username harus diisi!')" oninput="setCustomValidity('')">
                      </div>
                      <div class="form-group">
                      <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                        required oninvalid="this.setCustomValidity('Password harus diisi!')" oninput="setCustomValidity('')">
                        <input type="checkbox" id="show"> Show password
                      </div>
                      <div class="form-group">
                        <label>Role/Hak Akses</label>
                        <select class="form-control" id="role" 
                        name="role">
                          <option selected>--Pilih Role--</option>
                          <?php foreach ($role as $row) : ?>
                            <option value="<?=$row->id_role; ?>">
                             <?=$row->role; ?>
                            </option>
                          <?php endforeach; ?> 
                        </select>
                      </div>
                    </div>
                  </div>
              </div>   
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>
                    </div>
            </div>
    </div>
  </div>
</div>
<!-- end Modal tambah-->

<!-- Modal detail-->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body" id="modal-detail">
              <table class="table">
                <tbody>
                <tr>
                    <th>Nip</th>
                    <td>
                    <input type="text" class="form-control" id="nip" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>
                    <input type="text" class="form-control" id="nama" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                    <input type="text" class="form-control" id="j_kelamin" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>
                    <input type="text" class="form-control" id="tgl_lahir" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>
                    <input type="text" class="form-control" id="jabatan" readonly>
                    </td>
                </tr>
                <tr>
                    <th>No.Hp</th>
                    <td>
                    <input type="text" class="form-control" id="no_hp" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>
                    <input type="text" class="form-control" id="username" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                    <input type="text" class="form-control" id="password" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td><img src="" id="foto" width="80px"></td>
                </tr>
                </tbody>
              </table>
            </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>
<!-- end Modal detail-->

<!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin mau logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika pilih ya anda akan logout, ingin batal klik cancel atau tanda kali(x)</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>


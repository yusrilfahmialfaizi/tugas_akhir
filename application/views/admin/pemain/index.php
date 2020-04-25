<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo site_url('admin/home') ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Pemain</li>
</ol>
<div class="col-xs-12">

  <div class="box">
    <div class="box-header">
      <h2 class="page-header" style="display: initial;">Pemain</h2>
      <a href="<?php echo site_url('admin/pemain/tambah') ?> " class="btn btn-success" style="float: right;">Tambah Pemain Baru</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="table_id" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Posisi</th>
            <th>Tanggal Lahir</th>
            <th>Tinggi</th>
            <th>Berat Badan</th>
            <th>Jurusan</th>
            <th>Pilihan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($data as $key => $v) { ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $v->nama_pemain ?></td>
              <td><?= $v->nim ?></td>
              <td><?= $v->posisi ?></td>
              <td><?= $v->tanggal_lahir ?></td>
              <td><?= $v->tinggi ?> cm</td>
              <td><?= $v->berat_badan ?> kg</td>
              <td><?= $v->jurusan ?></td>
              <td>
                <a href="<?= site_url('admin/pemain/hapus/' . $v->id_pemain) ?>" class="btn btn-danger">Hapus</a>
                <a href="<?= site_url('admin/pemain/edit/' . $v->id_pemain) ?>" class="btn btn-warning">Edit</a>
              </td>
            </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
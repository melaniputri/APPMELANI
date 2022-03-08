<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<?php
    if (session()->getflashdata('success')){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<?= session()->getFlashdata('success')?>
<button type="button" class="close" data-dismiss="alert" aria-label="close">x</button>
</div>
<?php
    }
?>
<div class="row">
    <div class="col-md-6">
        <form action="<?=base_url('pesan')?>" method="post">
            <div class="card shadow mb-3 border-left-secondary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Silahkan Pilih menu</option>
                            <?php
                            foreach($data as $key=>$row){
                            ?>
                                <option value="<?=$row['id']?>"><?=$row['nama']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Keranjang</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form action="<?=base_url('pesanan')?>" method="post">
        <div class="card shadow mb-3 border-left-secondary">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_pemesan">Nama Pemesan</label>
                    <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan">
                </div>
                <div class="form-group">
                    <label for="no_meja">Nomor Meja</label>
                    <input type="number" class="form-control" name="no_meja" id="no_meja">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<div class="container">
<div class="card">
        <div class="card-header">
    <h3 class="card-title"><b><i>Data Pesanan</i></b></h3>

    <table class="table-responsive">
        <table class="table table-striped">
        <thead>
            <th>No</th>
            <th>Menu_id</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Subtotal</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            if($menu !=null){
                $no= 0;
                foreach($menu as $row){
                    $no++
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['menu_id']?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['harga']?></td>
                <td><?=$row['jumlah']*$row['harga']?></td>
                <td><a href="<?= base_url('pesanan/delete/'.$row['menu_id'])?>" class="btn btn-secondary">Hapus</a>
            </tr>
            <?php
                }
            }?>
        </tbody>
        </table>
    </div>
</div>

<!-- <div class="card-footer">
    <button class="btn btn-secondary">Bayar</button>
</div> -->
</div>
<?= $this->endSection()?>
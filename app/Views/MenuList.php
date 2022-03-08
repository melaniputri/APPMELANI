<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<?php
   if (session()->getFlashdata('success')){ 
?>
<div class="alert alert-success alert-dismissible fade-show" role="alert">
<?= session()->getFlashdata('success')?>
<button type="button" class="close" data-dismiss="alert" aria-label="close">x</button>
</div>
<?php
   }
?>

<div class="container">
<h3><b><i>Data Menu</i></b></h3>
    <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#addMenu">Tambah Data</button>

    <table class="table table-striped">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Stok</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($data as $row):
            ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $row['nama']?></td>
                <td><?= $row['harga']?></td>
                <td><?= $row['jenis']?></td>
                <td><?= $row['stok']?></td>
                <td><a href="#" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editMenu-<?= $row['id']?>">Edit</a>
                <a href="<?= base_url('/MenuController/delete/'.$row['id'])?>" onclick="return confirm('Yakin akan dihapus')" class="btn btn-secondary btn-sm btn-hapus">Hapus</a></td>         
            </tr>
            
            <form action="<?= base_url('menu/edit/'.$row['id'])?>" method="post">
<div class="modal fade" id="editMenu-<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                <button type="button" class="close" data-dissmis="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('menus')?>" method="post">
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class=" form-control" name="nama" id="nama" value="<?=$row['nama']?>">
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" value="<?=$row['harga']?>">
                </div>
                <div class="form-group">
                    <label>Jenis</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="makanan" <?=$row['jenis']=="makanan"?"chacked":""?>>
                        <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault2" value="minuman" <?=$row['jenis']=="minuman"?"chacked":""?>>
                        <lebl class="form-check-label" for="flexRadioDefault2">Minuman</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault3" value="camilan" <?=$row['jenis']=="camilan"?"chacked":""?>>
                        <lebl class="form-check-label" for="flexRadioDefault3">Camilan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok" value="<?=$row['stok']?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dissmis="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</form>
            <?php
            $no++;
            endforeach?>
        </tbody>
    </table>
</div>

<form action="/MenuController/simpan" method="post">
    <div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                        <button type="button" class="close" data-dissmis="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?=base_url('menus')?>" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama Menu</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Menu" required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" name="harga" placeholder="Harga" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="makanan" required>
                                <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault2" value="minuman" required>
                                <label class="form-check-label" for="flexRadioDefault2">Minuman</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault3" value="camilan" required>
                                <label class="form-check-label" for="flexRadioDefault3">Camilan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text"  class="form-control" name="stok" placeholder="Stok" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dissmis="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection()?>
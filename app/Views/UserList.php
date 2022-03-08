<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<?php
    if(session()->getFlashdata('success')){
?>
<div class="alert alert-success alert-dismissible fade-show" role="alert">
<?= session()->getFlashdata('success')?>
<button type="button" class="close" data-dissmis="alert" aria-label="close">x</button>
</div>
<?php
    }
?>

<div class="container">
    <h3><b><i>Data User</i></b></h3>
    <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#addUser">Tambah Data</button>

    <table class="table table-striped">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
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
                <td><?= $row['username']?></td>
                <td><?= $row['role']?></td>
                <td><a href="#" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editUser-<?= $row['id']?>">Edit</a>
                <a href="<?= base_url('/UserController/delete/'.$row['id'])?>" onclick="return confirm('Yakin akan dihapus')" class="btn btn-secondary btn-sm btn-hapus">Hapus</a></td>
            </tr>
            <form action="<?= base_url('user/edit/'.$row['id'])?>" method="post">
            <div class="modal fade" id="editUser-<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dissmis="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('users')?>" method="post">
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class=" form-control" name="nama" id="nama" value="<?=$row['nama']?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?=$row['username']?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" id="password" value="<?=$row['password']?>">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="kasir" <?=$row['role']=="kasir"?"chaked":""?>>
                        <label class="form-check-label" for="flexRadioDefault1">Kasir</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="manager" <?=$row['role']=="manager"?"chaked":""?>>
                        <label class="form-check-label" for="flexRadioDefault2">Manager</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3" value="admin" <?=$row['role']=="admin"?"chaked":""?>>
                        <label class="form-check-label" for="flexRadioDefault3">Admin</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dissmis="modal">Close</button>
                </div>
                </form>
            </div>
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

<form action="/UserController/simpan" method="post">
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dissmis="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('users')?>" method="post">
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama User" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="text"  class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="kasir" required>
                        <label class="form-check-label" for="flexRadioDefault1">Kasir</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="manager" required>
                        <label class="form-check-label" for="flexRadioDefault2">Manager</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3" value="admin" required>
                        <label class="form-check-label" for="flexRadioDefault3">Admin</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dissmis="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</form>
<?= $this->endSection()?>
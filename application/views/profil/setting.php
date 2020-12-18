
        <div class="container">
            <?php if( $this->session->flashdata('pesan') ) : ?>
                <div class="row">
                    <div class="col-12">
                        <?=$this->session->flashdata('pesan')?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 mb-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control form-control-sm" value="<?= $user['username']?>" readonly>
                            </div>
                            <div class="alert alert-info"><i class="fa fa-info-circle mr-1 text-info"></i>Isi form berikut ini untuk mengubah password</div>
                            <form action="<?= base_url()?>setting/edit_password" method="post">
                                <input type="hidden" name="id" value="<?= MD5($user['id_user'])?>" readonly>
                                <div class="form-group">
                                    <label for="pass">Password Baru</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="konfirm_pass">Konfirm Password</label>
                                    <input type="password" name="password2" id="password2" class="form-control form-control-sm" required>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" value="Ubah Password" class="btn btn-sm btn-success" id="btnSubmitEditPassword">
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>

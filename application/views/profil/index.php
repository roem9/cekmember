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
                        <li class="list-group-item"><i class="fa fa-id-card mr-2"></i><?= $user['username']?></li>
                        <li class="list-group-item"><i class="fa fa-user mr-2"></i><?= $user['nama']?></li>
                        <li class="list-group-item"><i class="fa fa-birthday-cake mr-2"></i><?= $user['t4_lahir'].", ".date('d-m-Y', strtotime($user['tgl_lahir']))?></li>
                        <li class="list-group-item"><i class="fa fa-phone mr-2"></i><?= $user['no_hp']?></li>
                        <li class="list-group-item"><i class="fa fa-envelope mr-2"></i><?= $user['email']?></li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="alert alert-info"><i class="fa fa-info-circle text-info mr-1"></i>jika ada data yang tidak sesuai silahkan hubungi <a href="https://api.whatsapp.com/send?phone=6281222739243&text=Mohon%20maaf%20terjadi%20kesalahan%20data%20untuk%20peserta%20dengan%20nama%20<?=$user['nama']?>%20dan%20id%20<?=$user['username']?>,%20adapun%20kesalahan%20data%20adalah%20sebagai%20berikut%20:%20" target="_blank"> <u><b>admin</b></u></a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>
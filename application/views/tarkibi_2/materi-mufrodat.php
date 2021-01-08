        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="<?= base_url()?>tarkibi2/kelas/<?= $link?>" class="btn btn-sm btn-success"><i class="fa fa-home mr-1"></i>Tarkibi 2</a>
                </div>
                <?php foreach ($image as $image) :?>
                    <div class="col-12 col-md-4 mb-3">
                        <?= $image?>
                        <!-- <img src="<?= base_url()?>assets/<?= $image?>" class="img-rounded img-fluid" alt="Cinque Terre"> -->
                    </div>
                <?php endforeach;?>
                <div class="col-12 mb-3">
                    <?php if($back != "" && $next == "") :?>
                        <div class="d-flex justify-content-start">
                            <a href="<?= base_url()?>tarkibi2/kelas/<?= $link?>?pertemuan=<?= $back?>" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    <?php elseif($back != "" && $next != "") :?>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url()?>tarkibi2/kelas/<?= $link?>?pertemuan=<?= $back?>" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i></a>
                            <a href="<?= base_url()?>tarkibi2/kelas/<?= $link?>?pertemuan=<?= $next?>" class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    <?php elseif($back == "" && $next != "") :?>
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url()?>tarkibi2/kelas/<?= $link?>?pertemuan=<?= $next?>" class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    <?php endif;?>
                </div>
                <?php if($latihan):?>
                    <div class="col-12 mb-3">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-warning">Latihan</li>
                            <li class="list-group-item d-flex">
                                <a href="<?= base_url()?>tarkibi2/kelas/<?= $link?>?latihan=<?= MD5($title)?>" class="btn btn-sm btn-block btn-success mr-3">
                                    <div class="d-flex justify-content-between">Latihan 1 </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>
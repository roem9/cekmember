        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c" class="btn btn-sm btn-success"><i class="fa fa-home mr-1"></i>Menu Utama</a>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card border-info">
                        <div class="card-header list-group-item-info d-flex justify-content-between"><span><?= $materi?></span></div>
                        <div class="card-body">
                            <a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?materi=<?= MD5($title)?>" class="btn btn-block btn-sm btn-info"><i class="fa fa-book mr-1"></i> Materi</a>
                        </div>
                    </div>
                </div>
                <?php 
                    $data = COUNT($mufrodat);
                    for ($i=1; $i < $data ; $i++) :?>
                    <?php $j = $i - 1;?>
                    <!-- <div class="col-12 col-md-4 mb-3"> -->
                        <?php if($mufrodat[$i]['mufrodat'] == 100) :?>
                            <div class="col-12 col-md-4 mb-3 hide">
                            <div class="card border-primary">
                            <div class="card-header list-group-item-primary text-center text-dark"><span class="arab"><?= $mufrodat[$i]['title']?></span></div>
                        <?php else:?>
                            <div class="col-12 col-md-4 mb-3">
                            <div class="card border-danger">
                            <div class="card-header list-group-item-danger text-center text-dark arab"><?= $mufrodat[$i]['title']?></div>
                        <?php endif;?>
                        <?php if($mufrodat[$i]['mufrodat'] == 100) :?>
                            <div class="card-header list-group-item-primary d-flex justify-content-between"><span class="text-dark"><?= $mufrodat[$i]['title_arti']?></span><p class="badge badge-danger ml-1"><?= $mufrodat[$i]['count']?></p></div>
                        <?php else :?>
                            <div class="card-header list-group-item-danger d-flex justify-content-between"><span class="text-dark"><?= $mufrodat[$i]['title_arti']?></span><p class="badge badge-danger ml-1"><?= $mufrodat[$i]['count']?></p></div>
                        <?php endif;?>
                            <div class="card-body">
                                <?php if($mufrodat[$i]['mufrodat'] < 100) :?>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $mufrodat[$i]['mufrodat']?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?= floor($mufrodat[$i]['mufrodat'])?>%</div>
                                    </div>
                                <?php endif;?>
                                <?php if($mufrodat[$i]['mufrodat'] == 100) :?>
                                    <a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?id=<?= MD5($mufrodat[$i]['latihan'])?>" class="btn btn-block btn-sm btn-primary d-flex justify-content-between"><span><i class="fa fa-book mr-1"></i> Belajar </span><span><?= date("H:i d-m-y", strtotime($mufrodat[$i]['tgl']))?></span></a>
                                <?php else :?>
                                    <a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?id=<?= MD5($mufrodat[$i]['latihan'])?>" class="btn btn-block btn-sm btn-danger"><i class="fa fa-book mr-1"></i>Belajar</a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                <?php endfor;?>

                <div class="col-12">
                    <?php if($back != "" && $next != "") :?>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url()?><?= $back?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left "></i></a>
                            <a href="<?= base_url()?><?= $next?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    <?php elseif($back != "" && $next == ""):?>
                        <div class="d-flex justify-content-start">
                            <a href="<?= base_url()?><?= $back?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left "></i></a>
                        </div>
                    <?php elseif($back == "" && $next != "") :?>
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url()?><?= $next?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>
<script>
    // $(".hide").hide();

    // $(".show-all").click(function(){
    //     $(".hide").show();
    //     $(".show-all").hide();
    // })
</script>
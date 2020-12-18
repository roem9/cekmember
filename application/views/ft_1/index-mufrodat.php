        <div class="container">
            <div class="row">
                <?php 
                    $data = COUNT($mufrodat);
                    for ($i=1; $i < $data+1 ; $i++) :?>
                    <!-- <div class="col-12 col-md-4 mb-3"> -->
                        <?php if($mufrodat[$i]['mufrodat'] == 100) :?>
                            <div class="col-12 col-md-4 mb-3 hide">
                            <div class="card border-primary">
                        <?php else:?>
                            <div class="col-12 col-md-4 mb-3">
                            <div class="card border-danger">
                        <?php endif;?>
                        <?php if($mufrodat[$i]['mufrodat'] == 100) :?>
                            <div class="card-header list-group-item-primary d-flex justify-content-between"><span class="text-dark arab"><?= $mufrodat[$i]['title']?></span><p class="badge badge-danger ml-1"><?= $mufrodat[$i]['count']?></p></div>
                        <?php else :?>
                            <div class="card-header list-group-item-danger d-flex justify-content-between"><span class="text-dark arab"><?= $mufrodat[$i]['title']?></span><p class="badge badge-danger ml-1"><?= $mufrodat[$i]['count']?></p></div>
                        <?php endif;?>
                            <div class="card-body">
                                <?php if($mufrodat[$i]['mufrodat'] < 100) :?>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $mufrodat[$i]['mufrodat']?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?= floor($mufrodat[$i]['mufrodat'])?>%</div>
                                    </div>
                                <?php endif;?>
                                <?php if($mufrodat[$i]['mufrodat'] == 100) :?>
                                    <a href="<?= base_url()?>ft_1/mufrodat?id=<?= MD5($mufrodat[$i]['latihan'])?>" class="btn btn-block btn-sm btn-primary d-flex justify-content-between"><span><i class="fa fa-book mr-1"></i> Belajar </span><span><?= date("H:i d-m-y", strtotime($mufrodat[$i]['tgl']))?></span></a>
                                <?php else :?>
                                    <a href="<?= base_url()?>ft_1/mufrodat?id=<?= MD5($mufrodat[$i]['latihan'])?>" class="btn btn-block btn-sm btn-danger"><i class="fa fa-book mr-1"></i>Belajar</a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                <?php endfor;?>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>
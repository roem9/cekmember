        <div class="container">
            <div class="row">
                <?php 
                    for ($i=1; $i < COUNT($tema) ; $i++) :?>
                    <?php $j = $i - 1;?>
                    <!-- <div class="col-12 col-md-4 mb-3"> -->
                        <?php if($tema[$i]['status'] == "on"):?>
                            <?php if($tema[$i]['mufrodat'] == 100) :?>
                                <div class="col-12 col-md-4 mb-3">
                                <div class="card border-primary">
                                <div class="card-header list-group-item-primary d-flex justify-content-between"><span class="text-dark"><strong><?= $tema[$i]['title']?></strong></span><span class="badge badge-success text-light"><?= $tema[$i]['count']?></span></div>
                            <?php else:?>
                                <div class="col-12 col-md-4 mb-3">
                                <div class="card border-danger">
                                <div class="card-header list-group-item-danger d-flex justify-content-between"><span class="text-dark"><strong><?= $tema[$i]['title']?></strong></span><span class="badge badge-success text-light"><?= $tema[$i]['count']?></span></div>
                            <?php endif;?>
                                <div class="card-body">
                                    
                                    <?php if($tema[$i]['mufrodat'] < 100) :?>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $tema[$i]['mufrodat']?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?= floor($tema[$i]['mufrodat'])?>%</div>
                                        </div>
                                    <?php endif;?>
                                    <?php if($tema[$i]['mufrodat'] == 100) :?>
                                        <a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?tema=<?= MD5($tema[$i]['title_arti'])?>" class="d-flex justify-content-between btn btn-block btn-sm btn-primary"><span><i class="fa fa-book mr-1"></i> Mulai</span><span><?= date("H:i d-m-y", strtotime($tema[$i]['tgl']))?></span></a>
                                    <?php else :?>
                                        <a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?tema=<?= MD5($tema[$i]['title_arti'])?>" class="btn btn-block btn-sm btn-danger"><i class="fa fa-book mr-1"></i> Mulai</a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                <?php endfor;?>
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
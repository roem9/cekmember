<div class="container">
            <?php if( $this->session->flashdata('pesan') ) : ?>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <?= $this->session->flashdata('pesan');?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 mb-2">
                    <a href="<?= base_url()?>ft_1/qowaid" class="btn btn-sm btn-success"><i class="fa fa-home mr-1"></i>Qowaid</a>
                </div>
                <div class="col-12 mb-3">
                    <img src="<?= base_url()?>assets/img/qowaid_ft1/1.1.jpg" class="img-rounded img-fluid" alt="Cinque Terre">
                </div>
                <div class="col-12 mb-3">
                    <img src="<?= base_url()?>assets/img/qowaid_ft1/1.2.jpg" class="img-rounded img-fluid" alt="Cinque Terre">
                </div>
                <div class="col-12 mb-3">
                    <div class="d-flex justify-content-end">
                        <a href="<?= base_url()?>/ft_1/qowaid?id=<?= MD5('Mufrod & Mutsanna')?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-warning">Latihan</li>
                        <li class="list-group-item"><a href="<?= base_url()?>ft_1/qowaid?ln=<?= Md5('Mudzakkar & Muannats')?>&i=1" class="btn btn-sm btn-block btn-success">Latihan 1</a></li>
                        <li class="list-group-item"><a href="<?= base_url()?>ft_1/qowaid?ln=<?= Md5('Mudzakkar & Muannats')?>&i=2" class="btn btn-sm btn-block btn-success">Latihan 2</a></li>
                        <li class="list-group-item"><a href="<?= base_url()?>ft_1/qowaid?ln=<?= Md5('Mudzakkar & Muannats')?>&i=3" class="btn btn-sm btn-block btn-success">Latihan 3</a></li>
                        <li class="list-group-item"><a href="<?= base_url()?>ft_1/qowaid?ln=<?= Md5('Mudzakkar & Muannats')?>&i=4" class="btn btn-sm btn-block btn-success">Latihan 4</a></li>
                        <li class="list-group-item"><a href="<?= base_url()?>ft_1/qowaid?ln=<?= Md5('Mudzakkar & Muannats')?>&i=5" class="btn btn-sm btn-block btn-success">Latihan 5</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div>
<script>
    $("#font").change(function(){
        let font = $(this).val();
        $("[id='container-content']").css("font-size", font)
    })
</script>


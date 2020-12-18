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
                    <img src="<?= base_url()?>assets/img/qowaid_ft1/5.1.jpg" class="img-rounded img-fluid" alt="Cinque Terre">
                </div>
                <div class="col-12 mb-3">
                    <img src="<?= base_url()?>assets/img/qowaid_ft1/5.2.jpg" class="img-rounded img-fluid" alt="Cinque Terre">
                </div>
                <div class="col-12 mb-3">
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url()?>/ft_1/qowaid?id=<?= MD5('Jamak Taksir')?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left"></i></a>
                        <a href="<?= base_url()?>/ft_1/qowaid?id=<?= MD5('Dhomir Muttashil')?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-warning">Latihan</li>
                        <li class="list-group-item"><a href="<?= base_url()?>ft_1/qowaid?ln=<?= MD5("Dhomir Munfashil")?>&i=1" class="btn btn-sm btn-block btn-success">Latihan 1</a></li>
                        <li class="list-group-item"><a href="<?= base_url()?>ft_1/qowaid?ln=<?= MD5("Dhomir Munfashil")?>&i=2" class="btn btn-sm btn-block btn-success">Latihan 2</a></li>
                        <li class="list-group-item"><a href="<?= base_url()?>ft_1/qowaid?ln=<?= MD5("Dhomir Munfashil")?>&i=3" class="btn btn-sm btn-block btn-success">Latihan 3</a></li>
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


<!-- Modal -->
<div class="modal fade" id="daftarIsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarIsiTitle">Tipe Latihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <div class="listGroup"></div>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

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
                    <img src="<?= base_url()?>assets/img/qowaid_ft1/8.1.jpg" class="img-rounded img-fluid" alt="Cinque Terre">
                </div>
                <div class="col-12 mb-3">
                    <img src="<?= base_url()?>assets/img/qowaid_ft1/8.2.jpg" class="img-rounded img-fluid" alt="Cinque Terre">
                </div>
                <div class="col-12 mb-3">
                    <img src="<?= base_url()?>assets/img/qowaid_ft1/8.3.jpg" class="img-rounded img-fluid" alt="Cinque Terre">
                </div>
                <div class="col-12 mb-3">
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url()?>ft_1/qowaid?id=<?= MD5('Fiil Madhi')?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left "></i></a>
                        <a href="<?= base_url()?>ft_1/qowaid?id=<?= MD5('Fiil Amr')?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-warning">Latihan</li>
                        <li class="list-group-item"><a href="#daftarIsi" data-toggle="modal" data-id="<?= base_url()?>ft_1/qowaid?ln=<?= Md5('Fiil Mudhori')?>&i=1" class="btn btn-sm btn-block btn-success btnMulai">Latihan 1</a></li>
                        <li class="list-group-item"><a href="#daftarIsi" data-toggle="modal" data-id="<?= base_url()?>ft_1/qowaid?ln=<?= Md5('Fiil Mudhori')?>&i=2" class="btn btn-sm btn-block btn-success btnMulai">Latihan 2</a></li>
                        <li class="list-group-item"><a href="#daftarIsi" data-toggle="modal" data-id="<?= base_url()?>ft_1/qowaid?ln=<?= Md5('Fiil Mudhori')?>&i=3" class="btn btn-sm btn-block btn-success btnMulai">Latihan 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div>

<script>
    $(".btnMulai").click(function(){
        let link = $(this).data("id")
        $("#daftarIsiTitle").html($(this).html())
        let html = `
            <li class="list list-group-item d-flex justify-content-between">1. Pilihan Ganda <span><a href="`+link+`&j=1" class="btn btn-sm btn-info img-shadow">mulai</a></span></li>
            <li class="list list-group-item d-flex justify-content-between">2. Isian <span><a href="`+link+`&j=2" class="btn btn-sm btn-info img-shadow">mulai</a></span></li>
        `;

        $(".listGroup").html(html)
    })

    $("#font").change(function(){
        let font = $(this).val();
        $("[id='container-content']").css("font-size", font)
    })
</script>


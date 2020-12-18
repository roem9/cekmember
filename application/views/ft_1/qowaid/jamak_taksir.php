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
                
                <?php
                    for ($i=105; $i < 117; $i++) :?>
                    <div class="col-12 mb-3">
                        <img src="<?= base_url()?>assets/img/ft_1/<?= $i?>.jpg" class="img-rounded img-fluid" alt="Cinque Terre">
                    </div>
                <?php endfor;?>
                <div class="col-12 mb-3">
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url()?>ft_1/qowaid?id=<?= MD5('Jamak Mudzakkar & Muannats Salim')?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left "></i></a>
                        <a href="<?= base_url()?>ft_1/qowaid?id=<?= MD5('Dhomir Munfashil')?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div>



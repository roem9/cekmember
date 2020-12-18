       
<!-- Modal -->
<div class="modal fade" id="daftarIsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarIsiTitle">Materi Full Time 1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li class="list list-group-item d-flex justify-content-between">1. Mufrodat Full Time 1 <span><a href="<?= base_url()?>ft_1/mufrodat" class="btn btn-sm btn-info img-shadow">mulai</a></span></li>
            <li class="list list-group-item d-flex justify-content-between">2. Qowaid Full Time 1 <span><a href="<?= base_url()?>ft_1/qowaid" class="btn btn-sm btn-info img-shadow">mulai</a></span></li>
            <li class="list list-group-item d-flex justify-content-between">3. Ibarah Yaumiyah 1 <span><a href="<?= base_url()?>ibarah/awwal" class="btn btn-sm btn-info img-shadow">mulai</a></span></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

        <div class="container">
            <div class="row">
                <div class="col-4 col-md-4 mb-3">
                    <span><a href="#daftarIsi" data-toggle="modal" class="btn btn-sm btn-success img-shadow btnMulai"><i class="fa fa-book mr-2"></i>materi</a></span>
                </div>
                <?php 
                    foreach ($tema as $tema) :?>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card rounded-lg border-primary">
                                <div class="card-header d-flex justify-content-center list-group-item-primary">
                                    <span class="text-dark arab"><?= $tema['tema']?><span>
                                </div>
                                <div class="card-body">
                                    <a href="<?= base_url()?>ibarah/awwal?id=<?= MD5($tema['id'])?>" class="d-flex justify-content-center btn btn-block btn-sm btn-primary btnDaftarIsi"><span><?= $tema['tema_in']?></span></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>
<script>
</script>
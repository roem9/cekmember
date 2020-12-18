        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    
                    <a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?tema=<?= md5($tema)?>" class="btn btn-sm btn-success"><i class="fa fa-home mr-1"></i>Hifdzi 1</a>
                    <!-- <a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c" class="text-primary"><u>Hifdzi 1</u></a> / <a class="text-primary" href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?tema=<?= md5($tema)?>"><u><?= $tema?></u></a> / <a class="text-primary" href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?id=<?= md5($materi)?>"><u><?= $title?></u></a> -->
                    <!-- <a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c" class="text-light"><u>Hifdzi 1</u></a> / <a class="text-light" href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?tema=<?= md5($tema)?>"><u><?= $tema?></u></a> / <?= $title?> -->
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <!-- <label for="font">Ukuran Font</label> -->
                        <select name="font" id="font" class="form-control form-control-sm">
                            <option value="16px">Ganti Ukuran Font</option>
                            <option value="16px">16</option>
                            <option value="18px">18</option>
                            <option value="20px">20</option>
                            <option value="22px">22</option>
                            <option value="24px">24</option>
                        </select>
                    </div>
                </div>
                <?php $repeat = 0;?>
                <?php if(!empty($latihan[0]) && !empty($latihan[1]) && !empty($latihan[2])):?>
                    <div class="col-12 mb-1">
                        <div class="alert alert-success" style="font-size: 14px"><i class="fa fa-check-circle mr-1 text-success"></i>Anda telah menyelesaikan pelajaran ini</div>
                    </div>
                    <?php if( $this->session->flashdata('pesan') ) : ?>
                            <div class="col-12">
                                <?= $this->session->flashdata('pesan');?>
                            </div>
                    <?php endif; ?>
                <?php endif;?>
                <?php if(COUNT($mufrodat) != 0):?>
                    <?php foreach ($mufrodat as $mufrodat) :?>
                        <div class="col-12 col-md-4 mb-1">
                            <ul class="list-group shadow">
                                <li class="list-group-item d-flex justify-content-between arab" id="container-content">
                                    <a class="" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $mufrodat['arti']?>">
                                        <i class="fa fa-info-circle text-info fa-lg"></i>
                                        <!-- <span class="btn btn-sm btn-outline-info text-info">arti</span> -->
                                    </a>
                                    <span>
                                        <?= $mufrodat['kata_arab']?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach;?>
                    <div class="col-12 mt-2">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-warning">Latihan</li>
                            <?php if($latihan[0]):?>
                                <li class="list-group-item"><a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?latihan=<?= MD5($materi)?>&i=1" class="btn btn-sm btn-block btn-success"><div class="d-flex justify-content-between">Latihan 1 <span><?= date("H:i d-m-y", strtotime($latihan[0]['waktu']))?></span></div></a></li>
                            <?php else :?>
                                <li class="list-group-item"><a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?latihan=<?= MD5($materi)?>&i=1" class="btn btn-sm btn-block btn-danger">Latihan 1</a></li>
                            <?php endif;?>
                            <?php if($latihan[1]):?>
                                <li class="list-group-item"><a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?latihan=<?= MD5($materi)?>&i=2" class="btn btn-sm btn-block btn-success"><div class="d-flex justify-content-between">Latihan 2 <span><?= date("H:i d-m-y", strtotime($latihan[1]['waktu']))?></span></div></a></li>
                            <?php else :?>
                                <li class="list-group-item"><a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?latihan=<?= MD5($materi)?>&i=2" class="btn btn-sm btn-block btn-danger">Latihan 2</a></li>
                            <?php endif;?>
                            <?php if($latihan[2]):?>
                                <li class="list-group-item"><a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?latihan=<?= MD5($materi)?>&i=3" class="btn btn-sm btn-block btn-success"><div class="d-flex justify-content-between">Latihan 3 <span><?= date("H:i d-m-y", strtotime($latihan[2]['waktu']))?></span></div></a></li>
                            <?php else :?>
                                <li class="list-group-item"><a href="<?= base_url()?>materi/program/a20deb514ea1ea62546f6474a5abe59c?latihan=<?= MD5($materi)?>&i=3" class="btn btn-sm btn-block btn-danger">Latihan 3</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                    <div class="col-12 mt-3">
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
                <?php else :?>
                    <div class="col-12 col-md-6">
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-info-circle  text-info"></i> belum ada kalimat. bersabarlah :)
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div>
<script>
    $("#tema").addClass("active");
    
    
    $(".modal-kalimat").click(function(){
        const id = $(this).data("id");
        $("#judul").html('Makna Kalimat')
        $.ajax({
            url : "<?= base_url()?>mufrodat/get_data_kalimat",
            method : "POST",
            data : {id : id},
            async : true,
            dataType : "json",
            success : function(data){
                html = '<ul class="list-group">'+
                        '<li class="list-group-item text-right" id="arab" style="font-size: 24px">'+data.kalimat_arab+'</li>'+
                        '<li class="list-group-item list-group-item-info" id="indo">'+data.arti+'</li>'+
                    '</ul>';
                $("#isi").html(html);
            }
        })
    })

    $(".modal-kata").click(function(){
        const id = $(this).data("id");
        $("#judul").html('Makna Perkata')
        $.ajax({
            url : "<?= base_url()?>mufrodat/get_data_kata",
            method : "POST",
            data : {id : id},
            async : true,
            dataType : "json",
            success : function(data){
                html = '<ul class="list-group">';

                for (let i = 0; i < data.length; i++) {
                    if(i % 2 == 0){
                        html += '<li class="list-group-item d-flex justify-content-between align-items-center">'+
                            data[i].arti+
                            '<span style="font-size: 20px">'+data[i].kata_arab+'</span>'+
                        '</li>';
                    } else {
                        html += '<li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">'+
                            data[i].arti+
                            '<span style="font-size: 20px">'+data[i].kata_arab+'</span>'+
                        '</li>';
                    }
                }
                    
                $("#isi").html(html);
            }
        })
    })
    
    $("#font").change(function(){
        let font = $(this).val();
        $("[id='container-content']").css("font-size", font)
    })

    $("button[name='add']").click(function(){
        var c = confirm("Yakin akan menambahkan kata ini ke list murojaah?");
        return c;
    })

    $("button[name='remove']").click(function(){
        var c = confirm("Yakin akan menghapus kata ini dari list murojaah?");
        return c;
    })
</script>


        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">                    
                    <a href="<?= base_url()?>ft_2/mufrodat" class="btn btn-sm btn-success"><i class="fa fa-home mr-1"></i>Mufrodat</a>
                </div>
                <?php if(COUNT($mufrodat) != 0):?>
                    <div class="col-12">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-warning">Latihan <?= $title_arti?></li>
                            <li class="list-group-item "><a href="<?= base_url()?>ft_2/mufrodat?latihan_tema=<?= MD5($materi)?>&i=1" class="btn btn-sm btn-block btn-success btn-latihan">Latihan 1</a></li>
                            <li class="list-group-item "><a href="<?= base_url()?>ft_2/mufrodat?latihan_tema=<?= MD5($materi)?>&i=2" class="btn btn-sm btn-block btn-success btn-latihan">Latihan 2</a></li>
                            <li class="list-group-item "><a href="<?= base_url()?>ft_2/mufrodat?latihan_tema=<?= MD5($materi)?>&i=3" class="btn btn-sm btn-block btn-success btn-latihan">Latihan 3</a></li>
                        </ul>
                    </div>
                    <div class="col-12 mt-3">
                        <?php if($back != "" && $next != "") :?>
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url()?>ft_2/mufrodat?tema=<?= MD5($back)?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left "></i></a>
                                <a href="<?= base_url()?>ft_2/mufrodat?tema=<?= MD5($next)?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        <?php elseif($back != "" && $next == ""):?>
                            <div class="d-flex justify-content-start">
                                <a href="<?= base_url()?>ft_2/mufrodat?tema=<?= MD5($back)?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left "></i></a>
                            </div>
                        <?php elseif($back == "" && $next != "") :?>
                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url()?>ft_2/mufrodat?tema=<?= MD5($next)?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
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
    
    $(".btn-latihan").click(function(){
        let data = $(this).data("id");
        data = data.split("|")
        let judul = data[0];
        let link = data[1];

        if(judul == "Latihan 1"){
            $(".message").html("Latihan menerjemahkan bahasa Indonesia Ke bahasa Arab")
        } else if (judul == "Latihan 2"){
            $(".message").html("Latihan menerjemahkan bahasa Arab Ke bahasa Indonesia")
        } else {
            $(".message").html("Latihan menerjemahkan bahasa Indonesia Ke bahasa Arab dengan mengetik")
        }

        $("#daftarIsiTitle").html(judul);
        $("#btn-mulai").attr("action", link)
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


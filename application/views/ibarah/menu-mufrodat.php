
        <div class="modal fade" id="daftarIsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="daftarIsiTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info"><i class="fa fa-info-circle text-info mr-1"></i>Silahkan pilih kata yang ingin Anda gunakan untuk latihan</div>
                    <form action="" id="btn-mulai" method="POST">
                        <ul class="list-group shadow">
                            
                        <?php foreach ($mufrodat as $mufrodat) :?>
                            <div class="col-12 mb-1">
                                <li class="list-group-item arab" id="container-content">
                                    <div style="direction: unset !important;text-align:right;">
                                        <?= $mufrodat['kalimat']?>
                                        <input type="checkbox" name="data[]" id="" value="<?= $mufrodat['id']?>" checked class="ml-1">
                                    </div>
                                </li>
                            </div>
                        <?php endforeach;?>
                            <li class="list-group-item">
                                <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-1"></i><span class="message"></span></div>
                            </li>
                            <li class="list-group-item"><input type="submit" class="btn btn-sm btn-block btn-success" value="Mulai!"></li>
                        </ul>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    
                    <a href="<?= base_url()?>ibarah/awwal" class="btn btn-sm btn-success"><i class="fa fa-home mr-1"></i><?= $tema?></a>
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
                <div class="col-12 mb-3">
                    <img src="<?= base_url()?>assets/img/ibarah/<?= str_replace("Bagian ", "", $materi)?>.jpg" class="img-rounded img-fluid" alt="Cinque Terre">
                </div>
                <?php if(COUNT($mufrodat) != 0):?>
                    <div class="col-12 mt-2">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-warning">Latihan</li>
                            <li class="list-group-item"><a href="#daftarIsi" data-toggle="modal" data-id="Latihan 1|<?= base_url()?>ibarah/awwal?latihan=<?= MD5(str_replace("Bagian ", "", $materi))?>&i=1" class="btn btn-sm btn-block btn-success btn-latihan"><div class="d-flex justify-content-center">Latihan 1</div></a></li>
                            <li class="list-group-item"><a href="#daftarIsi" data-toggle="modal" data-id="Latihan 2|<?= base_url()?>ibarah/awwal?latihan=<?= MD5(str_replace("Bagian ", "", $materi))?>&i=2" class="btn btn-sm btn-block btn-success btn-latihan"><div class="d-flex justify-content-center">Latihan 2</div></a></li>
                        </ul>
                    </div>
                    <div class="col-12 mt-3">
                        <?php if($back != "" && $next != "") :?>
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url()?>ibarah/awwal?id=<?= MD5($back)?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left "></i></a>
                                <a href="<?= base_url()?>ibarah/awwal?id=<?= MD5($next)?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        <?php elseif($back != "" && $next == ""):?>
                            <div class="d-flex justify-content-start">
                                <a href="<?= base_url()?>ibarah/awwal?id=<?= MD5($back)?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-left "></i></a>
                            </div>
                        <?php elseif($back == "" && $next != "") :?>
                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url()?>ibarah/awwal?id=<?= MD5($next)?>" class="btn btn-sm list-group-item-warning"><i class="fa fa-arrow-right"></i></a>
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
            $(".message").html("Latihan menerjemahkan bahasa Arab Ke bahasa Indonesia")
        } else if (judul == "Latihan 2"){
            $(".message").html("Latihan menerjemahkan bahasa Indonesia Ke bahasa Arab")
        } else {
            $(".message").html("Latihan menerjemahkan bahasa Indonesia Ke bahasa Arab dengan mengetik")
        }

        $("#daftarIsiTitle").html(judul);
        $("#btn-mulai").attr("action", link)
    })

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


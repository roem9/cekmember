        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 mb-3">
                    <a id="backHome" class="btn btn-sm btn-danger text-light"><i class="fa fa-times mr-1"></i>keluar</a>
                </div>
                <div class="col-12 mb-1">
                    <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-1"></i><?= $petunjuk?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3" id="hasilLatihanUp">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-group">
                                <p>Selamat, Anda telah menyelesaikan latihan, nilai Anda adalah : </p>
                                <h3 class="text-center" id="nilaiUp"></h3>
                                <a href="<?= base_url($reload)?>" class="btn btn-block btn-success text-light">Ulangi</a>
                                <a href="<?= base_url($redirect)?>" class="btn btn-block btn-danger text-light">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="" id="formSoal">
            <div class="row">
                    <?php foreach ($mufrodat as $i => $kalimat) : ?>
                        <div class="col-12 col-md-12 mb-3 soal" id="soal<?= $i?>">
                            <ul class="list-group">
                                <li class="list-group-item" id="soal-bg<?= $i?>">
                                    <div class="form-group">
                                            <div class="text-right">
                                                <label for="<?=$i?>" id="container-content"><strong><?= angka_arab($i+1)?>. <?= $kalimat['soal']?></strong></label>
                                                <span class="icon-cek-<?= $i?>"></span>
                                            </div>
                                            <input type="hidden" name="kunci<?=$i?>" value="<?= $kalimat['jawaban']?>">
                                        <input type="hidden" name="j<?= $i?>" id="jawaban<?=$i?>">
                                        <div class="d-flex justify-content-center">
                                            <h5 class="text-right" id="j<?=$i?>"></h5>
                                        </div>
                                        <div id="select<?=$i?>">
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <?php foreach ($kata as $k => $data) :?>
                                                        <div class="col-12 d-flex justify-content-end mb-3">
                                                            <label for="<?= $i.$k?>" class="mr-2" id="container-content"><center><b><?= $data?></b></center></label>
                                                            <input type="radio" class="cek" id="<?= $i.$k?>" name="<?= $i?>1" data-id="<?= $i?>|1" class="btn-primary" value="<?= $data?>">
                                                        </div>
                                                    <?php endforeach;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="kunci-jawaban<?=$i?>" style="display: none">
                                                <h5><?= $kalimat['jawaban']?></h5>
                                        </div>
                                    </div>
                                    <?php if($i == 0) :?>
                                        <div class="d-flex justify-content-center">
                                            <a id="right<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light right"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                    <?php elseif($i == COUNT($mufrodat)-1) :?>
                                        <div class="d-flex justify-content-center">
                                            <a id="left<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light left mr-3"><i class="fa fa-angle-left"></i></a>
                                            <?php if($latihan) :?>
                                                <a id="simpan" class="img-shadow btn btn-sm btn-success text-light mr-3">
                                                    periksa
                                                </a>
                                            <?php else :?>
                                                <a id="simpan" class="img-shadow btn btn-sm btn-primary text-light mr-3">
                                                    simpan
                                                </a>
                                            <?php endif;?>
                                        </div>
                                    <?php else :?>
                                        <div class="d-flex justify-content-center">
                                            <a id="left<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light left mr-3"><i class="fa fa-angle-left"></i></a>
                                            <a id="right<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light right"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                    <?php endif;?>
                                </li>
                            </ul>
                        </div>
                    <?php 
                        endforeach;?>

                <div class="col-12 col-md-12 mb-3 text-center angka">
                    <span class="btn btn-sm btn-secondary"><span id="angka">1</span> / <?= COUNT($mufrodat)?></span>
                </div>
            </div>
            </form>
            <div class="row">
                <div class="col-12 mb-3" id="hasilLatihanDown">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-group">
                                <p>Selamat, Anda telah menyelesaikan latihan, nilai Anda adalah : </p>
                                <h3 class="text-center" id="nilaiDown"></h3>
                                <a href="<?= base_url($reload)?>" class="btn btn-block btn-success text-light">Ulangi</a>
                                <a href="<?= base_url($redirect)?>" class="btn btn-block btn-danger text-light">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>

<script>
    $("#hasilLatihanUp").hide();
    $("#hasilLatihanDown").hide();
    $(".soal").hide();
    $("#soal0").show();
    
    $(".right").click(function(){
        let id = $(this).data("id");
        id = id + 1;
        
        // menampilkan dan menyembunyikan soal 
            $(".soal").hide();
            $("#soal"+id).show();
        // menampilkan dan menyembunyikan soal 

        // index soal 
            if(id != <?= COUNT($mufrodat)?>){
                $("#angka").html(id+1);
            } else {
                $(".angka").hide();
            }
        // index soal 
    })

    $(".left").click(function(){
        let id = $(this).data("id");
        $("#angka").html(id);
        id = id - 1;
        $(".soal").hide();
        $("#soal"+id).show();
    })

    $("#ulangi").click(function(){
        let count = $(this).data("id");
        
        // index soal
            $(".angka").show();
            $("#angka").html("1");
        // index soal 
        $(".soal").hide();

        $("#soal0").show();
        $("#right0").show();
    })

    $("#backHome").click(function(){
        Swal.fire({
            icon: 'question',
            text: 'yakin akan keluar dari latihan?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: '<a href="<?= base_url($redirect)?>">Ya</a>',
            cancelButtonText: 'Tidak'
        })
    })

    $(".cek").click(function(){
        let data = $(this).data("id");
        data = data.split("|");
        let id = parseInt(data[0]);
        let total = data[1];

        let html = '';
        for (let i = 0; i < total; i++) {
            html += $("input[name='"+id+""+1+"']:checked").val();
        }

        if(html === 'undefined'){
            html = '-';
        }

        if(html == $("input[name='kunci"+id+"']").val()){
            $("#jawaban"+id).val("betul");
        } 
        else {
            $("#jawaban"+id).val("salah");
        }
    })

    $("#simpan").click(function(){
        if(confirm("Yakin telah menyelesaikan latihan Anda?")){
            let count = <?= COUNT($mufrodat)?>;
            let nilai = 0;
            for (let i = 0; i < count; i++) {
                cek = $("input[name='j"+i+"']").val();
                if(cek == 'betul'){
                    nilai += 1;
                    $(".left").hide();
                    $(".right").hide();
                    $("#simpan").hide();
                    $("input:radio").attr("disabled",true);
                } else {
                    $("#soal-bg"+i).addClass("list-group-item-danger");
                    $("#kunci-jawaban"+i).addClass("d-flex justify-content-center")
                    $("#kunci-jawaban"+i).show()
                    $(".left").hide();
                    $(".right").hide();
                    $("#simpan").hide();
                    $("input:radio").attr("disabled",true);
                }
            }

            let latihan = "<?= $materi?>";
            let id_kelas = "<?= $id_kelas?>";
            nilai = (nilai / count) * 100;
            nilai = nilai.toFixed(2);

            $.ajax({
                type : "POST",
                url : "<?= base_url()?>hifdzi1/add_latihan",
                dataType : "JSON",
                data : {latihan: latihan, id_kelas: id_kelas, nilai: nilai, tipe: "Harian"},
                success : function(data){
                    // console.log(data)
                    $(".soal").show();
                    $(".angka").hide();
                    $("#hasilLatihanUp").show();
                    $("#hasilLatihanDown").show();
                    $("#nilaiUp").html(nilai);
                    $("#nilaiDown").html(nilai);
                }
            })
        }
    })
</script>
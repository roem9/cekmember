<div class="container">
            <div class="row">
                <div class="col-12 col-md-12 mb-3">
                    <a id="backHome" class="btn btn-sm btn-danger text-light"><i class="fa fa-times mr-1"></i>keluar</a>
                </div>
                <div class="col-12 mb-1">
                    <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-1"></i><?= $pesan?></div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <!-- <label for="font">Ukuran Font</label> -->
                        <select name="font" id="font" class="form-control form-control-sm">
                            <option value="20px">Ganti Ukuran Font</option>
                            <option value="20px">20</option>
                            <option value="22px">22</option>
                            <option value="24px">24</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    $urut = 0;
                    foreach ($mufrodat as $i => $kalimat) :
                    $urut++;?>
                    <div class="col-12 col-md-12 mb-3">
                        <ul class="list-group">
                            <li class="list-group-item bg-cek-<?= $i?>">
                                <div class="form-group">
                                    <label for="<?=$i?>" id="container-content"><strong><?= $i+1?>. <?= $kalimat['soal']?></strong></label>
                                    <span class="icon-cek-<?= $i?>"></span>
                                    <input type="hidden" name="kunci<?=$i?>" value="<?= $kalimat['jawaban']?>">
                                    <input type="hidden" name="j<?= $i?>" id="jawaban<?=$i?>">
                                    <div class="d-flex justify-content-between">
                                        <a id="btnEdit<?=$i?>" class="btn btn-sm btn-success text-light edit img-shadow" data-id="<?= $i?>" style="display: none">ubah</a>
                                        <h5 class="text-right" id="j<?=$i?>"></h5>
                                    </div>
        
                                    <div id="select<?=$i?>">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                            <?php 
                                                $choice[0] = $kalimat['jawaban'] ;
                                                $r = 1;

                                                shuffle($kalimat['kata']);

                                                foreach ($kalimat['kata'] as $cek) {
                                                    if($cek != $kalimat['jawaban'] && $r <= 3){
                                                        $choice[$r] = $cek;
                                                        $r++;
                                                    }
                                                }
                                                array_unique($choice);
                                                rsort($choice);
                                            ?>
                                                <!-- <?php rsort($kalimat['kata']);?> -->
                                                <?php foreach ($choice as $k => $data) :?>
                                                    <!-- <div class="col"> -->
                                                        <div class="radio-toolbar radio-shadow mr-1">
                                                            <input type="radio" id="<?= $i.$k?>" name="<?= $i?>1" class="btn-primary" value="<?= $data?>">
                                                            <label for="<?= $i.$k?>" id="container-content"><center><b><?= $data?></b></center></label>
                                                        </div>
                                                    <!-- </div> -->
                                                <?php endforeach;?>
                                            </div>
                                        </div>
                                        <a class="btn btn-block btn-sm btn-info text-light cek img-shadow" data-id="<?= $i?>|1">simpan</a>
                                    </div>
                                </div>

                            </li>

                        </ul>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="row">
                <!-- <form action="<?= base_url()?>ft_1/add_latihan" method="post" id="latihan">
                    <input type="hidden" name="materi" value="<?= $materi?>">
                    <input type="hidden" name="tema" value="<?= $tema?>">
                    <input type="hidden" name="table" value="<?= $table?>">
                    <input type="hidden" name="latihan" value="Latihan 1">
                    <input type="hidden" name="redirect" value="<?= $redirect?>">
                </form> -->
                <div class="col-12 col-md-12 mb-3">
                    <a id="simpanJawaban" data-id="<?= COUNT($mufrodat)?>" class="btn btn-block btn-primary text-light">Periksa</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="overlay"></div>

<script>


    $("#simpanJawaban").click(function(){
        let count = $(this).data("id");
        let benar = 1;
        let cek = "";
        for (let i = 0; i < count; i++) {
            cek = $("input[name='j"+i+"']").val();
            if(cek != 'betul'){
                benar = 0;
                $(".icon-cek-"+i).html(`<i class="fa fa-times-circle text-danger"></i>`);
                $(".bg-cek-"+i).removeClass("list-group-item-success");
                $(".bg-cek-"+i).addClass("list-group-item-danger");
            } else {
                $(".icon-cek-"+i).html(`<i class="fa fa-check-circle text-success"></i>`);
                $(".bg-cek-"+i).removeClass("list-group-item-danger");
                $(".bg-cek-"+i).addClass("list-group-item-success");
            }
        }

        if(benar == 0){
            Swal.fire({
                icon: 'error',
                title: 'oppss',
                text: 'ada jawaban yang kurang tepat'
            })
        } else {
            Swal.fire({
                text: "selamat! semua jawabanmu benar",
                icon: 'success',
                confirmButtonText: '<a href="<?= base_url($redirect)?>">Selesai</a>',
            })
            // .then((result) => {
            //     if (result.value) {
            //         $('#latihan').submit();
            //     }
            // })
        }
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
        let id = data[0];
        let total = data[1];

        let html = '';
        for (let i = 0; i < total; i++) {
            html += $("input[name='"+id+""+1+"']:checked").val();
        }

        if(html === 'undefined'){
            html = '-';
        }

        if(html == $("input[name='kunci"+id+"']").val()){
            $(".icon-cek-"+id).html(`<i class="fa fa-check-circle text-success"></i>`);
            $(".bg-cek-"+id).removeClass("list-group-item-danger");
            $(".bg-cek-"+id).addClass("list-group-item-success");
            $("#j"+id).html(html);
            $("#jawaban"+id).val("betul");
            $("#select"+id).hide();
            $("#btnEdit"+id).show();
        } else {
            $(".icon-cek-"+id).html(`<i class="fa fa-times-circle text-danger"></i>`);
            $(".bg-cek-"+id).removeClass("list-group-item-success");
            $(".bg-cek-"+id).addClass("list-group-item-danger");
            $("#j"+id).html(html);
            $("#jawaban"+id).val("salah");
            $("#select"+id).hide();
            $("#btnEdit"+id).show();
        }
    })

    $(".edit").click(function(){
        let id = $(this).data("id");
        
        $("#btnEdit"+id).hide();
        $("#j"+id).html("");
        $("#jawaban"+id).val("");
        $("#select"+id).show();
    });
    
    $("#font").change(function(){
        let font = $(this).val();
        $("[id='container-content']").css("font-size", font)
    })
</script>
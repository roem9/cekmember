        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 mb-3">
                    <a id="backHome" class="btn btn-sm btn-danger text-light"><i class="fa fa-times"></i> keluar</a>
                </div>
                <!-- <div class="col-12">
                    <div class="form-group">
                        <select name="font" id="font" class="form-control form-control-sm">
                            <option value="20px">Ganti Ukuran Font</option>
                            <option value="20px">20</option>
                            <option value="22px">22</option>
                            <option value="24px">24</option>
                        </select>
                    </div>
                </div> -->
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
                    <?php 
                        $urut = 0;
                        foreach ($mufrodat as $i => $kalimat) :
                        $urut++?>
        
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
                                        <div class="text-center">
                                            <h5><span id="jaw<?= $i?>"></span></h5>
                                        </div>                        
                                        <div class="text-center" id="titik<?= $i?>">
                                            <h5>........</h5>
                                        </div>                        
                                        <div class="text-center" id="answer<?= $i?>" style="display: none">
                                            <h3><span class="text-dark"><?= $kalimat['jawaban']?></span></h3>
                                        </div>
                                        <div id="select<?=$i?>">
                                            <!-- <textarea name="jaw<?=$i?>" id="jaw<?=$i?>" class="form-control" readonly></textarea> -->
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <?php 
                                                        if(in_array("ج", $kalimat['huruf']) && in_array(" ", $kalimat['huruf'])){
                                                            $kalimat['huruf'] = array_diff($kalimat['huruf'], array('ج', ' '));
                                                            $kalimat['huruf'][] = " ج ";
                                                        }
                                                        
                                                        $kalimat['huruf'] = array_diff($kalimat['huruf'], [" "]);

                                                        rsort($kalimat['huruf']);
                                                        foreach ($kalimat['huruf'] as $k => $data) :?>
                                                            <div class="radio-toolbar mr-2">
                                                                <a data-id="<?= $data?>|<?= $i?>" id="container-content" class="btn btn-md mt-2 mb-2 arab radio-shadow input-btn" style="height: 40px; width: 40px;background-color: rgb(238, 238, 238);"><b><?= $data?></b></a>
                                                            </div>
                                                    <?php endforeach;?>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mt-2">
                                                <a class="btn btn-sm btn-danger img-shadow text-light mr-3 hapus" data-id="<?= $i?>"><i class="fa fa-backspace"></i></a>
                                                <!-- <a class="btn btn-sm btn-info img-shadow text-light mr-3 cek" data-id="<?= $i?>|1">input</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($i == 0) :?>
                                        <div class="d-flex justify-content-center">
                                            <a id="right<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light right mr-3"><i class="fa fa-angle-right"></i></a>
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
                    <?php endforeach;?>
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
    // $("#right0").hide();
    
    $(".right").click(function(){
        let id = $(this).data("id");
        
        id = id + 1;

        $(".soal").hide();
        $("#soal"+id).show();
        if(id != <?= COUNT($mufrodat)?>){
            $("#angka").html(id+1);
        } else {
            $(".angka").hide();
        }
    })

    $(".left").click(function(){
        let id = $(this).data("id");
        $("#angka").html(id);
        
        id = id - 1;
        // console.log(id)
        $(".soal").hide();
        $("#soal"+id).show();
    })

    $("#ulangi").click(function(){
        let count = $(this).data("id");
        for (let i = 0; i < count; i++) {
            $("input[name='j"+i+"']").val("");
            $(".bg-cek-"+i).removeClass("list-group-item-success");
            $(".icon-cek-"+i).html("");
            $("#select"+i).show();
            $("#j"+i).html("");
        }
        
        $(".angka").show();
        $("#angka").html("1");
        $('#formSoal').trigger("reset");
        $("#soal"+count).hide();
        $("#soal0").show();
        $("#right0").hide();
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

    $(".input-btn").click(function(){
        let data = $(this).data("id");
        data = data.split("|");
        let kata = data[0];
        let id = data[1];
        $("#titik"+id).hide();
        // let html = $("#jaw"+id).val();
        let html = $("#jaw"+id).html();

        // console.log(kata)
        // console.log(html.slice(-1))
        if(html.slice(-1) == " " && kata == " "){
        } else {
            // $("#jaw"+id).val(html + "" + kata);
            $("#jaw"+id).html(html + "" + kata);
        }

        
        if($("#jaw"+id).html() == $("input[name='kunci"+id+"']").val()){
            $("#jawaban"+id).val("betul");
        } else {
            $("#jawaban"+id).val("salah");
        }

    })

    $(".cek").click(function(){
        let data = $(this).data("id");
        data = data.split("|");
        let id = parseInt(data[0]);
        let total = data[1];
        html = $("#jaw"+id).val();
        html = html.replace(/_/g, " ")

        // console.log(html)
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
            $("#btnEdit"+id).hide();
            $("#right"+id).show();
            // pindah soal 
                id = id + 1;
                if($("#jawaban"+id).val() == "betul"){
                    $("#right"+id).show();
                } else {
                    $("#right"+id).hide();
                }

                $(".soal").hide();
                $("#soal"+id).show();
                if(id != <?= COUNT($mufrodat)?>){
                    $("#angka").html(id+1);
                } else {
                    $(".angka").hide();
                }
            // pindah soal 
        } else {
            $(".icon-cek-"+id).html(`<i class="fa fa-times-circle text-danger"></i>`);
            $("#jawaban"+id).val("salah");
        }
    })

    $(".hapus").click(function(){
        let id = $(this).data("id");
        let answer = $("#jaw"+id).html();
        
        if (answer.charAt(answer.length-4)+answer.charAt(answer.length-3)+answer.charAt(answer.length-2)+answer.charAt(answer.length-1) == "اَلْ") {
            hapus = answer.slice(0,-4);
        } else if(answer.charAt(answer.length-3)+answer.charAt(answer.length-2)+answer.charAt(answer.length-1) == " ج "){
            hapus = answer.slice(0,-3);
        } else if (answer.charAt(answer.length-3)+answer.charAt(answer.length-2)+answer.charAt(answer.length-1) == "اَل" || answer.charAt(answer.length-3)+answer.charAt(answer.length-2)+answer.charAt(answer.length-1) == "الْ" ){
            hapus = answer.slice(0,-3);
        } else if (answer.charAt(answer.length-2)+answer.charAt(answer.length-1) == "ال" ){
            hapus = answer.slice(0,-2);
        } else if (answer.charAt(answer.length-2) == "ّ" || answer.charAt(answer.length-1) == "ّ"){
            hapus = answer.slice(0,-3);
        } else if(answer.charAt(answer.length-1) == "ا" || answer.charAt(answer.length-1) == "ى" || answer.charAt(answer.length-1) == "ج" || answer.charAt(answer.length-1) == "-" || answer.charAt(answer.length-1) == " " || answer.charAt(answer.length-1) == "ل" || answer.charAt(answer.length-1) == "آ" || answer.charAt(answer.length-1) == "ي" || answer.charAt(answer.length-1) == "و" || answer.charAt(answer.length-1) == "/"){
            hapus = answer.slice(0,-1);
        } else {
            hapus = answer.slice(0,-2);
        }
        $("#jaw"+id).html(hapus);
        
        if(hapus == "") $("#titik"+id).show();

        if($("#jaw"+id).html() == $("input[name='kunci"+id+"']").val()){
            $("#jawaban"+id).val("betul");
        } else {
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
                    $("#select"+i).hide();
                    // $("input:radio").attr("disabled",true);
                } else {
                    $("#soal-bg"+i).addClass("list-group-item-danger");
                    $("#kunci-jawaban"+i).addClass("d-flex justify-content-center")
                    $("#kunci-jawaban"+i).show()
                    $(".left").hide();
                    $(".right").hide();
                    $("#simpan").hide();
                    $("#select"+i).hide();
                    $("#answer"+i).show();
                    // $("input:radio").attr("disabled",true);
                }
            }

            nilai = (nilai / count) * 100;
            nilai = nilai.toFixed(2);

            let latihan = "<?= $materi?>";
            let id_kelas = "<?= $id_kelas?>";

            $.ajax({
                type : "POST",
                url : "<?= base_url()?>hifdzi1/add_latihan",
                dataType : "JSON",
                data : {latihan: latihan, id_kelas: id_kelas, nilai: nilai, tipe: "Latihan 2"},
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

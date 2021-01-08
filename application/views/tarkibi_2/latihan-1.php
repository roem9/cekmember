        <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 mb-3">
                        <a id="backHome" class="btn btn-sm btn-danger text-light"><i class="fa fa-times mr-1"></i>keluar</a>
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
            <?php 
                $i = 1;
                foreach ($soal as $i => $data) :
                    $kalimat = json_encode($data['soal']);
                    $cek = str_replace(["\u064e","\u064b","\u064c","\u064d","\u064e","\u064f","\u0650","\u0651","\u0652"], "00", $kalimat);
                    $kalimat = str_replace(["\u064e","\u064b","\u064c","\u064d","\u064e","\u064f","\u0650","\u0651","\u0652"], "", $kalimat);
                    $harakat = substr_count($cek, "00");
                    // \u064e = fathah
                    // \U064B	ً	Arabic Fathatan
                    // \U064C	ٌ	Arabic Dammatan
                    // \U064D	ٍ	Arabic Kasratan
                    // \U064E	َ	Arabic Fatha
                    // \U064F	ُ	Arabic Damma
                    // \U0650	ِ	Arabic Kasra
                    // \U0651	ّ	Arabic Shadda
                    // \U0652	ْ	Arabic Sukun
                ?>
                
                <div class="col-12 col-md-12 mb-3 soal" id="soal<?= $i?>">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-group">
                                <div class="text-right">
                                    <label for=""><strong><?= angka_arab($i+1)?>. <?= json_decode($kalimat)?></strong></label>
                                </div>
                                <input type="hidden" name="jawaban" id="jawaban<?=$i?>" value="<?= $data['soal']?>">
                                <input type="hidden" name="" id="jum_harakat<?=$i?>" value="<?= $harakat?>">
                                <textarea name="" class="code<?=$i?>" style="display: none"><?= $cek?></textarea>
                                <textarea name="" class="polosan<?=$i?>" style="display: none"><?= $cek?></textarea>
                                <div class="text-center">
                                    <a href="javascript:void(0);" class="btn btn-md mr-2 mt-2 mb-2 radio-shadow harakat" style="font-size: 19px; height: 40px; width: 40px;background-color: rgb(238, 238, 238);" data-id="\u0651|<?=$i?>">ـّ</a>
                                    <a href="javascript:void(0);" class="btn btn-md mr-2 mt-2 mb-2 radio-shadow harakat" style="font-size: 19px; height: 40px; width: 40px;background-color: rgb(238, 238, 238);" data-id="\u0652|<?=$i?>">ـْ</a>
                                    <a href="javascript:void(0);" class="btn btn-md mr-2 mt-2 mb-2 radio-shadow harakat" style="font-size: 19px; height: 40px; width: 40px;background-color: rgb(238, 238, 238);" data-id="\u064c|<?=$i?>">ـٌ</a>
                                    <a href="javascript:void(0);" class="btn btn-md mr-2 mt-2 mb-2 radio-shadow harakat" style="font-size: 19px; height: 40px; width: 40px;background-color: rgb(238, 238, 238);" data-id="\u064f|<?=$i?>">ـُ</a>
                                    <a href="javascript:void(0);" class="btn btn-md mr-2 mt-2 mb-2 radio-shadow harakat" style="font-size: 19px; height: 40px; width: 40px;background-color: rgb(238, 238, 238);" data-id="\u064d|<?=$i?>">ـٍ</a>
                                    <a href="javascript:void(0);" class="btn btn-md mr-2 mt-2 mb-2 radio-shadow harakat" style="font-size: 19px; height: 40px; width: 40px;background-color: rgb(238, 238, 238);" data-id="\u0650|<?=$i?>">ـِ</a>
                                    <a href="javascript:void(0);" class="btn btn-md mr-2 mt-2 mb-2 radio-shadow harakat" style="font-size: 19px; height: 40px; width: 40px;background-color: rgb(238, 238, 238);" data-id="\u064b|<?=$i?>">ـً</a>
                                    <a href="javascript:void(0);" class="btn btn-md mr-2 mt-2 mb-2 radio-shadow harakat" style="font-size: 19px; height: 40px; width: 40px;background-color: rgb(238, 238, 238);" data-id="\u064e|<?=$i?>">ـَ</a>
                                    <!-- <a href="javascript:void(0);" class="btn btn-md text-light btn-danger mr-2 mt-2 mb-2 arab radio-shadow hapus" style="height: 40px; width: 40px;" data-id="00|<?=$i?>"><i class="fa fa-backspace"></i></a> -->
                                    <a href="javascript:void(0);" class="btn btn-md text-light btn-danger mr-2 mt-2 mb-2 radio-shadow hapus p-2" style="height: 40px; width: 40px;" data-id="00|<?=$i?>"><i class="fa fa-backspace"></i></a>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="jawaban<?=$i?>" style="font-size: 23px"><?= substr($data['soal'], 0, 2)?></span>
                                </div>
                                
                                <?php if($i == 0) :?>
                                    <div class="d-flex justify-content-center">
                                        <a id="right<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light right"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                <?php elseif($i == 9) :?>
                                    <div class="d-flex justify-content-center">
                                        <a id="left<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light left mr-3"><i class="fa fa-angle-left"></i></a>
                                        <a id="simpan" class="img-shadow btn btn-sm btn-success text-light mr-3">
                                            periksa
                                        </a>
                                        <!-- <?php if($latihan) :?> -->
                                        <!-- <?php else :?>
                                            <a id="simpan" class="img-shadow btn btn-sm btn-primary text-light mr-3">
                                                simpan
                                            </a>
                                        <?php endif;?> -->
                                    </div>
                                <?php else :?>
                                    <div class="d-flex justify-content-center">
                                        <a id="left<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light left mr-3"><i class="fa fa-angle-left"></i></a>
                                        <a id="right<?= $i?>" data-id="<?= $i?>" class="img-shadow btn btn-sm btn-success text-light right"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                <?php endif;?>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php 
                $i++;
                endforeach;
            ?>
                
                <div class="col-12 col-md-12 mb-3 text-center angka">
                    <span class="btn btn-sm btn-secondary"><span id="angka">1</span> / 10</span>
                </div>
                
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

<script>
    $("#hasilLatihanUp").hide();
    $("#hasilLatihanDown").hide();
    $(".soal").hide();
    $("#soal0").show();

    let a = [];
    for (let i = 0; i < 10; i++) {
        a[i] = [];
    }
    
    $(".right").click(function(){
        let id = $(this).data("id");
        id = id + 1;
        
        // menampilkan dan menyembunyikan soal 
            $(".soal").hide();
            $("#soal"+id).show();
        // menampilkan dan menyembunyikan soal 

        // index soal 
            if(id != <?= COUNT($soal)?>){
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

    $(".harakat").click(function(){
        let data = $(this).data("id");
        data = data.split("|");
        let harakat = data[0];
        let index = data[1]
        let answer = $(".code"+index).html();
        var result = answer.replace('00', harakat);
        $(".code"+index).html(result);

        let jum_harakat = $("#jum_harakat"+index).val()

        if(jum_harakat != a[index].length){
            a[index].push(harakat);
        }
        console.log(a[index])

        $.ajax({
            url: "<?= base_url()?>tarkibi2/add_harakat",
            data: {answer: result},
            type: "POST",
            success: function(data){
                html = "";
                for (let i = 0; i < data.length; i++) {
                    if(data[i-1]+data[i] == 00){
                        break;
                    } else {
                        if(data[i] != 0 || data[i] == " "){
                            html += data[i];
                        }
                    }
                }
                $(".jawaban"+index).html(html)
                if($("#jawaban"+index).val() == html){
                    console.log("benar")
                }
            }
        })
    })

    $(".hapus").click(function(){
        let data = $(this).data("id");
        data = data.split("|");
        let harakat = data[0];
        let index = data[1];
        let answer = $(".polosan"+index).html();

        // hapus harakat terakhir
        a[index].pop();

        // sambungkan harakat
        a[index].forEach(a => {
            answer = answer.replace('00', a);
        });

        $(".code"+index).html(answer);

        $.ajax({
            url: "<?= base_url()?>tarkibi2/add_harakat",
            data: {answer: answer},
            type: "POST",
            success: function(data){
                html = "";
                for (let i = 0; i < data.length; i++) {
                    if(data[i-1]+data[i] == 00){
                        break;
                    } else {
                        if(data[i] != 0 || data[i] == " "){
                            html += data[i];
                        }
                    }
                }
                $(".jawaban"+index).html(html)
                if($("#jawaban"+index).val() == html){
                    console.log("benar")
                }
            }
        })
    })
</script>
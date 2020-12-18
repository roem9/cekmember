<div class="container">
            <div class="row">
                <div class="col-12 col-md-12 mb-3">
                    <a id="backHome" class="btn btn-sm btn-danger text-light"><i class="fa fa-times"></i> keluar</a>
                </div>
                <div class="col-12 mb-1">
                    <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-1"></i>Ketik bahasa Arab dari setiap kata berikut, kemudian tekan tombol <strong>simpan</strong>. Gunakan "<strong>_</strong>" sebagai pengganti spasi</div>
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
                    $urut++?>
    
                    <div class="col-12 col-md-12 mb-3">
                        <ul class="list-group">
                            <li class="list-group-item bg-cek-<?= $i?>">
                                <div class="form-group">
                                    <div class="">
                                        <label for="<?=$i?>" id="container-content"><strong><?= $i+1?>. <?= $kalimat['arti']?></strong></label>
                                        <span class="icon-cek-<?= $i?>"></span>
                                    </div>
                                    <input type="hidden" name="kunci<?=$i?>" value="<?= $kalimat['kata_arab']?>">
                                    <input type="hidden" name="j<?= $i?>" id="jawaban<?=$i?>">
                                    <div class="d-flex justify-content-between">
                                        <a id="btnEdit<?=$i?>" class="btn btn-sm btn-success img-shadow text-light edit" data-id="<?= $i?>" style="display: none">ubah</a>
                                        <h5 class="text-right" id="j<?=$i?>"></h5>
                                    </div>                        
                                    <div id="select<?=$i?>">
                                            <textarea name="jaw<?=$i?>" id="jaw<?=$i?>" class="form-control" readonly></textarea>
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <?php 
                                                        rsort($kalimat['huruf']);
                                                        foreach ($kalimat['huruf'] as $k => $data) :?>
                                                            <div class="radio-toolbar mr-2">
                                                                <a data-id="<?= $data?>|<?= $i?>" id="container-content" class="btn btn-md mt-2 mb-2 arab radio-shadow input-btn" style="height: 40px; width: 40px;background-color: rgb(238, 238, 238);"><b><?= $data?></b></a>
                                                            </div>
                                                    <?php endforeach;?>
                                                </div>
                                            </div>
                                            <a class="btn btn-block btn-sm btn-info img-shadow text-light cek" data-id="<?= $i?>|1">simpan</a>
                                            <a class="btn btn-block btn-sm btn-danger img-shadow text-light hapus" data-id="<?= $i?>">hapus</a>
                                        </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="row">
                <form action="<?= base_url()?>materi/add_latihan" method="post" id="latihan">
                    <input type="hidden" name="materi" value="<?= $materi?>">
                    <input type="hidden" name="tema" value="<?= $tema?>">
                    <input type="hidden" name="table" value="latihan_hifdzi_1">
                    <input type="hidden" name="latihan" value="Latihan 3">
                    <input type="hidden" name="redirect" value="<?= $redirect?>">
                </form>
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
                confirmButtonText: 'Simpan',
            }).then((result) => {
                if (result.value) {
                    $('#latihan').submit();
                }
            })
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

    $(".input-btn").click(function(){
        let data = $(this).data("id");
        data = data.split("|");
        let kata = data[0];
        let id = data[1];
        
        let html = $("#jaw"+id).val();

        $("#jaw"+id).val(html + "" + kata);
    })

    $(".cek").click(function(){
        let data = $(this).data("id");
        data = data.split("|");
        let id = data[0];
        let total = data[1];
        html = $("#jaw"+id).val();
        html = html.replace(/_/g, " ")

        console.log(html)
        if(html === 'undefined'){
            html = '-';
        }

        if(html == $("input[name='kunci"+id+"']").val()){
            $("#j"+id).html(html);
            $("#jawaban"+id).val("betul");
            $("#select"+id).hide();
            $("#btnEdit"+id).show();
        } else {
            $("#j"+id).html(html);
            $("#jawaban"+id).val("salah");
            $("#select"+id).hide();
            $("#btnEdit"+id).show();
        }
    })

    $(".hapus").click(function(){
        let id = $(this).data("id");
        let answer = $("#jaw"+id).val();
        
        // console.log(answer.charAt(answer.length-4)+answer.charAt(answer.length-3)+answer.charAt(answer.length-2)+answer.charAt(answer.length-1))
        
        if (answer.charAt(answer.length-4)+answer.charAt(answer.length-3)+answer.charAt(answer.length-2)+answer.charAt(answer.length-1) == "اَلْ") {
            hapus = answer.slice(0,-4);
        } else if (answer.charAt(answer.length-3)+answer.charAt(answer.length-2)+answer.charAt(answer.length-1) == "اَل" || answer.charAt(answer.length-3)+answer.charAt(answer.length-2)+answer.charAt(answer.length-1) == "الْ" ){
            hapus = answer.slice(0,-3);
        } else if (answer.charAt(answer.length-2)+answer.charAt(answer.length-1) == "ال" ){
            hapus = answer.slice(0,-2);
        } else if (answer.charAt(answer.length-2) == "ّ" || answer.charAt(answer.length-1) == "ّ"){
            hapus = answer.slice(0,-3);
        } else if(answer.charAt(answer.length-1) == "ا" || answer.charAt(answer.length-1) == "ى" || answer.charAt(answer.length-1) == "-" || answer.charAt(answer.length-1) == "_" || answer.charAt(answer.length-1) == "ل" || answer.charAt(answer.length-1) == "آ" || answer.charAt(answer.length-1) == "ي" || answer.charAt(answer.length-1) == "و"){
            hapus = answer.slice(0,-1);
        } else {
            hapus = answer.slice(0,-2);
        }
        $("#jaw"+id).val(hapus);
    })
// لَا

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
        font = font.replace("px", "")
        if(font >= 22){
            $('.input-btn').each(function() {
                $(this).css("height", "45px");
                $(this).css("width", "45px");
            });
        } else {
            $('.input-btn').each(function() {
                $(this).css("height", "42px");
                $(this).css("width", "42px");
            });
        }
    })
</script>

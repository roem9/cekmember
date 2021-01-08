<?php
    class Tarkibi2_model extends CI_MODEL{
        // public function pertemuan($id){
        //     return $data[$id];
        // }

        public function materi_pertemuan($id){
            $data[1] = [
                "0" => "<img src='".base_url()."assets/img/tarkibi_2/1.1.png' class='img-rounded img-fluid'>",
                "1" => "<img src='".base_url()."assets/img/tarkibi_2/1.2.png' class='img-rounded img-fluid'>",
                "2" => "<img src='".base_url()."assets/img/tarkibi_2/1.3.png' class='img-rounded img-fluid'>",
                "3" => "<img src='".base_url()."assets/img/tarkibi_2/1.4.png' class='img-rounded img-fluid'>",
                "4" => "<img src='".base_url()."assets/img/tarkibi_2/1.5.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/tarkibi_2/1.1.mpeg' type='audio/mpeg'></audio>", 
                "6" => "<audio controls><source src='".base_url()."assets/sound/tarkibi_2/1.2.mpeg' type='audio/mpeg'></audio>", 
                "7" => "<audio controls><source src='".base_url()."assets/sound/tarkibi_2/1.3.mpeg' type='audio/mpeg'></audio>", 
            ];

            $data[2] = [
                "0" => "<img src='".base_url()."assets/img/tarkibi_2/2.1.jpg' class='img-rounded img-fluid'>",
                "1" => "<img src='".base_url()."assets/img/tarkibi_2/2.2.jpg' class='img-rounded img-fluid'>",
                "2" => "<img src='".base_url()."assets/img/tarkibi_2/2.3.jpg' class='img-rounded img-fluid'>",
                "3" => "<img src='".base_url()."assets/img/tarkibi_2/2.4.jpg' class='img-rounded img-fluid'>",
                "4" => "<img src='".base_url()."assets/img/tarkibi_2/2.5.jpg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/tarkibi_2/2.1.mpeg' type='audio/mpeg'></audio>", 
            ];

            $data[3] = [
                "0" => "<img src='".base_url()."assets/img/tarkibi_2/3.1.jpg' class='img-rounded img-fluid'>",
                "1" => "<img src='".base_url()."assets/img/tarkibi_2/3.2.jpg' class='img-rounded img-fluid'>",
                "2" => "<img src='".base_url()."assets/img/tarkibi_2/3.3.jpg' class='img-rounded img-fluid'>",
                "3" => "<img src='".base_url()."assets/img/tarkibi_2/3.4.jpg' class='img-rounded img-fluid'>",
                "4" => "<audio controls><source src='".base_url()."assets/sound/tarkibi_2/3.1.mpeg' type='audio/mpeg'></audio>",
            ];

            $data[4] = [
                "0" => "<img src='".base_url()."assets/img/tarkibi_2/4.1.jpg' class='img-rounded img-fluid'>",
                "1" => "<img src='".base_url()."assets/img/tarkibi_2/4.2.jpg' class='img-rounded img-fluid'>",
                "2" => "<img src='".base_url()."assets/img/tarkibi_2/4.3.jpg' class='img-rounded img-fluid'>",
                "3" => "<img src='".base_url()."assets/img/tarkibi_2/4.4.jpg' class='img-rounded img-fluid'>",
                "4" => "<img src='".base_url()."assets/img/tarkibi_2/4.5.jpg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/tarkibi_2/4.1.mpeg' type='audio/mpeg'></audio>",
                "6" => "<audio controls><source src='".base_url()."assets/sound/tarkibi_2/4.2.mpeg' type='audio/mpeg'></audio>",
            ];

            $data[5] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/5.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/5.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/5.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/5.2.mpeg' type='audio/mpeg'></audio>",
                "4" => "<img src='".base_url()."assets/img/hifdzi_1/5.3.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/5.3.mpeg' type='audio/mpeg'></audio>",
            ];

            $data[6] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/6.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/6.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/6.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/6.2.mpeg' type='audio/mpeg'></audio>",
                "4" => "<img src='".base_url()."assets/img/hifdzi_1/6.3.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/6.3.mpeg' type='audio/mpeg'></audio>",
                "6" => "<img src='".base_url()."assets/img/hifdzi_1/6.4.jpeg' class='img-rounded img-fluid'>",
                "7" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/6.4.mpeg' type='audio/mpeg'></audio>",
            ];

            $data[7] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/7.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/7.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/7.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/7.2.mpeg' type='audio/mpeg'></audio>",
            ];

            $data[8] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/8.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/8.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/8.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/8.2.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[9] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/9.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/9.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/9.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/9.2.mpeg' type='audio/mpeg'></audio>",
                "4" => "<img src='".base_url()."assets/img/hifdzi_1/9.3.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/9.3.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[10] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/10.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/10.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/10.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/10.2.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[11] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/11.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/11.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/11.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/11.2.mpeg' type='audio/mpeg'></audio>",
                "4" => "<img src='".base_url()."assets/img/hifdzi_1/11.3.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/11.3.mpeg' type='audio/mpeg'></audio>",
            ];

            $data[12] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/12.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/12.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/12.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/12.2.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[13] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/13.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/13.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/13.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/13.2.mpeg' type='audio/mpeg'></audio>",
                "4" => "<img src='".base_url()."assets/img/hifdzi_1/13.3.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/13.3.mpeg' type='audio/mpeg'></audio>",
                "6" => "<img src='".base_url()."assets/img/hifdzi_1/13.4.jpeg' class='img-rounded img-fluid'>",
                "7" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/13.4.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[14] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/14.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/14.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/14.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/14.2.mpeg' type='audio/mpeg'></audio>",
                "4" => "<img src='".base_url()."assets/img/hifdzi_1/14.3.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/14.3.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[15] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/15.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/15.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/15.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/15.2.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[16] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/16.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/16.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/16.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/16.2.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[17] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/17.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/17.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/17.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/17.2.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[18] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/18.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/18.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/18.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/18.2.mpeg' type='audio/mpeg'></audio>",
                "4" => "<img src='".base_url()."assets/img/hifdzi_1/18.3.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/18.3.mpeg' type='audio/mpeg'></audio>",
                "6" => "<img src='".base_url()."assets/img/hifdzi_1/18.4.jpeg' class='img-rounded img-fluid'>",
                "7" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/18.4.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[19] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/19.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/19.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/19.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/19.2.mpeg' type='audio/mpeg'></audio>",
                "4" => "<img src='".base_url()."assets/img/hifdzi_1/19.3.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/19.3.mpeg' type='audio/mpeg'></audio>",
                "6" => "<img src='".base_url()."assets/img/hifdzi_1/19.4.jpeg' class='img-rounded img-fluid'>",
                "7" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/19.4.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[20] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/20.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/20.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/20.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/20.2.mpeg' type='audio/mpeg'></audio>",
                "4" => "<img src='".base_url()."assets/img/hifdzi_1/20.3.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/20.3.mpeg' type='audio/mpeg'></audio>",
                "6" => "<img src='".base_url()."assets/img/hifdzi_1/20.4.jpeg' class='img-rounded img-fluid'>",
                "7" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/20.4.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[21] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/21.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/21.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/21.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/21.2.mpeg' type='audio/mpeg'></audio>",
                "4" => "<img src='".base_url()."assets/img/hifdzi_1/21.3.jpeg' class='img-rounded img-fluid'>",
                "5" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/21.3.mpeg' type='audio/mpeg'></audio>",
                "6" => "<img src='".base_url()."assets/img/hifdzi_1/21.4.jpeg' class='img-rounded img-fluid'>",
                "7" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/21.4.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[22] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/22.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/22.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/22.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/22.2.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[23] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/23.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/23.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/23.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/23.2.mpeg' type='audio/mpeg'></audio>",
            ];
            
            $data[24] = [
                "0" => "<img src='".base_url()."assets/img/hifdzi_1/24.1.jpeg' class='img-rounded img-fluid'>",
                "1" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/24.1.mpeg' type='audio/mpeg'></audio>",
                "2" => "<img src='".base_url()."assets/img/hifdzi_1/24.2.jpeg' class='img-rounded img-fluid'>",
                "3" => "<audio controls><source src='".base_url()."assets/sound/hifdzi_1/24.2.mpeg' type='audio/mpeg'></audio>",
            ];
            
            return $data[$id];
        }

        public function latihan($id){
            $data[1] = [];
            $data[2] = [
                "mufrodat" => $this->fiil_mudhori(),
                "latihan" => "latihan ketik",
                "petunjuk" => "Tentukan bentuk fiil mudhori sesuai dengan dhomir berikut.",
            ];
            $data[3] = [
                "mufrodat" => $this->latihan_pertemuan_3(),
                "latihan" => "latihan pg",
                "petunjuk" => "Tentukan apakah kata berikut ini termasuk mu'rob atau mabni!",
            ];
            $data[4] = [
                "mufrodat" => $this->latihan_pertemuan_4(),
                "latihan" => "latihan ketik",
                "petunjuk" => "Ketiklah bentuk kata berikut ketika dalam kedudukan irob yang ada di dalam kurung!",
            ];

            return $data[$id];
        }

        public function halaman($id){
            $hal[1] = "2";
            $hal[2] = "3";
            $hal[3] = "4";
            $hal[4] = "2";
            $hal[5] = "3";
            $hal[6] = "4";
            $hal[7] = "2";
            $hal[8] = "2";
            $hal[9] = "3";
            $hal[10] = "2";
            $hal[11] = "3";
            $hal[12] = "2";
            $hal[13] = "4";
            $hal[14] = "3";
            $hal[15] = "2";
            $hal[16] = "2";
            $hal[17] = "2";
            $hal[18] = "4";
            $hal[19] = "4";
            $hal[20] = "4";
            $hal[21] = "4";
            $hal[22] = "2";
            $hal[23] = "2";
            $hal[24] = "2";

            return $hal[$id];
        }

        public function fiil_mudhori(){
            $data = [
                [
                    "latihan" => 1,
                    "soal" => "هُمَا (مذكر) + يَضْرِبُ",
                    "jawaban" => "يَضْرِبَانِ",
                    "kata" => "يَضْرِبُ",
                    "huruf" => array_unique(array_diff($this->huruf($this->huruf_fiil_mudhori("يَضْرِبُ")), ["_"])),
                ],
                $this->kata_fiil_mudhori("1", "هُمْ + يَضْرِبُ", "يَضْرِبُ", "يَضْرِبُوْنَ"),
                $this->kata_fiil_mudhori("1", "هُمَا (مؤنث) + يَضْرِبُ", "يَضْرِبُ", "تَضْرِبَانِ"),
                $this->kata_fiil_mudhori("1", "أَنْتُمَا + يَضْرِبُ", "يَضْرِبُ", "تَضْرِبَانِ"),
                $this->kata_fiil_mudhori("1", "أَنْتُمْ + يَضْرِبُ", "يَضْرِبُ", "تَضْرِبُوْنَ"),
                $this->kata_fiil_mudhori("1", "أَنْتِ + يَضْرِبُ", "يَضْرِبُ", "تَضْرِبِيْنَ"),
            ];

            return $data;
        }

        public function kata_fiil_mudhori($latihan, $soal, $kata, $jawaban){
            $data = [
                "latihan" => $latihan,
                "soal" => $soal,
                "jawaban" => $jawaban,
                "kata" => $this->kata_mudhori($kata),
                "huruf" => array_unique(array_diff($this->huruf($this->huruf_fiil_mudhori($kata)), ["_"])),
            ];

            return $data;
        }
        
        public function kata_mudhori($kata){
            $huwa = $kata;
            $huma_l = substr($kata, 0, -2) . "َانِ";
            $hum = substr($kata, 0, -2) . "ُوْنَ";
            $hiya = "تَ" . substr($kata, 4);
            $huma_p = "تَ" . substr($kata, 4, -2) . "َانِ";
            $hunna = substr($kata, 0, -2) . "ْنَ";
            $anta = "تَ" . substr($kata, 4);
            $antuma = "تَ" . substr($kata, 4, -2) . "َانِ";
            $antum = "تَ" . substr($kata, 4, -2) . "ُوْنَ";
            $anti = "تَ" . substr($kata, 4, -2) . "ِيْنَ";
            $antunna = "تَ" . substr($kata, 4, -2) . "ْنَ";
            $ana = "أَ" . substr($kata, 4);
            $nahnu = "نَ" . substr($kata, 4);

            // $data[] = $huwa;
            $data[] = $huma_l;
            $data[] = $hum;
            // $data[] = $hiya;
            $data[] = $huma_p;
            // $data[] = $hunna;
            // $data[] = $anta;
            $data[] = $antuma;
            $data[] = $antum;
            $data[] = $anti;
            // $data[] = $antunna;
            // $data[] = $ana;
            // $data[] = $nahnu;

            return $data;
        }

        public function huruf_fiil_mudhori($kata){
            $huwa = $kata;
            $huma_l = substr($kata, 0, -2) . "َانِ";
            $hum = substr($kata, 0, -2) . "ُوْنَ";
            $hiya = "تَ" . substr($kata, 4);
            $huma_p = "تَ" . substr($kata, 4, -2) . "َانِ";
            $hunna = substr($kata, 0, -2) . "ْنَ";
            $anta = "تَ" . substr($kata, 4);
            $antuma = "تَ" . substr($kata, 4, -2) . "َانِ";
            $antum = "تَ" . substr($kata, 4, -2) . "ُوْنَ";
            $anti = "تَ" . substr($kata, 4, -2) . "ِيْنَ";
            $antunna = "تَ" . substr($kata, 4, -2) . "ْنَ";
            $ana = "أَ" . substr($kata, 4);
            $nahnu = "نَ" . substr($kata, 4);

            // $data = $huwa . " " . $huma_l . " " . $hum . " " . $hiya . " " . $huma_p . " " . $hunna . " " . $anta . " " . $antuma . " " . $antum . " " . $anti . " " . $antunna . " " . $ana . " " . $nahnu;
            $data = $huma_l . " " . $hum . " " . $huma_p . " " . $antuma . " " . $antum . " " . $anti;

            return $data;
        }

        public function huruf($kata, $cek = ""){
            $i = 0;
            $huruf = [];
            while ($kata != ""){
                if(substr($kata, -1) == "-"){
                    $huruf[$i] = substr($kata, -1);
                    $kata = substr($kata, 0, -1);
                } else if(substr($kata, -1) == " "){
                    $huruf[$i] = " ";
                    $kata = substr($kata, 0, -1);
                } else if(substr($kata, -1) == "/"){
                    $huruf[$i] = substr($kata, -1);
                    $kata = substr($kata, 0, -1);
                } else if (substr($kata, -8) == "اَلْ") {
                    $huruf[$i] = substr($kata, -8);
                    $kata = substr($kata, 0, -8);
                } else if (substr($kata, -6) == "اَل" || substr($kata, -6) == "الْ" ){
                    $huruf[$i] = substr($kata, -6);
                    $kata = substr($kata, 0, -6);
                } else if (substr($kata, -4) == "ال" ){
                    $huruf[$i] = substr($kata, -4);
                    $kata = substr($kata, 0, -4);
                } else if (substr($kata, -2, 2) == "ّ" || substr($kata, -4, 2) == "ّ"){
                    $huruf[$i] = substr($kata, -6);
                    $kata = substr($kata, 0, -6);
                } else if(substr($kata, -2) == "ا" || substr($kata, -2) == "ى" || substr($kata, -2) == "ج" || substr($kata, -2) == "-" || substr($kata, -2) == "_" || substr($kata, -2) == "ل" || substr($kata, -2) == "آ" || substr($kata, -2) == "ي" || substr($kata, -2) == "و"){
                    $huruf[$i] = substr($kata, -2);
                    $kata = substr($kata, 0, -2);
                } else {
                    $huruf[$i] = substr($kata, -4);
                    $kata = substr($kata, 0, -4);
                }

                $i++;
            }

            if($cek != ""){
                $huruf[$i] = $cek;
            }
            
            return $huruf;
        }

        public function latihan_pertemuan_3(){
            $data = [
                [
                    "soal" => "قَلَمٌ",
                    "jawaban" => "معرب"
                ],
                [
                    "soal" => "سَبُّوْرَةٌ",
                    "jawaban" => "معرب"
                ],
                [
                    "soal" => "ضَرَبْتُمَا",
                    "jawaban" => "مبني"
                ],
                [
                    "soal" => "الَّذِيْنَ",
                    "jawaban" => "مبني"
                ],
                [
                    "soal" => "عَنْ",
                    "jawaban" => "مبني"
                ],
                [
                    "soal" => "مُجْرِمُوْنَ",
                    "jawaban" => "معرب"
                ],
                [
                    "soal" => "تِلْمِيْذَانِ",
                    "jawaban" => "معرب"
                ],
                [
                    "soal" => "يَقُوْمَانِ",
                    "jawaban" => "معرب"
                ],
                [
                    "soal" => "أَسْتَعِيْرُ",
                    "jawaban" => "معرب"
                ],
                [
                    "soal" => "ذَلِكَ",
                    "jawaban" => "مبني"
                ],
                [
                    "soal" => "أَنْتُمْ",
                    "jawaban" => "مبني"
                ],
                [
                    "soal" => "حَاسُوْبٌ",
                    "jawaban" => "معرب"
                ],
                [
                    "soal" => "أَمَامَ",
                    "jawaban" => "مبني و معرب"
                ],
                [
                    "soal" => "خَلْفَ",
                    "jawaban" => "مبني و معرب"
                ],
                [
                    "soal" => "عَلَى",
                    "jawaban" => "مبني"
                ],
                [
                    "soal" => "مُحَمَّدٌ",
                    "jawaban" => "معرب"
                ]
            ];
            
            return $data;
        }

        public function latihan_pertemuan_4(){
            $data = [
                [
                    "soal" => "صُوْرَةٍ (رَفَعْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "صُوْرَةٌ",
                    "huruf" => array_unique($this->huruf("صُوْرَةٌصُوْرَةًصُوْرَةٍ")),
                ],
                [
                    "soal" => "صُوْرَةٌ (نَصَبْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "صُوْرَةً",
                    "huruf" => array_unique($this->huruf("صُوْرَةٌصُوْرَةًصُوْرَةٍ")),
                ],
                [
                    "soal" => "صُوْرَةً (جَرْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "صُوْرَةٍ",
                    "huruf" => array_unique($this->huruf("صُوْرَةٌصُوْرَةًصُوْرَةٍ")),
                ],
                [
                    "soal" => "مَدْرَسَتَيْنِ (رَفَعْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مَدْرَسَتَانِ",
                    "huruf" => array_unique($this->huruf("مَدْرَسَتَيْنِمَدْرَسَتَانِ")),
                ],
                [
                    "soal" => "مَدْرَسَتَانِ (نَصَبْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مَدْرَسَتَيْنِ",
                    "huruf" => array_unique($this->huruf("مَدْرَسَتَيْنِمَدْرَسَتَانِ")),
                ],
                [
                    "soal" => "مَدْرَسَتَانِ (جَرْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مَدْرَسَتَيْنِ",
                    "huruf" => array_unique($this->huruf("مَدْرَسَتَيْنِمَدْرَسَتَانِ")),
                ],
                [
                    "soal" => "كَافِرِيْنَ (رَفَعْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "كَافِرُوْنَ",
                    "huruf" => array_unique($this->huruf("كَافِرِيْنَكَافِرُوْنَ")),
                ],
                [
                    "soal" => "كَافِرُوْنَ (نَصَبْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "كَافِرِيْنَ",
                    "huruf" => array_unique($this->huruf("كَافِرِيْنَكَافِرُوْنَ")),
                ],
                [
                    "soal" => "كَافِرُوْنَ (جَرْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "كَافِرِيْنَ",
                    "huruf" => array_unique($this->huruf("كَافِرِيْنَكَافِرُوْنَ")),
                ],
                [
                    "soal" => "مُؤْمِنَاتٍ (رَفَعْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مُؤْمِنَاتٌ",
                    "huruf" => array_unique($this->huruf("مُؤْمِنَاتٌمُؤْمِنَاتٍ")),
                ],
                [
                    "soal" => "مُؤْمِنَاتٌ (نَصَبْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مُؤْمِنَاتٍ",
                    "huruf" => array_unique($this->huruf("مُؤْمِنَاتٌمُؤْمِنَاتٍ")),
                ],
                [
                    "soal" => "مُؤْمِنَاتٌ (جَرْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مُؤْمِنَاتٍ",
                    "huruf" => array_unique($this->huruf("مُؤْمِنَاتٌمُؤْمِنَاتٍ")),
                ],
                [
                    "soal" => "أَبِيْهَا (رَفَعْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "أَبُوْهَا",
                    "huruf" => array_unique($this->huruf("أَبُوْهَاأَبِيْهَاأَبَاهَا")),
                ],
                [
                    "soal" => "أَبُوْهَا (نَصَبْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "أَبَاهَا",
                    "huruf" => array_unique($this->huruf("أَبُوْهَاأَبِيْهَاأَبَاهَا")),
                ],
                [
                    "soal" => "أَبَاهَا (جَرْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "أَبِيْهَا",
                    "huruf" => array_unique($this->huruf("أَبُوْهَاأَبِيْهَاأَبَاهَا")),
                ],
                [
                    "soal" => "قَلَمَيْنِ (رَفَعْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "قَلَمَانِ",
                    "huruf" => array_unique($this->huruf("قَلَمَيْنِقَلَمَانِ")),
                ],
                [
                    "soal" => "قَلَمَانِ (نَصَبْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "قَلَمَيْنِ",
                    "huruf" => array_unique($this->huruf("قَلَمَيْنِقَلَمَانِ")),
                ],
                [
                    "soal" => "قَلَمَانِ (جَرْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "قَلَمَيْنِ",
                    "huruf" => array_unique($this->huruf("قَلَمَيْنِقَلَمَانِ")),
                ],
                [
                    "soal" => "مُسْتَشْفًى (رَفَعْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مُسْتَشْفًى",
                    "huruf" => array_unique($this->huruf("مُسْتَشْفًىمُسْتَشْفِيَ")),
                ],
                [
                    "soal" => "مُسْتَشْفًى (نَصَبْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مُسْتَشْفِيَ",
                    "huruf" => array_unique($this->huruf("مُسْتَشْفًىمُسْتَشْفِيَ")),
                ],
                [
                    "soal" => "مُسْتَشْفِيَ (جَرْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مُسْتَشْفًى",
                    "huruf" => array_unique($this->huruf("مُسْتَشْفًىمُسْتَشْفِيَ")),
                ],
                [
                    "soal" => "مَكَاتِبَ (رَفَعْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مَكَاتِبُ",
                    "huruf" => array_unique($this->huruf("مَكَاتِبُمَكَاتِبَ")),
                ],
                [
                    "soal" => "مَكَاتِبُ (نَصَبْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مَكَاتِبَ",
                    "huruf" => array_unique($this->huruf("مَكَاتِبُمَكَاتِبَ")),
                ],
                [
                    "soal" => "مَكَاتِبُ (جَرْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مَكَاتِبَ",
                    "huruf" => array_unique($this->huruf("مَكَاتِبُمَكَاتِبَ")),
                ],
                [
                    "soal" => "مُدَرِّسِيْنَ (رَفَعْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مُدَرِّسُوْنَ",
                    "huruf" => array_unique($this->huruf("مُدَرِّسُوْنَمُدَرِّسِيْنَ")),
                ],
                [
                    "soal" => "مُدَرِّسُوْنَ (نَصَبْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مُدَرِّسِيْنَ",
                    "huruf" => array_unique($this->huruf("مُدَرِّسُوْنَمُدَرِّسِيْنَ")),
                ],
                [
                    "soal" => "مُدَرِّسُوْنَ (جَرْ) <span style='color: transparent;'>َ</span>",
                    "jawaban" => "مُدَرِّسِيْنَ",
                    "huruf" => array_unique($this->huruf("مُدَرِّسُوْنَمُدَرِّسِيْنَ")),
                ],
            ];

            return $data;
        }
    }
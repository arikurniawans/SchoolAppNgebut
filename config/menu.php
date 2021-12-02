<?php
return [
    /**
     *  TODO: ICON DALAM BENTUK SVG INLINE
     * @TODO: ROLE PADA MENU
     */

    //INFO: MENU DISAMPING KIRI
    'main' => [
        [
            'name' => 'Home',
            'url' => 'dashboard',
            'icon' => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <polygon style="fill:#66BD21;" points="375.443,141.61 257.904,282.118 301.938,297.726 482.035,300.197 512,285.61 "/> <polygon style="fill:#E50027;" points="140.263,143.529 281.986,259.779 297.048,233.512 297.449,63.806 282.598,0 "/> <polygon style="fill:#FEA832;" points="0,232.449 140.526,374.74 254.096,235.858 214.723,220.328 37.472,217.954 "/> <polygon style="fill:#1689FC;" points="233.104,260.688 217.732,286.925 214.84,490.383 229.547,512 371.737,374.477 "/> <path style="fill:#18A7FC;" d="M35.307,461.488c-8.498,8.655-3.732,23.313,8.232,25.313L229.547,512l3.558-251.313 C161.529,333.349,106.883,388.827,35.307,461.488z"/> <path style="fill:#FEDB41;" d="M53.515,38.295c-8.643-8.452-23.315-3.724-25.313,8.247L0,232.449l254.096,3.409 C181.513,164.367,126.098,109.785,53.515,38.295z"/> <path style="fill:#FD003A;" d="M468.461,31.205L282.598,0l-0.612,259.779c70.521-73.616,124.362-129.822,194.883-203.438 C485.144,47.62,480.321,33.17,468.461,31.205z"/> <path style="fill:#78DE28;" d="M257.904,282.118c72.583,71.495,127.998,126.083,200.581,197.578 c8.564,8.432,23.295,3.829,25.313-8.232L512,285.61L257.904,282.118z"/> <path style="fill:#E1E4FB;" d="M256,334.003c-41.353,0-75-33.647-75-75s33.647-75,75-75s75,33.647,75,75 S297.353,334.003,256,334.003z"/> <path style="fill:#C5C9F7;" d="M256,214.003c-24.814,0-45,20.186-45,45s20.186,45,45,45s45-20.186,45-45 S280.814,214.003,256,214.003z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>',
            'sub' => []
        ],
        [
            'name' => 'PSB',
            'titleMenu' => true
        ],

        [
            'name' => 'Pendaftaran Siswa Baru',
            //'role' => 'superadmin|admin|dokumentasi',
            'url' => 'psb',
            'icon' => '<!--begin::Svg Icon | path: assets/media/icons/duotone/Communication/Add-user.svg--> <span class="svg-icon svg-icon-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/> <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/> </svg></span> <!--end::Svg Icon-->',
            'sub' => []
        ],
        [
            'name' => 'Data Master',
            'titleMenu' => true
        ],
        [
            'name' => 'Data Sekolah',
            //'role' => 'superadmin|admin|dokumentasi',
            'url' => 'datasekolah',
            'icon' => '<i class="fa fa-building" aria-hidden="true"></i>',
            'sub' => []
        ],
        [
            'name' => 'Data Staff',
            //'role' => 'superadmin|admin|dokumentasi',
            'url' => 'datastaff',
            'icon' => '<i class="fa fa-users" aria-hidden="true"></i>',
            'sub' => []
        ],
        [
            'name' => 'Data Guru',
            //'role' => 'superadmin|admin|dokumentasi',
            'url' => 'dataguru',
            'icon' => '<i class="fa fa-user" aria-hidden="true"></i>',
            'sub' => []
        ],
        [
            'name' => 'Data Siswa',
            //'role' => 'superadmin|admin|dokumentasi',
            'url' => 'datasiswa',
            'icon' => '<i class="fa fa-universal-access" aria-hidden="true"></i>',
            'sub' => []
        ],
        [
            'name' => 'Data Mata Pelajaran',
            //'role' => 'superadmin|admin|dokumentasi',
            'url' => 'datamatapelajaran',
            'icon' => '<i class="fa fa-book" aria-hidden="true"></i>',
            'sub' => []
        ],
        [
            'name' => 'Data Ruang Kelas',
            //'role' => 'superadmin|admin|dokumentasi',
            'url' => 'dataruangkelas',
            'icon' => '<i class="fa fa-address-book" aria-hidden="true"></i>',
            'sub' => []
        ],
        [
            'name' => 'Data Jurusan',
            //'role' => 'superadmin|admin|dokumentasi',
            'url' => 'datajurusan',
            'icon' => '<i class="fa fa-address-book" aria-hidden="true"></i>',
            'sub' => []
        ],


        [
            'name' => 'Manajemen Role',
            //'role' =>'superadmin|admin|surat|user',
            'url' => '',
            'icon' => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <polygon style="fill:#66BD21;" points="375.443,141.61 257.904,282.118 301.938,297.726 482.035,300.197 512,285.61 "/> <polygon style="fill:#E50027;" points="140.263,143.529 281.986,259.779 297.048,233.512 297.449,63.806 282.598,0 "/> <polygon style="fill:#FEA832;" points="0,232.449 140.526,374.74 254.096,235.858 214.723,220.328 37.472,217.954 "/> <polygon style="fill:#1689FC;" points="233.104,260.688 217.732,286.925 214.84,490.383 229.547,512 371.737,374.477 "/> <path style="fill:#18A7FC;" d="M35.307,461.488c-8.498,8.655-3.732,23.313,8.232,25.313L229.547,512l3.558-251.313 C161.529,333.349,106.883,388.827,35.307,461.488z"/> <path style="fill:#FEDB41;" d="M53.515,38.295c-8.643-8.452-23.315-3.724-25.313,8.247L0,232.449l254.096,3.409 C181.513,164.367,126.098,109.785,53.515,38.295z"/> <path style="fill:#FD003A;" d="M468.461,31.205L282.598,0l-0.612,259.779c70.521-73.616,124.362-129.822,194.883-203.438 C485.144,47.62,480.321,33.17,468.461,31.205z"/> <path style="fill:#78DE28;" d="M257.904,282.118c72.583,71.495,127.998,126.083,200.581,197.578 c8.564,8.432,23.295,3.829,25.313-8.232L512,285.61L257.904,282.118z"/> <path style="fill:#E1E4FB;" d="M256,334.003c-41.353,0-75-33.647-75-75s33.647-75,75-75s75,33.647,75,75 S297.353,334.003,256,334.003z"/> <path style="fill:#C5C9F7;" d="M256,214.003c-24.814,0-45,20.186-45,45s20.186,45,45,45s45-20.186,45-45 S280.814,214.003,256,214.003z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>',
            'sub' => [

                [
                    //'role' => 'superadmin|admin|surat',
                    'name' => 'Manajemen Hak Akses',
                    'url' => 'datahakakses',
                    'icon' => '',
                    'sub' => []
                ],
                // [
                //     //'role' => 'user',
                //     'name' => 'Manajemen Fitur',
                //     'url' => 'datafitur',
                //     'icon' => '',
                //     'sub' => []
                // ],
                [
                    //'role' => 'user',
                    'name' => 'Manajemen Role',
                    'url' => 'datarole',
                    'icon' => '',
                    'sub' => []
                ],
            ]
        ],
    [
            'name' => 'Manajemen Kurikulum',
            //'role' =>'superadmin|admin|surat|user',
            'url' => 'surat',
            'icon' => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <polygon style="fill:#66BD21;" points="375.443,141.61 257.904,282.118 301.938,297.726 482.035,300.197 512,285.61 "/> <polygon style="fill:#E50027;" points="140.263,143.529 281.986,259.779 297.048,233.512 297.449,63.806 282.598,0 "/> <polygon style="fill:#FEA832;" points="0,232.449 140.526,374.74 254.096,235.858 214.723,220.328 37.472,217.954 "/> <polygon style="fill:#1689FC;" points="233.104,260.688 217.732,286.925 214.84,490.383 229.547,512 371.737,374.477 "/> <path style="fill:#18A7FC;" d="M35.307,461.488c-8.498,8.655-3.732,23.313,8.232,25.313L229.547,512l3.558-251.313 C161.529,333.349,106.883,388.827,35.307,461.488z"/> <path style="fill:#FEDB41;" d="M53.515,38.295c-8.643-8.452-23.315-3.724-25.313,8.247L0,232.449l254.096,3.409 C181.513,164.367,126.098,109.785,53.515,38.295z"/> <path style="fill:#FD003A;" d="M468.461,31.205L282.598,0l-0.612,259.779c70.521-73.616,124.362-129.822,194.883-203.438 C485.144,47.62,480.321,33.17,468.461,31.205z"/> <path style="fill:#78DE28;" d="M257.904,282.118c72.583,71.495,127.998,126.083,200.581,197.578 c8.564,8.432,23.295,3.829,25.313-8.232L512,285.61L257.904,282.118z"/> <path style="fill:#E1E4FB;" d="M256,334.003c-41.353,0-75-33.647-75-75s33.647-75,75-75s75,33.647,75,75 S297.353,334.003,256,334.003z"/> <path style="fill:#C5C9F7;" d="M256,214.003c-24.814,0-45,20.186-45,45s20.186,45,45,45s45-20.186,45-45 S280.814,214.003,256,214.003z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>',
            'sub' => [

                [
                    //'role' => 'superadmin|admin|surat',
                    'name' => 'Setting Tahun Ajaran',
                    'url' => 'datatahunakademik',
                    'icon' => '',
                    'sub' => []
                ],
                [
                    //'role' => 'user',
                    'name' => 'Manajemen Kelompok Kelas',
                    'url' => 'datakelompokkelas',
                    'icon' => '',
                    'sub' => []
                ],
                [
                     //'role' => 'user',
                     'name' => 'Manajemen Kelas',
                     'url' => 'surat/masuk',
                     'icon' => '',
                     'sub' =>
                     [
                            [
                             //'role' => 'user',
                               'name' => 'Setting Kelas Berjalan',
                               'url' => 'datakelasberjalan',
                               'icon' => '',
                               'sub' => []
                             ],
                            [
                             //'role' => 'user',
                               'name' => 'Setting Jadwal',
                               'url' => 'datasettingjadwal',
                               'icon' => '',
                               'sub' => []
                             ],
                             [
                              //'role' => 'user',
                                'name' => 'Setting Siswa',
                                'url' => 'datakelasberjalan/setsiswa',
                                'icon' => '',
                                'sub' => []
                              ],
                         [
                             //'role' => 'user',
                             'name' => 'Setting Pindah Kelas',
                             'url' => 'datakelasberjalan/setsiswapindahkelas',
                             'icon' => '',
                             'sub' => []
                         ],
                     ]
                 ],
            ]
        ],
        [
            'name' => 'Manajemen Raport',
            'url' => 'opd',
            //'role' => 'superadmin|admin',
            //'role' => 'asda',
            'icon' => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <polygon style="fill:#66BD21;" points="375.443,141.61 257.904,282.118 301.938,297.726 482.035,300.197 512,285.61 "/> <polygon style="fill:#E50027;" points="140.263,143.529 281.986,259.779 297.048,233.512 297.449,63.806 282.598,0 "/> <polygon style="fill:#FEA832;" points="0,232.449 140.526,374.74 254.096,235.858 214.723,220.328 37.472,217.954 "/> <polygon style="fill:#1689FC;" points="233.104,260.688 217.732,286.925 214.84,490.383 229.547,512 371.737,374.477 "/> <path style="fill:#18A7FC;" d="M35.307,461.488c-8.498,8.655-3.732,23.313,8.232,25.313L229.547,512l3.558-251.313 C161.529,333.349,106.883,388.827,35.307,461.488z"/> <path style="fill:#FEDB41;" d="M53.515,38.295c-8.643-8.452-23.315-3.724-25.313,8.247L0,232.449l254.096,3.409 C181.513,164.367,126.098,109.785,53.515,38.295z"/> <path style="fill:#FD003A;" d="M468.461,31.205L282.598,0l-0.612,259.779c70.521-73.616,124.362-129.822,194.883-203.438 C485.144,47.62,480.321,33.17,468.461,31.205z"/> <path style="fill:#78DE28;" d="M257.904,282.118c72.583,71.495,127.998,126.083,200.581,197.578 c8.564,8.432,23.295,3.829,25.313-8.232L512,285.61L257.904,282.118z"/> <path style="fill:#E1E4FB;" d="M256,334.003c-41.353,0-75-33.647-75-75s33.647-75,75-75s75,33.647,75,75 S297.353,334.003,256,334.003z"/> <path style="fill:#C5C9F7;" d="M256,214.003c-24.814,0-45,20.186-45,45s20.186,45,45,45s45-20.186,45-45 S280.814,214.003,256,214.003z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>',
            'sub' =>
            [
                [
                    //'role' => 'user',
                    'name' => 'Input Nilai Raport',
                    'url' => 'datainputraport',
                    'icon' => '',
                    'sub' => []
                ],
            [
                    //'role' => 'user',
                    'name' => 'Input Nilai Tugas',
                    'url' => 'datainputnilai',
                    'icon' => '',
                    'sub' => []
                ],
                [
                    //'role' => 'user',
                    'name' => 'Lihat Raport',
                    'url' => 'surat/masuk',
                    'icon' => '',
                    'sub' => []
                ],
                [
                    //'role' => 'user',
                    'name' => 'Cetak Raport',
                    'url' => 'surat/masuk',
                    'icon' => '',
                    'sub' => []
                ],
            ]
        ],
            [
            'name' => 'Manajemen Nilai',
            'url' => 'opd',
            //'role' => 'superadmin|admin',
            //'role' => 'asda',
            'icon' => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <polygon style="fill:#66BD21;" points="375.443,141.61 257.904,282.118 301.938,297.726 482.035,300.197 512,285.61 "/> <polygon style="fill:#E50027;" points="140.263,143.529 281.986,259.779 297.048,233.512 297.449,63.806 282.598,0 "/> <polygon style="fill:#FEA832;" points="0,232.449 140.526,374.74 254.096,235.858 214.723,220.328 37.472,217.954 "/> <polygon style="fill:#1689FC;" points="233.104,260.688 217.732,286.925 214.84,490.383 229.547,512 371.737,374.477 "/> <path style="fill:#18A7FC;" d="M35.307,461.488c-8.498,8.655-3.732,23.313,8.232,25.313L229.547,512l3.558-251.313 C161.529,333.349,106.883,388.827,35.307,461.488z"/> <path style="fill:#FEDB41;" d="M53.515,38.295c-8.643-8.452-23.315-3.724-25.313,8.247L0,232.449l254.096,3.409 C181.513,164.367,126.098,109.785,53.515,38.295z"/> <path style="fill:#FD003A;" d="M468.461,31.205L282.598,0l-0.612,259.779c70.521-73.616,124.362-129.822,194.883-203.438 C485.144,47.62,480.321,33.17,468.461,31.205z"/> <path style="fill:#78DE28;" d="M257.904,282.118c72.583,71.495,127.998,126.083,200.581,197.578 c8.564,8.432,23.295,3.829,25.313-8.232L512,285.61L257.904,282.118z"/> <path style="fill:#E1E4FB;" d="M256,334.003c-41.353,0-75-33.647-75-75s33.647-75,75-75s75,33.647,75,75 S297.353,334.003,256,334.003z"/> <path style="fill:#C5C9F7;" d="M256,214.003c-24.814,0-45,20.186-45,45s20.186,45,45,45s45-20.186,45-45 S280.814,214.003,256,214.003z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>',
            'sub' =>
            [
                [
                    //'role' => 'user',
                    'name' => 'Input Komponen Nilai',
                    'url' => 'datainputkomponennilai',
                    'icon' => '',
                    'sub' => []
                ],
            [
                    //'role' => 'user',
                    'name' => 'Input Nilai',
                    'url' => 'datainputnilai',
                    'icon' => '',
                    'sub' => []
                ],
                [
                    //'role' => 'user',
                    'name' => 'Lihat Rekap Nilai',
                    'url' => 'datainputnilai/setrekapnilai',
                    'icon' => '',
                    'sub' => []
                ],
            ]
        ],
        [
            'name' => 'Keuangan',
            'url' => 'opd',
            //'role' => 'superadmin|admin',
            //'role' => 'asda',
            'icon' => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <polygon style="fill:#66BD21;" points="375.443,141.61 257.904,282.118 301.938,297.726 482.035,300.197 512,285.61 "/> <polygon style="fill:#E50027;" points="140.263,143.529 281.986,259.779 297.048,233.512 297.449,63.806 282.598,0 "/> <polygon style="fill:#FEA832;" points="0,232.449 140.526,374.74 254.096,235.858 214.723,220.328 37.472,217.954 "/> <polygon style="fill:#1689FC;" points="233.104,260.688 217.732,286.925 214.84,490.383 229.547,512 371.737,374.477 "/> <path style="fill:#18A7FC;" d="M35.307,461.488c-8.498,8.655-3.732,23.313,8.232,25.313L229.547,512l3.558-251.313 C161.529,333.349,106.883,388.827,35.307,461.488z"/> <path style="fill:#FEDB41;" d="M53.515,38.295c-8.643-8.452-23.315-3.724-25.313,8.247L0,232.449l254.096,3.409 C181.513,164.367,126.098,109.785,53.515,38.295z"/> <path style="fill:#FD003A;" d="M468.461,31.205L282.598,0l-0.612,259.779c70.521-73.616,124.362-129.822,194.883-203.438 C485.144,47.62,480.321,33.17,468.461,31.205z"/> <path style="fill:#78DE28;" d="M257.904,282.118c72.583,71.495,127.998,126.083,200.581,197.578 c8.564,8.432,23.295,3.829,25.313-8.232L512,285.61L257.904,282.118z"/> <path style="fill:#E1E4FB;" d="M256,334.003c-41.353,0-75-33.647-75-75s33.647-75,75-75s75,33.647,75,75 S297.353,334.003,256,334.003z"/> <path style="fill:#C5C9F7;" d="M256,214.003c-24.814,0-45,20.186-45,45s20.186,45,45,45s45-20.186,45-45 S280.814,214.003,256,214.003z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>',
            'sub' =>
            [
                [
                    //'role' => 'user',
                    'name' => 'Master Komponen Biaya Sekolah',
                    'url' => 'datauangsekolah',
                    'icon' => '',
                    'sub' => []
                ],
                [
                    //'role' => 'user',
                    'name' => 'Setting Pembayaran Siswa',
                    'url' => 'datasettingpembayaran',
                    'icon' => '',
                    'sub' => []
                ],
                [
                    //'role' => 'user',
                    'name' => 'Rekap Pembayaran Siswa',
                    'url' => 'datarekappembayaran',
                    'icon' => '',
                    'sub' => []
                ],
                [
                    //'role' => 'user',
                    'name' => 'Laporan Pembayaran',
                    'url' => 'datalaporanpembayaran',
                    'icon' => '',
                    'sub' => []
                ],
                [
                    //'role' => 'user',
                    'name' => 'Pembayaran SPP',
                    'url' => 'datapembayaranspp',
                    'icon' => '',
                    'sub' => []
                ],
            ]
        ],
        [
            'name' => 'Pengguna',
            'url' => 'users',
            //'role' => 'superadmin|admin',
            //'role' => 'asda',
            'icon' => '',
            'sub' => []
        ],

    ],

    //INFO: MENU DIATAS SEKALIGUS KANAN DIMOBILE
    'header' => [
        [
            'name' => 'Dashboard',
            'url' => 'dashboard',
            'icon' => '<?xml version="1.0" encoding="iso-8859-1"?> <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --> <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <polygon style="fill:#66BD21;" points="375.443,141.61 257.904,282.118 301.938,297.726 482.035,300.197 512,285.61 "/> <polygon style="fill:#E50027;" points="140.263,143.529 281.986,259.779 297.048,233.512 297.449,63.806 282.598,0 "/> <polygon style="fill:#FEA832;" points="0,232.449 140.526,374.74 254.096,235.858 214.723,220.328 37.472,217.954 "/> <polygon style="fill:#1689FC;" points="233.104,260.688 217.732,286.925 214.84,490.383 229.547,512 371.737,374.477 "/> <path style="fill:#18A7FC;" d="M35.307,461.488c-8.498,8.655-3.732,23.313,8.232,25.313L229.547,512l3.558-251.313 C161.529,333.349,106.883,388.827,35.307,461.488z"/> <path style="fill:#FEDB41;" d="M53.515,38.295c-8.643-8.452-23.315-3.724-25.313,8.247L0,232.449l254.096,3.409 C181.513,164.367,126.098,109.785,53.515,38.295z"/> <path style="fill:#FD003A;" d="M468.461,31.205L282.598,0l-0.612,259.779c70.521-73.616,124.362-129.822,194.883-203.438 C485.144,47.62,480.321,33.17,468.461,31.205z"/> <path style="fill:#78DE28;" d="M257.904,282.118c72.583,71.495,127.998,126.083,200.581,197.578 c8.564,8.432,23.295,3.829,25.313-8.232L512,285.61L257.904,282.118z"/> <path style="fill:#E1E4FB;" d="M256,334.003c-41.353,0-75-33.647-75-75s33.647-75,75-75s75,33.647,75,75 S297.353,334.003,256,334.003z"/> <path style="fill:#C5C9F7;" d="M256,214.003c-24.814,0-45,20.186-45,45s20.186,45,45,45s45-20.186,45-45 S280.814,214.003,256,214.003z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>',
            'sub' => []
        ],
        [
            'name' => 'Registrasi',
            'url' => 'register',
            'icon' => '',
            'sub' => []
        ],

    ]
];
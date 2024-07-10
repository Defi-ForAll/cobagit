<div class="d-flex flex-column flex-lg-row mt-5 mb-3">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <i class="fa-regular fa-user icon-title"></i>
        <h3>STOK</h3>
    </div>
    <!-- breadcrumbs -->
    <div class="ms-5 ms-lg-0 pt-lg-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://pustakakoding.com/" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="?halaman=data" class="text-dark text-decoration-none">Stok Produk</a></li>
                <li class="breadcrumb-item" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
</div>

<div class="d-grid gap-2 d-md-block bg-white rounded-4 shadow-sm p-4 mb-3">
    <!-- button entri data -->
    <button id="btn-entri" class="btn btn-primary rounded-pill py-2 px-4">
        <i class="fa-solid fa-plus me-2"></i> Entri Stok Produk
    </button>
</div>

<div class="d-grid gap-2 d-md-block bg-white rounded-4 shadow-sm p-4 mb-5">
    <div class="table-responsive">
        <!-- tabel untuk menampilkan data dari database -->
        <table id="tabel-produk" class="table table-bordered table-striped table-hover" style="width:100%">
            <thead class="table-light">
                <th class="text-center">NO.</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Gambar</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Deskripsi</th>
                <th class="text-center">Tanggal Upload</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Tempat Simpan</th>
                <th class="text-center">Aksi</th>
            </thead>
        </table>
    </div>
</div>

<!-- Modal form entri dan ubah data -->
<div class="modal fade" id="mdl-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <!-- judul form -->
                <h1 class="modal-title fs-5">
                    <i class="fa-solid fa-pen-to-square me-2"></i><span id="mdl-label"></span>
                </h1>
            </div>
            <div class="modal-body text-start">
                <!-- form -->
                <form id="frm-produk" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row g-0">
                                <!-- <div class="mb-3 col-xl-6 pe-xl-3">
                                    <label class="form-label">ID Produk <span class="text-danger">*</span></label>
                                    <input type="text" id="id_produk" name="id_produk" class="form-control" disabled>
                                    <div class="invalid-feedback">Id Produk tidak boleh kosong.</div>
                                </div> -->
                                <div class="mb-3 col-xl-6 pe-xl-3">
                                    <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                    <input type="text" id="nama_produk" name="nama_produk" class="form-control" required>
                                    <input type="hidden" id="id_produk" name="id_produk" class="form-control" disabled>
                                    <div class="invalid-feedback">Nama tidak boleh kosong.</div>
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select id="kategori" name="kategori" class="form-select" autocomplete="off" required>
                                        <option selected disabled value="">-- Pilih --</option>
                                    </select>
                                    <div class="invalid-feedback">Kategori tidak boleh kosong.</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="foto1" class="form-label">Foto Utama <span class="text-danger">*</span></label>
                                    <input type="file" accept=".jpg, .jpeg, .png" id="foto1" name="foto1" class="form-control" autocomplete="off">
                                    <div class="invalid-feedback">Foto Utama tidak boleh kosong.</div>
                                    <div id="foto_preview_1">
                                    <!-- container foto untuk prefiew -->
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <label for="foto2" class="form-label">Foto Kedua</label>
                                    <input type="file" accept=".jpg, .jpeg, .png" id="foto2" name="foto2" class="form-control" autocomplete="off">

                                    <div id="foto_preview_2">
                                    <!-- container foto untuk prefiew -->
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <label for="foto3" class="form-label">Foto Ketiga</label>
                                    <input type="file" accept=".jpg, .jpeg, .png" id="foto3" name="foto3" class="form-control" autocomplete="off">

                                    <div id="foto_preview_3">
                                    <!-- container foto untuk prefiew -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <hr class="mb-4-2">
                    <div class="row">
                        <div class="col-xl-6">
                            <label class="form-label">Keterangan <span class="text-danger">*</span></label>
                            <textarea id="keterangan" name="keterangan" rows="2" class="form-control" autocomplete="off" required></textarea>
                            <div class="invalid-feedback">Keterangan tidak boleh kosong.</div>
                        </div>
                        <div class="col-xl-6">
                            <?php 
                                //fungsi untuk mengambil timestamp
                                $currentdatetime = date('Y-m-d H:i:s');
                            ?>
                            <div class="mb-3 pe-xl-3">
                                <label class="form-label">Tanggal Input</label>
                                <input type="datetime-local" id="datetime" name="datetime" class="form-control" value="<?php echo $currentdatetime ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-xl-6 pe-xl-3">
                            <div class="mb-3 pe-xl-3">
                                <label class="form-label">Harga Produk <span class="text-danger">*</span></label>    
                                <div class="input-group mb-3 pe-xl-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input type="text" id="harga" class="form-control" required>
                                </div>
                                <div class="invalid-feedback">Harga tidak boleh kosong.</div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-6">
                        <label class="form-label">Stok <span class="text-danger">*</span></label>
                        <input type="number" id="stok_produk" name="stok_produk" class="form-control" required>
                        <div class="invalid-feedback">Stok tidak boleh kosong.</div>
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">Tempat Penyimpanan <span class="text-danger">*</span></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="option1" name="penyimpanan" value="gudang">
                            <label class="form-check-label" for="option1">Gudang</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="option2" name="penyimpanan" value="toko">
                            <label class="form-check-label" for="option2">Toko</label>
                        </div><br>
                        <div class="invalid-feedback">Pilih Setidaknya 1</div>
                    </div>
                </div>
            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- button simpan data -->
                <button id="btn-simpan" type="button" class="btn btn-primary rounded-pill py-2 px-4 me-2">Simpan</button>
                <!-- button tutup modal form -->
                <button type="button" id="btn-batal" class="btn btn-secondary rounded-pill py-2 px-4" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal form detail data -->
<div class="modal fade" id="mdl-form-detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <!-- judul form -->
                <h1 class="modal-title fs-5">
                    <i class="fa-solid fa-list-ul me-2"></i> Detail Produk
                </h1>
            </div>
            <div class="modal-body text-start">
                <!-- detail data -->
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-grow-1 text-muted fw-light ms-xl-5">
                        <div class="table-responsive">
                            <table class="table table-striped lh-lg">
                                <!-- <tr>
                                    <td width="200">Id Produk</td>
                                    <td width="10">:</td>
                                    <td id="dt_id_produk"></td>
                                </tr> -->
                                <tr>
                                    <td>Judul</td>
                                    <td>:</td>
                                    <td id="dt_nama"></td>
                                </tr>
                                <tr>
                                    <td>Gambar</td>
                                    <td>:</td>
                                    <td id="dt_thumbnail"></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td id="dt_harga"></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td id="dt_kategori"></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td id="dt_deskripsi"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Upload</td>
                                    <td>:</td>
                                    <td id="dt_tgl_upload"></td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td id="dt_stok"></td>
                                </tr>
                                <tr>
                                    <td>Tempat Simpan</td>
                                    <td>:</td>
                                    <td id="dt_tmpt_simpan"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- button tutup modal form -->
                <button type="button" class="btn btn-secondary rounded-pill py-2 px-4" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function() {
        /** Tampil Data
         *****************
        */
        // DataTables plugin untuk membuat nomor urut tabel
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        // Merubah format input harga ke dalam bentuk currency
        function formatCurrency(input) {
            // Remove non-digits and non-decimal characters
            var value = input.val().replace(/[^\d.-]/g, '');
            
            // Replace comma with dot for decimal
            value = value.replace(/,/g, '.');

            // Format to currency with comma separators and two decimal places
            input.val(parseFloat(value).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        }

        $("#harga").keyup(function (event) {
             // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            ;
            });
        });
        
        // mengambil semua kategori dari database
        $.ajax({
                url: 'get_kategori.php',
                type: 'GET',
                success: function(response) {
                    const data = JSON.parse(response);
                    const select = $('#kategori');
                    data.forEach(item => {
                        select.append(`<option value="${item.id_kategori}">${item.nama_kategori}</option>`);
                    });
                },
                error: function() {
                    alert('Failed to fetch data.');
                }
        });

        // Menampilkan data dengan datatables serverside processing
        var table = $('#tabel-produk').DataTable( {
            "processing": true,                     // tampilkan loading saat proses tampil data
            "serverSide": true,                     // aktifkan serverside processing
            "ajax": 'data.php',                     // file proses tampil data dari database
            // tampilkan data
            "columnDefs": [ 
                { "targets": 0, "data": null, "orderable": false, "searchable": false, "width": '30px', "className": 'text-center' },
                { "targets": 1, "width": "50px", "className": "text-center" },
                { "targets": 2, "width": "70px", "className": "text-center", "visible":false },
                { "targets": 3, "width": "70px", "className": "text-center" },
                { "targets": 4, "width": "80px", "className": "text-center" },
                { "targets": 5, "width": "80px", "className": "text-center" },
                { "targets": 6, "width": "80px", "className": "text-center" },
                { "targets": 7, "width": "80px", "className": "text-center" },
                { "targets": 8, "width": "80px", "className": "text-center" },
                { "targets": 9, "data": null, "orderable": false, "searchable": false, "width": '140px', "className": 'text-center',
                    // button detail, ubah, dan hapus data
                    "render": function(data, type, row) {
                        var btn = "<a class=\"btn btn-warning btn-sm rounded-pill px-3 me-2 mb-1 btn-detail\" href=\"javascript:void(0);\">Detail</a><a class=\"btn btn-primary btn-sm rounded-pill px-3 me-2 mb-1 btn-ubah\" href=\"javascript:void(0);\">Ubah</a><a class=\"btn btn-danger btn-sm rounded-pill px-3 mb-1 btn-hapus\" href=\"javascript:void(0);\">Hapus</a>";
                        return btn;
                    } 
                },
                {
                    "targets": 10, // Index of the primary key column
                    "orderable": false,
                    "searchable": false,
                    "visible": false, // This hides the primary key
                    "width": '30px',
                    "className": 'text-center'
                } 
            ],
            "order": [[ 1, "desc" ]],               // urutkan data berdasarkan "id_produk" secara descending
            "iDisplayLength": 10,                   // tampilkan 10 data per halaman
            // membuat nomor urut tabel
            "rowCallback": function (row, data, iDisplayIndex) {
                var info   = this.fnPagingInfo();
                var page   = info.iPage;
                var length = info.iLength;
                var index  = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        } );

        /** Form
         ********************
         * Form Entri Data
         * Form Detail Data
         * Form Ubah Data
         * Validasi dan Preview File
        */
        // Menampilkan Modal Form Entri Data
        $('#btn-entri').click(function() {
            // tutup preloader
            $('.preloader').fadeOut('fast');
            // tampilkan modal form
            $('#mdl-form').modal('show');
            // judul form
            $('#mdl-label').text('Entri Data Produk');
            // reset form
            $('#frm-produk')[0].reset();
            // hapus class was-validated pada form
            $("#frm-produk").removeClass('was-validated');
            // tampilkan data "id_produk"
            // $('#id_produk').val(result);

            
                        
        });

        $('#btn-batal').click(function(){
           if($('.preview-container').length){
            $('.preview-container').remove();
           }
        });

        // Menampilkan Modal Form Detail Data
        $('#tabel-produk tbody').on('click', '.btn-detail', function() {
            // mengambil data dari datatables 
            var data = table.row($(this).parents('tr')).data();
            // membuat variabel untuk menampung data "id_produk"
            var id_produk = data[10];
            var id_kategori = data[4];

            // ajax request untuk mengambil data produk
            $.ajax({
                type: "GET",                        // mengirim data dengan method GET 
                url: "get_data.php",                // file proses get data
                data: { id_produk: id_produk, id_kategori: id_kategori },       // data yang dikirim
                dataType: "JSON",                   // menggunakan tipe data JSON
                // fungsi yang dijalankan sebelum ajax request dikirim
                beforeSend: function() {
                    // tampilkan preloader
                    $('.preloader').fadeIn('slow');
                },
                // fungsi yang dijalankan ketika ajax request berhasil
                success: function(result) {
                    // memberikan interval waktu sebelum fungsi dijalankan
                    setTimeout(function() {
                        // tutup preloader
                        $('.preloader').fadeOut('fast');
                        // tampilkan modal form
                        $('#mdl-form-detail').modal('show');

                        // tampilkan data ke form
                        $('#dt_nama').text(result.judul);
                        var dataArray = result.thumbnail.split(';');
                        var foto = '';
                        dataArray.forEach(function(item){
                             foto += "<img src=\"uploads/thumbs/" + item.trim() + "\" class=\"border border-2 img-fluid rounded-3\" width=\"70px\" height=\"70px\">";
                             $('#dt_thumbnail').html(foto);
                        });
                        
                        $('#dt_harga').text(result.harga);
                        $('#dt_kategori').text(result.nama_kategori);
                        $('#dt_deskripsi').text(result.deskripsi);
                        $('#dt_tgl_upload').text(result.tgl_upload);
                        $('#dt_stok').text(result.stok);
                        $('#dt_tmpt_simpan').text(result.tmpt_simpan);
                    }, 500);
                }
            });
        });

        // Menampilkan Modal Form Ubah Data
        $('#tabel-produk tbody').on('click', '.btn-ubah', function() {
            // mengambil data dari datatables 
            var data = table.row($(this).parents('tr')).data();
            // membuat variabel untuk menampung data "id_produk"
            var id_produk = data[10];
            var id_kategori = data[4];

            // ajax request untuk mengambil data produk
            $.ajax({
                type: "GET",                        // mengirim data dengan method GET 
                url: "get_data.php",                // file proses get data
                data: { id_produk: id_produk, id_kategori:id_kategori },       // data yang dikirim
                dataType: "JSON",                   // menggunakan tipe data JSON
                // fungsi yang dijalankan sebelum ajax request dikirim
                beforeSend: function() {
                    // tampilkan preloader
                    $('.preloader').fadeIn('slow');
                },
                // fungsi yang dijalankan ketika ajax request berhasil
                success: function(result) {
                    // memberikan interval waktu sebelum fungsi dijalankan
                    setTimeout(function() {
                        // tutup preloader
                        $('.preloader').fadeOut('fast');
                        // tampilkan modal form
                        $('#mdl-form').modal('show');
                        // judul form
                        $('#mdl-label').text('Ubah Data Produk');
                        // hapus class was-validated pada form
                        $("#frm-produk").removeClass('was-validated');


                    //     data.append('nama_produk', $('#nama_produk').val());
                    // data.append('kategori', $('#kategori').val());
                    // data.append('datetime', $('#datetime').val());
                    // data.append('harga', $('#harga').val());
                    // data.append('stok_produk', $('#stok_produk').val());
                    // data.append('foto1', $('#foto1')[0].files[0]);
                    // data.append('foto2', $('#foto2')[0].files[0]);
                    // data.append('foto3', $('#foto3')[0].files[0]);
                    // data.append('keterangan', $('#keterangan').val());
                    // let f_penyimpanan = [];
                    // $('input[name="penyimpanan"]:checked').each(function(){
                    //     f_penyimpanan.push($(this).val());
                    // });
                    // data.append('penyimpanan',f_penyimpanan);

                        // tampilkan data ke form
                        $('#id_produk').val(result.id_produk);
                        $('#nama_produk').val(result.judul);
                        $('#harga').val(result.harga);
                        $('#stok_produk').val(result.stok);
                        $('#keterangan').val(result.deskripsi);
                        $('#kategori').val(result.id_kategori);

                        // untuk checkbox agar tercentang
                        var dataArray = result.tmpt_simpan.split(',');
                        $('input[name="penyimpanan"]').each(function(){
                            var checkboxValue = $(this).val();
                            if (dataArray.includes(checkboxValue)) {
                                $(this).prop('checked', true);
                            } else {
                                $(this).prop('checked', false);
                            }
                        });
                        // }
                        var dataArray = result.thumbnail.split(';');
                        var foto = '';
                        var i = 1;
                        dataArray.forEach(function(item){
                             // foto = "<img src=\"uploads/thumbs/" + item.trim() + "\" class=\"border border-2 img-fluid rounded-3\" width=\"70px\" height=\"70px\">";
                             foto = "uploads/thumbs/" + item.trim();
                             $preview = '#foto_preview_'+i;
                             $inputan = '';
                             $($preview).html(preview_gambar($inputan,foto));
                             i++;
                        });
                        var tanggal = result.tgl_upload;
                        var datetimelocalstring = tanggal.replace(" ", "T"); // karena format penulisna yang berbeda jadinya harus diganti dulu dalam bentuk html
                        // var coba = datetimelocalstring.replace(/-/g,"/"); // g artinya global artinya keseluruhan
                         console.log(datetimelocalstring);
                        $('#datetime').val(datetimelocalstring);

                        // $('#nama_produk').val(result.nama_produk);
                        // $('#stok').val(result.stok);
                        // 
                    }, 500);
                }
            });
        });

        function preview_gambar($inputan, gambardisini) {
                     // Create a new image element for each file
                     var imgContainer = $('<div>').addClass('preview-container col-lg-4 col-md-6').css({
                                'position': 'relative',
                                'display': 'inline-block'
                     });
                            var img = $('<img>')
                            .attr('src', gambardisini)
                            .addClass('border border-2 img-fluid rounded-4 shadow-sm')
                            .css({
                                'max-width': '100px',
                                'display': 'block',
                                'width': '100%',
                                'height': 'auto'
                            });
                            // fungsi untuk delete button dan stylenya
                            var deleteButton = $('<button>')
                                .text('X')
                                .addClass('delete-button')
                                .click(function() { // fungsi ketika di klik
                                    imgContainer.remove(); // menghapus gambar
                                    if($inputan){
                                    $($inputan).val(''); // mengosongkan gambar
                                    }
                                    
                                })
                                .css({
                                    'position': 'absolute',
                                    'top': '10px', /* Adjust as needed */
                                    'right': '10px', /* Adjust as needed */
                                    'background': 'rgba(0, 0, 0, 0.5)', /* Semi-transparent background */
                                    'color': 'white',
                                    'border': 'none',
                                    'border-radius': '50%',
                                    'padding': '5px 10px',
                                    'cursor': 'pointer',
                                    'font-size': '18px'
                                })
                                ;

                            imgContainer.append(img).append(deleteButton);
                            $($preview).append(imgContainer);
                                
                    }

        function input_gambar($inputan, $preview){
            // Validasi file dan preview foto sebelum diunggah
            // mengambil value dari file
            var filePath = $($inputan).val();
            var fileSize = $($inputan)[0].files[0].size;
            // tentukan extension file yang diperbolehkan
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

            // Jika tipe file yang diunggah tidak sesuai dengan "allowedExtensions"
            if (!allowedExtensions.exec(filePath)) {
                // tampilkan pesan peringatan tipe file tidak sesuai
                $.notify({
                    title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-exclamation-triangle me-2"></i>Peringatan!</h5>',
                    message: 'Tipe file foto tidak sesuai. Harap unggah file foto yang memiliki tipe *.jpg atau *.png.'
                }, {
                    type: 'warning',
		            allow_dismiss: false,
                });
                // reset input file
                $($inputan).val('');
                return false;
            }
            // jika ukuran file yang diunggah lebih dari 1 Mb
            else if (fileSize > 1000000) {
                // tampilkan pesan peringatan ukuran file tidak sesuai
                $.notify({
                    title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-exclamation-triangle me-2"></i>Peringatan!</h5>',
                    message: 'Ukuran file foto lebih dari 1 Mb. Harap unggah file foto yang memiliki ukuran maksimal 1 Mb.'
                }, {
                    type: 'warning',
		            allow_dismiss: false,
                });
                // reset input file
                $($inputan).val('');
                return false;
            }
            // jika file yang diunggah sudah sesuai, tampilkan preview file
            else {
                // mengambil value dari file
                var fileInput = $($inputan)[0];

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e){
                        k = e.target.result;
                        preview_gambar($inputan,k);
                    }
                };
                
                // membaca file sebagai data URL
                reader.readAsDataURL(fileInput.files[0]);
                var fileInput = $($inputan)[0];
                

            }
        }
        // ketika foto 1-2-3 di klik akan memanggil fungsi input_image
        $('#foto1').change(function(){
            $inputan = '#foto1';
            $preview = '#foto_preview_1';
            return input_gambar($inputan, $preview);
        });
        $('#foto2').change(function(){
            $inputan = '#foto2';
            $preview = '#foto_preview_2';
            return input_gambar($inputan, $preview);
        });
        $('#foto3').change(function(){
            $inputan = '#foto3';
            $preview = '#foto_preview_3';
            return input_gambar($inputan, $preview);
        });
         

        /** Proses
         ********************
         * Insert Data
         * Update Data
         * Delete Data
        */
        // Proses Insert dan Update Data
        $('#btn-simpan').click(function() {
            // validasi form input
            // jika ada input (required) yang kosong
            let isChecked = $('input[name="penyimpanan"]:checked').length > 0;
            if (($("#frm-produk")[0].checkValidity() === false) || !isChecked) {
                // batalkan submit form
                event.preventDefault()
                event.stopPropagation()
                // menampilkan pesan warning pada tempat penyimpanan
                $('.invalid-feedback').css({'display' : 'inline'});
                console.log('akuuu');
                
            } 
            // jika tidak ada input (required) yang kosong, jalankan perintah insert / update data
            else {
                // menghilangkan pesan warning pada tempat penyimpanan
                $('.invalid-feedback').css({'display' : 'none'});
                // jika form entri data produk yang ditampilkan, jalankan perintah insert
                if ($('#mdl-label').text() == "Entri Data Produk") {
                    // ambil data hasil submit dari form dan buat variabel untuk menampung data menggunakan "FormData"
                    var data = new FormData();
                    // data.append('id_produk', $('#id_produk').val());
                    data.append('nama_produk', $('#nama_produk').val());
                    data.append('kategori', $('#kategori').val());
                    data.append('datetime', $('#datetime').val());
                    console.log( $('#datetime').val());
                    data.append('harga', $('#harga').val());
                    data.append('stok_produk', $('#stok_produk').val());
                    data.append('foto1', $('#foto1')[0].files[0]);
                    data.append('foto2', $('#foto2')[0].files[0]);
                    data.append('foto3', $('#foto3')[0].files[0]);
                    data.append('keterangan', $('#keterangan').val());
                    let f_penyimpanan = [];
                    $('input[name="penyimpanan"]:checked').each(function(){
                        f_penyimpanan.push($(this).val());
                    });
                    data.append('penyimpanan',f_penyimpanan);

                    // let id_produk = $('#id_produk').val();
                    // let nama_produk = $('#nama_produk').val();
                    // let kategori = $('#kategori').val();
                    // let tanggal = $('#datetime').val();
                    // let harga = $('#harga').val();
                    // let stok = $('#stok_produk').val();
                    

                   // ajax request untuk insert data produk
                    $.ajax({
                        type: "POST",               // mengirim data dengan method POST 
                        url: "insert.php",          // file proses insert data
                        data: data,                 // data yang dikirim
                        contentType : false,
                        processData : false,
                        // fungsi yang dijalankan sebelum ajax request dikirim
                        beforeSend: function() {
                            // tampilkan preloader
                            $('.preloader').fadeIn('slow');
                        },
                        // fungsi yang dijalankan ketika ajax request berhasil
                        success: function(result) {
                            // jika insert data berhasil
                            if (result.trim() === "sukses") { // .trim() berfungsi agar karakter space dll dihilangkan
                                // memberikan interval waktu sebelum fungsi dijalankan
                                setTimeout(function() {
                                    // tutup preloader
                                    $('.preloader').fadeOut('fast');
                                    // tutup modal form
                                    $('#mdl-form').modal('hide');
                                    // tampilkan pesan sukses simpan data
                                    $.notify({
                                        title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-check-circle me-2"></i>Sukses!</h5>',
                                        message: 'Data Barang berhasil disimpan.'
                                    }, {
                                        type: 'success',
                                        allow_dismiss: false,
                                    });
                                   // reload data pada tabel
                                    var table = $('#tabel-produk').DataTable();
                                    table.ajax.reload(null, false);
                                }, 500);
                                $('.preview-container').remove();
                            }
                            // jika insert data gagal
                            else {
                                // memberikan interval waktu sebelum fungsi dijalankan
                                setTimeout(function() {
                                    // tutup preloader
                                    $('.preloader').fadeOut('fast');s
                                    // tampilkan pesan gagal dan error result
                                    $.notify({
                                        title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-times-circle me-2"></i>Gagal!</h5>',
                                        message: 'Errornya disini : ' + result
                                    }, {
                                        type: 'danger',
                                        allow_dismiss: false,
                                    });
                                }, 500);
                            }
                        }
                    });
                    return false;
                }
                // jika form ubah data produk yang ditampilkan, jalankan perintah update
                else if ($('#mdl-label').text() == "Ubah Data Produk") {
                    // ambil data hasil submit dari form dan buat variabel untuk menampung data menggunakan "FormData"
                    var data = new FormData();
                     var id_produk = data[10];
                    data.append('id_produk',$('#id_produk').val());
                    data.append('nama_produk', $('#nama_produk').val());
                    data.append('kategori', $('#kategori').val());
                    data.append('datetime', $('#datetime').val());
                    data.append('harga', $('#harga').val());
                    data.append('stok_produk', $('#stok_produk').val());
                    data.append('foto1', $('#foto1')[0].files[0]);
                    data.append('foto2', $('#foto2')[0].files[0]);
                    data.append('foto3', $('#foto3')[0].files[0]);
                    data.append('keterangan', $('#keterangan').val());
                    let f_penyimpanan = [];
                    $('input[name="penyimpanan"]:checked').each(function(){
                        f_penyimpanan.push($(this).val());
                    });
                    data.append('penyimpanan',f_penyimpanan);


                    // ajax request untuk update data produk
                     var id_produk = data[10];
                    $.ajax({
                        type: "POST",               // mengirim data dengan method POST 
                        url: "update.php",          // file proses update data
                        data: data,                 // data yang dikirim
                        contentType : false,
                        processData : false,
                        // fungsi yang dijalankan sebelum ajax request dikirim
                        beforeSend: function() {
                            // tampilkan preloader
                            $('.preloader').fadeIn('slow');
                        },
                        // fungsi yang dijalankan ketika ajax request berhasil
                        success: function(result) {
                            // jika update data berhasil
                            if (result.trim() === "sukses") {          
                                // memberikan interval waktu sebelum fungsi dijalankan
                                setTimeout(function() {
                                    // tutup preloader
                                    $('.preloader').fadeOut('fast');
                                    // tutup modal form
                                    $('#mdl-form').modal('hide');
                                    // tampilkan pesan sukses ubah data
                                    if($('.preview-container').length){
                                        $('.preview-container').remove();
                                    }
                                    for (var i = 1; i <= 3; i++) {
                                        var $inputan = '#foto' + i;
                                        $($inputan).val('');
                                    }
                                    
                                    
                                    $.notify({
                                        title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-check-circle me-2"></i>Sukses!</h5>',
                                        message: 'Data Stok Produk berhasil diubah.'
                                    }, {
                                        type: 'success',
                                        allow_dismiss: false,
                                    });
                                    // reload data pada tabel
                                    var table = $('#tabel-produk').DataTable();
                                    table.ajax.reload(null, false);
                                }, 500);
                            }
                            // jika update data gagal
                            else {
                                // memberikan interval waktu sebelum fungsi dijalankan
                                setTimeout(function() {
                                    // tutup preloader
                                    $('.preloader').fadeOut('fast');
                                    // tampilkan pesan gagal dan error result
                                    $.notify({
                                        title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-times-circle me-2"></i>Gagal!</h5>',
                                        message: 'Query Error : ' + result
                                    }, {
                                        type: 'danger',
                                        allow_dismiss: false,
                                    });
                                }, 500);
                            }
                        }
                    });
                    return false;
                }
            }

            // tambahkan class was-validated pada form input saat form input sudah divalidasi
            $("#frm-produk").addClass('was-validated');
        });

        // Proses Delete Data
        $('#tabel-produk tbody').on('click', '.btn-hapus', function() {
            // mengambil data dari datatables 
            var data = table.row($(this).parents('tr')).data();
            
            // tampilkan notifikasi saat akan menghapus data
            bootbox.dialog({
                title: '<i class="fa-regular fa-trash-can me-2"></i> Hapus Data Produk',
                message: '<p class="mb-2">Anda yakin ingin menghapus data Produk?</p><p class="fw-bold mb-2">' + data[2] + ' - ' + data[3] + '</p>',
                closeButton: false,
                buttons: {
                    cancel: {
                        label: "Batal",
                        className: 'btn-secondary rounded-pill px-3',
                    },
                    ok: {
                        label: "Ya, Hapus",
                        className: 'btn-danger rounded-pill px-3',
                        callback: function () {
                            // membuat variabel untuk menampung data "id_produk"
                            var id_produk = data[1];

                            // ajax request untuk delete data produk
                            $.ajax({
                                type: "POST",                   // mengirim data dengan method POST 
                                url: "delete.php",              // file proses delete data
                                data: { id_produk: id_produk },   // data yang dikirim
                                // fungsi yang dijalankan sebelum ajax request dikirim
                                beforeSend: function() {
                                    // tampilkan preloader
                                    $('.preloader').fadeIn('slow');
                                },
                                // fungsi yang dijalankan ketika ajax request berhasil
                                success: function(result) {
                                    // jika delete data berhasil
                                    if (result === "sukses") {
                                        // memberikan interval waktu sebelum fungsi dijalankan
                                        setTimeout(function() {
                                            // tutup preloader
                                            $('.preloader').fadeOut('fast');
                                            // tampilkan pesan sukses hapus data
                                            $.notify({
                                                title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-check-circle me-2"></i>Sukses!</h5>',
                                                message: 'Data produk berhasil dihapus.'
                                            }, {
                                                type: 'success',
                                                allow_dismiss: false,
                                            });
                                            // reload data pada tabel
                                            var table = $('#tabel-produk').DataTable();
                                            table.ajax.reload(null, false);
                                        }, 500);
                                    }
                                    // jika delete data gagal
                                    else {
                                        // memberikan interval waktu sebelum fungsi dijalankan
                                        setTimeout(function() {
                                            // tutup preloader
                                            $('.preloader').fadeOut('fast');
                                            // tampilkan pesan gagal dan error result
                                            $.notify({
                                                title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-times-circle me-2"></i>Gagal!</h5>',
                                                message: 'Query Error : ' + result
                                            }, {
                                                type: 'danger',
                                                allow_dismiss: false,
                                            });
                                        }, 500);
                                    }
                                }
                            });
                        }
                    }
                }
            });
        });
    });
</script>
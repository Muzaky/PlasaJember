<style>
    .nav-footer {
        font-size: 20px;
        font-family: 'Montserrat';
        color: #2A2C35;
    }

    .nav-footer a:hover {
        color: #F8E8E0;
        border-bottom: 2px solid #F8E8E0;
    }

    .footer-sublink {
        font-weight: 400;
        font-size: 20px;
    }

    .footer-sublink:hover {

        color: #F8E8E0;
        border-bottom: 2px solid #F8E8E0;
    }
</style>
<header id="footer-main" class="w-full py-4 bg-[#CB6062] flex flex-row items-center">
    <div id="logo-container" class="flex pl-8">
        <img src="../src/assets/Logo.png" alt="test" class="w-[112px]">
    </div>
    <nav class="flex flex-row pl-24 gap-8 font-medium nav-footer">
        <?php if ($user['roles_id'] == 2) {
            $list_perekrut = urlpath('homepage/list-perekrut'); // Correct path
            $homepage = urlpath('homepage');
            $historypelamaran = urlpath('pelamaran/historypelamaran');
            echo '<a href="' . $homepage . '" class="">Cari Lowongan</a>';
            echo '<a href="' . $list_perekrut . '" class="">List Perekrut</a>';
            echo '<a href="' . $historypelamaran . '" class="">History Pelamaran</a>';
        } ?>


        <?php if ($user['roles_id'] == 3) {
            echo '<a href="#" class="border-b-2 text-[#F8E8E0] border-[#F8E8E0]">Buat Lowongan</a>';
        }
        ?>


    </nav>
    <div class="flex justify-end flex-1 nav-footer mr-8">
        <a href="<?= urlpath('logout') ?>">Logout</a>
    </div>
</header>

<body class="font-[montserrat]">
    <div class="flex flex-col items-center my-4" id="main-container">
        <div id="content-placer" class="flex flex-col items-center mt-4">
            <h2 class="text-[24px] font-bold text-[#CB6062]">
                Details Pekerjaan
            </h2>
            <div id="sub-content" class="flex flex-col gap-4 mt-4 w-[800px]">
                <img class="object-cover h-[300px] w-[800px]" src="<?= urlpath('uploads/foto_pekerjaan/' . $pekerjaandetails['foto'])  ?>" alt="">
                <h3 class="text-left flex text-[24px]"><?= $pekerjaandetails['nama_pekerjaan'] ?></h3>
                <div>
                    <label for="">Deskripsi : </label>
                    <h3 class="text-left flex"><?= $pekerjaandetails['deskripsi'] ?></h3>
                </div>
                <div>
                    <label for="">Tugas & Tanggung Jawab : </label>
                    <h3 class="text-left flex"><?= $pekerjaandetails['tugas'] ?></h3>
                </div>
                <div>
                    <label for="">Lokasi : </label>
                    <h3 class="text-left flex"><?= $pekerjaandetails['alamat'] ?></h3>
                </div>
                <div>
                    <label for="">Waktu Kerja : </label>
                    <?php
                    $formattedTimeStart = date('H:i', strtotime($pekerjaandetails['waktu_kerja']));
                    $formattedTimeEnd = date('H:i', strtotime($pekerjaandetails['waktu_selesai']));
                    ?>
                    <h3 class="text-left flex"><?= $formattedTimeStart ?> - <?= $formattedTimeEnd ?></h3>
                </div>
                <div>
                    <label for="">Kompensasi : </label>

                    <h3 class="text-left flex"><?= $kompensasirupiah = "Rp " . number_format($pekerjaandetails['kompensasi'], 0, ',', '.'); ?></h3>
                </div>
                <div>
                    <label for="">Batas Akhir Lamaran : </label>
                    <h3 class="text-left flex"><?= $pekerjaandetails['batas'] ?></h3>
                </div>
                <div>
                    <label for="">Kontak : </label>
                    <h3 class="text-left flex"><?= $pekerjaandetails['email'] ?></h3>
                    <h3 class="text-left flex"><?= $pekerjaandetails['telp'] ?></h3>
                </div>

                <button class="bg-[#CB6062] text-white font-semibold py-2 px-4 rounded hover:bg-[#F8E8E0]" onclick="showlamarpekerjaan()">Lamar</button>
            </div>


        </div>
    </div>
    <div id="lamarpekerjaan" class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 rounded-lg shadow-lg bg-blueGray-100">
            <button onclick="hidelamarpekerjaan()" class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
                Back
            </button>
            <div class="flex-auto px-4 py-4 pt-0 lg:px-10">
                <form class="flex flex-col items-center justify-center" action="" method="post" enctype="multipart/form-data" id="createlamarform">
                    <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-[#204E51]">
                        Lamar Pekerjaan
                    </h6>
                    <div class="flex flex-wrap text-center">
                        <div class="w-full px-4">
                            <div class="w-full mb-3">
                                <input type="hidden" name="id_pekerjaan" value="<?= $pekerjaandetails['id'] ?>">
                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                    Alasan
                                </label>
                                <textarea name="alasan" id="alasan" class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-40 shadow-lg resize-none mb-4"></textarea>

                                <div class="mb-[18px] relative">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-14 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 2xl:h-20">
                                        <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                            <div id="file-name" class="flex items-center gap-2 text-gray-500 dark:text-gray-400  text-[14px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                    <path fillRule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clipRule="evenodd" />
                                                </svg>
                                                <p id="textcontent">
                                                    Klik untuk unggah dokumen
                                                </p>
                                            </div>
                                        </div>
                                        <input id="dropzone-file" onchange="displayFileName()" name="dokumen" type="file" accept="application/pdf" class="hidden">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="flex mt-4" id="add-button2">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function displayFileName() {
            const fileInput = document.getElementById('dropzone-file');
            const fileNameParagraph = document.getElementById('file-name');
            const textcontent = document.getElementById('textcontent');
            const svgCode = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                            <path fillRule="evenodd"
                                                                d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                                                clipRule="evenodd" />
                                                        </svg>`
            if (fileInput.files.length > 0) {
                fileNameParagraph.textContent = fileInput.files[0].name;
            } else {
                fileNameParagraph.innerHTML = svgCode + 'Klik untuk unggah dokumen';
            }
        }

        function showlamarpekerjaan() {
            let lamarbutton = document.getElementById('lamarpekerjaan')

            lamarbutton.classList.remove('hidden')
            lamarbutton.classList.add('flex')
            setTimeout(() => {
                lamarbutton.classList.remove('opacity-0')
                lamarbutton.classList.add('opacity-100')
            }, 20);

        }

        function hidelamarpekerjaan() {
            let lamarbutton = document.getElementById('lamarpekerjaan')
            lamarbutton.classList.add('opacity-0')
            setTimeout(() => {
                lamarbutton.classList.remove('opacity-100')
                lamarbutton.classList.add('hidden')
                lamarbutton.classList.remove('flex')
            }, 500);
        }

        function formatTime(time) {
            const [hours, minutes] = time.split(':');
            return `${hours}:${minutes}`;
        }

        function number_format(number, decimals, decPoint, thousandsSep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            const n = !isFinite(+number) ? 0 : +number;
            const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);
            const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;
            const dec = (typeof decPoint === 'undefined') ? '.' : decPoint;
            let s = '';
            const toFixedFix = function(n, prec) {
                const k = Math.pow(10, prec);
                return '' + (Math.round(n * k) / k).toFixed(prec);
            };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
    </script>
</body>
<footer>

</footer>
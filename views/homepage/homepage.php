<style>
    #nav-footer {
        font-size: 20px;
        font-family: 'Montserrat';
        color: #2A2C35;
    }

    #nav-footer a:hover {
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
        <img src="src/assets/Logo.png" alt="test" class="w-[112px]">
    </div>
    <nav id="nav-footer" class="flex flex-row pl-24 gap-8 font-medium">
        <a href="#" class="border-b-2 text-[#F8E8E0] border-[#F8E8E0]">Cari Lowongan</a>
        <a href="<?= urlpath('list-perekrut') ?>" class="">List Perekrut</a>
    </nav>
</header>

<body>
    <?php if ($user['roles_id'] == 2) {
        $searchkerja = urlpath('landing');
        echo '<a href="$searchkerja">Cari Pekerjaan</a>';
    }
    ?>
    <?php if ($user['roles_id'] == 3) {
        $buatkerja = urlpath('landing');
        echo '<a href="$buatkerja">Buat Pekerjaan</a>';
    }
    ?>

    <a href="<?= urlpath('logout') ?>">Logout</a>

    <button onclick="showEditButton()">Bikin Loker</button>

    <div id="editbutton" class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 rounded-lg shadow-lg bg-blueGray-100">
            <button onclick="hideEditButton()" class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
                Back
            </button>
            <div class="flex-auto px-4 py-4 pt-0 lg:px-10">
                <form class="flex flex-col items-center justify-center" enctype="multipart/form-data" id="createlokerform">
                    <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-[#204E51]">
                        Buat Loker
                    </h6>
                    <div class="flex flex-wrap text-center">
                        <div class="w-full px-4">
                            <div class="w-full mb-3">
                                <input type="hidden" name="status" value="ongoing">
                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                    Nama Pekerjaan
                                </label>
                                <input type="text" name="nama_pekerjaan" id="nama_pekerjaan" class="border-0 p-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 mb-4" value="" placeholder="Isi Nama Kegiatan">
                                </input>

                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                    Alamat
                                </label>
                                <input type="text" name="alamat" id="alamat" class="border-0 p-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 mb-4" value="" placeholder="Isi Nama Kegiatan">
                                </input>

                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                    Deskripsi
                                </label>
                                <textarea name="deskripsi" id="deskripsi" class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-40 shadow-lg resize-none mb-4"></textarea>

                                <div class="mb-[18px] relative">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-14 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 2xl:h-20">
                                        <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                            <div id="file-name" class="flex items-center gap-2 text-gray-500 dark:text-gray-400  text-[14px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                    <path fillRule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clipRule="evenodd" />
                                                </svg>
                                                <p id="textcontent">
                                                    Klik Untuk Unggah Foto Pekerjaan
                                                </p>
                                            </div>
                                        </div>
                                        <input id="dropzone-file" onchange="displayFileName()" name="foto" type="file" class="hidden">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="flex mt-4" id="add-button1">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function showEditButton() {
            let editbutton = document.getElementById('editbutton')

            editbutton.classList.remove('hidden')
            editbutton.classList.add('flex')
            setTimeout(() => {
                editbutton.classList.remove('opacity-0')
                editbutton.classList.add('opacity-100')
            }, 20);

        }

        function hideEditButton() {
            let editbutton = document.getElementById('editbutton')
            editbutton.classList.add('opacity-0')
            setTimeout(() => {
                editbutton.classList.remove('opacity-100')
                editbutton.classList.add('hidden')
                editbutton.classList.remove('flex')
            }, 500);
        }

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
                fileNameParagraph.innerHTML = svgCode + 'Klik Untuk Unggah Foto Pekerjaan';
            }
        }
    </script>
</body>
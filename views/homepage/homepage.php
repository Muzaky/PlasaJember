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
        <img src="src/assets/Logo.png" alt="test" class="w-[112px]">
    </div>
    <nav class="flex flex-row pl-24 gap-8 font-medium nav-footer">
        <?php if ($user['roles_id'] == 2) {
            $list_perekrut = urlpath('list-perekrut');
            echo '<a href="#" class="border-b-2 text-[#F8E8E0] border-[#F8E8E0]">Cari Lowongan</a>
            <a href="" class="">List Perekrut</a>';
        }

        ?>
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

    <div class="flex flex-col items-center mt-4" id="main-container">
        <div>
            <h1 class="text-[24px] font-bold text-[#CB6062]">Selamat Datang <b><?= $perekrut['nama'] ?></b></h1>
        </div>
        <div class="">
            <h1 class="text-[24px] font-bold text-[#CB6062]">List pekerjaanmu ada dibawah</b></h1>
        </div>
        <div id="top-container" class="flex flex-row items-center">
            <div class="relative w-[300px] text-gray-400 focus-within:text-gray-600 px-4">
                <input id="search_field" class=" w-full h-full pl-14 pr-4 py-1 rounded-md border-2 border-[#204e51] bg-[#f4f4f4]" placeholder="Cari nama pekerjaan" type="search">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 absolute left-6 top-1/2 transform -translate-y-1/2">
                    <path fillRule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clipRule="evenodd" />
                </svg>
            </div>
            <div class="relative w-[300px] text-gray-400 focus-within:text-gray-600 px-4">
                <input id="search_field" class=" w-full h-full pl-14 pr-4 py-1 rounded-md border-2 border-[#204e51] bg-[#f4f4f4]" placeholder="Lokasi" type="search">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 absolute left-6 top-1/2 transform -translate-y-1/2">
                    <path fillRule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clipRule="evenodd" />
                </svg>
            </div>
            <div>
                <?php if ($user['roles_id'] == 2) {
                    $searchkerja = urlpath('landing');
                    echo '<a href="$searchkerja">Cari Pekerjaan</a>';
                }
                ?>
                <?php if ($user['roles_id'] == 3) {
                    $buatkerja = urlpath('landing');
                    echo '<button onclick="showEditButton()" class="p-2 bg-[#CB6062]  rounded-[4px] text-[#F8E8E0] hover:bg-[#F8E8E0] hover:text-black">Buat Loker</button>';
                }
                ?>
            </div>

        </div>
        <div class="flex flex-row mt-4 gap-2" id="bottom-container">
            <div class="flex flex-col h-[500px] overflow-y-auto" id="pekerjaan-list">
                <?php foreach ($pekerjaan as $pekerjaan_item) { ?>

                    <div class="w-[300px] bg-white border border-gray-200 rounded-[4px] shadow pekerjaan-item my-1 focus:border-[#CB6062]" data-nama="<?= htmlspecialchars($pekerjaan_item['nama_pekerjaan']) ?>" data-deskripsi="<?= htmlspecialchars($pekerjaan_item['deskripsi']) ?>" data-alamat="<?= htmlspecialchars($pekerjaan_item['alamat']) ?>" data-status="<?= htmlspecialchars($pekerjaan_item['status']) ?>" data-id="<?= $pekerjaan_item['id'] ?>">
                        <div class="flex flex-row">
                            <a href="#">
                                <img class="rounded-t-lg w-[50px]" src="<?= htmlspecialchars($pekerjaan_item['foto']) ?>" alt="<?= htmlspecialchars($pekerjaan_item['nama_pekerjaan']) ?>" />
                            </a>
                            <div class="flex flex-col w-[300px]">

                                <div class="p-2">
                                    <a href="#">
                                        <h5 class="mb-1 text-[16px] underline font-bold tracking-tight text-gray-900 text-wrap"><?= htmlspecialchars($pekerjaan_item['nama_pekerjaan']) ?></h5>
                                    </a>
                                    <p class=" font-normal text-gray-700 dark:text-gray-400 text-[12px]"><?= htmlspecialchars($pekerjaan_item['alamat']) ?></p>
                                    <div class="flex flex-row items-center gap-2">

                                        <p class=" font-normal text-gray-400 dark:text-gray-400 text-[12px]">Durasi</p>
                                        <div class="flex flex-1 justify-end">
                                            <p class=" font-normal text-gray-400 dark:text-gray-400 text-[12px]">Pendaftar :</p>
                                        </div>
                                    </div>
                                    <div class="rounded-full flex flex-row items-center gap-2">
                                        <p class="text-[12px] text-green-300"><?= htmlspecialchars($pekerjaan_item['status']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div id="editpekerjaan<?= $pekerjaan_item['id'] ?>" class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
                        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 rounded-lg shadow-lg bg-blueGray-100">
                            <button onclick="hideeditpekerjaan(<?= $pekerjaan_item['id'] ?>)" class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                    </path>
                                </svg>
                                Back
                            </button>
                            <div class="flex-auto px-4 py-4 pt-0 lg:px-10">
                                <form class="flex flex-col items-center justify-center" action="<?= urlpath('homepage/updatepekerjaan') ?>" method="post" enctype="multipart/form-data" id="editlokerform<?= $pekerjaan_item['id'] ?>">
                                    <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-[#204E51]  ">
                                        Buat Loker
                                    </h6>
                                    <div class="flex flex-wrap text-center">
                                        <div class="w-full px-4">
                                            <div class="w-full mb-3">
                                                <input type="hidden" name="id" value="<?= $pekerjaan_item['id'] ?>">
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Nama Pekerjaan
                                                </label>
                                                <input type="text" name="nama_pekerjaan" id="nama_pekerjaan" class="border-0 p-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 mb-4" value="<?= htmlspecialchars($pekerjaan_item['nama_pekerjaan']) ?>" placeholder="Isi Nama Kegiatan">
                                                </input>


                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Alamat
                                                </label>
                                                <input type="text" name="alamat" id="alamat" class="border-0 p-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 mb-4" value="<?= htmlspecialchars($pekerjaan_item['alamat']) ?>" placeholder="Isi Nama Kegiatan">
                                                </input>
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="status">
                                                    Status
                                                </label>
                                                <select name="status" id="status" class="border-0 p-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 mb-4">
                                                    <option value="ongoing" <?php if ($pekerjaan_item['status'] === 'ongoing') echo 'selected'; ?>>Ongoing</option>
                                                    <option value="done" <?php if ($pekerjaan_item['status'] === 'done') echo 'selected'; ?>>Done</option>
                                                </select>
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Deskripsi
                                                </label>
                                                <textarea name="deskripsi" id="deskripsi" class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-40 shadow-lg resize-none mb-4"><?= htmlspecialchars($pekerjaan_item['deskripsi']) ?></textarea>

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
                                    <button type="submit" class="flex mt-4" form="editlokerform<?= $pekerjaan_item['id'] ?>">
                                        Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>


                <?php } ?>
            </div>
            <div id="pekerjaan-details" class="flex-1 p-5 bg-white border border-gray-200 rounded-[4px] shadow dark:bg-gray-800 w-[500px] items-center justify-center flex">
                <div id="predetails-content">Klik untuk melihat detail</div>
                <div id="details-content">
                    <!-- Details will be displayed here -->
                </div>
            </div>
        </div>

        <!-- Modal -->
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
                                    <input type="text" name="nama_pekerjaan" id="nama_pekerjaan0" class="border-0 p-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 mb-4" value="" placeholder="Isi Nama Kegiatan">
                                    </input>

                                    <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                        Alamat
                                    </label>
                                    <input type="text" name="alamat" id="alamat0" class="border-0 p-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 mb-4" value="" placeholder="Isi Nama Kegiatan">
                                    </input>

                                    <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                        Deskripsi
                                    </label>
                                    <textarea name="deskripsi" id="deskripsi0" class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-40 shadow-lg resize-none mb-4"></textarea>

                                    <div class="mb-[18px] relative">
                                        <label for="dropzone-file0" class="flex flex-col items-center justify-center w-full h-14 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 2xl:h-20">
                                            <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                                <div id="file-name0" class="flex items-center gap-2 text-gray-500 dark:text-gray-400  text-[14px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4" id="svg-upload0">
                                                        <path fillRule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clipRule="evenodd" />
                                                    </svg>
                                                    <p id="textcontent0">
                                                        Klik Untuk Unggah Foto Pekerjaan
                                                    </p>
                                                </div>
                                            </div>
                                            <input id="dropzone-file0" onchange="displayFileName1()" name="foto" type="file" class="hidden">
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

            function editPekerjaan($id) {
                let editpekerjaan = document.getElementById('editpekerjaan' + $id)

                editpekerjaan.classList.remove('hidden')
                editpekerjaan.classList.add('flex')
                setTimeout(() => {
                    editpekerjaan.classList.remove('opacity-0')
                    editpekerjaan.classList.add('opacity-100')
                }, 20);
            }

            function hideeditpekerjaan($id) {
                let editpekerjaan = document.getElementById('editpekerjaan' + $id)

                editpekerjaan.classList.add('opacity-0')
                setTimeout(() => {
                    editpekerjaan.classList.remove('opacity-100')
                    editpekerjaan.classList.add('hidden')
                    editpekerjaan.classList.remove('flex')
                }, 500);
            }



            function displayFileName1() {
                const fileInput = document.getElementById('dropzone-file0');
                const fileNameParagraph = document.getElementById('file-name0');
                const textcontent = document.getElementById('textcontent0');
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
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const pekerjaanItems = document.querySelectorAll('.pekerjaan-item');
                const detailsContainer = document.getElementById('pekerjaan-details');
                const preDetailsContent = document.getElementById('predetails-content');
                const detailsContent = document.getElementById('details-content');

                pekerjaanItems.forEach(item => {
                    item.addEventListener('click', function() {
                        pekerjaanItems.forEach(item => {
                            item.classList.remove('border-blue-500');
                        });

                        // Add border to the clicked item
                        this.classList.add('border-blue-500');
                        const nama = this.getAttribute('data-nama');
                        const deskripsi = this.getAttribute('data-deskripsi');
                        const alamat = this.getAttribute('data-alamat');
                        const status = this.getAttribute('data-status');
                        const foto = this.getAttribute('data-foto');
                        const id = this.getAttribute('data-id');

                        preDetailsContent.style.display = 'none';
                        detailsContainer.classList.remove('items-center', 'justify-center', 'flex');

                        let statusMessage = status === 'ongoing' ? 'Sedang Berjalan' : (status === 'done' ? 'Sudah Berakhir' : status);
                        console.log(statusMessage);

                        detailsContainer.innerHTML = `
                    <img class="w-full h-48 object-cover rounded-t-lg" src="uploads/foto_pekerjaan/${foto}" alt="image">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${nama}</h5>
                    
                    <button class="text-white bg-[#CB6062] hover:bg-[#F8E8E0] font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="editPekerjaan(${id})" >Edit</button>
                    <p class="mb-3 font-normal text-gray-700 border-b-2 pb-2">Kegiatan ini : ${statusMessage}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Deskripsi : ${deskripsi}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Alamat : ${alamat}</p>
                `;
                    });
                });
            });
        </script>


</body>
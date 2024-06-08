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

<body>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Alasan
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Dokumen
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pelamaran as $pelamaran_item) { ?>
                    <?php if ($pelamaran == null) { ?>
                        <p>Belum ada data pelamaran</p>
                    <?php } else { ?>

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $no++ ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $pelamaran_item['alasan'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <a href="<?= urlpath('uploads/dokumen_pelamaran/' . htmlspecialchars($pelamaran_item['dokumen'])) ?>"><?= htmlspecialchars($pelamaran_item['dokumen']) ?></a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button onclick="editpelamaran(<?= $pelamaran_item['id'] ?>)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div id="editpelamaran<?= $pelamaran_item['id'] ?>" class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
                            <div class="relative flex flex-col min-w-0 mb-6 break-words  border-0 rounded-lg shadow-lg bg-blueGray-100 bg-white">
                                <button onclick="hideeditpelamaran(<?= $pelamaran_item['id'] ?>)" class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                        </path>
                                    </svg>
                                    Back
                                </button>
                                <div class="flex-col flex px-4 py-4 pt-0 lg:px-10 justify-center items-center">
                                    <form class="flex flex-col items-center justify-center" action="" method="post" enctype="multipart/form-data" id="editpelamaranform<?= $pelamaran_item['id'] ?>">
                                        <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-[#204E51] items-center justify-center">
                                            Ubah Pelamaran
                                        </h6>
                                        <div class="flex flex-wrap text-center">
                                            <div class="w-full px-4">
                                                <div class="w-full mb-3">
                                                    <input type="hidden" name="id" value="<?= $pelamaran_item['id'] ?>">
                                                    <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                        Alasan
                                                    </label>
                                                    <textarea name="alasan" id="alasan" class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-40 shadow-lg resize-none mb-4"><?= htmlspecialchars($pelamaran_item['alasan']) ?></textarea>

                                                    <div class="mb-[18px] relative">
                                                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-14 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 2xl:h-20">
                                                            <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                                                <div id="file-name" class="flex items-center gap-2 text-gray-500 dark:text-gray-400  text-[14px]">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                                        <path fillRule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clipRule="evenodd" />
                                                                    </svg>
                                                                    <p id="textcontent">
                                                                        Klik Untuk Unggah Dokumen
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <input id="dropzone-file" onchange="displayFileName()" name="foto" type="file" class="hidden">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="flex mt-4 items-center" form="editpelamaranform<?= $pelamaran_item['id'] ?>">
                                            Simpan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        function editpelamaran($id) {
            let editpelamaran = document.getElementById('editpelamaran' + $id)

            editpelamaran.classList.remove('hidden')
            editpelamaran.classList.add('flex')
            setTimeout(() => {
                editpelamaran.classList.remove('opacity-0')
                editpelamaran.classList.add('opacity-100')
            }, 20);
        }

        function hideeditpelamaran($id) {
            let editpelamaran = document.getElementById('editpelamaran' + $id)

            editpelamaran.classList.add('opacity-0')
            setTimeout(() => {
                editpelamaran.classList.remove('opacity-100')
                editpelamaran.classList.add('hidden')
                editpelamaran.classList.remove('flex')
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

<footer>

</footer>
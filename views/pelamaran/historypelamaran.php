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
    
            echo '<a href="' . $homepage . '" class="">Cari Lowongan</a>';
            echo '<a href="' . $list_perekrut . '" class="">List Perekrut</a>';
           
        } ?>


        <?php if ($user['roles_id'] == 3) {
            echo '<a href="#" class="border-b-2 text-[#F8E8E0] border-[#F8E8E0]">Homepage</a>';
        }
        ?>


    </nav>
    <div class="flex justify-end flex-1 nav-footer mr-8">
        <?php if ($user['roles_id'] == 2) { ?>
            <?php if ($pekerja['foto_user'] == null) {
            ?>
                <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="../src/assets/user.png" alt="User dropdown">
            <?php } else { ?>
                <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="<?= urlpath('uploads/foto_user/' . $pekerja['foto_user']) ?>" alt="User dropdown">
            <?php } ?>
        <?php } ?>
        <?php if ($user['roles_id'] == 3) { ?>
            <?php if ($perekrut['foto_perekrut'] == null) {
            ?>
                <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="src/assets/user.png" alt="User dropdown">
            <?php } else { ?>
                <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="<?= urlpath('uploads/foto_perekrut/' . $perekrut['foto_perekrut']) ?>" alt="User dropdown">
            <?php } ?>
        <?php } ?>
        <!-- Dropdown menu -->
        <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <?php if ($user['roles_id'] == 2) { ?>
                    <h1>Halo, Pekerja !</h1>
                    <div><?= $pekerja['nama'] ?></div>
                    <div class="font-medium truncate"><?= $pekerja['email'] ?></div>

                <?php } else { ?>
                    <h1>Halo, Perekrut !</h1>
                    <div><?= $perekrut['nama'] ?></div>
                    <div class="font-medium truncate"><?= $perekrut['email'] ?></div>
                    <?php if ($perekrut['validasi'] == 'process') { ?>
                        <div class="text-yellow-500">Process Validation</div>
                    <?php } elseif ($perekrut['validasi'] == 'accepted') { ?>
                        <div class="text-green-500">Accepted</div>
                    <?php } else { ?>
                        <div class="text-red-500">Rejected</div>
                    <?php } ?>
                <?php } ?>
            </div>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                <li>
                    <?php if ($user['roles_id'] == 2){ ?>
                    <a href="<?= urlpath('pelamaran/historypelamaran') ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">History</a>
                    <?php } ?>
                </li>

            </ul>
            <div class="py-1">
                <a href="<?= urlpath('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
            </div>
        </div>

    </div>
</header>

<body>

    <div class="flex justify-center flex-col items-center" id="main-container">
        <div>
            <h1 class="text-[#204E51] font-bold text-3xl mt-16 mb-4">Data History Pelamaran</h1>
        </div>
        <table class="w-[1280px] mt-8 text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class=" py-3">
                        No
                    </th>
                    <th scope="col" class=" py-3">

                    </th>
                    <th scope="col" class=" py-3">
                        <div class="flex items-center">
                            Alasan

                        </div>
                    </th>
                    <th scope="col" class=" py-3">
                        <div class="flex items-center">
                            Dokumen

                        </div>
                    </th>
                    <th scope="col" class=" py-3 justify-center text-center">
                        Status
                    </th>
                    <th scope="col" class="py-3">
                        <span class="">Action</span>
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
                            <th scope="row" class=" py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $no++ ?>
                            </th>
                            <th class="flex">
                                <a href="#" class="toggle-btn" onclick="toggleDescription('user<?= $pelamaran_item['pelamaran']['id'] ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="m12 15l-4.243-4.242l1.415-1.414L12 12.172l2.828-2.828l1.415 1.414L12 15.001Z" />
                                    </svg>
                                </a>
                            </th>
                            <td class="py-4">
                                <?php echo $pelamaran_item['pelamaran']['alasan'] ?>
                            </td>

                            <td class="py-4">
                                <a href="<?= urlpath('uploads/dokumen_pelamaran/' . htmlspecialchars($pelamaran_item['pelamaran']['dokumen'])) ?>"><?= htmlspecialchars($pelamaran_item['pelamaran']['dokumen']) ?></a>
                            </td>
                            <td class="px-6 py-4">
                                <?php if ($pelamaran_item['pelamaran']['status'] == 'accepted') { ?>
                                    <div class="text-green-500 p-2  rounded-full text-center bg-green-100">Accepted</div>
                                <?php } elseif ($pelamaran_item['pelamaran']['status'] == 'rejected') { ?>
                                    <div class="text-red-500 p-2  rounded-full text-center bg-red-100">Rejected</div>
                                <?php } else { ?>
                                    <div class="text-yellow-500 p-2 rounded-full text-center bg-yellow-100">Process</div>
                                <?php } ?>
                            </td>
                            <td class="flex py-4 justify-center">
                                <div class="flex flex-row gap-2">
                                    <button onclick="editpelamaran(<?= $pelamaran_item['pelamaran']['id'] ?>)" class="text-green-500 border-2 rounded-[8px] border-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" d="M11.5 8.5v-4m-5 10v4m10-2v2m-5 0v-6m-5-8v6m10-6v8m-7-4h4m-9 6h4m6 2h4" />
                                        </svg>
                                    </button>
                                    <button data-modal-target="popup-modal<?= $pelamaran_item['pelamaran']['id'] ?>" data-modal-toggle="popup-modal<?= $pelamaran_item['pelamaran']['id'] ?>" class="text-red-500 border-2 rounded-[8px] border-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20">
                                            <path fill="currentColor" d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr id="user<?= $pelamaran_item['pelamaran']['id'] ?>Description" class="hidden py-4 px-4 border-t border-gray-200">
                            <td colspan="5" class="p-8">
                                <h4 class="font-medium text-base text-[#CB6062] underline mb-2">Details Pekerjaan</h4>
                                <p><strong>Nama Pekerjaan:</strong> <?= $pelamaran_item['pekerjaandetails']['nama_pekerjaan'] ?></p>
                                <p><strong>Alamat Pekerjaan:</strong> <?= $pelamaran_item['pekerjaandetails']['alamat'] ?></p>
                                <p><strong>Deskripsi Pekerjaan:</strong> <?= $pelamaran_item['pekerjaandetails']['deskripsi'] ?></p>
                                <p><strong>Email Pekerjaan:</strong> <?= $pelamaran_item['pekerjaandetails']['email'] ?></p>
                                <span><strong>Catatan:</strong></span>
                                <p class="text-sm text-gray-600">
                                    <?php echo !empty($pelamaran_item['pelamaran']['catatan']) ? $pelamaran_item['pelamaran']['catatan'] : 'Belum ada catatan dari perekrut'; ?>
                                </p>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div id="editpelamaran<?= $pelamaran_item['pelamaran']['id'] ?>" class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
                            <div class="relative flex flex-col min-w-0 mb-6 break-words  border-0 rounded-lg shadow-lg bg-blueGray-100 bg-white">
                                <button onclick="hideeditpelamaran(<?= $pelamaran_item['pelamaran']['id'] ?>)" class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                        </path>
                                    </svg>
                                    Back
                                </button>
                                <div class="flex-col flex px-4 py-4 pt-0 lg:px-10 justify-center items-center">
                                    <form class="flex flex-col items-center justify-center" action="<?= urlpath('pelamaran/updatepelamaran') ?>" method="post" enctype="multipart/form-data" id="editpelamaranform<?= $pelamaran_item['pelamaran']['id'] ?>">
                                        <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-[#204E51] items-center justify-center">
                                            Ubah Pelamaran
                                        </h6>
                                        <div class="flex flex-wrap text-center">
                                            <div class="w-full px-4">
                                                <div class="w-full mb-3">
                                                    <input type="hidden" name="id" value="<?= $pelamaran_item['pelamaran']['id'] ?>">
                                                    <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                        Alasan
                                                    </label>
                                                    <textarea name="alasan" id="alasan" class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-40 shadow-lg resize-none mb-4"><?= htmlspecialchars($pelamaran_item['pelamaran']['alasan']) ?></textarea>

                                                    <div class="mb-[18px] relative">
                                                        <label for="dropzone-file<?= $pelamaran_item['pelamaran']['id'] ?>" class="flex flex-col items-center justify-center w-full h-14 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 2xl:h-20">
                                                            <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                                                <div id="file-name<?= $pelamaran_item['pelamaran']['id'] ?>" class="flex items-center gap-2 text-gray-500 dark:text-gray-400  text-[14px]">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                                        <path fillRule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clipRule="evenodd" />
                                                                    </svg>
                                                                    <p id="textcontent<?= $pelamaran_item['pelamaran']['id'] ?>">
                                                                        Klik Untuk Unggah Dokumen Pelamaran
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <input id="dropzone-file<?= $pelamaran_item['pelamaran']['id'] ?>" onchange="displayFileName(<?= $pelamaran_item['pelamaran']['id'] ?>)" name="dokumen" type="file" accept="application/pdf" class="hidden">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="flex mt-4 items-center" form="editpelamaranform<?= $pelamaran_item['pelamaran']['id'] ?>">
                                            Simpan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- modal delete -->
                        <div id="popup-modal<?= $pelamaran_item['pelamaran']['id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal<?= $pelamaran_item['pelamaran']['id'] ?>">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="<?= urlpath('pelamaran/deletepelamaran') ?>" method="post" id="deletepelamaranform<?= $pelamaran_item['pelamaran']['id'] ?>">
                                        <input type="text" name="id" value="<?= $pelamaran_item['pelamaran']['id'] ?>" hidden>
                                    </form>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda ingin menghapus lamaran ini ?</h3>
                                        <button data-modal-hide="popup-modal<?= $pelamaran_item['pelamaran']['id'] ?>" type="submit" form="deletepelamaranform<?= $pelamaran_item['pelamaran']['id'] ?>" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Yes, saya yakin
                                        </button>
                                        <button data-modal-hide="popup-modal<?= $pelamaran_item['pelamaran']['id'] ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        let activeDescriptionId = null;

        function toggleDescription(userId) {
            const descriptionRow = document.getElementById(`${userId}Description`);
            // const toggleIcon = document.getElementById(`${userId}Toggle`).querySelector('svg');
            console.log('text');
            if (activeDescriptionId !== null && activeDescriptionId !== userId) {
                const activeDescriptionRow = document.getElementById(`${activeDescriptionId}Description`);
                // const activeToggleIcon = document.getElementById(`${activeDescriptionId}Toggle`).querySelector('svg');
                activeDescriptionRow.classList.add('hidden');
                // activeToggleIcon.classList.remove('flipped-icon');
            }

            descriptionRow.classList.toggle('hidden');
            // toggleIcon.classList.toggle('flipped-icon');

            if (!descriptionRow.classList.contains('hidden')) {
                activeDescriptionId = userId;
            } else {
                activeDescriptionId = null;
            }
        }
    </script>
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

        function displayFileName($id) {
            const fileInput = document.getElementById('dropzone-file' + $id);
            const fileNameParagraph = document.getElementById('file-name' + $id);
            const textcontent = document.getElementById('textcontent' + $id);
            const svgCode = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                            <path fillRule="evenodd"
                                                                d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                                                clipRule="evenodd" />
                                                        </svg>`
            if (fileInput.files.length > 0) {
                fileNameParagraph.textContent = fileInput.files[0].name;
            } else {
                fileNameParagraph.innerHTML = svgCode + 'Klik Untuk Unggah Dokumen Pelamaran';
            }
        }
    </script>


</body>

<footer>

</footer>
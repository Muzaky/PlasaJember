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


    .custom-select {
        border: 0;
        padding: 0.75rem;
        background-color: white;
        color: #204E51;
        font-size: 0.875rem;
        line-height: 1.25;
        border-radius: 0.375rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transition: all 0.15s ease-in-out;
        margin-bottom: 1rem;
    }

    .custom-select:focus {
        outline: none;
        ring: 2px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
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
            echo '<a href="' . urlpath('homepage') . '" class=" text-black">Homepage</a>';
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
                <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="../src/assets/user.png" alt="User dropdown">
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
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                </li>

            </ul>
            <div class="py-1">
                <a href="<?= urlpath('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
            </div>
        </div>

    </div>
</header>

<body class="font-[montserrat]">
    <div class="flex flex-col justify-center items-center mt-16">
        
        <h1 class="text-[24px] justify-start flex w-[1280px] mb-8 pl-4">Berikut data pelamaran lowongan kerja anda</h1>
        <div class="mt-4 relative w-[1280px] overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 max-h-[400px] overflow-y-auto mb-[64px]">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="">
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Pekerja
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No Telp
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dokumen
                        </th>
                        <th scope="col" class="px-6 py-3 justify-center text-center">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 justify-center flex">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $hasProcessStatus = false;

                    foreach ($pelamaran as $pelamaran_item) {
                        foreach ($pelamaran_item['pelamaran'] as $sub_item) {
                            if ($sub_item['pelamaran']['status'] == 'process') {

                    ?>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $no ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        <?= $sub_item['users']['nama'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $sub_item['users']['email'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $sub_item['users']['phone'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="<?= urlpath('uploads/dokumen_pelamaran/' . htmlspecialchars($sub_item['pelamaran']['dokumen'])) ?>"><?= $sub_item['pelamaran']['dokumen'] ?></a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php if ($sub_item['pelamaran']['status'] == 'accepted') { ?>
                                            <div class="text-green-500 p-2  rounded-full text-center bg-green-100">Accepted</div>
                                        <?php } elseif ($sub_item['pelamaran']['status'] == 'rejected') { ?>
                                            <div class="text-red-500 p-2  rounded-full text-center bg-red-100">Rejected</div>
                                        <?php } else { ?>
                                            <div class="text-yellow-500 p-2 rounded-full text-center bg-yellow-100">Process</div>
                                        <?php } ?>
                                    </td>
                                    <td class="px-6 py-4 text-center items-center">
                                        <button onclick="toggleDescription(<?= $sub_item['pelamaran']['id'] ?>)" class="font-medium text-blue-600  hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="m12 15l-4.243-4.242l1.415-1.414L12 12.172l2.828-2.828l1.415 1.414L12 15.001Z" />
                                            </svg>
                                        </button>
                                        <button onclick="editpekerja(<?= $sub_item['pelamaran']['id'] ?>)" class="font-medium text-green-600 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" d="M11.5 8.5v-4m-5 10v4m10-2v2m-5 0v-6m-5-8v6m10-6v8m-7-4h4m-9 6h4m6 2h4" />
                                            </svg>
                                        </button>
                                        <button onclick="showDelButton(<?= $sub_item['pelamaran']['id'] ?>)" class="text-red-500 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20">
                                                <path fill="currentColor" d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr id="user<?= $sub_item['pelamaran']['id'] ?>Description" class="hidden py-4 px-4 border-t border-gray-200">
                                    <td colspan="6" class="p-8">
                                        <h4 class="font-medium text-base text-[#CB6062] underline mb-2"><?= $sub_item['users']['nama'] ?></h4>
                                        <span>Email : </span>
                                        <p class="text-sm text-gray-600">
                                            <?= $sub_item['users']['email'] ?>
                                        </p>
                                        <span>Alamat : </span>
                                        <p class="text-sm text-gray-600">
                                            <?= $sub_item['users']['alamat'] ?>, <?= $sub_item['kecamatan']['nama'] ?>
                                        </p>
                                        <span>Jenis kelamin : </span>
                                        <p class="text-sm text-gray-600">
                                            <?php if ($sub_item['users']['gender'] == 'L') {
                                                echo 'Laki-laki';
                                            } else {
                                                echo 'Perempuan';
                                            } ?>
                                        </p>
                                        <span>No Telp : </span>
                                        <p class="text-sm text-gray-600">
                                            <?= $sub_item['users']['phone'] ?>
                                        </p>
                                        <span>Alasan melamar :</span>
                                        <p class="text-sm text-gray-600"></p>
                                        <?= $sub_item['pelamaran']['alasan'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <div id="editbutton<?= $sub_item['pelamaran']['id'] ?>" class="fixed top-0 left-0 items-center justify-center flex hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
                                    <div class="relative flex flex-col items-center justify-center p-4 mb-6 break-words bg-white border-0 rounded-lg shadow-lg bg-blueGray-100">

                                        <button onclick="hideeditpekerja(<?= $sub_item['pelamaran']['id'] ?>)" class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                                            <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                                </path>
                                            </svg>
                                            Back
                                        </button>

                                        <div class="flex flex-col px-4 py-4 pt-0 justify-center items-center ">
                                            <form class="flex flex-col items-center justify-center" action="<?= urlpath('pelamaran/updatepelamaran2') ?>" method="POST" enctype="multipart/form-data" id="editformpekerja<?= $sub_item['pelamaran']['id'] ?>">
                                                <h6 class="flex justify-center mt-3 mb-6 text-sm font-bold uppercase text-[#204E51]">
                                                    Form Acc Pekerja
                                                </h6>

                                                <div class="flex flex-col justify-center items-center">
                                                    <input type="hidden" name="id" value="<?= $sub_item['pelamaran']['id'] ?>">
                                                    <input type="hidden" name="alasan" value="<?= $sub_item['pelamaran']['alasan'] ?>">
                                                    <div class="flex flex-row gap-10">
                                                        <div class="flex flex-row items-center justify-center gap-6">
                                                            <div class="flex flex-col items-center justify-center">
                                                                <label for="Rejected" class="block mb-2 text-sm font-medium text-gray-900">Tolak</label>
                                                                <input type="radio" name="status" id="Rejected" value='rejected' class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5">
                                                            </div>
                                                            <div class="flex flex-col items-center justify-center">
                                                                <label for="Validated" class="block mb-2 text-sm font-medium text-gray-900">Terima</label>
                                                                <input type="radio" name="status" id="Validated" value='accepted' class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label for="catatan" class="mt-4 text-gray-900">Catatan:</label>
                                                <div class="flex flex-col items-center justify-center mt-4 ">
                                                    <textarea name="catatan" id="" class="w-[500px] h-[300px] custom-select resize-none"></textarea>
                                                </div>


                                                <button type="submit" class="flex w-full justify-center rounded-[12px] bg-[#204E51] opacity-70 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#37251b] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#76f51] mt-8">
                                                    Simpan
                                                </button>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                    <?php
                                $no++;
                                $hasProcessStatus = true;
                            }
                        }
                    }

                    if (!$hasProcessStatus) {
                        echo '<tr><td colspan="7" class="text-center py-3">Belum ada pelamaran baru</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <h1 class="text-[24px] justify-start flex w-[1280px] mb-8 pl-4">Data yang sudah diproses</h1>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 max-h-[400px] overflow-y-auto">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="">
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Pekerja
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No Telp
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dokumen
                        </th>
                        <th scope="col" class="px-6 py-3 justify-center text-center">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 justify-center flex">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pelamaran as $pelamaran_item) { ?>
                        <?php foreach ($pelamaran_item['pelamaran'] as $sub_item) {
                            if ($sub_item['pelamaran']['status'] != 'process') { ?>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $no ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        <?= $sub_item['users']['nama'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $sub_item['users']['email'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $sub_item['users']['phone'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="<?= urlpath('uploads/dokumen_pelamaran/' . htmlspecialchars($sub_item['pelamaran']['dokumen'])) ?>"><?= $sub_item['pelamaran']['dokumen'] ?></a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php if ($sub_item['pelamaran']['status'] == 'accepted') { ?>
                                            <div class="text-green-500 p-2  rounded-full text-center bg-green-100">Accepted</div>
                                        <?php } elseif ($sub_item['pelamaran']['status'] == 'rejected') { ?>
                                            <div class="text-red-500 p-2  rounded-full text-center bg-red-100">Rejected</div>
                                        <?php } else { ?>
                                            <div class="text-yellow-500 p-2 rounded-full text-center bg-yellow-100">Process</div>
                                        <?php } ?>
                                    </td>
                                    <td class="px-6 py-4 text-center items-center">
                                        <button onclick="toggleDescription(<?= $sub_item['pelamaran']['id'] ?>)" class="font-medium text-blue-600  hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="m12 15l-4.243-4.242l1.415-1.414L12 12.172l2.828-2.828l1.415 1.414L12 15.001Z" />
                                            </svg></button>
                                        <button onclick="editpekerja(<?= $sub_item['pelamaran']['id'] ?>)" class="font-medium text-green-600 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" d="M11.5 8.5v-4m-5 10v4m10-2v2m-5 0v-6m-5-8v6m10-6v8m-7-4h4m-9 6h4m6 2h4" />
                                            </svg></button>
                                        <button onclick="showDelButton(<?= $sub_item['pelamaran']['id'] ?>)" class="text-red-500 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20">
                                                <path fill="currentColor" d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z" />
                                            </svg>

                                    </td>


                                </tr>
                                <tr id="user<?= $sub_item['pelamaran']['id'] ?>Description" class="hidden py-4 px-4 border-t border-gray-200">
                                    <td colspan="6" class="p-8">
                                        <h4 class="font-medium text-base text-[#CB6062] underline mb-2"><?= $sub_item['users']['nama'] ?></h4>
                                        <span>Email : </span>
                                        <p class="text-sm text-gray-600">
                                            <?= $sub_item['users']['email'] ?>
                                        </p>
                                        <span>Alamat : </span>
                                        <p class="text-sm text-gray-600">
                                            <?= $sub_item['users']['alamat'] ?>, <?= $sub_item['kecamatan']['nama'] ?>
                                        </p>
                                        <span>Jenis kelamin : </span>
                                        <p class="text-sm text-gray-600">
                                            <?php if ($sub_item['users']['gender'] == 'L') {
                                                echo 'Laki-laki';
                                            } else {
                                                echo 'Perempuan';
                                            } ?>
                                        </p>
                                        <span>No Telp : </span>
                                        <p class="text-sm text-gray-600">
                                            <?= $sub_item['users']['phone'] ?>
                                        </p>
                                        <span>Alasan melamar :</span>
                                        <p class="text-sm text-gray-600"></p>
                                        <?= $sub_item['pelamaran']['alasan'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <div id="editbutton<?= $sub_item['pelamaran']['id'] ?>" class="fixed top-0 left-0 items-center justify-center flex hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
                                    <div class="relative flex flex-col items-center justify-center p-4 mb-6 break-words bg-white border-0 rounded-lg shadow-lg bg-blueGray-100">

                                        <button onclick="hideeditpekerja(<?= $sub_item['pelamaran']['id'] ?>)" class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                                            <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                                </path>
                                            </svg>
                                            Back
                                        </button>

                                        <div class="flex flex-col px-4 py-4 pt-0 justify-center items-center ">
                                            <form class="flex flex-col items-center justify-center" action="<?= urlpath('pelamaran/updatepelamaran2') ?>" method="POST" enctype="multipart/form-data" id="editformpekerja<?= $sub_item['pelamaran']['id'] ?>">
                                                <h6 class="flex justify-center mt-3 mb-6 text-sm font-bold uppercase text-[#204E51]">
                                                    Form Acc Pekerja
                                                </h6>

                                                <div class="flex flex-col justify-center items-center">
                                                    <input type="hidden" name="id" value="<?= $sub_item['pelamaran']['id'] ?>">
                                                    <input type="hidden" name="alasan" value="<?= $sub_item['pelamaran']['alasan'] ?>">
                                                    <div class="flex flex-row gap-10">
                                                        <div class="flex flex-row items-center justify-center gap-6">
                                                            <div class="flex flex-col items-center justify-center">
                                                                <label for="Rejected" class="block mb-2 text-sm font-medium text-gray-900">Tolak</label>
                                                                <input type="radio" name="status" id="Rejected" value='rejected' class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5">
                                                            </div>
                                                            <div class="flex flex-col items-center justify-center">
                                                                <label for="Validated" class="block mb-2 text-sm font-medium text-gray-900">Terima</label>
                                                                <input type="radio" name="status" id="Validated" value='accepted' class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label for="catatan" class="mt-4 text-gray-900">Catatan:</label>
                                                <div class="flex flex-col items-center justify-center mt-4 ">
                                                    <textarea name="catatan" id="" class="w-[500px] h-[300px] custom-select resize-none"></textarea>
                                                </div>


                                                <button type="submit" class="flex w-full justify-center rounded-[12px] bg-[#204E51] opacity-70 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#37251b] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#76f51] mt-8">
                                                    Simpan
                                                </button>
                                            </form>


                                        </div>
                                    </div>
                                </div>

                            <?php $no++;
                            } ?>
                        <?php } ?>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        let activeDescriptionId = null;

        function toggleDescription(userId) {
            const descriptionRow = document.getElementById(`user${userId}Description`);
            console.log('text');

            // Toggle the visibility of the clicked description row
            descriptionRow.classList.toggle('hidden');

            // Update activeDescriptionId if the description is now visible, otherwise set it to null
            if (!descriptionRow.classList.contains('hidden')) {
                activeDescriptionId = userId;
            } else {
                activeDescriptionId = null;
            }
        }

        function showDelButton(id) {
            let delbutton = document.getElementById('delbutton')
            document.getElementById('deleteForm').action = "<?= urlpath('dashboard/pekerjaan_list/delete') ?>"
            document.getElementById('inputfordelete').value = id;

            delbutton.classList.remove('hidden')
            delbutton.classList.add('flex')
            setTimeout(() => {
                delbutton.classList.add('opacity-100')
            }, 20);

        }



        function hideDelButton() {
            let delbutton = document.getElementById('delbutton')
            delbutton.classList.add('opacity-0')
            setTimeout(() => {
                delbutton.classList.add('hidden')
                delbutton.classList.remove('flex')
            }, 500);
        }

        function editpekerja($id) {
            let editpekerja = document.getElementById('editbutton' + $id)

            editpekerja.classList.remove('hidden')
            editpekerja.classList.add('flex')

            setTimeout(() => {
                editpekerja.classList.remove('opacity-0')
                editpekerja.classList.add('opacity-100')
            }, 20);
        }

        function hideeditpekerja($id) {
            let editpekerja = document.getElementById('editbutton' + $id)

            editpekerja.classList.add('opacity-0')
            setTimeout(() => {
                editpekerja.classList.remove('opacity-100')
                editpekerja.classList.add('hidden')
                editpekerja.classList.remove('flex')
            }, 500);
        }
    </script>
</body>
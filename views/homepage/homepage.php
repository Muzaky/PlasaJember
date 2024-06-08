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
        <img src="src/assets/Logo.png" alt="test" class="w-[112px]">
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

    <?php if ($user['roles_id'] == 2) { ?>
        <div class="flex flex-col items-center mt-4" id="main-container">
            <div>
                <h1 class="text-[24px] font-bold text-[#CB6062]">Selamat Datang <b><?= $pekerja['nama'] ?></b></h1>
            </div>
            <div class="">
                <h1 class="text-[24px] font-bold text-[#CB6062]">Cari Pekerjaan yang cocok untukmu di pada list pekerjaan dibawah ya !</b></h1>
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
                        echo '<a href="$searchkerja" class="p-2 bg-[#CB6062]  rounded-[4px] text-[#F8E8E0] hover:bg-[#F8E8E0] hover:text-black">Cari Pekerjaan</a>';
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
                <div class="flex flex-col h-[800px] overflow-y-auto" id="pekerjaan-list">
                    <?php foreach ($pekerjaan as $pekerjaan_item) { ?>


                        <div class="w-[470px] h-[200px] bg-white border border-gray-200 rounded-[4px] shadow pekerjaan-item my-1 focus:border-[#CB6062]" data-nama="<?= htmlspecialchars($pekerjaan_item['nama_pekerjaan']) ?>" data-deskripsi="<?= htmlspecialchars($pekerjaan_item['deskripsi']) ?>" data-alamat="<?= htmlspecialchars($pekerjaan_item['alamat']) ?>" data-status="<?= htmlspecialchars($pekerjaan_item['status']) ?>" data-id="<?= $pekerjaan_item['id'] ?>" data-foto="<?= htmlspecialchars($pekerjaan_item['foto']) ?>" data-tugas="<?= htmlspecialchars($pekerjaan_item['tugas']) ?>" data-waktu_kerja="<?= htmlspecialchars($pekerjaan_item['waktu_kerja']) ?>" data-kompensasi="<?= htmlspecialchars($pekerjaan_item['kompensasi']) ?>" data-batas="<?= htmlspecialchars($pekerjaan_item['batas']) ?>" data-email="<?= htmlspecialchars($pekerjaan_item['email']) ?>" data-telp="<?= htmlspecialchars($pekerjaan_item['telp']) ?>" data-per="<?= htmlspecialchars($pekerjaan_item['per']) ?>" data-waktu_selesai="<?= htmlspecialchars($pekerjaan_item['waktu_selesai']) ?>">
                            <div class="flex flex-row">
                                <div class="flex flex-col w-full">
                                    <div class="p-4">
                                        <a href="#">
                                            <h5 class="mb-1 text-[20px] underline font-bold tracking-tight text-black text-wrap"><?= htmlspecialchars($pekerjaan_item['nama_pekerjaan']) ?></h5>
                                        </a>
                                        <p class=" font-normal text-gray-700  text-[16px]"><?= htmlspecialchars($pekerjaan_item['alamat']) ?></p>
                                        <div class="flex flex-row items-center gap-1 mt-2">
                                            <p class=" font-normal text-black  text-[14px]">Rp <?= number_format($pekerjaan_item['kompensasi'], 2, ',', '.') ?></p>
                                            <p class=" font-normal text-black  text-[14px]">per</p>
                                            <p class=" font-normal text-black   text-[14px] capitalize"><?= htmlspecialchars($pekerjaan_item['per']) ?></p>

                                        </div>
                                        <p class=" font-normal text-black  text-[14px] capitalize">Batas Lamaran : <?= htmlspecialchars($pekerjaan_item['batas']) ?></p>
                                        <p class=" font-normal text-black  text-[14px] capitalize overflow-ellipsis"><?= htmlspecialchars($pekerjaan_item['tugas']) ?></p>
                                        <div class="flex flex-1 justify-end">
                                            <p class=" font-normal text-gray-400 dark:text-gray-400 text-[12px]">Pendaftar :</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($pekerjaan == null) { ?>
                    <p>Belum ada pekerjaan</p>
                <?php } else { ?>
                    <div id="pekerjaan-details" class="flex-1 p-5 mb-4 bg-white border border-gray-200 rounded-[4px] shadow dark:bg-gray-800 w-[700px] items-center justify-center flex">
                        <div id="predetails-content">Klik untuk melihat detail</div>
                        <div id="details-content" class="">
                            <!-- Details will be displayed here -->
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <?php if ($user['roles_id'] == 3) { ?>
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
                        echo '<a href="$searchkerja" class="p-2 bg-[#CB6062]  rounded-[4px] text-[#F8E8E0] hover:bg-[#F8E8E0] hover:text-black">Cari Pekerjaan</a>';
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
                <div class="flex flex-col h-[800px] overflow-y-auto" id="pekerjaan-list">
                    <?php foreach ($pekerjaan as $pekerjaan_item) { ?>
                        <div class="w-[470px] h-[200px] bg-white border border-gray-200 rounded-[4px] shadow pekerjaan-item my-1 focus:border-[#CB6062]" data-nama="<?= htmlspecialchars($pekerjaan_item['nama_pekerjaan']) ?>" data-deskripsi="<?= htmlspecialchars($pekerjaan_item['deskripsi']) ?>" data-alamat="<?= htmlspecialchars($pekerjaan_item['alamat']) ?>" data-status="<?= htmlspecialchars($pekerjaan_item['status']) ?>" data-id="<?= $pekerjaan_item['id'] ?>" data-foto="<?= htmlspecialchars($pekerjaan_item['foto']) ?>" data-tugas="<?= htmlspecialchars($pekerjaan_item['tugas']) ?>" data-waktu_kerja="<?= htmlspecialchars($pekerjaan_item['waktu_kerja']) ?>" data-kompensasi="<?= htmlspecialchars($pekerjaan_item['kompensasi']) ?>" data-batas="<?= htmlspecialchars($pekerjaan_item['batas']) ?>" data-email="<?= htmlspecialchars($pekerjaan_item['email']) ?>" data-telp="<?= htmlspecialchars($pekerjaan_item['telp']) ?>" data-per="<?= htmlspecialchars($pekerjaan_item['per']) ?>" data-waktu_selesai="<?= htmlspecialchars($pekerjaan_item['waktu_selesai']) ?>">
                            <div class="flex flex-row">
                                <div class="flex flex-col w-full">
                                    <div class="p-4">
                                        <a href="#">
                                            <h5 class="mb-1 text-[20px] underline font-bold tracking-tight text-black text-wrap"><?= htmlspecialchars($pekerjaan_item['nama_pekerjaan']) ?></h5>
                                        </a>
                                        <p class=" font-normal text-gray-700  text-[16px]"><?= htmlspecialchars($pekerjaan_item['alamat']) ?></p>
                                        <div class="flex flex-row items-center gap-1 mt-2">
                                            <p class=" font-normal text-black  text-[14px]">Rp <?= number_format($pekerjaan_item['kompensasi'], 2, ',', '.') ?></p>
                                            <p class=" font-normal text-black  text-[14px]">per</p>
                                            <p class=" font-normal text-black   text-[14px] capitalize"><?= htmlspecialchars($pekerjaan_item['per']) ?></p>

                                        </div>
                                        <p class=" font-normal text-black  text-[14px] capitalize">Batas Lamaran : <?= htmlspecialchars($pekerjaan_item['batas']) ?></p>
                                        <p class=" font-normal text-black  text-[14px] capitalize overflow-ellipsis"><?= htmlspecialchars($pekerjaan_item['tugas']) ?></p>
                                        <div class="flex flex-1 justify-end">
                                            <p class=" font-normal text-gray-400 dark:text-gray-400 text-[12px]">Pendaftar :</p>
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
                <?php if ($pekerjaan == null) { ?>
                    <p>Belum ada pekerjaan yang kamu buat </p>
                <?php } else { ?>


                    <div id="pekerjaan-details" class="flex-1 p-5 mb-4 bg-white border border-gray-200 rounded-[4px] shadow dark:bg-gray-800 w-[700px] items-center justify-center flex">
                        <div id="predetails-content">Klik untuk melihat detail</div>
                        <div id="details-content">
                            <!-- Details will be displayed here -->
                        </div>
                    </div>
                <?php } ?>
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
                                Form Buat Loker
                            </h6>
                            <div class="flex flex-wrap text-center">
                                <div class="w-full px-4">
                                    <div class="w-full mb-3">
                                        <input type="hidden" name="status" value="ongoing">
                                        <div class="flex flex-row gap-8">
                                            <div class="flex flex-col">
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Nama Pekerjaan
                                                </label>
                                                <input type="text" name="nama_pekerjaan" id="nama_pekerjaan0" class="w-[500px] custom-select" value="" placeholder="Nama Pekerjaan">
                                                </input>
                                            </div>
                                            <div class="flex flex-col">
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Lokasi
                                                </label>
                                                <input type="text" name="alamat" id="alamat0" class="w-[500px] custom-select" value="" placeholder="Lokasi">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="flex flex-row gap-8">
                                            <div class="flex flex-col">
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Waktu Kerja
                                                </label>
                                                <div class="flex flex-row gap-4">
                                                    <input type="time" name="waktu_kerja" id="waktu_kerja0" class="w-[242px] custom-select" value="" placeholder="">
                                                    </input>
                                                    <input type="time" name="waktu_selesai" id="waktu_kerja0" class="w-[242px] custom-select" value="" placeholder="">
                                                    </input>
                                                </div>
                                            </div>
                                            <div class="flex flex-col">
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Kompensasi
                                                </label>
                                                <div class="flex flex-row gap-4">
                                                    <div class="flex flex-col">
                                                        <input type="number" name="kompensasi" id="kompensasi0" class="w-[380px] custom-select" value="" placeholder="Kompensasi">
                                                        </input>
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <select name="per" id="per0" class="custom-select w-[100px] ease-linear transition-all duration-150 mb-4">
                                                            <option value="hari">Hari</option>
                                                            <option value="minggu">Minggu</option>
                                                            <option value="bulan">Bulan</option>
                                                            <option value="tahun">Tahun</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-row justify-evenly">
                                            <div class="flex flex-col">

                                                <label class="flex justify-center mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Email
                                                </label>
                                                <input type="text" name="email" id="email0" class="border-0 p-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[200px] ease-linear transition-all duration-150 mb-4" value="" placeholder="Email">
                                            </div>
                                            <div class="flex flex-col">
                                                </input><label class="flex justify-center mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    No.Telp
                                                </label>
                                                <input type="text" name="telp" id="telp0" class="border-0 p-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[200px] ease-linear transition-all duration-150 mb-4" value="" placeholder="Telp">
                                                </input>
                                            </div>
                                            <div class="flex flex-col">
                                                </input><label class="flex justify-center mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Batas Lamaran
                                                </label>
                                                <input type="date" name="batas" id="batas0" class="border-0 p-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[200px] ease-linear transition-all duration-150 mb-4" value="" placeholder="Batas Lamaran">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="flex flex-row gap-8">
                                            <div class="flex flex-col">
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Deskripsi
                                                </label>
                                                <textarea name="deskripsi" id="deskripsi0" class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-40 shadow-lg resize-none mb-4"></textarea>
                                            </div>
                                            <div class="flex flex-col">
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Isikan Tugas
                                                </label>
                                                <textarea name="tugas" id="tugas0" class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-40 shadow-lg resize-none mb-4"></textarea>
                                            </div>
                                        </div>
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
        </div>
    <?php } ?>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            const pekerjaanItems = document.querySelectorAll('.pekerjaan-item');
            const detailsContainer = document.getElementById('pekerjaan-details');
            const preDetailsContent = document.getElementById('predetails-content');
            const detailsContent = document.getElementById('details-content');

            pekerjaanItems.forEach(item => {
                item.addEventListener('click', function() {
                    pekerjaanItems.forEach(item => {
                        item.classList.remove('border-blue-500');
                    });
                    const rolesId = <?= ($user['roles_id']); ?>;

                    // Add border to the clicked item
                    this.classList.add('border-blue-500');
                    const nama = this.getAttribute('data-nama');
                    const deskripsi = this.getAttribute('data-deskripsi');
                    const tugas = this.getAttribute('data-tugas');
                    const waktu_kerja = formatTime(this.getAttribute('data-waktu_kerja'));
                    const waktu_selesai = formatTime(this.getAttribute('data-waktu_selesai'));
                    const kompensasi = this.getAttribute('data-kompensasi');
                    const kompensasiformatted = number_format(kompensasi, 2, ',', '.');
                    const per = this.getAttribute('data-per');
                    const batas = this.getAttribute('data-batas');
                    const alamat = this.getAttribute('data-alamat');
                    const status = this.getAttribute('data-status');
                    const foto = this.getAttribute('data-foto');
                    const email = this.getAttribute('data-email');
                    const telp = this.getAttribute('data-telp');
                    const id = this.getAttribute('data-id');


                    preDetailsContent.style.display = 'none';
                    detailsContainer.classList.remove('items-center', 'justify-center', 'flex');
                    let buttonHTML = '';
                    if (rolesId === 3) {
                        buttonHTML = `<button class="text-white bg-[#CB6062] hover:bg-[#F8E8E0] font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="editPekerjaan(${id})">Edit</button>`;
                    } else if (rolesId === 2) {
                        buttonHTML = `<a href="<?= urlpath('pelamaran/formlamaran?id=${id}') ?>" class="text-white bg-[#204E51] hover:bg-[#F8E8E0] font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mb-4">Daftar</a>`;
                    }

                    let statusMessage = status === 'ongoing' ? 'Sedang Berjalan' : (status === 'done' ? 'Sudah Berakhir' : status);
                    console.log(statusMessage);

                    detailsContainer.innerHTML = `
                    <img class="w-full h-48 object-cover rounded-t-lg" src="<?= urlpath('uploads/foto_pekerjaan/') ?>${foto}" alt="image">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-2">${nama}</h5>
                    ${buttonHTML}
                    <p class="mb-3 font-normal text-gray-700 border-b-2 pb-2 mt-2">Kegiatan ini : ${statusMessage}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Deskripsi : ${deskripsi}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Tugas & Tanggung Jawab : ${tugas}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Alamat : ${alamat}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Waktu Kerja : ${waktu_kerja} - ${waktu_selesai}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 capitalize">Kompensasi : Rp. ${kompensasiformatted} / ${per}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Cara Melamar : Jika Anda tertarik dan memenuhi persyaratan di atas, 
                    silakan kirimkan lamaran Anda melalui platform 
                    PLASA Jember dengan menyertakan informasi kontak dan pengalaman kerja Anda.</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Batas Pelamaran : ${batas}</p>
                    <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">Kontak :</p>
                    <div class="flex flex-col">
                        <p class="font-normal text-gray-700 dark:text-gray-400">${email}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">${telp}</p>
                    </div> 
                `;
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var container = document.getElementById('kerja-container');
            var imageContainer = document.getElementById('pic-container');

            function adjustImageContainerHeight() {
                var containerHeight = container.offsetHeight;
                imageContainer.style.height = containerHeight + 'px';
            }

            // Initial adjustment
            adjustImageContainerHeight();

            // Adjust on window resize
            window.addEventListener('resize', adjustImageContainerHeight);
        });
    </script>


</body>
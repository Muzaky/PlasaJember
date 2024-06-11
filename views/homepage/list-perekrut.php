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

        background-color: white;
        color: #204E51;
        font-size: 0.875rem;
        line-height: 1.25;
        border-radius: 0.375rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transition: all 0.15s ease-in-out;
        margin-bottom: 1rem;
    }

    swiper-container {
        width: 1280px;
        height: 400px;
    }

    .swiper-slide {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .swiper-slide img {
        max-width: 100%;
        height: auto;
    }

    .swiper-slide h1 {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
    }

    .swiper-slide .star {
        color: #FFCC00;
        margin-right: 4px;
    }

    .swiper-slide p {
        margin: 0;
    }

    .swiper-slide a {
        text-align: center;
    }
</style>
<?php $perekrutData = $perekrut[0]; ?>

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
    <div id="main-container" class="flex flex-col items-center justify-center">
        <div id="banner" class="flex w-[1280px] h-[400px] bg-[#CB6062] mt-4 p-[48px] rounded-[24px]">
            <div id="inside-banner" class="flex flex-row items-center w-full justify-evenly">
                <div class="flex flex-col gap-2">
                    <h1 class="text-[36px] font-bold text-[#F8E8E0]">Cari perekrut buat kamu !</h1>
                    <p class="text-[18px] text-[#F8E8E0]">Cari detail perekrutmu disini.</p>
                    <div class="relative w-[300px] text-gray-400 focus-within:text-gray-600 ">
                        <input id="search_field" class=" w-[490px] h-[36px] custom-select pl-10 p-[0.75rem]" placeholder="Cari nama perekrut" type="search">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 absolute left-2 top-[35%] transform -translate-y-1/2">
                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div>
                    <img src="../src/assets/searching.png" alt="test" class="w-[400px] rounded-full">
                </div>
            </div>
        </div>
        <div id="mid-spacer" class="w-[1280px] flex flex-col items-start justify-start mt-8">
            <h1 class="text-[24px] font-bold text-[#2A2C35]">Explore perekrut </h1>
            <p class="text-[16px] text-[#2A2C35] mt-2">Pelajari selebihnya tentang perekrut kamu</p>
        </div>

        <!-- Swiper Container -->
        <div class="relative w-[1280px]">
            <div class="swiper-container mySwiper mt-4">
                <div class="swiper-wrapper" id="tablezz" >
                    <?php foreach ($perekrut as $perekruts) { ?>
                        <div class="swiper-slide h-[250px] relative rounded-xl border border-[#185141] p-4 bg-white shadow-lg" >
                            <div class="flex flex-col items-start justify-between">

                                <div>
                                    <h1 class="text-xl font-semibold namaperekrut"><?= $perekruts['perekrutdetails']['nama'] ?></h1>
                                    <p><?= $perekruts['kecamatan']['nama'] ?></p>
                                    <div class="flex items-center text-gray-600">
                                        <span class="star">⭐</span>
                                        <span> - <?= $perekruts['countrating'] ?> Reviews</span>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-4 text-gray-700">

                                <p><?= $perekruts['countpekerjaan'] ?> Jobs</p>
                            </div>
                            <a href="<?= urlpath('homepage/detail-perekrut?id=' . $perekruts['perekrut']['id']) ?>" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-lg">Detail Perekrut</a>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Add navigation buttons -->
            <div class="swiper-button-next absolute top-1/2 right-0 transform -translate-y-1/2"></div>
            <div class="swiper-button-prev absolute top-1/2 left-0 transform -translate-y-1/2"></div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.mySwiper', {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search_field').on('keyup', function() {
                var searchText = $(this).val().toLowerCase();
                $('#tablezz .swiper-slide').each(function() {
                    var namaperekrut = $(this).find('.namaperekrut').text().toLowerCase();
                    if (namaperekrut.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
</body>
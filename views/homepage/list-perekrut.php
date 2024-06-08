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

    swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        /* border-radius: 20px; */

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<header id="footer-main" class="w-full py-4 bg-[#CB6062] flex flex-row items-center">
    <div id="logo-container" class="flex pl-8">
        <img src="../src/assets/Logo.png" alt="test" class="w-[112px]">
    </div>
    <nav id="nav-footer" class="flex flex-row pl-24 gap-8 font-medium">
        <a href="<?= urlpath('homepage') ?>">Cari lowongan</a>
        <a href="<?= urlpath('list-perekrut') ?>" class="border-b-2 text-[#F8E8E0] border-[#F8E8E0]">List Perekrut</a>
    </nav>
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
                            <path fillRule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clipRule="evenodd" />
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

        <swiper-container class="mySwiper mt-4" pagination="true" pagination-clickable="true" space-between="30" slides-per-view="3" navigation="true">
            <?php foreach ($perekrut as $perekruts) { ?>
                <swiper-slide class="swiper-slide h-96 relative rounded-xl border border-[#185141]">
                    <h1 class="mt-4"><?= $perekruts['perekrut']['nama'] ?></h1>
                    <h1 class="mt-4"><?= $perekruts['kecamatan']['nama'] ?></h1>
                    <h1 class="mt-4"><?= $perekruts['countpekerjaan'] ?></h1>
                </swiper-slide>
            <?php } ?>

            <!-- Add navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </swiper-container>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const swiper = new Swiper('.mySwiper', {
                spaceBetween: 30,
                slidesPerView: 3,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
</body>
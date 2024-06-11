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

    #auth-check {
        font-size: 20px;
        font-family: 'Montserrat';
        color: #363A8D;
    }

    #container-left,
    #container-right {
        font-family: 'Montserrat';
    }

   
    ::-webkit-scrollbar {
        width: 15px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #CB6062;
        border-radius: 10px;
    }
    

    html {
        scroll-behavior: smooth;
    }
</style>


<header id="footer-main" class="w-full py-4 bg-[#CB6062] flex flex-row items-center">
    <div id="logo-container" class="flex pl-8">
        <a href="<?= urlpath('') ?>">

            <img src="src/assets/Logo.png" alt="test" class="w-[112px]" >
        </a>
    </div>
</header>

<section id="main-content" class="flex items-center justify-center h-[86vh]">
    <div id="container" class="flex flex-row rounded-[24px] justify-center bg-[#F8E8E0] ">
        <div id="container-left" class="bg-[#F8E8E0] p-8 rounded-[16px]">
            <h2 class="text-[32px] w-[400px] text-wrap font-bold text-[#CB6062]">KAMU INGIN DAFTAR YANG MANA ?</h2>
            <p class="w-[400px] text-wrap mt-[24px]">Pilih perekrut? atau pekerja?</p>
            <div class="flex justify-center">
                <img src="src/assets/Webinar-cuate.png" alt="" class="w-[400px]">
            </div>
        </div>
        <div id="container-right" class="bg-[#CB6062] p-8 w-[620px] rounded-[24px] rounded-l-[40px] flex flex-col">
            <h2 class="text-[32px] w-[400px] text-wrap font-bold text-[#F8E8E0]">DAFTAR SEBAGAI</h2>
            <p class="mt-[12px] text-[#F8E8E0] w-[400px] text-wrap">Pilihlah ingin mendaftar sebagai apa </p>
            <div class="flex justify-center pt-[80px]">
                <form action="" class="flex flex-col mt-[24px] gap-8">
                    <div class="inputbox p-2 bg-[#F8E8E0] flex justify-center rounded-xl">
                        <a class="text-[#CB6062] px-2 py-2 rounded-xl" href="<?= urlpath('register/pekerja') ?>">Pekerja</a>
                    </div>
                    <div class="inputbox p-2 bg-[#F8E8E0] flex justify-center rounded-xl">
                        <a class="text-[#CB6062] px-2 py-2 rounded-xl" href="<?= urlpath('register/perekrut') ?>">Perekrut</a>
                    </div>
                </form>
            </div>
            <div>


            </div>

        </div>
    </div>

</section>


<footer class="w-full flex flex-row bg-[#cb6062] text-[Montserrat] py-4 text-[#F8E8E0]">
    <div class="flex flex-row gap-8 pl-4">
        <a href="" class="hover:border-b-2">Kebijakan Privasi</a>
        <a href="" class="hover:border-b-2">Syarat & Ketentuan</a>
        <a href="" class="hover:border-b-2">Contact</a>
    </div>
    <div class="flex flex-1 justify-end pr-8">
        <p>Copyright © 2024 - All right reserved by PLASA Ltd</p>
    </div>

</footer>
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

    .inputbox {
        position: relative;
        width: 480px;
    }

    .inputbox input {
        width: 100%;
    }

    .inputbox span {
        position: absolute;
        left: 0;
        padding-right: 4px;
        padding-bottom: 0px;
        padding-top: 8px;
        padding-left: 12px;
        transition: 0.5s;
        color: #F8E8E0;
        pointer-events: none;
    }

    .inputbox input:valid~span,
    .inputbox input:focus~span {
        transform: translateX(10px) translateY(-16px);
        font-size: 0.80em;
        background: #CB6062;
    }

    ::-webkit-scrollbar {
        width: 15px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #CB6062;
        border-radius: 10px;
    }

    .custom-select {
        padding: 0.75rem;
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

    html {
        scroll-behavior: smooth;
    }
</style>


<header id="footer-main" class="w-full py-4 bg-[#CB6062] flex flex-row items-center">
    <div id="logo-container" class="flex pl-8">
        <a href="<?= urlpath('') ?>">

            <img src="src/assets/Logo.png" alt="test" class="w-[112px]">
        </a>
    </div>
</header>

<section id="main-content" class="flex items-center justify-center h-[86vh]">
    <div id="container" class="flex flex-row rounded-[24px] justify-center bg-[#F8E8E0] ">
        <div id="container-left" class="bg-[#F8E8E0] p-8 rounded-[16px]">
            <h2 class="text-[32px] w-[400px] text-wrap font-bold text-[#CB6062]">SELAMAT DATANG DI PLASA JEMBER</h2>
            <p class="w-[400px] text-wrap mt-[24px]">Lakukan segala pekerjaan yang kamu bisa, kapanpun itu</p>
            <div class="flex justify-center">
                <img src="src/assets/Webinar-cuate.png" alt="" class="w-[400px]">
            </div>
        </div>
        <div id="container-right" class="bg-[#CB6062] p-8 w-[620px] rounded-[24px] rounded-l-[40px] flex flex-col">
            <h2 class="text-[32px] w-[400px] text-wrap font-bold text-[#F8E8E0]">MASUK</h2>
            <p class="mt-[12px] text-[#F8E8E0] w-[400px] text-wrap">Terima rekomendasi dan penawaran menarik hanya untuk Anda</p>
            <div class="flex justify-center pt-[80px]">
                <form action="<?= urlpath('login') ?>" class="flex flex-col mt-[24px] gap-8" id="login-form" method="post">
                    <div class="inputbox">
                        <input type="text" class="h-[42px] rounded-[8px] px-2 bg-transparent border-1 border-[#F8E8E0] focus:ring-[#F8E8E0] focus:border-[#F8E8E0]  custom-select" required="required" name="email">
                        <span>Masukkan Email</span>
                    </div>
                    <div class="inputbox">
                        <input type="password" class="h-[42px] rounded-[8px] px-2 bg-transparent border-1 border-[#F8E8E0] focus:ring-[#F8E8E0] focus:border-[#F8E8E0] custom-select" required="required" name="password">
                        <span>Kata Sandi</span>
                    </div>
                </form>
            </div>
            <div class="flex justify-center mt-[80px]">
                <button class="px-8 py-2 border-2 rounded-[12px] bg-[#F8E8E0] border-[#F8E8E0] hover:text-[#F8E8E0] hover:bg-[#CB6062]" form="login-form">Login</button>
            </div>
            <div class="flex flex-row justify-center mt-4 text-[#F8E8E0]">
                <p>Belum punya akun ?</p>
                <a href="<?= urlpath('register') ?>" class="ml-2 hover:border-b-2">Daftar</a>
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
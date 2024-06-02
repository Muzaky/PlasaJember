<style>
    #nav-footer{
        font-size: 20px;
        font-family: 'Montserrat';
        color: #2A2C35;
    }
    #nav-footer a:hover{
        color: #F8E8E0;
        border-bottom: 2px solid #F8E8E0;
    }

    #auth-check{
        font-size: 20px;
        font-family: 'Montserrat';
        color: #363A8D;
    }

    .footer-sublink {
        font-weight: 400;
        font-size: 20px;
    }
    .footer-sublink:hover{
        
        color: #F8E8E0;
        border-bottom: 2px solid #F8E8E0;
    }

</style>

<header id="footer-main" class="w-full py-4 bg-[#CB6062] flex flex-row items-center">
    <div id="logo-container" class="flex pl-8">
        <img src="src/assets/Logo.png" alt="test" class="w-[112px]">
    </div>
    <div id="auth-check" class="flex justify-end flex-1 px-8 font-semibold">
        <a href="<?= urlpath('login') ?>" class="px-4 py-[6px] border-2 rounded-[12px] border-[#CB6062] hover:text-[#F8E8E0] hover:bg-[#363A8D]">Masuk</a>
        <a href="<?= urlpath('register') ?>" class="px-4 py-[6px] border-2 rounded-[12px] border-[#CB6062] hover:text-[#F8E8E0] hover:bg-[#363A8D]">Daftar</a>
    </div>
</header>

<section id="main-content" class="h-screen">

</section>

<footer class="flex flex-col p-6 text-center bg-[#CB6062]" id="footer">
    <div class="flex flex-row justify-between">
        <div class="spacer"></div>
        <div class="flex flex-col items-start ml-8 footer-bar">
            <img src="src/assets/Logo.png" class="h-20" alt="">
            <p class="w-80 text-wrap text-start text-[#F8E8E0] mt-4">Platform penyedia lowongan pekerjaan bagi warga Kabupaten Jember</p>
        </div>
        <div class="spacer"></div>
        <div class="items-end">
            <div class="flex flex-row gap-8">
                <div class="footer-bar">
                    <div class="footer-subtitle font-[Montserrat] text-[24px] font-semibold">
                        <ul class="flex flex-col items-start gap-3"> Pages
                            <a href="#" class="footer-sublink">Home</a>
                            <a href="#" class="footer-sublink">About</a>
                            <a href="#" class="footer-sublink">Purpose</a>
                        </ul>
                    </div>
                </div>
                <div class="footer-bar">
                    <div class="footer-subtitle font-[Montserrat] text-[24px] font-semibold">
                        <ul class="flex flex-col items-start gap-3">Information
                            <a href="#" class="footer-sublink">Contact Us</a>
                            <a href="#" class="footer-sublink">Address</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="spacer"></div>

    </div>
    <div class="flex items-center justify-center mt-4 text-[#F8E8E0]">
        <p>Copyright © 2024 - All right reserved by PLASA Ltd</p>
    </div>


</footer>

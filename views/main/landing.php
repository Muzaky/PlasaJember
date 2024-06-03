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
       
    }
    ::-webkit-scrollbar {
        width: 15px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #CB6062;
        border-radius: 10px;
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

<section id="main-content" class="flex flex-col font-[montserrat]">
    <div class="flex flex-row justify-center items-center bg-[#F8E8E0] p-[38px]">
        <div class="">
            <div class="flex flex-col">
                <h1 class="text-[32px] font-bold ">Selamat Datang di</h1>
                <h1 class="text-[48px] font-bold text-[#CB6062]">PLASA JEMBER</h1>
                <p>Lakukan segala pekerjaan yang kamu bisa, kapanpun itu !</p>
            </div>
            <button type="button" onclick="window.location.href='<?= urlpath('register') ?>'" class="p-4 bg-[#CB6062] mt-4 rounded-[4px] text-[#F8E8E0]">Daftar Sekarang !</button>
        </div>
        <div class="spacer w-[300px]"></div>
        <img src="src/assets/Question.png" alt="" class="h-[500px]">
    </div>
</section>

<footer class="flex flex-col p-6 text-center bg-[#CB6062]" id="footer">
    <div class="flex flex-row justify-center">
        
        <div class="flex flex-col items-start ml-8 footer-bar">
            <img src="src/assets/Logo.png" class="h-20" alt="">
            <p class="w-80 text-wrap text-start text-[#F8E8E0] mt-4">Platform penyedia lowongan pekerjaan bagi warga Kabupaten Jember</p>
        </div>
        <div class="spacer w-[500px]"></div>
        <div class="items-end w-80 ">
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

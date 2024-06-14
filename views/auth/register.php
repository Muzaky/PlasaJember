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
        background-color: #F8E8E0;
        border-radius: 10px;
    }

    html {
        scroll-behavior: smooth;
    }

    .umurbox {
        position: relative;
        width: 120px;
    }

    .umurbox span {
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

    .umurbox input:valid~span,
    .umurbox input:focus~span {
        transform: translateX(10px) translateY(-16px);
        font-size: 0.80em;
        background: #CB6062;
    }

    .custom-select {
        padding: 0.75rem;
        font-size: 0.875rem;
        line-height: 1.25;
        border-radius: 0.375rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transition: all 0.15s ease-in-out;
        margin-bottom: 1rem;
        border: #F8E8E0 1px solid;
    }

    .custom-select:focus {
        border: #F8E8E0 1px solid;
        outline: none;
        ring: 2px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>




<body id="main-content" class="flex flex-col items-center justify-center">
    <header id="footer-main" class="w-full py-4 bg-[#CB6062] flex flex-row items-center">
        <div id="logo-container" class="flex pl-8">
            <a href="<?= urlpath('') ?>">
                <img src="../src/assets/Logo.png" alt="test" class="w-[112px]">
            </a>
        </div>
    </header>
    <?php if ($roles_id == 2) : ?>
        <div id="container" class="flex flex-row rounded-[24px] justify-center bg-[#F8E8E0] my-8">
            <div id="container-left" class="bg-[#F8E8E0] p-8 rounded-[16px]">
                <h2 class="text-[32px] w-[400px] text-wrap font-bold text-[#CB6062]">DAFTAR SEBAGAI PEKERJA DI PLASA JEMBER</h2>
                <p class="w-[400px] text-wrap mt-[24px]">Cari kerjaan gaperlu susah kesana kemari, gunakan saja plasa kami !</p>
                <div class="flex justify-center">
                    <img src="../src/assets/tired.png" alt="" class="w-[400px]">
                </div>
            </div>
            <div id="container-right" class="bg-[#CB6062] p-8 w-[620px] rounded-[24px] rounded-l-[40px] flex flex-col">
                <h2 class="text-[32px] w-[400px] text-wrap font-bold text-[#F8E8E0]">DAFTAR</h2>
                <p class="mt-[12px] text-[#F8E8E0] w-[400px] text-wrap">Terima rekomendasi dan penawaran menarik hanya untuk Anda</p>
                <div class="flex justify-center pt-[40px]">
                    <form action="<?= urlpath('register') ?>" class="flex flex-col  gap-8" id="register-form1" method="POST">
                        <input type="hidden" name="roles_id" value="2">
                        <div class="inputbox">
                            <input type="text" class="h-[42px] rounded-[8px] px-2 bg-transparent  focus:ring-[#F8E8E0] focus:outline-none active:bg-transparent custom-select" required="required" name="nama">
                            <span>Masukkan Nama</span>
                        </div>
                        <div class="inputbox">
                            <input type="email" class="h-[42px] rounded-[8px] px-2 bg-transparent  focus:ring-[#F8E8E0] focus:outline-none custom-select" required="required" name="email">
                            <span>Masukkan Email</span>
                        </div>
                        <div class="inputbox">
                            <input type="password" class="h-[42px] rounded-[8px] px-2 bg-transparent  focus:ring-[#F8E8E0] focus:outline-none custom-select" required="required" name="password">
                            <span>Kata Sandi</span>
                        </div>
                        <div class="inputbox">
                            <input type="number" class="h-[42px] rounded-[8px] px-2 bg-transparent  focus:ring-[#F8E8E0] focus:outline-none custom-select" required="required" name="phone">
                            <span>No. Handphone</span>
                        </div>
                        <div class="flex flex-row">
                            <div class="umurbox">
                                <input type="number" class="h-[42px] w-[120px] rounded-[8px] px-2 bg-transparent  focus:ring-[#F8E8E0] focus:outline-none custom-select" required="required" name="umur">
                                <span>Umur</span>
                            </div>
                            <select name="gender" id="gender" class="ml-[40px] justify-end flex-1 h-[42px] rounded-[8px] px-2 bg-transparent  focus:ring-[#F8E8E0] focus:outline-none  text-[#F8E8E0] custom-select">
                                <option value='' class="text-black">Jenis Kelamin</option>
                                <option value="L" class="text-black">Laki Laki</option>
                                <option value="P" class="text-black">Perempuan</option>
                            </select>
                        </div>
                        <div class="inputbox">
                            <input type="text" class="h-[42px] rounded-[8px] px-2 bg-transparent border-2 focus:ring-[#F8E8E0] focus:outline-none custom-select" required="required" name="alamat">
                            <span>Alamat</span>
                        </div>
                        <select name='kecamatan' id='kecamatan' class='h-[42px] rounded-[8px] px-2 bg-transparent  focus:ring-[#F8E8E0] focus:outline-none inputbox text-[#F8E8E0] custom-select'>
                            <option value='' class="text-black">Pilih Kecamatan</option>
                            <?php foreach ($kecamatan as $kecamatans) : ?>
                                <option value="<?php echo $kecamatans['id'] ?>" class="text-black"><?php echo $kecamatans['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </div>
                <div class="flex justify-center mt-[40px]">
                    <button type="submit" class="px-8 py-2 border-2 rounded-[12px] bg-[#F8E8E0] border-[#F8E8E0] hover:text-[#F8E8E0] hover:bg-[#CB6062]" form="register-form1">Daftar</button>
                </div>
                <div class="flex flex-row justify-center mt-4 text-[#F8E8E0]">
                    <p>Sudah punya akun ?</p>
                    <a href="<?= urlpath('login') ?>" class="ml-2 hover:border-b-2">Masuk</a>
                </div>
                <div class="flex flex-row justify-center mt-4 text-[#F8E8E0]">
                    <p>Ingin mendaftar sebagai perekrut ?</p>
                    <a href="<?= urlpath('register/perekrut') ?>" class="ml-2 hover:border-b-2">Daftar</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($roles_id == 3) : ?>

        <div id="container" class="flex flex-row rounded-[24px] justify-center bg-[#F8E8E0] my-8 ">
            <div id="container-left" class="bg-[#F8E8E0] p-8 rounded-[16px]">
                <h2 class="text-[32px] w-[400px] text-wrap font-bold text-[#CB6062]">DAFTAR SEBAGAI PEREKRUT DI PLASA JEMBER</h2>
                <p class="w-[400px] text-wrap mt-[24px]">Cari pekerja gaperlu susah kesana kemari, gunakan saja plasa kami !</p>
                <div class="flex justify-center">
                    <img src="../src/assets/recruit.png" alt="" class="w-[400px]">
                </div>
            </div>
            <div id="container-right" class="bg-[#CB6062] p-8 w-[620px] rounded-[24px] rounded-l-[40px] flex flex-col">
                <h2 class="text-[32px] w-[400px] text-wrap font-bold text-[#F8E8E0]">DAFTAR</h2>
                <p class="mt-[12px] text-[#F8E8E0] w-[400px] text-wrap">Terima rekomendasi dan penawaran menarik hanya untuk Anda</p>
                <div class="flex justify-center pt-[40px]">
                    <form action="<?= urlpath('register') ?>" method="POST" id="register-form" class="flex flex-col  gap-8">
                        <input type="hidden" name="roles_id" value="3">
                        <div class="inputbox">
                            <input type="text" class="h-[42px] rounded-[8px] px-2 bg-transparent  focus:ring-[#F8E8E0] focus:outline-none custom-select" required="required" name="nama">
                            <span>Masukkan Nama</span>
                        </div>
                        <div class="inputbox">
                            <input type="email" class="h-[42px] rounded-[8px] px-2 bg-transparent focus:ring-[#F8E8E0] focus:outline-none custom-select" required="required" name="email">
                            <span>Masukkan Email</span>
                        </div>
                        <div class="inputbox">
                            <input type="password" class="h-[42px] rounded-[8px] px-2 bg-transparent focus:ring-[#F8E8E0] focus:outline-none custom-select" required="required" name="password">
                            <span>Kata Sandi</span>
                        </div>
                        <div class="inputbox">
                            <input type="number" class="h-[42px] rounded-[8px] px-2 bg-transparent focus:ring-[#F8E8E0] focus:outline-none custom-select" required="required" name="phone">
                            <span>No. Handphone</span>
                        </div>
                        <div class="inputbox">
                            <input type="text" class="h-[42px] rounded-[8px] px-2 bg-transparent focus:ring-[#F8E8E0] focus:outline-none custom-select" required="required" name="alamat">
                            <span>Alamat</span>
                        </div>
                        <select name='kecamatan' id='kecamatan' class='h-[42px] rounded-[8px] px-2 bg-transparent focus:ring-[#F8E8E0] focus:outline-none inputbox text-[#F8E8E0] custom-select'>
                            <option value='' class="text-black">Pilih Kecamatan</option>
                            <?php foreach ($kecamatan as $kecamatans) : ?>
                                <option value="<?php echo $kecamatans['id'] ?>" class="text-black"><?php echo $kecamatans['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </div>
                <div class="flex justify-center mt-[40px]">
                    <button class="px-8 py-2 border-2 rounded-[12px] bg-[#F8E8E0] border-[#F8E8E0] hover:text-[#F8E8E0] hover:bg-[#CB6062]" type="submit" form="register-form">Daftar</button>
                </div>
                <div class="flex flex-row justify-center mt-4 text-[#F8E8E0]">
                    <p>Sudah punya akun ?</p>
                    <a href="<?= urlpath('login') ?>" class="ml-2 hover:border-b-2">Masuk</a>
                </div>
                <div class="flex flex-row justify-center mt-4 text-[#F8E8E0]">
                    <p>Ingin mendaftar sebagai pekerja ?</p>
                    <a href="<?= urlpath('register/pekerja') ?>" class="ml-2 hover:border-b-2">Daftar</a>
                </div>
            </div>
        </div>
</body>

<?php endif; ?>

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
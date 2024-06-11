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

    .hidden {
        display: none;
    }
</style>

<header id="footer-main" class="w-full py-4 bg-[#CB6062] flex flex-row items-center ">
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

<div class="bg-gray-100 h-screen flex justify-center items-center p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <!-- Header Section -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                
                <div>
                    <h1 class="text-2xl font-semibold"><?= $perekrut[0]['perekrut']['nama'] ?></h1>
                    <div class="flex items-center">
                        <span class="text-gray-600">(blum ada rating total rating from 0 reviews)</span>
                    </div>
                </div>
            </div>
            <button id="writeReviewButton" class="bg-[#CB6062] text-white py-2 px-4 rounded-lg">Write a review</button>
        </div>

        <!-- Navigation Tabs -->
        <div class="mt-6 border-b border-gray-200">
            <nav class="flex space-x-6">
                <button id="aboutTab" class="px-4 py-2 text-blue-500 font-semibold">About</button>
                <button id="jobsTab" class="px-4 py-2 text-gray-500 font-semibold hover:text-blue-500">Pekerjaan</button>
            </nav>
        </div>

        <!-- Company Overview Section -->
        <div id="aboutContent" class="mt-6 tab-content">
            <h2 class="text-xl font-semibold mb-4">Overview perekrut</h2>
            <div class="space-y-4">
                <div class="flex">
                    <span class="font-medium w-32">Email:</span>
                    <span class="text-gray-700"><?= $perekrut[0]['perekrut']['email'] ?></span>
                </div>
                <div class="flex">
                    <span class="font-medium w-32">Alamat:</span>
                    <span class="text-gray-700"><?= $perekrut[0]['perekrut']['alamat'] ?>, <?= $perekrut[0]['kecamatan']['nama'] ?></span>
                </div>
                <div class="flex">
                    <span class="font-medium w-32">Phone:</span>
                    <span class="text-gray-700"><?= $perekrut[0]['perekrut']['phone'] ?></span>
                </div>
            </div>
            <p class="mt-6 text-gray-700">
                Being a part of Nestlé means you are part of something bigger; a community of people that comes together with a shared purpose and an organization committed to delivering good. Good food, Good life. Through the work we do and the products we create, we touch millions of lives every single day. This way we’re helping to shape a happier, healthier future for individuals and families, for communities and for the planet.
            </p>
        </div>

        <!-- Jobs Section -->
        <div id="jobsContent" class="tab-content hidden">
            <h2 class="text-xl font-semibold my-4 ml-2">Pekerjaan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <?php foreach ($perekrut[0]['pekerjaan'] as $job) : ?>
                    <div class="bg-white p-5 rounded shadow">
                        <h3 class="text-lg font-bold mb-2"><?= $job['nama_pekerjaan'] ?></h3>
                        <p class="text-gray-500 mb-2"><?= $job['alamat'] ?></p>
                        <p class="text-gray-700 mb-4"><?= substr($job['deskripsi'], 0, 100) . '...' ?></p>
                        <p class="text-gray-400 capitalize">Kompensasi : <?= number_format($job['kompensasi']) ?> / <?= $job['per'] ?></p>
                        <?php $date = new DateTime($job['batas']);
                        $formattedDate = $date->format('d F Y');
                        ?>
                        <p class="text-gray-400">Batas pendaftaran : <?= $formattedDate ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div id="reviewModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-xl font-semibold mb-4">Write a Review</h2>
        <form id="reviewForm" action="<?= urlpath('homepage/list-perekrut/rating/create') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_perekrut" value="<?= $perekrut[0]['perekrut']['id'] ?>">
            <div class="mb-4">
                <label for="reviewText" class="block text-gray-700">Review</label>
                <textarea id="reviewText" name="review" class="w-full p-2 border border-gray-300 rounded resize-none" rows="4"></textarea>
            </div>
            <div class="mb-4">
                <label for="rating" class="block text-gray-700">Rating</label>
                <select id="rating" name="rating" class="w-full p-2 border border-gray-300 rounded">
                    <option value="" disabled selected>Select a rating</option>
                    <option value="1">1 - Very Poor</option>
                    <option value="2">2 - Poor</option>
                    <option value="3">3 - Average</option>
                    <option value="4">4 - Good</option>
                    <option value="5">5 - Excellent</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" id="cancelButton" class="bg-gray-500 text-white py-2 px-4 rounded mr-2">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    // JavaScript to toggle content visibility
    document.getElementById('aboutTab').addEventListener('click', function() {
        showTab('aboutContent');
        setActiveTab(this);
    });

    document.getElementById('jobsTab').addEventListener('click', function() {
        showTab('jobsContent');
        setActiveTab(this);
    });

    function showTab(contentId) {
        // Hide all tab content
        document.querySelectorAll('.tab-content').forEach(function(content) {
            content.classList.add('hidden');
        });
        // Show the selected tab content
        document.getElementById(contentId).classList.remove('hidden');
    }

    function setActiveTab(button) {
        // Remove active class from all buttons
        document.querySelectorAll('.flex button').forEach(function(btn) {
            btn.classList.remove('text-blue-500');
            btn.classList.add('text-gray-500');
        });
        // Add active class to the clicked button
        button.classList.remove('text-gray-500');
        button.classList.add('text-blue-500');
    }

    const writeReviewButton = document.getElementById('writeReviewButton');
    const reviewModal = document.getElementById('reviewModal');
    const cancelButton = document.getElementById('cancelButton');
    const reviewForm = document.getElementById('reviewForm');

    writeReviewButton.addEventListener('click', () => {
        reviewModal.classList.remove('hidden');
    });

    cancelButton.addEventListener('click', () => {
        reviewModal.classList.add('hidden');
    });

    
</script>
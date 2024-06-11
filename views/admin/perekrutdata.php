<style>
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
</style>
<div class="h-screen flex overflow-hidden font-[montserrat]">
    <!-- Sidebar -->
    <div class="flex flex-col  w-80 ">
        <div class="flex justify-center items-center">
            <img class="w-[180px] h-[86px] mt-[64px] mb-[88px]" src="../src/assets/Logo.png" alt="logobibitani">
        </div>

        <div class="flex justify-center">
            <!-- Sidebar links -->
            <ul class="space-y-2">
                <li>
                    <a href="<?= urlpath('dashboard') ?>" class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center text-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>

                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= urlpath('dashboard/perekrut_list') ?>" class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg>

                        <span>List Perekrut</span>
                    </a>
                </li>
                <li>
                    <a href="<?= urlpath('dashboard/pekerja_list') ?>" class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>

                        <span>List Pekerja</span>
                    </a>
                </li>
                <li>
                    <a href="<?= urlpath('dashboard/pekerjaan_list') ?>" class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>

                        <span>List Pekerjaan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= urlpath('logout') ?>" class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.496 21H6.5c-1.105 0-2-1.151-2-2.571V5.57c0-1.419.895-2.57 2-2.57h7M16 15.5l3.5-3.5L16 8.5m-6.5 3.496h10" />
                        </svg>

                        <span>Logout</span>
                    </a>
                </li>




            </ul>
        </div>
    </div>

    <!-- Content area -->
    <div class="flex flex-col w-0 flex-1 overflow-hidden bg-slate-200 items-center">
        <!-- Top bar -->
        <div class="flex h-[44px] justify-center items-center content-center mt-[63px]">
            <!-- Top bar content -->
            <div class="flex w-[614px] h-auto rounded-[8px] mx-[12px] items-center">

            </div>
            <div class="flex-1 px-4 flex justify-between">
                <div class="flex-1 flex">
                </div>
            </div>
        </div>

        <!-- Main content area -->
        <div class="flex-1 relative z-0 overflow-y-auto focus:outline-none w-[1400px] justify-center" tabindex="0">
            <!-- Your content goes here -->
            <h1 class="text-[24px] ml-4">Admin Dashboard Page</h1>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3 flex justify-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($perekrut as $perekrut_item) { ?>
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $no ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $perekrut_item['perekrut']['nama'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $perekrut_item['perekrut']['email'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $perekrut_item['perekrut']['phone'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $perekrut_item['perekrut']['alamat'] ?>, <?= $perekrut_item['kecamatan']['nama'] ?>
                                </td>
                                <td class="px-6 py-4 flex justify-center">
                                    <button onclick="toggleDescription(<?= $perekrut_item['perekrut']['id'] ?>)" class="font-medium text-blue-600  hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="m12 15l-4.243-4.242l1.415-1.414L12 12.172l2.828-2.828l1.415 1.414L12 15.001Z" />
                                        </svg></button>
                                    <button onclick="editperekrut(<?= $perekrut_item['perekrut']['id'] ?>)" class="font-medium text-green-600 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" d="M11.5 8.5v-4m-5 10v4m10-2v2m-5 0v-6m-5-8v6m10-6v8m-7-4h4m-9 6h4m6 2h4" />
                                        </svg></button>
                                    <button onclick="showDelButton(<?= $perekrut_item['perekrut']['id_credentials'] ?>)" class="text-red-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20">
                                            <path fill="currentColor" d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z" />
                                        </svg>

                                </td>


                            </tr>
                            <tr id="user<?= $perekrut_item['perekrut']['id'] ?>Description" class="hidden py-4 px-4 border-t border-gray-200">
                                <td colspan="6" class="p-8">
                                    <h4 class="font-medium text-base text-[#CB6062] underline mb-2"><?= $perekrut_item['perekrut']['nama'] ?></h4>
                                    <span>Email : </span>
                                    <p class="text-sm text-gray-600">
                                        <?= $perekrut_item['perekrut']['email'] ?>
                                    </p>
                                    <span>Alamat : </span>
                                    <p class="text-sm text-gray-600">
                                        <?= $perekrut_item['perekrut']['alamat'] ?>, <?= $perekrut_item['kecamatan']['nama'] ?>
                                    </p>
                                    <span>Jenis kelamin : </span>
                                    <p class="text-sm text-gray-600">
                                        <?php if ($perekrut_item['perekrut']['validasi'] == 'process') {
                                            echo 'Process';
                                        } elseif ($perekrut_item['perekrut']['validasi'] == 'acccepted') {
                                            echo 'Accepted';
                                        } else {
                                            echo 'Rejected';
                                        } ?>
                                    </p>
                                    <span>No Telp : </span>
                                    <p class="text-sm text-gray-600">
                                        <?= $perekrut_item['perekrut']['phone'] ?>
                                    </p>
                                    <span class="mt-4">Jumlah Pelamaran : </span>
                                    <p class="text-sm text-gray-600">
                                        <?= $perekrut_item['pekerjaancount'] ?>
                                    </p>
                                </td>
                            </tr>
                            <div id="editbutton<?= $perekrut_item['perekrut']['id'] ?>" class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
                                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 rounded-lg shadow-lg bg-blueGray-100">

                                    <button onclick="hideeditperekrut(<?= $perekrut_item['perekrut']['id'] ?>)" class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                                        <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                            </path>
                                        </svg>
                                        Back
                                    </button>

                                    <div class="flex-auto px-4 py-4 pt-0 lg:px-10">
                                        <form class="flex flex-col items-center justify-center" action="<?= urlpath('dashboard/perekrut_list/update') ?>" method="POST" enctype="multipart/form-data" id=" editformperekrut<?= $perekrut_item['perekrut']['id'] ?>">
                                            <h6 class="flex justify-center mt-3 mb-6 text-sm font-bold uppercase text-[#204E51]">
                                                Edit Perekrut
                                            </h6>

                                            <div class="flex flex-col">
                                                <input type="hidden" name="id" value="<?= $perekrut_item['perekrut']['id'] ?>">
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Nama Perekrut
                                                </label>
                                                <input name="nama" id="nama" type="text" value="<?= htmlspecialchars($perekrut_item['perekrut']['nama']) ?>" class="custom-select w-[500px]"></input>
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Email
                                                </label>
                                                <input name="email" id="email" type="text" value="<?= htmlspecialchars($perekrut_item['perekrut']['email']) ?>" class="custom-select w-[500px]"></input>
                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Phone
                                                </label>
                                                <input name="phone" id="phone" type="text" value="<?= htmlspecialchars($perekrut_item['perekrut']['phone']) ?>" class="custom-select w-[500px]"></input>

                                                <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]" htmlfor="grid-password">
                                                    Alamat
                                                </label>
                                                <input name="alamat" id="alamat" type="text" value="<?= htmlspecialchars($perekrut_item['perekrut']['alamat']) ?>" class="custom-select w-[500px]"></input>
                                                <div class="flex flex-col justify-center items-center my-4">
                                                    <label class="flex uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                        Status Validasi
                                                    </label>
                                                    <div class="flex flex-row gap-10">
                                                        <div class="flex flex-row items-center justify-center gap-6">
                                                            <div class="flex flex-col items-center justify-center">
                                                                <label for="Rejected" class="block mb-2 text-sm font-medium text-gray-900">Tertolak</label>
                                                                <input type="checkbox" name="validasi" id="Rejected" value='rejected' onclick="if(this.checked) {Validated.checked=false;} {Process.checked=false;}" class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5">
                                                            </div>
                                                            <div class="flex flex-col items-center justify-center">
                                                                <label for="Validated" class="block mb-2 text-sm font-medium text-gray-900">Tervalidasi</label>
                                                                <input type="checkbox" name="validasi" id="Validated" value='accepted' onclick="if(this.checked) {Process.checked=false;} {Rejected.checked=false;}" class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5">
                                                            </div>
                                                            <div class="flex flex-col items-center justify-center">
                                                                <label for="Process" class="block mb-2 text-sm font-medium text-gray-900">Process</label>
                                                                <input type="checkbox" name="validasi" id="Process" value='process' onclick="if(this.checked) {Validated.checked=false;} {Rejected.checked=false;}" class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block p-2.5">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-8">



            </div>

            <div id="delbutton" class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">

                <div class="bg-white rounded shadow-md p-8 w-[25%] gap-5 flex-col overflow-hidden">
                    <div class="flex gap-3">
                        <div class="flex items-center justify-center h-10 text-red-600 bg-red-100 rounded-full min-w-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h1 class="mb-2 text-lg font-bold text-gray-700">Menghapus Data</h1>
                            <p class="text-gray-600">Apakah anda ingin menghapus data ?</p>
                        </div>
                    </div>
                    <div class="flex justify-end mt-3 ">
                        <button onclick="hideDelButton()" class="px-4 py-2 mr-3 text-black bg-white rounded cursor-pointer hover:bg-gray-300">Batal</button>
                        <form id="deleteForm" method="POST" action="">
                            <input type="hidden" name="id" value="" id="inputfordelete">
                            <button type="submit" class="px-4 py-2 font-semibold text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let activeDescriptionId = null;

    function toggleDescription(userId) {
        const descriptionRow = document.getElementById(`user${userId}Description`);
        // const toggleIcon = document.getElementById(`${userId}Toggle`).querySelector('svg');
        console.log('text');
        if (activeDescriptionId !== null && activeDescriptionId !== userId) {
            const activeDescriptionRow = document.getElementById(`${activeDescriptionId}Description`);
            // const activeToggleIcon = document.getElementById(`${activeDescriptionId}Toggle`).querySelector('svg');
            activeDescriptionRow.classList.add('hidden');
            // activeToggleIcon.classList.remove('flipped-icon');
        }

        descriptionRow.classList.toggle('hidden');
        // toggleIcon.classList.toggle('flipped-icon');

        if (!descriptionRow.classList.contains('hidden')) {
            activeDescriptionId = userId;
        } else {
            activeDescriptionId = null;
        }
    }

    function showDelButton(id) {
        let delbutton = document.getElementById('delbutton')
        document.getElementById('deleteForm').action = "<?= urlpath('dashboard/perekrut_list/delete') ?>"
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

    function editperekrut($id) {
        let editperekrut = document.getElementById('editbutton' + $id)

        editperekrut.classList.remove('hidden')
        editperekrut.classList.add('flex')

        setTimeout(() => {
            editperekrut.classList.remove('opacity-0')
            editperekrut.classList.add('opacity-100')
        }, 20);
    }

    function hideeditperekrut($id) {
        let editperekrut = document.getElementById('editbutton' + $id)

        editperekrut.classList.add('opacity-0')
        setTimeout(() => {
            editperekrut.classList.remove('opacity-100')
            editperekrut.classList.add('hidden')
            editperekrut.classList.remove('flex')
        }, 500);
    }
</script>
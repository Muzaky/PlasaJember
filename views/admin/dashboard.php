<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="h-screen flex overflow-hidden  font-[montserrat]">
    <!-- Sidebar -->
    <div class="flex flex-col  w-80 ">
        <div class="flex justify-center items-center">
            <img class="w-[180px] h-[86px] mt-[64px] mb-[88px]" src="src/assets/Logo.png" alt="logobibitani">
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
    <div class="flex flex-col w-0 flex-1 overflow-hidden bg-slate-200 bg-opacity-100 items-center">
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
           

            <div class="flex-1 p-6 mb-8">
                <h1 class="text-[24px] flex justify-center mb-4">Admin Dashboard Page</h1>
                <!-- Top Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold"><?= $data['perekrut']['count'] ?></h3>
                        <p class="text-gray-600">Jumlah Perekrut</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold"><?= $data['pekerjaan']['count'] ?></h3>
                        <p class="text-gray-600">Jumlah Pekerjaan</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold"><?= $data['pekerja']['count'] ?></h3>
                        <p class="text-gray-600">Jumlah Pekerja</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold"><?= $data['pelamaran']['count'] ?></h3>
                        <p class="text-gray-600">Jumlah Pelamaran</p>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-2 gap-6 ">

                    <div class="bg-white p-6 rounded-lg shadow">
                        <canvas id="profitChart"></canvas>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow max-h-[400px]">
                        <canvas id="pieChart" class="m-auto"></canvas>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-8">



            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const profitCtx = document.getElementById('profitChart').getContext('2d');
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    const pekerjadata = <?= json_encode($data['pekerja']['count']) ?>;
    const perekrutdata = <?= json_encode($data['perekrut']['count']) ?>;
    const pekerjaandata = <?= json_encode($data['pekerjaan']['count']) ?>;
    const pelamarandata = <?= json_encode($data['pelamaran']['count']) ?>;

    const profitChart = new Chart(profitCtx, {

        type: 'bar',
        data: {
            labels: ['Data Perbandingan'],
            datasets: [{
                    label: 'Pekerja',
                    data: [pekerjadata],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Perekrut',
                    data: [perekrutdata],
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const pieChart = new Chart(pieCtx, {

        type: 'pie',
        data: {
            labels: [
                'Pelamaran',
                'Pekerjaan'
            ],
            datasets: [{
                label: 'Perbandingan',
                data: [pekerjaandata, pelamarandata],
                backgroundColor: [
                    'rgb(255, 99, 132, 0.2)',
                    'rgb(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132, 1)',
                    'rgb(54, 162, 235, 1)',
                ],
                hoverOffset: 4
            }]
        }
    });
</script>
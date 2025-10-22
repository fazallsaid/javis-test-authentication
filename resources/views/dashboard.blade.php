<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Montserrat', sans-serif;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; /* slate-300 */
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a0aec0; /* slate-400 */
        }
        /* Style untuk transisi sidebar */
        #sidebar {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Overlay untuk mobile, diklik untuk menutup sidebar -->
    <div id="sidebar-overlay" class="fixed inset-0 z-40 hidden bg-black bg-opacity-50 backdrop-blur-sm md:hidden"></div>

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <!--
          Sidebar sekarang 'fixed' di semua ukuran layar.
          Di mobile (<md): didorong keluar layar (-translate-x-full) dan punya z-50.
          Di desktop (md+): didorong kembali ke 0 (md:translate-x-0) dan statis (md:static tidak diperlukan jika selalu fixed).
          'fixed' memastikan ia tetap di tempat saat konten utama di-scroll.
        -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 flex w-64 transform flex-col bg-white shadow-lg md:translate-x-0 -translate-x-full">
            <div class="flex items-center justify-center h-16 bg-white shadow-md">
                <span class="text-2xl font-bold text-indigo-600">Dashboard</span>
            </div>
            <!-- Navigasi dibuat scrollable jika item menu terlalu banyak -->
            <nav class="flex-1 space-y-2 overflow-y-auto px-4 py-6">
                <a href="#" class="flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="ml-3">Beranda</span>
                </a>
                <a href="#" class="flex items-center rounded-md px-4 py-2 text-gray-700 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-3">Profil</span>
                </a>
                <a href="#" class="flex items-center rounded-md px-4 py-2 text-gray-700 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" />
                    </svg>
                    <span class="ml-3">Laporan</span>
                </a>
                <a href="#" class="flex items-center rounded-md px-4 py-2 text-gray-700 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01-.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-3">Pengaturan</span>
                </a>
            </nav>
        </aside>

        <!-- Konten Utama -->
        <!--
          Konten utama sekarang memiliki margin kiri 'md:ml-64' yang hanya berlaku di desktop.
          Di mobile, margin-left adalah 0, sehingga pas di layar.
        -->
        <div class="flex flex-1 flex-col overflow-y-auto md:ml-64">
            <!-- Header dibuat 'sticky' dan 'top-0' agar tetap terlihat saat scroll -->
            <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-gray-200 bg-white px-4 shadow-md md:px-6">

                <!-- Grup Kiri: Tombol Menu + Judul -->
                <div class="flex items-center gap-3"> <!-- Tambahkan gap-3 (12px) untuk spasi antara tombol & judul -->
                    <!-- Tombol Menu Mobile -->
                    <button id="menu-toggle" class="text-gray-500 focus:outline-none md:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <!-- Judul Selamat Datang -->
                    <div class="flex items-center">
                        <!-- Ukuran teks responsif -->
                        <h1 class="text-lg font-semibold text-gray-800 md:text-xl">Selamat Datang, {{$usr->display_name}}!</h1>
                    </div>
                </div>

                <!-- Grup Kanan: Tombol Logout -->
                <div class="flex items-center">
                    <a href="{{url('admin/logout')}}" class="rounded-md bg-red-600 px-3 py-2.5 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 md:px-4">
                        Logout
                    </a>
                </div>
            </header>

            <!-- Konten Halaman Utama -->
            <main class="p-4 md:p-6">
                <!-- Grid Statistik -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 lg:grid-cols-4">
                    <!-- Padding responsif pada card -->
                    <div class="rounded-lg bg-white p-4 shadow-md md:p-6">
                        <p class="text-sm font-medium text-gray-500">Total Pengguna</p>
                        <p class="text-3xl font-bold text-gray-900">1,257</p>
                    </div>
                    <div class="rounded-lg bg-white p-4 shadow-md md:p-6">
                        <p class="text-sm font-medium text-gray-500">Penjualan Bulan Ini</p>
                        <p class="text-3xl font-bold text-gray-900">Rp 12.5 jt</p>
                    </div>
                    <div class="rounded-lg bg-white p-4 shadow-md md:p-6">
                        <p class="text-sm font-medium text-gray-500">Laporan Baru</p>
                        <p class="text-3xl font-bold text-gray-900">28</p>
                    </div>
                    <div class="rounded-lg bg-white p-4 shadow-md md:p-6">
                        <p class="text-sm font-medium text-gray-500">Tiket Terbuka</p>
                        <p class="text-3xl font-bold text-gray-900">5</p>
                    </div>
                </div>

                <!-- Tabel Aktivitas Terbaru -->
                <div class="mt-6 md:mt-8">
                    <div class="rounded-lg bg-white shadow-md">
                        <div class="border-b px-4 py-4 md:px-6">
                            <h3 class="text-lg font-semibold text-gray-800">Aktivitas Terbaru</h3>
                        </div>
                        <!--
                          Wrapper untuk horizontal scroll di mobile diubah jadi lg:overflow-x-auto
                          Class min-w-max juga dihapus dari table
                        -->
                        <div class="lg:overflow-x-auto">
                            <table class="w-full">
                                <!-- thead disembunyikan di bawah 'lg' -->
                                <thead class="bg-gray-50 hidden lg:table-header-group">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 md:px-6">Pengguna</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 md:px-6">Aksi</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 md:px-6">Waktu</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 md:px-6">Status</th>
                                    </tr>
                                </thead>
                                <!--
                                  tbody diubah jadi grid di mobile/tablet, dan kembali jadi table-row-group di 'lg'
                                  padding (p-4) ditambahkan untuk mode card
                                -->
                                <tbody class="bg-white grid grid-cols-1 md:grid-cols-2 gap-4 p-4 lg:p-0 lg:table-row-group lg:divide-y lg:divide-gray-200 lg:gap-0">
                                    <!--
                                      tr diubah jadi card (flex flex-col) di mobile/tablet
                                      dan kembali jadi table-row di 'lg'
                                    -->
                                    <tr class="rounded-lg shadow border flex flex-col p-4 lg:p-0 lg:table-row lg:shadow-none lg:border-none">
                                        <!--
                                          td diubah jadi block di mobile/tablet, dan table-cell di 'lg'
                                          Label ditambahkan untuk mobile/tablet dan disembunyikan di 'lg'
                                        -->
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Pengguna</span>
                                            <p class="text-gray-900 lg:p-0">John Doe</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Aksi</span>
                                            <p class="text-gray-900 lg:p-0">Membuat laporan baru</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Waktu</span>
                                            <p class="text-sm text-gray-700 lg:text-gray-500 lg:p-0">2 menit lalu</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Status</span>
                                            <div class="lg:p-0">
                                                <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Selesai</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 2 -->
                                    <tr class="rounded-lg shadow border flex flex-col p-4 lg:p-0 lg:table-row lg:shadow-none lg:border-none">
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Pengguna</span>
                                            <p class="text-gray-900 lg:p-0">Jane Smith</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Aksi</span>
                                            <p class="text-gray-900 lg:p-0">Memperbarui profil</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Waktu</span>
                                            <p class="text-sm text-gray-700 lg:text-gray-500 lg:p-0">15 menit lalu</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Status</span>
                                            <div class="lg:p-0">
                                                <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Selesai</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 3 -->
                                    <tr class="rounded-lg shadow border flex flex-col p-4 lg:p-0 lg:table-row lg:shadow-none lg:border-none">
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Pengguna</span>
                                            <p class="text-gray-900 lg:p-0">Alex Johnson</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Aksi</span>
                                            <p class="text-gray-900 lg:p-0">Menghapus pengguna</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Waktu</span>
                                            <p class="text-sm text-gray-700 lg:text-gray-500 lg:p-0">1 jam lalu</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Status</span>
                                            <div class="lg:p-0">
                                                <span class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">Gagal</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Row 4 -->
                                    <tr class="rounded-lg shadow border flex flex-col p-4 lg:p-0 lg:table-row lg:shadow-none lg:border-none">
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Pengguna</span>
                                            <p class="text-gray-900 lg:p-0">Emily Brown</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Aksi</span>
                                            <p class="text-gray-900 lg:p-0">Mengunggah file</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Waktu</span>
                                            <p class="text-sm text-gray-700 lg:text-gray-500 lg:p-0">2 jam lalu</p>
                                        </td>
                                        <td class="block lg:table-cell lg:whitespace-nowrap lg:px-4 lg:py-4 md:px-6 py-2">
                                            <span class="text-xs font-medium text-gray-500 uppercase lg:hidden">Status</span>
                                            <div class="lg:p-0">
                                                <span class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">Tertunda</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        // Fungsi untuk membuka sidebar
        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            // Mencegah scroll di body saat sidebar terbuka
            document.body.classList.add('overflow-hidden', 'md:overflow-auto');
        }

        // Fungsi untuk menutup sidebar
        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            // Mengizinkan scroll kembali
            document.body.classList.remove('overflow-hidden', 'md:overflow-auto');
        }

        // Toggle sidebar saat tombol menu di-klik
        menuToggle.addEventListener('click', (e) => {
            e.stopPropagation(); // Mencegah event 'click' ini memicu listener lain
            if (sidebar.classList.contains('-translate-x-full')) {
                openSidebar();
            } else {
                closeSidebar();
            }
        });

        // Tutup sidebar saat overlay di-klik
        overlay.addEventListener('click', () => {
            closeSidebar();
        });
    </script>
</body>
</html>

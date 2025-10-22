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
        /* Custom scrollbar for a cleaner look */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="hidden md:flex flex-col w-64 bg-white shadow-lg">
            <div class="flex items-center justify-center h-16 bg-white shadow-md">
                <span class="text-2xl font-bold text-indigo-600">Dashboard</span>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="#" class="flex items-center px-4 py-2 text-white bg-indigo-600 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="ml-3">Beranda</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-3">Profil</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" />
                    </svg>
                    <span class="ml-3">Laporan</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01-.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-3">Pengaturan</span>
                </a>
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-y-auto">
            <header class="flex items-center justify-between h-16 px-6 bg-white shadow-md">
                <!-- Tombol Menu Mobile -->
                <button class="text-gray-500 md:hidden focus:outline-none">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Selamat Datang, {{$usr->display_name}}!</h1>
                </div>

                <div class="flex items-center">
                    <a href="{{url('admin/logout')}}" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Logout
                    </a>
                </div>
            </header>

            <main class="p-6">
                <!-- Grid Statistik -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <p class="text-sm font-medium text-gray-500">Total Pengguna</p>
                        <p class="text-3xl font-bold text-gray-900">1,257</p>
                    </div>
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <p class="text-sm font-medium text-gray-500">Penjualan Bulan Ini</p>
                        <p class="text-3xl font-bold text-gray-900">Rp 12.5 jt</p>
                    </div>
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <p class="text-sm font-medium text-gray-500">Laporan Baru</p>
                        <p class="text-3xl font-bold text-gray-900">28</p>
                    </div>
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <p class="text-sm font-medium text-gray-500">Tiket Terbuka</p>
                        <p class="text-3xl font-bold text-gray-900">5</p>
                    </div>
                </div>

                <!-- Tabel Aktivitas Terbaru -->
                <div class="mt-8">
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="px-6 py-4 border-b">
                            <h3 class="text-lg font-semibold text-gray-800">Aktivitas Terbaru</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Pengguna</th>
                                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Aksi</th>
                                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Waktu</th>
                                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Membuat laporan baru</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 menit lalu</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Memperbarui profil</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15 menit lalu</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Alex Johnson</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Menghapus pengguna</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 jam lalu</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Gagal</span></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Emily Brown</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Mengunggah file</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 jam lalu</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Tertunda</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>

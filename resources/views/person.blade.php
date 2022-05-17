<!DOCTYPE html>
<html lang="en">
@extends('head')

<body id="page-top">
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
        <script>
          var clipboard = new ClipboardJS('.btn');
    
          clipboard.on('success', function (e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);
          });
    
          clipboard.on('error', function (e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);
          });
        </script>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-text mx-3">SIMI Admin</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="
                nav-item 
                {{ ($title === "Dashboard Data Barang") ? 'active' : '' }}">
                    <a 
                        class="nav-link" 
                        href="/dashboard">
                        <i class="bi bi-boxes"></i>
                        <span >Dashboard Data Barang</span>
                    </a>
            </li>

            <li class="
                nav-item  
                {{ ($title === "Dashboard Data Service") ? 'active' : '' }}">
                    <a 
                        class="nav-link" 
                        href="/dashboard2">
                        <i class="bi bi-tools"></i>
                        <span>Dashboard Data Service</span>
                    </a>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow text-black">
                    <h3>Selamat Datang {{ auth()->user()->name }}</h3>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="nav-link px-3 border-0 bg-primary text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-log-out" aria-hidden="true">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <i
                                        class="
                                      text-decoration-none 
                                      text-white">
                                        Keluar
                                    </i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
                
                <div>
                    @yield('container')
                </div>

            <footer class=" sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;
                            <a href="https://steamcommunity.com/id/Agalondia/">SIMI Dev Team&trade;</a> 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>

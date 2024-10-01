<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('dist/img/logo-arsitektur-UIN-Malang.png') }}" alt="" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-dark text-xs text-uppercase">Human Resources App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            @if (session()->has('admin'))
                @php
                $images = $admin->image;
                @endphp
            <img src="{{ asset('storage/image/' . $images) }}" class="img-circle elevation-2" alt="User Image">
            @elseif (session()->has('dosen'))
                @php
                    $images = $dosen->image;
                @endphp
            <img src="{{ asset('storage/image/' . $images) }}" class="img-circle elevation-2" alt="User Image">
            @elseif (session()->has('mahasiswa'))
                @php
                    $images = $mahasiswa->image;
                @endphp
            <img src="{{ asset('storage/image/' . $images) }}" class="img-circle elevation-2" alt="User Image">
            @endif
            </div>
            <div class="info">
            @if (session()->has('admin'))
            <a href="#" class="d-block">{{ $admin->nama }}</a>
            @elseif (session()->has('dosen'))
            <a href="#" class="d-block">{{ $dosen->nama }}</a>
            @elseif (session()->has('mahasiswa'))
            <a href="#" class="d-block">{{ $mahasiswa->nama }}</a>
            @else
                <p>Welcome, Guest!</p>
                <!-- Atau tampilkan pesan lain jika data admin tidak ditemukan -->
            @endif
            </div>
        </div> --}}
        {{-- @if (session()->has('admin')) --}}
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                    <img src="" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                    <a href="{{ route('admin.user', $user->id_auth) }}" class="d-block">{{ $user->nama }}</a>
            </div>
        </div> --}}
        {{-- @endif --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                {{-- @if (session()->has('admin')) --}}
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                {{-- @endif --}}
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <!-- <span class="right badge badge-danger">New</span> -->
                </p>
                </a>
            </li>
            {{-- @if (session()->has('admin')) --}}
            <li class="nav-item">
                <a href="{{ route('karyawan') }}" class="nav-link {{ request()->routeIs('karyawan') ? 'active' : '' }}">
                <i class="fas fa-user-graduate nav-icon"></i>
                <p>Data Karyawan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cuti') }}" class="nav-link {{ request()->routeIs('cuti') ? 'active' : '' }}">
                <i class="fas fa-user-tie nav-icon"></i>
                <p>Data Cuti</p>
                </a>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
{{-- <script>
    function logout() {
        Swal.fire({
            title: "Logout",
            text: "Apakah anda yakin ingin keluar dari aplikasi?",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, keluar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/logout",
                    type: "POST",
                    data: {_token: "{{ csrf_token() }}"},
                    success: function(response) {
                        // Tindakan sukses, misalnya refresh halaman atau redirect ke halaman login
                        window.location.href = "{{ route('login') }}";
                    },
                    error: function(xhr) {
                        // Tindakan jika terjadi kesalahan
                        console.log('Kesalahan: ' + xhr.responseText);
                    }
                });
            }
        });
    }
</script> --}}

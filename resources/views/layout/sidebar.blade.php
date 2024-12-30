@php
    $userAuth = auth()->user();
@endphp
<div class="sidebar-area" id="sidebar-area">
    <div class="logo position-relative">
        <a href="index.html" class="d-block text-decoration-none">
            <img src="{{ asset('') }}admin/assets/images/logopgcandibaru.png" width="50px" alt="logo-icon">
            <span class="logo-text fw-bold text-dark fs-6">PG CANDI BARU</span>
        </a>
        <button
            class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
            id="sidebar-burger-menu">
            <i data-feather="x"></i>
        </button>
    </div>
    <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar>
        <ul class="menu-inner">
            <li class="menu-item ">
                <a href="chat.html" class="menu-link">
                    <i data-feather="grid" class="menu-icon tf-icons"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">TABEL</span>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <i data-feather="life-buoy" class="menu-icon tf-icons"></i>
                    <span class="title">Kebun</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="/kebun-create" class="menu-link">
                            Create
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/kebun" class="menu-link">
                            Tabel
                        </a>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <i data-feather="book" class="menu-icon tf-icons"></i>
                    <span class="title">Timbangan</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="/timbangan-create" class="menu-link">
                            Create
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/timbangan" class="menu-link">
                            Tabel
                        </a>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <i data-feather="activity" class="menu-icon tf-icons"></i>
                    <span class="title">Hutang Petani</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="http://localhost:8000/hutangs" class="menu-link">
                            Index user: petani
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost:8000/hutangs/1/edit" class="menu-link">
                            Index user: admin
                        </a>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <i data-feather="shopping-cart" class="menu-icon tf-icons"></i>
                    <span class="title">Transaksi Hutang</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="http://localhost:8000/transaksis" class="menu-link">
                            Index user: petani
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="http://localhost:8000/transaksis/1/edit" class="menu-link">
                            Index user: admin
                        </a>
                </ul>
            </li>
            @if (Auth::user()->can('user.list'))
                <li class="menu-item">
                    <a href="{{ route('user.index') }}" class="menu-link">
                        <i data-feather="user" class="menu-icon tf-icons"></i>
                        <span class="title">User</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('role.management'))
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <i data-feather="users" class="menu-icon tf-icons"></i>
                    <span class="title">Role & Permission</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('role.getRole') }}" class="menu-link">
                            Role
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            Permission
                        </a>
                    </ul>
                </li>
            </aside>
            @endif
    <div class="bg-white z-1 admin">
        <div class="d-flex align-items-center admin-info border-top">
            <div class="flex-shrink-0">
                <a href="profile.html" class="d-block">
                    <img src="{{ asset('') }}admin/assets/images/admin.jpg" class="rounded-circle wh-54"
                        alt="admin">
                </a>
            </div>
            <div class="flex-grow-1 ms-3 info">
                <a href="profile.html" class="d-block name">{{ $userAuth->getRoleNames()->first() }}</a>
                <form action="{{ route('logout') }}" method="post">
                    <button tpye="submit" class="btn btn-danger fw-semibold text-white px-4">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</div>

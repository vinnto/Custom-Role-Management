    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            @php
                $PermissionUser = App\Models\PermissionRoleModel::getPermission('User', Auth::user()->role_id);
                $PermissionProduct = App\Models\PermissionRoleModel::getPermission('Product', Auth::user()->role_id);
                $PermissionCategory = App\Models\PermissionRoleModel::getPermission('Category', Auth::user()->role_id);
                $PermissionRole = App\Models\PermissionRoleModel::getPermission('Role', Auth::user()->role_id);
                $PermissionSetting = App\Models\PermissionRoleModel::getPermission('Role', Auth::user()->role_id);
            @endphp
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('panel.dashboard') ? 'active' : 'collapsed' }}"
                    href="{{ route('panel.dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (!empty($PermissionUser))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('panel.user') ? 'active' : 'collapsed' }}"
                        href="{{ route('panel.user') }}">
                        <i class="bi bi-person"></i>
                        <span>User</span>
                    </a>
                </li>
            @endif
            @if (!empty($PermissionProduct))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('') ? 'active' : 'collapsed' }}" href="#">
                        <i class="bi bi-person"></i>
                        <span>Product</span>
                    </a>
                </li>
            @endif
            @if (!empty($PermissionCategory))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('') ? 'active' : 'collapsed' }}" href="#">
                        <i class="bi bi-person"></i>
                        <span>Category</span>
                    </a>
                </li>
            @endif
            @if (!empty($PermissionRole))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('panel.role') ? 'active' : 'collapsed' }}"
                        href="{{ route('panel.role') }}">
                        <i class="bi bi-person"></i>
                        <span>Role</span>
                    </a>
                </li>
            @endif
            @if (!empty($PermissionSetting))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('') ? 'active' : 'collapsed' }}" href="#">
                        <i class="bi bi-person"></i>
                        <span>Setting</span>
                    </a>
                </li>
            @endif

        </ul>

    </aside><!-- End Sidebar-->

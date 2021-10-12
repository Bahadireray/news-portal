@if(!auth()->guest() && auth()->user()->type == \App\Models\User::TYPE_ADMIN)
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Admin</div>
                    <a class="nav-link" href="{{ route('category.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-new-alt"></i></div>
                        Categories
                    </a>
                    <a class="nav-link" href="{{ route('admin.news.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-new-alt"></i></div>
                        News
                    </a>
                    <a class="nav-link" href="{{ route('users.list') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                        Manage Users
                    </a>
                    <a class="nav-link" href="{{ route('log.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-item-alt"></i></div>
                        Log Activities
                    </a>
                </div>
            </div>
        </nav>
    </div>
@endif

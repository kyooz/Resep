<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Resep</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">R</a>
        </div>
        <ul class="sidebar-menu">
            
            
            
            @can('admin')
            {{-- <li class="menu-header">Dashboard</li> --}}
            <li><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            {{-- <li><a class="nav-link" href="/dashboard/recipes"><i class="fas fa-fire"></i> <span>Recipes</span></a></li> --}}
            {{-- <li><a class="nav-link" href="/dashboard/articles"><i class="far fa-square"></i> <span>Articles</span></a></li> --}}
            
            <li class="menu-header">Resep</li>
            <li><a class="nav-link" href="/dashboard/recipes"><i class="fas fa-fire"></i> <span>Semua Resep</span></a></li>
            {{-- <li><a class="nav-link" href="/dashboard/recipes/create"><i class="fas fa-fire"></i> <span>Tambah Resep Baru</span></a></li> --}}
            {{-- <li><a class="nav-link" href="/dashboard/articles"><i class="far fa-square"></i> <span>Articles</span></a></li> --}}
            
            <li class="menu-header">Artikel</li>
            <li><a class="nav-link" href="/dashboard/articles"><i class="fas fa-fire"></i> <span>Semua Artikel</span></a></li>
            {{-- <li><a class="nav-link" href="/dashboard/articles/create"><i class="fas fa-fire"></i> <span>Tambah Artikel Baru</span></a></li> --}}
            {{-- <li><a class="nav-link" href="/dashboard/articles"><i class="far fa-square"></i> <span>Articles</span></a></li> --}}
            
            
                        <li class="menu-header">Kategori</li>
                        <li><a class="nav-link" href="/dashboard/categories"><i class="fas fa-fire"></i> <span>Semua Kategori</span></a></li>
                        <li><a class="nav-link" href="/dashboard/categories/create"><i class="fas fa-fire"></i> <span>Tambah Kategori</span></a></li>
                        
                        <li class="menu-header">User</li>
                        <li><a class="nav-link" href="/dashboard/users"><i class="fas fa-fire"></i> <span>Semua User</span></a></li>
                        <li><a class="nav-link" href="/dashboard/users/create"><i class="fas fa-fire"></i> <span>Tambah User</span></a></li>
                        {{-- <li><a class="nav-link" href="/dashboard/articles"><i class="far fa-square"></i> <span>Articles</span></a></li> --}}
                            
            @endcan

            @can('writer')
                
            
            {{-- <li class="menu-header">Dashboard</li> --}}
            <li><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            {{-- <li><a class="nav-link" href="/dashboard/recipes"><i class="fas fa-fire"></i> <span>Recipes</span></a></li> --}}
            {{-- <li><a class="nav-link" href="/dashboard/articles"><i class="far fa-square"></i> <span>Articles</span></a></li> --}}
            
            <li class="menu-header">Resep</li>
            <li><a class="nav-link" href="/dashboard/recipes"><i class="fas fa-fire"></i> <span>Semua Resep</span></a></li>
            <li><a class="nav-link" href="/dashboard/recipes/create"><i class="fas fa-fire"></i> <span>Tambah Resep Baru</span></a></li>
            {{-- <li><a class="nav-link" href="/dashboard/articles"><i class="far fa-square"></i> <span>Articles</span></a></li> --}}
            
            <li class="menu-header">Artikel</li>
            <li><a class="nav-link" href="/dashboard/articles"><i class="fas fa-fire"></i> <span>Semua Artikel</span></a></li>
            <li><a class="nav-link" href="/dashboard/articles/create"><i class="fas fa-fire"></i> <span>Tambah Artikel Baru</span></a></li>
            {{-- <li><a class="nav-link" href="/dashboard/articles"><i class="far fa-square"></i> <span>Articles</span></a></li> --}}
            
            @endcan
        </ul>
    </aside>
</div>

<ul class="navbar-nav bg-gradient-company sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3"> Company </div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.index') }}"> <i class="fas fa-fw fa-tachometer-alt"></i> <span>Início</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading"> --- </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('company.edit') }}"> <i class="fas fa-fw fa-edit"></i> <span>Editar dados da empresa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('company.posts.index') }}"> <i class="fas fa-fw fa-edit"></i> <span>Posts/Vagas</span></a>
    </li>

</ul>

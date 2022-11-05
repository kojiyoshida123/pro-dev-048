<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
    <a class="navbar-brand" href="#">作品管理システム</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MENU
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @can('admin')
            <li><a class="dropdown-item" href="/user">ユーザー一覧</a></li>
            @endcan
            <li><a class="dropdown-item" href="/index">作品一覧</a></li>
            @can('admin')
            <li><a class="dropdown-item" href="/itemRegister">作品登録</a></li>
            @endcan

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout">ログアウト</a></li>
        </ul>
        </li>
    </ul>
    <form class="d-flex" method="GET" action="{{ route('user.list') }}">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    </div>
</div>
</nav>
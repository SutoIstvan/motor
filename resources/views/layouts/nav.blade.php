<nav class="navbar navbar-expand-lg navbar-light p-0">
    <a class="navbar-brand" href="{{ route('index') }}">
        <figure class=""><img src="/assets/images/marka_logo.png" style="height: 40px; width: 183px;"
                alt="" class="img-fluid"></figure>
    </a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            @foreach($menus as $menu)
                @if($menu->is_visible)
                    <li class="nav-item {{ Route::is($menu->url) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ asset($menu->url) }}">{{ $menu->title }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>

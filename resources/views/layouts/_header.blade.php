<header>
    <div id="page-top"></div>
    <nav class="navbar navbar-expand-md navbar-light shadow bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ blog_route('index') }}">{{ blog_setting('name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars"
                aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbars">
                <ul class="navbar-nav mr-auto">
                    @foreach ($sidebar_navigations as $navigation)
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="{{ $navigation->url }}" title="{{ $navigation->description }}">{{ $navigation->title }}</a>
                        </li>
                    @endforeach
                </ul>
                <span class="caret"></span>
            </div>
        </div>
    </nav>

</header>
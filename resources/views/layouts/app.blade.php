<html lang="en" class="h-100">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="Keywords" content="@yield('keywords', blog_setting('keywords'))" />
    <meta name="description" content="@yield('description', blog_setting('description'))" />

    <title>@yield('title') {{ blog_setting('name') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/inn-blog/css/app.css">
</head>

<body class="d-flex flex-column h-100">
    @include('blog::layouts._header')

    <main class="flex-shrink-0 my-4">
        <div class="container @yield('mainClass')">
            <div class="row">
                <div class="col-md-9">
                    @yield('content')
                </div>
                <div class="col-md-3">
                    @include('blog::layouts._sidebar')
                </div>
            </div>
        </div>
    </main>

    @include('blog::layouts._footer')
    
    <script src="/vendor/inn-blog/js/app.js"></script>
    {!! blog_setting('script') !!}
</body>

</html>
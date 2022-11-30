<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Progress</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- LINE AWESOME -->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol:wght@700&family=Kosugi+Maru&family=Merriweather&family=Share+Tech+Mono&display=swap" rel="stylesheet">

        <!-- Lordicon -->
        <script src="https://cdn.lordicon.com/pzdvqjsp.js"></script>

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('image/favicon.svg') }}">

    </head>
    <body style="font-family:Kosugi Maru" class="bg-gray-100">
        <div class="min-h-screen px-5">
            <div class="grid grid-cols-12">
                <p class="col-span-12 text-4xl text-green-600">ミエル</p>
            </div>
            @if (Route::has('login'))
                <div class="grid grid-cols-12 mt-20">
                    @auth
                        <a href="{{ route('post_list.index') }}" class="col-start-2 col-span-10 text-6xl text-center bg-gray-300 h-60 py-20 rounded-lg">ホーム</a>
                    @else
                        <a href="{{ route('login') }}" class="col-start-2 col-span-10 text-6xl text-center bg-gray-300 h-60 py-20 rounded-lg">ログイン</a>
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>

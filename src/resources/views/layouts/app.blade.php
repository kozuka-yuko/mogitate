<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>

<body>
    <div class="header">mogitate</div>
    <div class="message">
        @if (session('result'))
        <div class="message__inner">
            {{ session('result') }}
        </div>
        @php
        session()->forget('result');
        @endphp
        @endif

        @if (session('error'))
        <div class="message__inner--error">
            {{ session('error') }}
        </div>
        @php
        session()->forget('error');
        @endphp
        @endif
    </div>
    <div class="content">
        @yield('content')
    </div>
    <script type="module" src="js/main.js"></script>
</body>

</html>
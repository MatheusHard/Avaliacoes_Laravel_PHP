<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <title>Cadastro de Cidades</title>
        <style>
            body{
                padding: 20px;
            }
            .navbar {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @component('components.navbar', ["current"=>$current])
                
            @endcomponent
            <main role="main">
                @hassection('body')
                    @yield('body')
                @endif    
            </main>
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                <router-link to="/" class="nav-link">Builderall</router-link>
            </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <!-- Routa da pagina inicial-->
                            <router-link to="/" class="nav-link">Home</router-link>
                        </li>
                        <li class="nav-item active">
                             <router-link to="/pokemons" class="nav-link">Lista de Pokemons</router-link>
                        </li>
                    
                    </ul>

                </div>
           </nav>
           <div class="container my-5">
                <router-view></router-view>
            </div> <!-- Fin de Container -->
        </div><!-- FIn de Div App-->
        
    </body>
    <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>

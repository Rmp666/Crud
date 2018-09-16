<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <script src="{{asset('js/manifest.js')}}"></script>
		<script src="{{asset('js/vendor.js')}}"></script>
		<link href ="{{asset('css/all.css')}}" rel="stylesheet">
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand">Paper</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#/">Home</a></li>
                    <li class="active"><a href="#/create">Create Paper</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div class="container container-app">
        <div id="app" >
            <router-view name="IndexComponent"></router-view>
            <router-view></router-view>
        </div>
    </div>
    <footer class=" footer text-center label-default text-light">
        <h6>&copy; Papers 2018</h6>
    </footer>
    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>

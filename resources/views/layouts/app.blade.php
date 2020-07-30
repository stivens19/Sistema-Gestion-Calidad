<!doctype html>
<html lang="en">
    @include('partials._body_style')
    <body>
        <!-- loader Start -->
        <div id="loading">
    <div id="loading-center">
        <div class="loader">
            <div class="cube">
                <div class="sides">
                    <div class="top"></div>
                    <div class="right"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="front"></div>
                    <div class="back"></div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="wrapper">
        @include('partials._app_header')
        @include('partials._body_left_sidebar')
        <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                <div class="col-sm-12">
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    @yield('content')
                </div>
               </div>
            </div>
        </div>
    </div>
  
   
    @include('partials._body_footer')
    @yield('scripts')
    </body>

</html>

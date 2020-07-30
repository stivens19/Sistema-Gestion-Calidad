@include('partials._body_style')

<section class="sign-in-page bg-white">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-sm-6 align-self-center">
                <div class="sign-in-from">
                    <h1 class="mb-0">Ingresar</h1>
                    <p>Ingrese sus credenciales para acceder</p>
                    <form class="mt-4" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>

                            <input type="email" id="email" class="form-control mb-0 @error('email') is-invalid @enderror" placeholder="Ingrese su correo"name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" id="password" placeholder="Contraseña:" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="d-inline-block w-100">
                            <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                <input type="checkbox" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }} name="remember">
                                <label class="custom-control-label" for="remember">Recordarme</label>
                            </div>
                            <button type="submit" class="btn btn-warning float-right">Ingresar</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 text-center">
                <div class="sign-in-detail text-white" style="background: url(assets/images/login/fondo2.jpg) no-repeat 0 0; background-size: cover;">
                    <div class="mb-1" style="background: rgba(0,0,0,.4);">
                        <a class="sign-in-logo" href="#"><img src={{asset("assets/images/logo-fis.png")}} class="img-fluid" alt="logo"><h2 class="ml-2 d-inline text-white">FIS-UNCP</h2></a>
                    </div>
                   
                    <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                        <div class="item">
                            <img src={{asset("assets/images/login/fondo-login.jpg")}} class="img-fluid mb-4" alt="logo">
                            <div class="mb-1" style="background: rgba(0,0,0,.4);">
                            <h4 class="mb-1 text-white">Gestion de documentos</h4>
                            <p>Gestionar los documentos de una manera sencilla y eficaz</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src={{asset("assets/images/login/1.png")}} class="img-fluid mb-4" alt="logo">
                            <div class="mb-1" style="background: rgba(0,0,0,.4);">
                                <h4 class="mb-1 text-white">Gestion de archivos</h4>
                                <p>Tus archivos al alcance de un click</p>
                            </div>
                            
                        </div>
                        <div class="item">
                            <img src={{asset("assets/images/login/fondo3.jpeg")}} class="img-fluid mb-4" alt="logo">
                            <div class="mb-1" style="background: rgba(0,0,0,.4);">
                            <h4 class="mb-1 text-white">Ingenieria de sistemas</h4>
                            <p>Acreditada por SINEACE</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials._body_scripts')



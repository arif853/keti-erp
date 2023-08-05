<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{asset('main/images/favicon_1.ico')}}">

        <title>Keti ERP- Complete solution for you business</title>

        <!-- Base Css Files -->
        <link href="{{asset('main/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Custom Files -->
        <link href="{{asset('main/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('main/css/style.css')}}" rel="stylesheet" type="text/css" />

    </head>
    <body>

        <div class="bg-overlay-2"></div>
        <div class="wrapper-page ">
            <div class="panel panel-color panel-primary panel-pages ">
                <div class="panel-heading bg-img">
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>KETI</strong> </h3>
                </div>
                <div class="panel-body bg-white">

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control input-lg " type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="form-control input-lg" type="password" name="password"
                                required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-30">
                            <div class="col-sm-7">
                                <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                            <div class="col-sm-5 text-right">
                                <a href="{{route('register')}}">Create an account</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>



    	<script>
            var resizefunc = [];
        </script>
    	<script src="{{asset('main/js/jquery.min.js')}}"></script>
        <script src="{{asset('main/js/bootstrap.min.js')}}"></script>

        <!-- CUSTOM JS -->
        <script src="{{asset('main/js/jquery.app.js')}}"></script>

	</body>
</html>

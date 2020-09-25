<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>PaywithBank Sample</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col d-flex justify-content-center ">

                    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal jumbotron shadow-lg p-5" role="form">
                        <div class="mb-5">
                            <label style="font-size: 4vw"> Infinity Biscuit </label>
                        </div>

                        <input type="hidden" name="email" value="infinitypaul@live.com"> {{-- required --}}
                        <input type="hidden" name="name" value="Edward Paul">
                        <input type="hidden" name="phone" value="0702323463">
                        <input type="hidden" name="amount" value="1000"> {{-- required --}}
                        <input type="hidden" name="reference" value="2330456"> {{-- required --}}
                        <input type="hidden" name="currency" value="NGN"> {{-- required --}}
                        <input type="hidden" name="metadata[orderId]" value="12345"> {{-- required --}}

                        <input type="hidden" name="returnUrl" value="{{ route('callback') }}"> {{-- required --}}


                        {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


                        <p>
                            <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                            </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

@extends('layouts.site')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <main class="login-form">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header">Reset Password</div>

                        <div class="card-body">



                            <form action="{{ route('reset.password.form') }}" method="POST">

                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">



                                <div class="form-group row">

                                    <label for="DS_EMAIL" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">

                                        <input type="text" id="DS_EMAIL" class="form-control" name="DS_EMAIL" autofocus>

                                        @error('DS_EMAIL')

                                            <span class="required__login text-danger">{{ $message }}</span>

                                        @enderror

                                    </div>

                                </div>



                                <div class="form-group row">

                                    <label for="DS_SENHA" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">

                                        <input type="password" id="DS_SENHA" class="form-control" name="DS_SENHA" autofocus>

                                        @error('DS_SENHA')

                                            <span class=" required__login text-danger">{{ $message }}</span>

                                        @enderror

                                    </div>

                                </div>



                                <div class="form-group row">

                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                    <div class="col-md-6">

                                        <input type="password" id="DS_SENHA_confirmation" class="form-control" name="DS_SENHA_confirmation"  autofocus>

                                        @error('DS_SENHA_confirmation')

                                            <span class="required__login text-danger">{{ $message }}</span>

                                        @enderror

                                    </div>

                                </div>



                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="button button_primary btn btn-primary">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

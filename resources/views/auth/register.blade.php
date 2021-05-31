@extends('template')
@section('composer')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Nouveau utilisateur</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="/doregister" method="POST">
                        <fieldset>
                            @csrf
                            <div class="form-group">
                                <input class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" type="text" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" name="email" type="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control @error('password') is-invalid @enderror"" placeholder="Password" name="password" type="password" value="">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control @error('password') is-invalid @enderror"" placeholder="Confirm password" name="password_confirmation" type="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="Rpermissions">
                                    <option>Admin</option>
                                    <option>Visiteur</option>
                                    <option>Comptable</option>
                                    <option>Aucun acces</option>
                                </select>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Enregistrer</button>
                            </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

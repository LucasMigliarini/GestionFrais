@extends('template')
@section('composer')
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Validation</h1>
                        </div>
                    @include('flash-message')
                        <!-- /.col-lg-12 -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/doedituser/{{$user->id}}" method="POST">
                                        @csrf
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Nom</span>
                                            <input type="text" class="form-control" placeholder="{{$user->name}}" readonly="">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Email</span>
                                            <input type="text" class="form-control" placeholder="{{$user->email}}" readonly="">
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
                                        <button type="submit" class="btn btn-primary">Valider</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

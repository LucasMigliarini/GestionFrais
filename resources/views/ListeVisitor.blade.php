@extends('template')
@section('composer')
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Visiteurs</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Frais Forfaitaires
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Email</th>
                                                    <th>fiches en attente de validation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr class="odd gradeX">
                                                    <td>{{$user->User->name}}</td>
                                                    <td>{{$user->User->email}}</td>
                                                    <td><a href="/showfiche/{{$user->User->id}}">fiches en attente</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
@endsection

@extends('template')
@section('composer')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste utilisateurs</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @include('flash-message')
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
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Editer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="odd gradeX">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->roles->permissions->libelle}}</td>
                                    <td><a href="/edituser/{{$user->id}}"><i class="fa fa-fw" aria-hidden="true" title="Copy to use pencil-square">&#xf14b</i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

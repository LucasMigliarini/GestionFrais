@extends('template')
@section('composer')
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Visiteurs</h1>
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
                                                    <th>Nom</th>
                                                    <th>Janvier</th>
                                                    <th>Fevrier</th>
                                                    <th>Mars</th>
                                                    <th>Avril</th>
                                                    <th>Mai</th>
                                                    <th>Juin</th>
                                                    <th>Juillet</th>
                                                    <th>Aout</th>
                                                    <th>Septembre</th>
                                                    <th>Octobre</th>
                                                    <th>Novembre</th>
                                                    <th>Decembre</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            {{$i = 0}}
                                            @foreach($users as $user)

                                                <tr class="odd gradeX">
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$janvier[$i]}}</td>

                                                </tr>
                                                {{$i = $i +1}}
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
@endsection

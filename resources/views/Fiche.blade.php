
@extends('template')
@section('composer')
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Fiches</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">

                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Visiteur</th>
                                                    <th>Date</th>
                                                    <th>Situation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($remboursement as $fiche)
                                                <tr class="odd gradeX">
                                                    <td>{{$fiche->id}}</td>
                                                    <td>{{$fiche->User->name}}</td>
                                                    <td>{{$fiche->date}}</td>
                                                    <td><a href="/showfrais/{{$fiche->id}}">{{$fiche->etat->libelle}}</a></td>
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
@endsection

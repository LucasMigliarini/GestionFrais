
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
                                        <table class="table table-hover" id="dataTables-example">
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
                                                    <td><a href="/showfraisvisitor/{{$fiche->id}}">{{$fiche->etat->libelle}}</a></td>
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
                        <a href="/shownewfiche/"><button type="submit" class="btn btn-success">Nouvelle fiche</button></a>
                        <!-- /.col-lg-12 -->
@endsection
@section('js')
                            <script src="../js/jquery.min.js"></script>

                            <!-- Bootstrap Core JavaScript -->
                            <script src="../js/bootstrap.min.js"></script>

                            <!-- Metis Menu Plugin JavaScript -->
                            <script src="../js/metisMenu.min.js"></script>

                            <!-- DataTables JavaScript -->
                            <script src="../js/dataTables/jquery.dataTables.min.js"></script>
                            <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

                            <!-- Custom Theme JavaScript -->
                            <script src="../js/startmin.js"></script>

                            <!-- Page-Level Demo Scripts - Tables - Use for reference -->
                            <script>
                                $(document).ready(function() {
                                    $('#dataTables-example').DataTable({
                                        responsive: true
                                    });
                                });
                            </script>
@endsection

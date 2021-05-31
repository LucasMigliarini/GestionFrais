@extends('template')
@section('composer')
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Frais de {{$remboursement->User->name}}</h1>
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
                                                    <th>Date</th>
                                                    <th>Quantite</th>
                                                    <th>Libelle</th>
                                                    <th>Situation</th>
                                                    <th>validation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($remboursement->FraisForfaitaire as $fraisforfaitaire)
                                                <tr class="odd gradeX">
                                                    <td>{{$fraisforfaitaire->date}}</td>
                                                    <td>{{$fraisforfaitaire->quantite}}</td>
                                                    <td>{{$fraisforfaitaire->Frais->libelle}}</td>
                                                    <td>{{$fraisforfaitaire->situation}}</td>
                                                    <td><a href="/editfrais/{{$fraisforfaitaire->id}}"><i class="fa fa-fw" aria-hidden="true" title="Copy to use pencil-square">&#xf14b</i></a></td>
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


                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Hors Frais
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Montant</th>
                                                <th>Libelle</th>
                                                <th>Situation</th>
                                                <th>validation</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($remboursement->HorsFrais as $horsfrais)
                                                <tr class="odd gradeX">
                                                    <td>{{$horsfrais->date}}</td>
                                                    <td>{{$horsfrais->montant}}</td>
                                                    <td>{{$horsfrais->libelle}}</td>
                                                    <td>{{$horsfrais->situation}}</td>
                                                    <td><a href="/edithorsfrais/{{$horsfrais->id}}"><i class="fa fa-fw" aria-hidden="true" title="Copy to use pencil-square">&#xf14b</i></a></td>
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
                </div>
                <a href="/veriffrais/{{$remboursement->id}}"><button type="submit" class="btn btn-success">Valider</button></a>
                <a href="/verifefrais/{{$remboursement->id}}"><button type="button" class="btn btn-danger">Refuser</button></a>
            </div>
@endsection

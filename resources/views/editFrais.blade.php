@extends('template')
@section('composer')
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Validation</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/doeditfrais/{{$frais->id}}" method="POST">
                                        @csrf
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Date</span>
                                            <input type="text" class="form-control" placeholder="{{$frais->date}}" readonly="">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Quantité</span>
                                            <input type="text" class="form-control" placeholder="{{$frais->quantite}}" readonly="">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Libelle</span>
                                            <input type="text" class="form-control" placeholder="{{$frais->Frais->libelle}}" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label>Situation</label>
                                            <select class="form-control" name="situation">
                                                <option>Valider</option>
                                                <option>Refuser</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Valider</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

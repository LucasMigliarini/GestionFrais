@extends('template')
@section('css')
    <link href={{URL::asset("css/formulaire.css")}} rel="stylesheet" type="text/css">
@endsection
@section('composer')

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Validation</h1>
                        </div>
                    </div>
                        <!-- /.col-lg-12 -->
                        <div class="panel-body">
                            <div class="row">
                                    <form role="form" action="/newfrais/" method="POST" >
                                        @csrf
                                        <p>Fraits Forfaitaires</p>
                                        <div class="formulaire">
                                            <div class="form-group input-group col-lg-3">
                                                <span class="input-group-addon">Nuitée</span>
                                                <input type="text" class="form-control" placeholder="" name="nuitee">
                                            </div>
                                            <div class="form-group input-group col-lg-3">
                                                <span class="input-group-addon">Repas</span>
                                                <input type="text" class="form-control" placeholder="" name="repas">
                                            </div>
                                            <div class="form-group input-group col-lg-3">
                                                <span class="input-group-addon">Km</span>
                                                <input type="text" class="form-control" placeholder="" name="km">
                                            </div>
                                        </div>
                                        <p>Hors Fraits</p><button id="btn+" type="button" class="btn btn-primary" onClick="addRow();">Ajouter</button><br><br>
                                        <div class="formulaire2" id="formulaire2">

                                            <div class="form-group input-group col-lg-2">
                                                <span class="input-group-addon">Description</span>
                                                <input type="text" class="form-control" placeholder="" name="description[]">
                                            </div>
                                            <div class="form-group input-group col-lg-2">
                                                <span class="input-group-addon">Montant</span>
                                                <input type="text" class="form-control" placeholder="" name="montant[]">
                                            </div>

                                        </div>
                                        <div id="content"></div>

                                        <button class="button" type="submit" class="btn btn-primary">Valider</button>
                                    </form>
                            </div>
                        </div>

@endsection
@section('js')
    <script type="text/javascript">
        function addRow () {
            document.querySelector('#content').insertAdjacentHTML(
                'afterbegin',
                `
                        <div class="formulaire2" id="formulaire2">

                                            <div class="form-group input-group col-lg-2">
                                                <span class="input-group-addon">Description</span>
                                                <input type="text" class="form-control" placeholder="" name="description[]">
                                            </div>


                                            <div class="form-group input-group col-lg-2">
                                                <span class="input-group-addon">Montant</span>
                                                <input type="text" class="form-control" placeholder="" name="montant[]">
                                            </div>

                                            <button class="btn btn-primary button" type="button" onClick="removeRow(this);">Suppimer</button>
                                        </div>
                                        </div>
                `
            )
        }

        function removeRow (input) {
            input.parentNode.remove()
        }
    </script>
@endsection

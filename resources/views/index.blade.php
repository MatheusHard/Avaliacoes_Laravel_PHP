@extends('layout.app', ["current"=>"home"])

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Cidades</h5>
                            <p class="card-text">
                            Cadastres tuas cidades, cu de grude
                            </p>
                            <a href="/cidades" class="btn btn-primary">Cadastre suas Cidades</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
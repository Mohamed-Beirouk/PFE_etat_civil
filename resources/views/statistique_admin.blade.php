@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
.card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 15px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-grey {
    background-color: #696969 !important;
}
.bg-skyblue {
    background-color: #8FBC8F !important;
}
</style>
@section('content')
<div class="container">
        <div class="row">
        <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3>  {{$dossiers}} </h3>
                        <p>Nombre de Dossiers </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-folder" aria-hidden="true"></i>
                    </div>
                    <a href="{{route('stat_dossiers')}}" class="card-box-footer">détails <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3>  {{$users}} </h3>
                        <p> Citoyens</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <a href="{{route('gestion_registes')}}" class="card-box-footer">voir <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3>  {{$mariage}} </h3>
                        <p> Actes de Mariage </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <a href="{{route('gestion_actes')}}" class="card-box-footer">Voir <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-grey">
                    <div class="inner">
                        <h3> {{$divorce}} </h3>
                        <p> Actes de Divorces </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{route('gestion_actes')}}" class="card-box-footer">Voir<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-12 col-sm-6">
                <div class="card-box bg-skyblue">
                    <div class="inner">
                        <h3>  {{$dece}} </h3>
                        <p> Actes de naissances </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{route('gestion_actes')}}" class="card-box-footer">voir<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
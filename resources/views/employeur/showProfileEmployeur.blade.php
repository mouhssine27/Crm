@extends('layouts.EmplyeurDashboard')
@section('content')
<!--  BEGIN CONTENT AREA  -->
<div class="main-content">
    
    <div class="layout-px-spacing">
        @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @endforeach
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session('success') }}
    </div>
    @endif
    @if (Session::has('alert'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session('alert') }}
    </div>
    @endif

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                    data-offset="-100">
                    <form method="POST" action="{{ route('UpdatepProfileEmployeur',$employeur->id )}}" id="general-info" class="section general-info" >
                        @csrf
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                          
                                <div class="info">
                                    <h6 class="">General Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Nom</label>
                                                                    <input type="text" class="form-control mb-4"  id="nom" placeholder="Votre nom" name="nom"value="{{ $employeur->nom }}" required>  
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input">Date de naissance</label>
                                                                <input type="date" class="form-control mb-4" name="dateNaissance"
                                                                    id="dateNaissance" value="{{$employeur->date_naissance}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email">email</label>
                                                                    <input type="email" class="form-control mb-4"
                                                                        id="email" placeholder="Votre email" name="email"
                                                                        value="{{ $employeur->email }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="phone">Téléphone</label>
                                                                    <input type="text" class="form-control mb-4" name="phone"
                                                                        id="phone" placeholder="Numéro de téléphone"
                                                                        value="{{ $employeur->phone }}" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                           
                                <div class="info">
                                    <h5 class="">About</h5>
                                    <div class="row">
                                        <div class="col-md-11 mx-auto">
                                            <div class="form-group">
                                                <label for="aboutBio">Adresse</label>
                                                <textarea class="form-control" id="aboutBio" name="adresse"
                                                    placeholder="Saisir votre adresse"
                                                   >{{ $employeur->adresse }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success"> Sauvegarder </button>
                    </div>
                   
                    </form>
                </div>
            </div>
            <!--  END CONTENT AREA  -->
@endsection
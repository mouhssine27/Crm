@extends('layouts.AdminDashboard')

@section('content')

<div class="row layout-top-spacing" id="cancel-row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
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

        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal"
                data-target="#addEntreprise">Ajouter</button>
        </div>
     

        @include('partials.poupup.addEntreprise')
        <div class="widget-content widget-content-area br-6">
            <form method="get" action="{{ route('filtreEntreprise') }}">
                <div class="d-flex justify-content-between my-5">
                    <div>
                        <input type="text"  @if(isset($filter['nom'] )) value="{{ $filter['nom'] }}"@endif 
                            class="w-100 form-control product-search br-30" name="nom" id="input-search"
                            placeholder="nom d'entreprise">
                    </div>
                   
                    <button type="submit" class="btn btn-warning mb-2 mr-2 btn-rounded">Search <svg> ... </svg></button>
                </div>
            </form>
            <table id="zero-config" class="table dt-table-hover" style="width:100%">

                <thead>
                    <tr>
                        <th>Nom d'entreprise</th>
                        <th>Nom Administrateur</th>

                        <th class="no-content">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entreprises as $entreprise)
                    <tr>
                        <td>{{ $entreprise->nom}}</td>
                        <td>{{ $entreprise->user->name }}</td>
                        <td>
                            <a  data-toggle="modal"data-target="#editEntreprise{{ $entreprise->id }}"><i style="font-size: 20px" class="fa fa-pencil-square-o"></i></a>
                            
                            <a data-toggle="modal"data-target="#deleteEntreprise{{ $entreprise->id  }}"><i style="font-size: 20px" class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                      @include('partials.poupup.editEntreprise',['entrepriseId'=>$entreprise->id])
                      @include('partials.poupup.deleteEntreprise',['entrepriseId'=>$entreprise->id])
                    @endforeach
                </tbody>
            </table>
          
            
                
        </div>
    </div>


</div>
@endsection

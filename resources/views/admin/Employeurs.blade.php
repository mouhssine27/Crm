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
                data-target="#addEmployeur">Ajouter</button>
        </div>
     

        @include('partials.poupup.addEmployeur')

        <div class="widget-content widget-content-area br-6">
            <table id="zero-config" class="table dt-table-hover" style="width:100%">

                <thead>
                    <tr>
                        <th>Nom de employeur</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Télephone</th>
                        <th>Date de naissance</th>
                        <th>Entreprise</th>
                        <th>Invitation</th>
                        <th>Etat de compte</th>
                        <th class="no-content">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employeurs as $employeur)
                    <tr>
                        <td>{{ $employeur->nom }}</td> 
                        <td>{{ $employeur->email }}</td>
                        @if(isset($employeur->adresse ))
                        <td> {{ $employeur->adresse }}</td>
                        @else
                        <td> vide</td>
                        @endif
                        @if(isset($employeur->phone ))
                        <td>{{ $employeur->phone }}</td>
                        @else
                        <td>vide</td>
                        @endif
                        @if(isset($employeur->date_naissance ))
                        <td>{{ $employeur->date_naissance }}</td>
                        @else
                        <td>vide</td>
                        @endif
                        <td>{{ $employeur->entreprise->nom }}</td>
                        @if($employeur->status == 0)
                        <td><span class="badge badge-warning"> En attent de confirmation </span></td>
                        @elseif($employeur->status == 1)
                        <td><span class="badge badge-success"> confirmé </span></td>
                        @else
                        <td><span class="badge badge-danger"> Annulé </span></td>
                        @endif
                        @if($employeur->is_verified == 0)
                        <td><span class="badge badge-danger"> Pas vérifier </span></td>
                        @elseif($employeur->is_verified == 1)
                        <td><span class="badge badge-success"> Vérifier</span></td>
                        @else
                        <td><span class="badge badge-warning"> En cour de vérifier</span></td>
                        @endif
                        <td>
                            <a  data-toggle="modal"data-target="#editEmployeur{{ $employeur->id }}"><i style="font-size: 20px" class="fa fa-pencil-square-o"></i></a>
                            {{-- <a data-toggle="modal"data-target="#deleteParcelle"><i style="font-size: 20px" class="fa fa-trash-o"></i></a> --}}
                        </td>
                    </tr>
                      @include('partials.poupup.editEmployeur',['employeurId'=>$employeur->id])
                      {{-- @include('poupup.deleteParcelle',["parcelleId"=>$parcelle->id]) --}}
                    @endforeach
                </tbody>
            </table>
          
            
                
        </div>
    </div>


</div>
@endsection

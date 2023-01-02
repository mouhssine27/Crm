@extends('layouts.EmplyeurDashboard')

@section('content')
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <table id="zero-config" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Date de naissance</th>
                                    <th>nom D'entreprise</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $getInfos as $getInfo )
                                <tr>
                                    <td>{{ $getInfo-> nom }}</td>
                                    <td>{{ $getInfo -> adresse }}</td>
                                    <td>{{ $getInfo -> email }}</td>
                                    <td>{{ $getInfo -> phone }}</td>
                                    <td>{{ $getInfo -> date_naissance }}</td>
                                    <td>{{ $nomEntreprise}}</td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection

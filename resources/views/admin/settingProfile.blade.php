@extends('layouts.AdminDashboard')

@section('content')
<!--  BEGIN CONTENT AREA  -->
<div class="main-content">
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                    data-offset="-100">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="general-info" class="section general-info">
                                <div class="info">
                                    <h6 class="">General Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        {{-- <input type="file" id="input-file-max-fs" class="dropify"
                                                            data-default-file="assets/img/200x200.jpg"
                                                            data-max-file-size="2M" /> --}}
                                                        {{-- <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            Upload Picture</p> --}}
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Nom</label>
                                                                    <input type="text" class="form-control mb-4"
                                                                        id="nom" placeholder="Votre nom"
                                                                        value="Jimmy Turner">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input">Date de naissance</label>
                                                                <input type="date" class="form-control mb-4"
                                                                    id="dateNaissance">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email">email</label>
                                                                    <input type="email" class="form-control mb-4"
                                                                        id="email" placeholder="Votre email"
                                                                        value="mouhssinetchoubi@gmail.com">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="phone">Téléphone</label>
                                                                    <input type="text" class="form-control mb-4"
                                                                        id="phone" placeholder="Numéro de téléphone"
                                                                        value="+212637822538">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="about" class="section about">
                                <div class="info">
                                    <h5 class="">About</h5>
                                    <div class="row">
                                        <div class="col-md-11 mx-auto">
                                            <div class="form-group">
                                                <label for="aboutBio">Adresse</label>
                                                <textarea class="form-control" id="aboutBio"
                                                    placeholder="Tell something interesting about yourself"
                                                    rows="10">I'm Creative Director and UI/UX Designer from Sydney, Australia, working in web development and print media. I enjoy turning complex problems into simple, beautiful and intuitive designs.

My job is to build your website so that it is functional and user-friendly but at the same time attractive. Moreover, I add personal touch to your product and make sure that is eye-catching and easy to use. My aim is to bring across your message and identity in the most creative way. I created web design for many famous brand companies.</textarea>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
            </div>
            <!--  END CONTENT AREA  -->

            @endsection

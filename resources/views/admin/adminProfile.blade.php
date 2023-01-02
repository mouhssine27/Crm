  @extends('layouts.AdminDashboard')

  @section('content')
  <!--  BEGIN CONTENT AREA  -->
  <div id="content" class="main-content">
      

          <div class=" layout-spacing">

              <!-- Content -->
              <div class=" layout-top-spacing">

                  <div class="user-profile layout-spacing">
                      <div class="widget-content widget-content-area">
                          <div class="d-flex justify-content-between">
                              <h3 class="">Profile</h3>
                              <a  class="mt-2 edit-profile"></a>
                          </div>
                          <div class="text-center user-info">
                              {{-- <img src="assets/img/90x90.jpg" alt="avatar"> --}}
                              <p class="">{{ $admin->name }}</p>
                          </div>
                          <div class="user-info-list">

                              <div class="">
                                  <ul class="contacts-block list-unstyled">
                                      <li class="contacts-block__item">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"
                                              class="feather feather-coffee">
                                              <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                              <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                              <line x1="6" y1="1" x2="6" y2="4"></line>
                                              <line x1="10" y1="1" x2="10" y2="4"></line>
                                              <line x1="14" y1="1" x2="14" y2="4"></line>
                                          </svg> Administrateur
                                      </li>
                                    
                                   
                                      <li class="contacts-block__item">
                                          <a style="font-size: 12px !important" href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg"
                                                  width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                  stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round" class="feather feather-mail">
                                                  <path
                                                      d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                  </path>
                                                  <polyline points="22,6 12,13 2,6"></polyline>
                                              </svg>{{ $admin->email }}</a>
                                      </li>
                                      
                                    
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>

                
              </div>

            

          </div>
      
     

  </div>
  <!--  END CONTENT AREA  -->

  @endsection

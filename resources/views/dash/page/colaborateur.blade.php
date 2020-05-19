@extends('layouts.dash')
@section('contents')
<!-- Main content -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-users"></i> Colaborateurs</a></li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row ">

            <div class="col-xl-6 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col text-center">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Employees</h5>
                        <div class="col-auto add-button">
                          <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni-single-02"></i>
                          </div>
                        </div>
                      <span class="h2 font-weight-bold mb-0 ">350,897</span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3 +</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col text-center">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Stagaire</h5>
                      <div class="col-auto add-button">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                          <i class="ni ni-single-02"></i>
                        </div>
                      </div>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 6 +</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="add-button">
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                <i class="fa fa-users mr-2"></i>Employees liste
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                <i class="fa fa-users mr-2"></i>Stagaires liste
                            </a>
                        </li>
                    </ul>
                </div>
              </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                         <div class="add-button">
                           <a href="{{route("colaborateur.create",["type"=>"employee"])}}">
                            <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#employeeform">
                              <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                              <span class="btn-inner--text">New employees</span>
                            </button>
                           </a>
                         </div>
                         <!---- employees tables --->
                         <div class="row">
                              <div class="table-responsive">
                                <table class="table align-items-center table-flush" id="tabemp">
                                  <thead class="thead-light">
                                    <tr>
                                      <th><i class="ni ni-badge"></i> CIN</th>
                                      <th><i class="ni ni-single-02"></i> NOM</th>
                                      <th><i class="ni ni-single-02"></i> PRENOM</th>
                                      <th><i class="fa fa-calendar"></i> naissance</th>
                                      <th><i class="ni ni-email-83"></i> Mail</th>
                                      <th><i class="ni ni-mobile-button"></i> Tele </th>
                                      <th><i class="ni ni-building"></i> Adresse</th>
                                      <th><i class="ni ni-briefcase-24"></i> Tache</th>
                                      <th><i class="ni ni-briefcase-24"></i> Action</th>
                                    </tr>
                                  </thead>
                                  <tbody class="list">
                                    @for ($i = 0; $i < 100; $i++)
                                    <tr>
                                    <th data-toggle="tooltip" data-placement="left" title="profile"><a href="{{route('colaborateur.show',[12,"type"=>"employee"])}}">DE987{{$i}}64</a></th>
                                      <th>BILLAL</th>
                                      <th>EL MAALMI</th>
                                      <th>03-03-200</th>
                                      <th>billal@feen-tech.com</th>
                                      <th>+2126155464</th>
                                      <th>29 marjane</th>
                                      <th>IT</th>
                                      <td class="table-actions">
                                        <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
                                          <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
                                          <i class="fas fa-trash"></i>
                                        </a>
                                      </td>
                                    </tr> 
                                    @endfor
                                  </tbody>
                                </table>
                            </div>
                    </div>
                  </div>
                <!---- end tab employees ---->
                <!---- tab stagaire ---->
                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                  <div class="add-button">
                    <a href="{{route("colaborateur.create",["type"=>"stagaire"])}}">
                      <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#stagaireform">
                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                        <span class="btn-inner--text">New Stagaire</span>
                      </button>
                    </a>
                   </div>

                   <div class="row">
                    <div class="table-responsive">
                      <table class="table align-items-center table-flush" id="tabstagaire">
                        <thead class="thead-light">
                          <tr>
                            <th><i class="ni ni-badge"></i> CIN</th>
                            <th><i class="ni ni-badge"></i> sexe</th>
                            <th><i class="ni ni-single-02"></i> NOM</th>
                            <th><i class="ni ni-single-02"></i> PRENOM</th>
                            <th><i class="fa fa-calendar"></i> naissance</th>
                            <th><i class="ni ni-email-83"></i> Mail</th>
                            <th><i class="ni ni-mobile-button"></i> Tele </th>
                            <th><i class="ni ni-building"></i> Adresse</th>
                            <th><i class="ni ni-briefcase-24"></i> Departement</th>
                            <th><i class="ni ni-tag"></i> ID-encadrant</th>
                            <th><i class="ni ni-briefcase-24"></i> Action</th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          @for ($i = 0; $i < 100; $i++)
                          <tr>
                            <th><a href="">DE987664</a></th>
                            <th>M</th>
                            <th>BILLAL</th>
                            <th>EL MAALMI</th>
                            <th>03-03-2000</th>
                            <th>billal@feen-tech.com</th>
                            <th>+2126155464</th>
                            <th>29 marjane</th>
                            <th>IT</th>
                            <th>235</th>
                            <td class="table-actions">
                              <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
                                <i class="fas fa-user-edit"></i>
                              </a>
                              <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
                                <i class="fas fa-trash"></i>
                              </a>
                            </td>
                          </tr>
                          @endfor
                        </tbody>
                      </table>
                    </div>
                   </div>
                  </div>
              </div>
              <!---- end tab stagaire ---->
          </div>
      </div>
  </div>    
                          
@endsection

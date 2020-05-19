@extends('layouts.dash')

@section('contents')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-users"></i> Fournisseurs</a></li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-lg-6">
          <div class="card bg-gradient-default">
            <div class="card-body"> 
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total dépenses </h5>
                  <span class="h2 font-weight-bold mb-0 text-white">350,897</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                      <i class="ni ni-money-coins"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap text-light">Since last month</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card bg-gradient-default">
            <div class="card-body"> 
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Fournisseur</h5>
                  <span class="h2 font-weight-bold mb-0 text-white">350,897</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                    <i class="ni ni-circle-08"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 15</span>
                <span class="text-nowrap text-light">Since last month</span>
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
        <div class="card shadow">
          <div class="card-body">
            <div class="row ">
              <div class="col-8">
                <div id="container">
                  <a href="{{route("fournisseur.create")}}"> 
                    <button class="learn-more">
                      <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                      </span>
                      <span class="button-text">New Fournisseur</span>
                    </button>
                  </a>
                </div>
              </div>
              <div class="col-3">
                <form action="" class="form-search">
                  <input type="search" name="" placeholder="Search">
                  <i class="fa fa-search"></i>
                </form>
              </div>
            </div>
                  
            <div class="add-button">
              <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                      <i class="ni ni-support-16"></i> Liste des fournissuers
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                <div class="wrap">
                  <div class="card-ui">
                    <div class="card-liner">
                      <figure>
                        <img src="img\fournisseur\Maroc_Telecom_Logo.png" alt="" />
                      </figure>
                      <div class="card--social">
                        <ul>
                          <li class="twitter"><a href="fournisseur/12"><i class="ni ni-vector"></i></a></li>
                          <li class="linkedin"><a href="fournisseur/12"><i class="ni ni-vector"></i></a></li>
                        </ul>
                      </div>
                      <div class="card--title">
                        <h3>Maroctelecom</h3>
                        <p>Service de connection</p>
                      </div>
                      <div class="card--desc">
                        <hr>
                        <div class="add-button">
                          <div id="container">
                            <a href="{{route("fournisseur.create",["type"=>"service"])}}"> 
                              <button class="learn-more">
                                <span class="circle" aria-hidden="true">
                                  <span class="icon arrow"></span>
                                </span>
                                <span class="button-text">Nouveaux Service</span>
                              </button>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="card--btn">
                        <a href="fournisseur/12">
                          <span class="moreinfo"><i class="fa fa-info-circle"></i> More Info</span>
                          <span class="fullprof">Voire tout les facture</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-center mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>    
        </div>  
      </div>
    </div>
  </div>
</div>
@endsection
  


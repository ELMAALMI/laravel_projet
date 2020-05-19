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
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-users"></i> Produit</a></li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
      </div>
    </div>
</div>
<div class="container-fluid mt--6">
   <div class="row">
      <div class="col">
         <div class="card">
              <!-- Card header -->
              <div class="card shadow">
                  <div class="card-body">
                    <div class="row ">
                      <div class="col-8">
                        <div id="container">
                        <a href="{{route("produit.create")}}">
                          <button class="learn-more">
                            <span class="circle" aria-hidden="true">
                              <span class="icon arrow"></span>
                            </span>
                            <span class="button-text">New Produit</span>
                          </button>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="add-button">
                      <div class="nav-wrapper">
                          <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                      <i class="ni ni-bag-17"></i> Liste  Produits
                                  </a>
                              </li>
                          </ul>
                      </div>
                    </div>

                   
                         <div class="add-button">
                            <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="col-3">
                                    <div class="card p-3 text-center">
                                        <blockquote class="blockquote mb-0">
                                            <img src="img/produitlogo/logo1.png" width="70px">
                                        <footer class="blockquote-footer">
                                            <h3>Smart school</h3>
                                            <div class="add-button">
                                            <a href="produit/12"><button type="button" class="btn btn-default">Plus</button></a>                                            
                                            </div>
                                        </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            @endfor
                            </div>
                          </div>
                        </div>                            
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush text-center" id="tabemp">
                          <thead class="thead-light">
                            <tr>
                              <th><i class="ni ni-badge"></i> ID</th>
                              <th><i class="ni ni-single-02"></i> Nom</th>
                              <th><i class="ni ni-single-02"></i> Logo</th>
                              <th><i class="fa fa-calendar"></i> date debut</th>
                              <th><i class="fa fa-calendar"></i> date fin</th>
                              <th><i class="ni ni-mobile-button"></i> Etat </th>
                              <th><i class="ni ni-briefcase-24"></i> Action</th>
                            </tr>
                          </thead>
                          <tbody class="list">
                            @for ($i = 0; $i < 100; $i++)
                            <tr>
                              <th data-toggle="tooltip" data-placement="top" title="Plus"><a <a href="produit/12">DE987664</a></th>
                              <th>Smart school{{$i}}</th>
                              <th><img src="img/produitlogo/logo1.png" width="15px"></th>
                              <th>03-03-200</th>
                              <th>03-03-200</th>
                              <th>Conseption</th>
                              <td class="table-actions">
                                <a href=" {{route("produit.edit",12)}} " class="table-action" data-toggle="tooltip" data-original-title="Edit">
                                  <i class="fas fa-user-edit"></i>
                                </a>
                                <form action="{{route("produit.destroy",12)}}" method="POST">
                                  @method("DELETE")
                                  @csrf
                                  <button type="submit" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="supprimer">
                                    <i class="fas fa-trash"></i>
                                  </button>
                                </form>
                              </td>
                            </tr> 
                            @endfor
                          </tbody>
                        </table>
                    </div>
                  </div>    
              </div>  
         </div>
      </div>
   </div>
</div>
  
@endsection
  


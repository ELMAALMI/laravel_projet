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
              <li class="breadcrumb-item"><a href=" {{url("/home")}} "><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="#"><i class="ni ni-bullet-list-67"></i> Bilan</a></li>
            </ol>
          </nav>
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
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <div class="row">
                  <div class="col">
                    <div class="add-button">
                        <h2 class="heading mb-4 text-center"><i class="fa fa-mail-bulk"></i> Bilan Contable</h2>
                        <hr>
                    </div>
                    <form action=" {{route("bilan.store")}} " method="POST" >
                        @csrf
                        <div class="form-row mb-3">
                          <div class="row">
                            <div class="col mb-2">
                                <span>Bilan Par :</span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col"> 
                              <div class="custom-control custom-radio custom-control-inline">
                                <input onChange="this.form.submit()" type="radio" id="Mois" name="mois" checked class="custom-control-input">
                                <label class="custom-control-label" for="Mois">Mois</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                 <input onChange="this.form.submit()" type="radio" id="Année" name="annee" class="custom-control-input">
                                 <label class="custom-control-label" for="Année">Année</label>
                              </div>
                            </div>
                          </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                       <table class="table align-items-center table-flush" id="tabemp">
                          <thead class="thead-light">
                            <tr>
                              <th><i class="ni ni-badge"></i> ID</th>
                              <th><i class="fa fa-calendar"></i> date</th>
                              <th><i class="ni ni-money-coins"></i> Totale REVUNU</th>
                              <th><i class="ni ni-money-coins"></i> Totale DÉPENSES</th>
                              <th><i class="fa fa-plus"></i> Plus</th>
                            </tr>
                          </thead>
                          <tbody class="list">
                            @for ($i = 0; $i < 15; $i++)
                            <tr>
                                <th> {{$i}} </th>
                                <th>01-01-2020</th>
                                <th>2500 Dh</th>
                                <th>3500 Dh</th>
                                <th>dsf</th>
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
      </div> 
    </div>
  </div>
</div>   
@endsection
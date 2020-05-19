@extends('layouts.dash')
@section('contents')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Home</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{url('/projet')}}"">Facture </a></li>
              </li>
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
        <!-- Card header -->
        <div class="add-button">
          <div class="nav-wrapper">
              <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                          <i class="ni ni-building mr-2"></i>
                          Facture Detail
                      </a>
                  </li>
              </ul>
          </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
       @endif
<div class="card shadow">
    <div class="card-body">
      <div class="tab-content">
        <form class="needs-validation" action=" {{route("factures.update",$facture->facture_id)}} " method="POST" enctype="multipart/form-data" novalidate>
          @method("PUT")
          @csrf 
          <div class="add-button">
            <h6 class="heading-small text-muted mb-4"><i class="ni ni-bold-right"></i> Payments detail</h6>
          </div>
          <div class="form-row">
            <div class="col-md-6">
                <label for="payment"> Type de tpayment </label>
                <select class="custom-select" id="payment" name="type_payment" required>
                  <option @if($facture->type_payment == "versement")selected @endif value="versement">versement</option>
                  <option @if($facture->type_payment == "cheque")selected @endif value="cheque">cheque</option>
                  <option @if($facture->type_payment == "espece")selected @endif value="espece">espece</option>
                </select>
              <div class="invalid-feedback">
                Etat et required
              </div>
            </div>
            <div class="col-md-6">
              <label for="montements">Montements</label>
              <input type="text" class="form-control @error('montement') is-invalid-msg @enderror " id="montements" name="montement" value="{{$facture->montements ?? old("montement")}}" placeholder="1787" required>
              <div class="invalid-feedback">
                Montements et required
              </div>
              @error('montement')
                <span class="invalid-msg" role="alert">
                  <strong>{{ $message }}</strong>
                </span> 
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <label for="Avance">Avance</label>
              <input type="number" class="form-control" id="Avance" name="avance" value="{{$facture->avance}}"  placeholder="1787" required>
              <div class="invalid-feedback">
                Avance et required
              </div>
            </div>
            <div class="col-md-6">
             <label for="Reste">Reste</label>
              <input type="number" class="form-control" id="Reste" name="reste" value="{{$facture->reste}}" disabled required>
              <div class="invalid-feedback">
                Service et required
              </div>
            </div>
          </div>
          <div class="form-row mt-4">
            @foreach ($docs as $doc)
                <div class="col">
                    <img src="{{asset("storage/facture/".$doc->nom)}}" width="302px">
                </div>
            @endforeach
            <div class="w-100"></div>
            @foreach ($docs as $doc)
                <div class="col">
                    <input type="file" name="{{$doc->document_id}}" class="mt-1">
                </div>
            @endforeach
          </div>
          <hr>
          <div class="add-button">
            <div class="col">
              <button type="submit" class="btn btn-primary btn-lg btn-block">update</button>
            </div>
          </div>
    </form> 
   </div>
  </div>
</div>
@endsection
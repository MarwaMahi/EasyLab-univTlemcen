@extends('layouts.master')

@section('title','LRI | modifier partenaire')

@section('header_page')

      <h1>
        Partenaire
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{ url('partenaires')}}">partenaire</a></li>
        <li class="active">Modifier</li>
      </ol>

@endsection

@section('asidebar')

        <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li>
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li ><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>

         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>

         <li>
          <a href="{{url('articles')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>

       
        <li >
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
         
           <li class=" active" >
          <a href="{{url('partenaires')}}">
            <i class="fa fa-building-o"></i> 
            <span>Partenaires</span>
          </a>
        </li>

        
        <li>
          <a href="{{url('materiels')}}">
            <i class="fa fa-desktop"></i> 
            <span>Materiels</span>
          </a>
        </li>
        @if(Auth::user()->role->nom == 'admin' )

          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
        
          @endif


       @endsection

@section('content')
     
  <div class="row" style="padding-top: 30px">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action="{{url('partenaires/'.$partenaire->id)}}" method="post"  id="contact_form" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Modifier partenaire</b></h2></center></legend><br>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Nom</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="nom" class="form-control" value="{{$partenaire->nom}}" type="text">
                          </div>
                        </div>
                  </div>  


                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Type</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <select name="type" class="form-control select">
                              <option>{{$partenaire->type}}</option>
                              <option>Agro industries</option>
                              <option>Entreprise privée</option>
                              <option>Entreprise publique</option>
                            </select>
                          </div>
                        </div>
                  </div>

                    <div class="form-group ">
                        <label class="col-xs-3 control-label">Pays</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="pays" class="form-control" value="{{ $partenaire->pays}}" type="text">
                          </div>
                        </div>
                  </div> 

                     <div class="form-group ">
                        <label class="col-xs-3 control-label">Ville</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <select name="ville" class="form-control select">
                              <option>{{ $partenaire->ville}}</option>
                               <option>Tlemcen</option>
                              <option>Oran</option>
                              <option>Alger</option>
                              <option>Sidi Beleabes</option>
                              <option>Mustaganim</option>
                              <option>Anaba</option>
                            </select>
                          </div>
                        </div>
                  </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Logo</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <input name="logo" type="file">
                        </div>
                      </div>
                  </div>


              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <button type="submit" href="{{url('partenaires')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</button>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>
    
  @endsection
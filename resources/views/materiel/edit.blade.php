@extends('layouts.master')

@section('title','LRI | Modifier materiel')

@section('header_page')

      <h1>
        Materiels
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('materiels')}}">Materiels</a></li>
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
       
        <li>
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
          
           <li >
          <a href="{{url('partenaires')}}">
            <i class="fa fa-building-o"></i> 
            <span>Partenaires</span>
          </a>
        </li>
        <li class=" active">
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

            <form class="well form-horizontal" action="{{url('materiels/'.$materiel->id)}} " method="post"  id="contact_form" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Modifier materiel</b></h2></center></legend><br>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Numéro</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('numero')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="numero" class="form-control" value="{{ $materiel -> numero}}" type="text">
                            <span class="help-block">
                                @if($errors->get('numero'))
                                  @foreach($errors->get('numero') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div> 

                  <div class="form-group">
                    <label class="col-md-3 control-label">Categorie (*)</label>
                    <div class="col-md-9 inputGroupContainer @if($errors->get('categorie')) has-error @endif">
                      <div style="width: 70%">
                        <select name ="categorie"  class="form-control select2 " data-placeholder="Selectionnez une categorie" value="">
                          <option value="{{ $materiel->categorie->id }}"> {{$materiel->categorie->nom}} </option>
                          @foreach($categories as $categories)
                              <option value="{{$categories->id}}">{{$categories->nom}}</option>
                           @endforeach
                        </select>
                        <a href=" {{url('categories/create')}} " type="button" class="btn" data-toggle="modal"><i class="fa fa-plus"></i> Nouvelle catégorie</a>
                        <span class="help-block">
                                @if($errors->get('categorie'))
                                  @foreach($errors->get('categorie') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                        </span>
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                      <label class="col-md-3 control-label">Libellé</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('libelle')) has-error @endif">
                        <div style="width: 70%">
                          <textarea class="form-control" name="libelle" rows="3"> {{ $materiel -> libelle}}
                          </textarea>
                          <span class="help-block">
                                @if($errors->get('libelle'))
                                  @foreach($errors->get('libelle') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Affecté à </label>
                    <div class="col-md-9 inputGroupContainer ">
                      <div style="width: 70%">
                        <select name ="membre" class="form-control select2 " data-placeholder="Selectionnez un membre" value="">
                          <option value="@if($materiel->user_id)
                            {{$materiel->user->id}}
                            @endif">
                            @if($materiel->user_id)
                            {{$materiel->user->name}}
                            @endif 
                          </option>
                          <option></option>
                          @foreach($membres as $membre)
                          <option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
                           @endforeach                          
                        </select>
                        <label class="control-label">Ou</label>
                        <select name ="equipe"  class="form-control select2 " data-placeholder="Selectionnez une equipe" value="">
                          <option value="@if($materiel->equipe_id)
                            {{$materiel->equipe->id}}
                            @endif">
                             @if($materiel->equipe_id){{$materiel->equipe->intitule}}@endif
                          </option>
                          <option></option>
                          @foreach($equipes as $equipes)
                            <option value="{{$equipes->id}}">{{$equipes->intitule}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Date d'affectation</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="dateAffectation" class="form-control" value="{{ $materiel -> affected_at}}" type="text" placeholder="jj-mm-aaaa">
                          </div>
                        </div>
                  </div>  

                  </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('materiels')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>
    
  @endsection
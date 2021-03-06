@extends('layouts.master')

@section('title','LRI | Nouvelle categorie')

@section('header_page')

      <h1>
        categories
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="">Categories</a></li>
        <li class="active">Ajouter</li>
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

            <form class="well form-horizontal" action="{{url('categories')}}" method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}

              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouvelle categorie</b></h2></center></legend><br>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Nom (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('numero')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="nom" class="form-control" placeholder="Nom de la catégorie" type="text" value="{{old('nom')}}">
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

</fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('materiels/create')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>
    
  @endsection
                         
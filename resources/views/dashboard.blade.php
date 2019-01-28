@extends('layouts.master')

@section('title','LRI | Dashboard')

@section('header_page')
    <h1>
        Dashboard
   </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
@endsection

@section('asidebar')
  <li class="active" >
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
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
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
        
           <li >
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
            <span>Paramètre</span></a>
          </li>
         
          @endif

          <li >
          <a href="{{url('font')}}">
            <i class="fa fa-globe"></i> 
            <span>Le site Web</span>
          </a>
        </li> 
          
@endsection

@section('content')
  <div class="row" style="padding-bottom: 30px">
        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
           <div class="small-box bg-aqua">
                <div class="inner">
                   <h3>{{$membres}}</h3>
                   <p>Membres</p>
                </div>
            <div class="icon">
            <i class="ion-person"></i>
            </div>
           <a href="{{url('membres')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                              <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
               <h3>{{$equipes}}<sup style="font-size: 20px"></sup></h3>
               <p>Equipes</p>
            </div>
            <div class="icon">
               <i class="ion-ios-people"></i>
            </div>
            <a href="{{url('equipes')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                          <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
           <div class="small-box bg-yellow">
              <div class="inner">
                 <h3>{{$theses}}</h3>
                 <p>Thèses en cours</p>
              </div>
              <div class="icon">
               <i class="fa fa-clipboard"></i>
              </div>
              <a href="{{url('theses')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
           </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$articles}}</h3>

              <p>Articles</p>
            </div>
            <div class="icon">
              <i class="ion-ios-paper"></i>
            </div>
            <a href="{{url('articles')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


                          <!-- ./col -->
  </div>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Thèses/Articles</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        
      </div>
      <div class="row">

       <div class="col-lg-6" >
     <canvas id="bar-chart-grouped"></canvas>
    </div>
     <div class="col-lg-6" >
  
     <div class="container" ></div>
    <div class="col-lg-8" >
   <canvas id="pie-chart" ></canvas>
     </div>
     </div>
   </div>
     <div class="row">
     <div class="col-lg-6" >
   <canvas id="pie-chart2" width="800" height="450" ></canvas>
     </div>
        <div class="col-lg-6" >
   <canvas id="bar-chart-grouped2"  ></canvas>
     </div>
     </div>

    
    </div>
   
        

     
       <!-- /.box-body -->
  </div>
@endsection

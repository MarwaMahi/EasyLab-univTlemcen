
 @extends('layouts.master')

 @section('title','LRI | Liste des actualites')

@section('header_page')

      <h1>
        Actualites
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Actualites</a></li>
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
            <li class="active"><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>

         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>
      
         <li >
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


    <div class="row">
      <div class="col-md-12">
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
             <div class="box-header col-xs-9">
              <h3 class="box-title">Liste des actualites</h3>
            </div>
          </div>
          </div>
            
            <!-- /.box-header -->
            <div class="box-body">
           
            
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th></th>
                  <th>Titre</th> 
                  <th>Date de publication</th>
                  <th>Publié par</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($actualites as $actualite)
                  <tr>
                    <td> <img  src=" {{asset($actualite->photo)}}" style="width: 150px; height: 100px;"></td>
                    <td>{{$actualite->titre}}</td>
                    <td>{{date('Y-m-d', strtotime($actualite->date_publication))}}</td>
                    <td>
                       @foreach($actualite->users as $user)
                    <ul>
                        <li><a href="{{url('membres/'.$user->id.'/details')}}">{{ $user->name }} {{ $user->prenom }}</a></li>
                    </ul>
                    @endforeach
                    </td>
                    <td>
                      <div class="btn-group">
                        <form action="{{ url('actualites/'.$actualite->id)}}" method="post">
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                              <a href="#actualite{{$actualite->id}}Modal"   data-toggle="modal" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
               <div class="modal fade" id="actualite{{$actualite->id}}Modal"  aria-labelledby="actualite{{$actualite->id}}ModalLabel" aria-hidden="true">

                     <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                                   
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
          
                          </div>
                         <div class="modal_body">
                            <div class= "text-center" >
                                <h2 style=" text-align: center; font-family:'Comic Sans MS'">{{$actualite->titre}}</h2>
                             <div>
                            <div  >
                              <img src="{{asset($actualite->photo)}}"  width="600" height="200">  
                             </div>

                             <div class="text-center">
                              <h3>{{$actualite->resume}}</h3>
                             </div>
                             <div><h4>&nbsp;&nbsp;&nbsp;&nbsp;{{$actualite->texte}}</h4></div>
                         </div>
                       </div>
                     </div>
                     <div class="modal_footer">
                       <div class="text-center">
                        <hr style=" border: 1px solid;" width="30%">
                           <span >Publié le {{date('Y-m-d', strtotime($actualite->date_publication))}}</span>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
                      @if( Auth::user()->id == $actualite->deposer )
                        <a href="{{ url('actualites/'.$actualite->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                         @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $actualite->deposer )
                     

                         <a href="#supprimer{{ $actualite->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $actualite->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $actualite->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                  
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action=""  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>

                        @endif
                        </form>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                  
                 </tbody>
                <tfoot>
                <tr>
                   <th></th>
                  <th>Titre</th> 
                  <th>Date de publication</th>
                   <th>Publié par</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
      </div>
      
    </div>
 @endsection
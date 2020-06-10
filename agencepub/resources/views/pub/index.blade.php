@extends('layouts.app')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<div class="container">
  <div class="row">
    <div class="col-md-12">
      
      <div class="logo mb-3">
                         <div class="col-md-12 text-center">
                            <h1 style="font-family: Cursive, sans-serif;">La liste de mes commandes</h1>
                                                     </div>
                    </div>
                     <div>
        <form action="/search" method="get">        

          <div class="input-group">
                      <a href="{{url('pubs/create')}}" class="btn btn-info"><i class="fas fa-plus"></i>Nouvelle Commande</a>
            <input type="search" name="search" class="form-control"  placeholder="search" style="margin-left: 700px">

            <span class="input-group-prepend">

              <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
            </span>
          </div>
        </form>
      </div>
      </br> 
        {{csrf_field()}}

          <table class="table table-striped">
           <thead>
             <tr>
               <th>Titre</th>
               <th>Téléphone</th>
               <th>Image</th>
               <th width="157px">Action</th>
             </tr>
           </thead> 
           <tbody>
        <div class="row">
          @foreach($pubs as $pub)
   <tr>
              <td>{{$pub->titre}}</td>
              <td>{{$pub->tel}}</td>
              <td><img src="{{asset('storage/'.$pub->photo)}}" alt="..."></td>
              
              <td>
          <form action="{{url('pubs',['id'=>$pub->id])}}" method="post">
            {{method_field('DELETE')}}
            {{csrf_field()}}
          
           <a href="{{url('pubs/'.$pub->id)}}" class="btn btn-primary" role="button"><i class="fas fa-plus-square"></i></a> 
           @can('update',$pub)
          <a href="{{url('pubs/'.$pub->id.'/edit')}}" class="btn btn-info" role="button"><i class="far fa-edit"></i></a>
          @endcan
          @can('delete',$pub)
          <button type="submit" class="btn btn-danger" role="button"><i class="fas fa-trash-alt"></i></button>
          @endcan
          </form>
          </p>
      </div>
    </div>
  </div>
  @endforeach
</div>




    </div>
  </div>
 </div>
 
  <script src="https://kit.fontawesome.com/108ddecd94.js" crossorigin="anonymous"></script>
@endsection
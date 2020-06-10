  @extends('layouts.app')
  @section('javascripts')
  <script type="text/javascript">
    function toggleReplyComment(id){
      let element=document.getElementById('replyComment-' + id);
      element.classList.toggle('d-none');
    }

  </script>
  @endsection


@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			
<div class="logo mb-3">
           <div class="col-md-12 text-center">
      <h1 style="font-family: Cursive, sans-serif;">La liste des publications</h1>
                                                  
              </div>
                    </div> 		
              <div class="input-group">
   @can('create','App\Publication')
 				<a href="{{url('publications/create')}}" class="btn btn-info"><i class="fas fa-plus"></i>Nouvelle publication</a>
        @endcan
        
 			</div>
 				{{csrf_field()}}

 				<div class="row">
 					@foreach($publications as $publication)
  <div class="col-sm-6 col-md-12">
    <div class="thumbnail">
      <div class="caption">
      <center>  <h3>{{$publication->titre}}</h3>
        <p>{{$publication->explication}}</p>
        <img src="{{asset('storage/'.$publication->photo)}}" alt="...">

        <p>        
          <form action="{{url('publications',['id'=>$publication->id])}}" method="post">
            {{method_field('DELETE')}}
            {{csrf_field()}}
          @can('update',$publication)
        	<a href="{{url('publications/'.$publication->id.'/edit')}}" class="btn btn-info" role="button"><i class="far fa-edit"></i></a>
          @endcan
          @can('delete',$publication)
        	<button type="submit" class="btn btn-danger" role="button"><i class="fas fa-trash-alt"></i></button>

          @endcan 

          </form>
          <br></center>
          <div  style="margin-left: 300px; margin-right: 400px;">
  <h5>Commentaires</h5>
          <hr>
  
  @forelse($publication->comments as $comment)
  <div class="card mb-2">
    <div class="card-body">
      {{$comment->content}}
      <br><br>
    <div class="d-flex justify-content-between align-items-center" style="text-align: center;">
      <small>Posté par <b>{{$comment->user->name}}</b> le {{$comment->created_at->format('d/m/y à H:m')}}</small>
      
    </div>
    </div>
  </div>
  @foreach($comment->comments as $replyComment)
  <div class="card mb-2 ml-5">
    <div class="card-body">
      {{$replyComment->content}}
    <div class="d-flex justify-content-between align-items-center">
      <small>Posté par <span class="badge badge-primary">{{$replyComment->user->name}}</span>le {{$replyComment->created_at->format('d/m/y à H:m')}}</small>
      
    </div>
    </div>
  </div>
  @endforeach
  <button class="btn btn-info mb-3" onclick="toggleReplyComment({{$comment->id}})">Répondre</button>
  <form action="{{route('comments.storeReply',$comment)}}" method="POST" class="mb-3  ml-5 d-none" id="replyComment-{{$comment->id}}">
    @csrf
    <div class="form-group">
      <label for="replyComment">Ma réponse</label>
      <textarea name="replyComment" class="form-control @error('replyComment') is-invalid @enderror" id="replyComment" rows="3"></textarea>
      @error('replyComment')
    <div class="invalid-feedback">{{$errors->first('replyComment')}}</div>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
  
 @empty
 <div class="alert alert-info">Aucun commentaire Pour cette publication</div>
  @endforelse
  <form action="{{route('comments.store',$publication)}}" method="POST" class="mt-3">
    @csrf
    <div class="form-group">
      <label for="content">Votre commentaire</label>
      <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3"></textarea>
      @error('content')
    <div class="invalid-feedback">{{$errors->first('content')}}</div>
    @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Envoyer</button>
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
  
 </div>
 <script src="https://kit.fontawesome.com/108ddecd94.js" crossorigin="anonymous"></script>

@endsection
@extends('layouts.app')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

 <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
            	 <div class="logo mb-3">
                         <div class="col-md-12 text-center">
                            <h1 style="font-family: Cursive, sans-serif;">Ajouter une nouvelle publication</h1>
                                                     </div>
                    </div>
 			<form action="{{url('publications')}}" method="post" enctype="multipart/form-data">
 				{{csrf_field()}}
 				<div class="form-group has-danger">
 					<label for="">Titre</label>
 					<input type="text" name="titre" class="form-control @if($errors->get('titre')) is-invalid @endif" value="{{old('titre')}}" placeholder="Titre">
                @if($errors->get('titre'))

 					@foreach($errors->get('titre') as $message)
                      <li>{{$message}}</li>
 					@endforeach
 					@endif
 				</div>


 			 <div class="form-group has-danger">
 					<label for="">Explication</label>
 					<textarea name="explication" class="form-control @if($errors->get('explication')) is-invalid @endif" placeholder="Explication">{{old('explication')}}</textarea> 
 					@if($errors->get('explication'))

 					@foreach($errors->get('titre') as $message)
                      <li>{{$message}}</li>
 					@endforeach
 					@endif
 				</div>
 
 <div class="form-group">
          <label for="">Image</label>
          <input class="form-control" type="file" name="photo">
          
        </div>

                <div class="form-group">
 					<input type="submit"  class="form-control btn btn-primary" value="Enregistrer">
 				</div>

 			</form>
 		</div>
 	</div>
 </div>



@endsection
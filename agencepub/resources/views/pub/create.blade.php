@extends('layouts.app')

@section('content')


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
            	 <div class="logo mb-3">
                         <div class="col-md-12 text-center">
                            <h1 style="font-family: Cursive, sans-serif;">Ajouter une nouvelle commande</h1>
                                                     </div>
                    </div>
 			<form action="{{url('pubs')}}" method="post" enctype="multipart/form-data">
 				{{csrf_field()}}
 				<div class="form-group has-danger">
 					<label for="">Titre</label>
 					<input type="text" name="titre" class="form-control @if($errors->get('titre')) is-invalid @endif" value="{{old('titre')}}" placeholder="titre">
                @if($errors->get('titre'))

 					@foreach($errors->get('titre') as $message)
                      <li>{{$message}}</li>
 					@endforeach
 					@endif
 				</div>

           
          

 			 <div class="form-group has-danger">
 					<label for="">Presentation</label>
 					<textarea name="presentation" class="form-control @if($errors->get('presentation')) is-invalid @endif" placeholder="presentation">{{old('presentation')}}</textarea> 
 					@if($errors->get('presentation'))

 					@foreach($errors->get('titre') as $message)
                      <li>{{$message}}</li>
 					@endforeach
 					@endif
 				</div>

        <div class="form-group has-danger">
          <label for="">Téléphone</label>
          <input name="tel" class="form-control @if($errors->get('tel')) is-invalid @endif" placeholder="téléphone">{{old('tel')}}</input> 
          @if($errors->get('tel'))

          @foreach($errors->get('tel') as $message)
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
@extends('layouts.app')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@if(count($errors))
<div class="alert alert-danger" role="alert">
	<ul>
@foreach($errors->all() as $message)
<li>{{$message}}</li>
@endforeach
</ul>
</div>
@endif
 <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
            	 <div class="logo mb-3">
                         <div class="col-md-12 text-center">
                            <h1 style="font-family: Cursive, sans-serif;">Modifier la commande</h1>
                                                     </div>
                    </div>
            <div id="first">
                <div class="myform form ">
 			<form action="{{url('pubs/'.$pub->id)}}" method="post">
 				<input type="hidden" name="_method" value="PUT">
 				{{csrf_field()}}
 				<div class="form-group">
 					<label for="">Titre</label>
 					<input  value="{{$pub->titre}}" type="text" class="form-control" name="titre">
 				</div>

 				<div class="form-group">
 					<label for="">Presentation</label>
 					<textarea name="presentation" class="form-control">{{$pub->presentation}}</textarea>
 				</div>

       <div class="form-group">
          <label for="">Téléphone</label>
          <input  value="{{$pub->tel}}" type="text" class="form-control" name="tel">
        </div>

 <div class="form-group">
 					<label for="">Image</label>
 					<input class="form-control" type="file" name="photo">
 					
 				</div>

                <div class="form-group">
 					<input type="submit"  class=" btn btn-block mybtn btn-primary tx-tfm" value="Modifier">
 				</div>

 			</form>
 		</div>
 	</div>
 </div>



@endsection
@extends('layouts.app')
@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container" id="app">
 	<div class="row">
 		<div class="col-md-12">
 			<h1 style="font-family: Cursive,sans-serif; text-align: center;">@{{message}}</h1>
<div class="card card-primary">
<div class="card-header">
	<div class="row">
 		<div class="col-md-10"><h3 class="card-title">Suivi</h3></div>		
 			<div class="col-md-2 text-right">
 				<button class="btn btn-info" @click="open=true">Ajouter</button>

 			</div>
</div>
</div>
<div class="card-body">
	<div v-if="open">
		<form @submit.prevent="validateForm('formExperience')" data-vv-scope="formExperience">
		<div :class="{'form-group':true,'text-danger':errors.has('formExperience.titre')}">
			<label>Titre</label>
			<input name="titre" type="" v-validate="'required'" class="form-control" placeholder="le titre" v-model="experience.titre">
			<label class="" v-show="errors.has('formExperience.titre')">@{{errors.first('formExperience.titre')}}</label>
		</div>
		<div class="form-group">
			<label>Body</label>
			<textarea name="body" v-validate="'required|min:5|max:255'" class="form-control" placeholder="le contenu" v-model="experience.body"></textarea>
			<span v-show="errors.has('formExperience.body')">@{{errors.first('formExperience.body')}}</span>

		</div>	
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Date début</label>
					<input type="date" class="form-control" placeholder="Debut" v-model="experience.debut">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Date fin</label>
					<input type="date" class="form-control" placeholder="fin" v-model="experience.fin">
				</div>
			</div>
		</div>
		<div class="btn-group">
	<button v-if="edit" class="btn btn-info btn-block" @click="updateExperience">Modifier</button>

		<button type="submit" v-else class="btn btn-info btn-block">Ajouter</button>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<button class="btn btn-danger" @click="open=false">Fermer</button>

	</div>
	</div>
	<br>
	</form>
	<ul class="list-group">
		<li class="list-group-item" v-for="experience in experiences">
			<div class="float-right">
<button class="btn btn-info btn-sm" @click="editExperience(experience)">Modifier</button>
<button class="btn btn-danger btn-sm" @click="deleteExperience(experience)">Supprimer</button>

			</div>
			<h3>@{{experience.titre}}</h3>
			<p>@{{experience.body}}</p>
			<small>@{{experience.debut}} - @{{experience.fin}}</small>
		</li>

		
	</ul>
</div>
</div>
<hr>


@endsection

@section('javascripts')
<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('js/veeValidate.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
<script>
	Vue.use(VeeValidate);
	window.Laravel={!! json_encode([
			'csrfToken'   => csrf_token(),
			'idExperience'=>$id,
			'url'         =>url('/')])
	!!};
</script>
<script>
	var app = new Vue({
        el:'#app', 
        data:{
        	message:'Le suivi de votre commande',
        	experiences:[],
        	open: false,
        	experience:{
        		id:0,
        		pub_id:window.Laravel.idExperience,
        		titre:'',
        		body:'',
        		debut:'',
        		fin:''
              	},
            edit: false
        },
        methods:{
        	 validateForm(scope){
        	this.$validator.validateAll(scope).then((result)=>{
        		if(result){
				this.addExperience();
				        		}
        	})
        },
        	getExperiences:function(){
        	axios.get(window .Laravel.url+'/getexperiences/'+window.Laravel.idExperience)
        		.then(response=> {
        			   console.log(response.data);
        				this.experiences=response.data;
        		})
        		.catch(error=>{
        			console.log('errors:', error);
        		})
        	},
        	addExperience: function(){
        		axios.post(window.Laravel.url+'/addexperience',this.experience)
        		.then(response=>{
        			console.log(response.data);
        			if (response.data.etat) {
        				this.open=false;
        				this.experience.id=response.data.id;
        				this.experiences.unshift(this.experience);
        				this.experience={
						        		id:0,
						        		pub_id:window.Laravel.idExperience,
						        		titre:'',
						        		body:'',
						        		debut:'',
						        		fin:''
						              	};
        			} 
        		})
        		.catch(error=>{
        			console.log(error);
        		})
        	},
        	editExperience: function(experience){
        		this.open=true;
        		this.edit=true;
        		this.experience=experience;
        	},
        	updateExperience: function(){
        		axios.put(window.Laravel.url+'/updateexperience',this.experience)
        		.then(response=>{
        			console.log(response.data);
        			if (response.data.etat) {
        				this.open=false;
        				this.experience={
						        		id:0,
						        		pub_id:window.Laravel.idExperience,
						        		titre:'',
						        		body:'',
						        		debut:'',
						        		fin:''
						              	};
        			} 
        			this.edit=false;
        		})
        		.catch(error=>{
        			console.log(error);
        		})
        	},
        	deleteExperience:function(experience){
		    swal({
					  title: 'Etes vous sur?',
					  text: "De supprimer cette exprérience!",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Oui, Supprimer!'
					}).then(()=> {
					axios.delete(window.Laravel.url+'/deleteexperience/'+experience.id)
			        		.then(response=>{
			        			if (response.data.etat) {
			        				 var position=this.experiences.indexOf(experience);
			        				 this.experiences.splice(position,1);
			        			} 
			        		})
			        		.catch(error=>{
			        			console.log(error);
			        		})
			        	
					    swal(
					      'Deleted!',
					      'Your file has been deleted.',
					      'success'
					    )
					  
					})
              

}
        	
        },
       
        created :function(){
        	this.getExperiences();
        }
	});
</script>
@endsection
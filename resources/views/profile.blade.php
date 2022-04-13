@include ('header')
@include ('tableHeader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mon profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowUsers')}}">Profile</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        
        <div class="row">
          
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Etat Civil</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputName1">Nom complet *</label>
                        <input disabled type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputName1" placeholder=" Prénom et nom" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplenaissance">Date de naissance</label>
                        <input disabled type="date" value="{{$user->naissance}}" name="naissance" class="form-control" id="examplenaissance" placeholder=" Date de naissance">
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampletel">Téléphone(s)</label>
                        <input disabled type="text" value="{{$user->tel}}" name="tel" class="form-control" id="exampletel" placeholder="00 000 000">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplecin">N° CIN</label>
                        <input disabled type="text" value="{{$user->cin}}" name="cin" class="form-control" id="examplecin" placeholder="N° CIN">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplepassport">N° Passport</label>
                        <input disabled type="text" value="{{$user->passport}}" name="passport" class="form-control" id="examplepassport" placeholder="N° Passport">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplecnss">N° CNSS</label>
                        <input disabled type="text" value="{{$user->cnss}}" name="cnss" class="form-control" id="examplecnss" placeholder="N° CNSS">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplebanque">Banque</label>
                        <input disabled type="text" value="{{$user->banque}}" name="banque" class="form-control" id="examplebanque" placeholder=" Détails de banque">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleRIB">RIB</label>
                        <input disabled type="text" value="{{$user->rib}}" name="rib" class="form-control" id="exampleRIB" placeholder="RIB">
                      </div>
                    </div>

                    
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Informations Professionnelles</h3>
                </div>
                
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Employé SAROST ?</label>
                          <select disabled  name="employe" class="form-control" style="width: 100%;">
                            <option value="oui" @if ($user->employe=='oui') selected @endif>Oui (employé)</option>
                            <option value="non" @if ($user->employe=='non') selected @endif>Non (ex: consultant)</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleref">Matricule / M.F *</label>
                          <input disabled  type="text" value="{{$user->ref}}" name="ref" class="form-control" id="exampleref" placeholder=" Matricule ou M.F" required>
                        </div>
                      </div>

                      <div class="col-md-12">
                      <div class="form-group">
                        <label>Fonction</label>
                        <input disabled  type="text" value="{{$user->fonction}}" name="fonction" class="form-control"  placeholder="...">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Collège</label>
                        <select disabled  name="college" class="form-control" style="width: 100%;">
                          <option value="Cadre" @if ($user->college=='Cadre') selected @endif >Cadre</option>
                          <option value="Agent de maîtrise" @if ($user->college=='Agent de maîtrise') selected @endif >Agent de maîtrise</option>
                          <option value="Agent d exécution" @if ($user->college=='Agent d exécution') selected @endif >Agent d'exécution</option>
                        </select>
                      </div>
                    </div>


                    

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Unité/Entité</label>
                        <select disabled  name="entite_id" class="form-control select2bs4" style="width: 100%;" >
                          <option value="" selected></option>
                          @foreach ($entites as $entite)
                            <option value="{{$entite->id}}" @if ($user->entite_id==$entite->id) selected @endif >{{$entite->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Compte actif</label>
                        <select disabled  name="actif" class="form-control" style="width: 100%;">
                          <option value="oui" @if ($user->actif=='oui') selected @endif>Oui : le compte est actif</option>
                          <option value="non" @if ($user->actif=='non') selected @endif>Non : le compte n'est plus actif</option>
                        </select>
                      </div>
                    </div>


                      

                      
                  </div>
                </div>
              </div>
            </div>





            <div class="col-md-6">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Contrat de travail </h3>
                </div>
                
                  <div class="card-body">
                    <div class="row">
                      
                      

                   <div class="col-md-4">
                      <div class="form-group">
                        <label>Contrat actuel</label>
                        <select disabled name="contrat" required class="form-control" style="width: 100%;">
                          <option value=""></option>
                          <option value="CDD" @if ($user->contrat=='CDD') selected @endif >CDD</option>
                          <option value="CDI Titulaire" @if ($user->contrat=='CDI Titulaire') selected @endif >CDI Titulaire</option>
                          <option value="CDI Période essaie" @if ($user->contrat=='CDI Période essaie') selected @endif >CDI Période essaie</option>
                          <option value="SIVP" @if ($user->contrat=='SIVP') selected @endif >SIVP</option>
                          <option value="Stage" @if ($user->contrat=='Stage') selected @endif >Stage</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampledebut">Du</label>
                        <input disabled type="date" value="{{$user->debut}}" name="debut" class="form-control" id="exampledebut" placeholder=" Date de début">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="examplefin">Au</label>
                        <input disabled type="date" value="{{$user->fin}}" name="fin" class="form-control" id="examplefin" placeholder=" Date de fin">
                      </div>
                    </div>

                    

                      

                      
                  </div>
                </div>
              </div>
            </div>

 <div class="col-md-6">
              <div class="card card-default" >
                <div class="card-header" style="background-color: #c6e2ff;">
                  <h3 class="card-title">Congé et Repos</h3>
                </div>
                
                  <div class="card-body">
                    <div class="row">
                      
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplesolderc">solde RC</label>
                        <input disabled type="text" value="{{round($user->solderc,2)}}"  name="solderc" class="form-control" id="examplesolderc" placeholder="solde RC">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplesoldecp">solde CP</label>
                        <input disabled type="text" value="{{round($user->soldecp,2)}}" name="soldecp" class="form-control" id="examplesoldecp" placeholder="solde CP">
                      </div>
                    </div>
                      
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Données d'identification</h3>
                </div>
                
                  <div class="card-body">
                    <form id="quickForm" method="POST" action="{{route('profilePost')}}">
                        @csrf
                      
                    <div class="row">
                      
                     <div class="col-md-6"> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adresse mail *</label>
                        <input disabled type="email" value="{{$user->email}}" name="email" class="form-control" id="exampleInputEmail1" placeholder="exemple@sarost-group.com" required>
                      </div>
                      </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Mot de passe actuel</label>
                                <input type="password" name="passwordActuel" class="form-control" id="" placeholder="Mot de passe actuel" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Nouveau mot de passe</label>
                                <input type="password" name="passwordNew1" class="form-control" id="" placeholder="Nouveau mot de passe" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Confirmer votre nouveau mot de passe</label>
                                <input type="password" name="passwordNew2" class="form-control" id="" placeholder="Confirmer votre nouveau mot de passe" >
                              </div>
                            </div>
                             

                          
                        
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      </form>

                </div>
              </div>
            </div>

                             

        </div>
   



  



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->

  



  @include ('footer')
  @include ('tableFooter')


<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
$(function () {
 
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      passwordNew1: {
        required: true,
        minlength: 8
      },
      passwordNew2: {
        required: true,
        minlength: 8
      },
      name: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Please enter a name"
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
  

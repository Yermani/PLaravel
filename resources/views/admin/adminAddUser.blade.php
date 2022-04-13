@include ('header')
@include ('tableHeader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajouter un nouveau User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowUsers')}}">Users</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.cont   ainer-fluid -->
    </div>
    <!-- /.content-header -->

    
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <form id="quickForm" method="POST" action="{{route('adminAddUserPost')}}">
           @csrf
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
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder=" Prénom et nom" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplenaissance">Date de naissance</label>
                        <input type="date" name="naissance" class="form-control" id="examplenaissance" placeholder=" Date de naissance">
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampletel">Téléphone(s)</label>
                        <input type="text" name="tel" class="form-control" id="exampletel" placeholder="00 000 000">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplecin">N° CIN</label>
                        <input type="text" name="cin" class="form-control" id="examplecin" placeholder="N° CIN">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplepassport">N° Passport</label>
                        <input type="text" name="passport" class="form-control" id="examplepassport" placeholder="N° Passport">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplecnss">N° CNSS</label>
                        <input type="text" name="cnss" class="form-control" id="examplecnss" placeholder="N° CNSS">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplebanque">Banque</label>
                        <input type="text" name="banque" class="form-control" id="examplebanque" placeholder=" Détails de banque">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleRIB">RIB</label>
                        <input type="text" name="rib" class="form-control" id="exampleRIB" placeholder="RIB">
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
                          <label>Compte actif</label>
                          <select name="actif" class="form-control" style="width: 100%;">
                            <option value="oui">Oui : le compte est actif</option>
                            <option value="non">Non : le compte n'est plus actif</option>
                          </select>
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
                    <div class="row">
                      
                     <div class="col-md-12"> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adresse mail *</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="exemple@sarost-group.com" required>
                      </div>
                      </div>

                      <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe *</label>
                        <input type="text" name="password" autocomplete="off" minlength="8" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                      </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>

                  
            
                  



            




            <div class="col-md-6">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Affectation des rôles</h3>
                </div>
                
                  <div class="card-body">
                    <div class="row">
               

                  <div class="col-md-12">
                      <div class="form-group mb-0">
                        <label for="">Roles</label>
                        @foreach ($roles as $role)
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="roles[]" class="custom-control-input" id="role{{$role->id}}" value="{{$role->id}}">
                          <label style="font-weight: normal;" class="custom-control-label" for="role{{$role->id}}">{{$role->display_name}} </label>
                        </div>
                        @endforeach
                      </div>

                  </div>
                
                    


          
                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-6">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Confirmation de l'ajout</h3>
                </div>
                
                  <div class="card-body">
                    <div class="row">
               
                    Est ce que vous êtes sur de vouloir ajouter ce User ?
                    


          
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                  <a class="btn btn-default" href="{{route('adminShowUsers')}}">Annuler</a>
                </div>


              </div>
            </div>
                  
   
              



              </div>
              </form>
            </div>
            <!-- /.card -->
           
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->

  


 @include ('footer')
  @include ('tableFooter')


<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>




$(".liPrime").click(function(){
  $(this).next().toggle();
});


$(function () {
 
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: false,
        minlength: 8
      },
      name: {
        required: true
      },
      debut: {
        required: true,
        dateISO:true
      },
      fin: {
        
        dateISO:true
      },
      naissance: {
        required: true,
        dateISO:true
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
      debut: {
        required: "Please provide a date",
        dateISO: "Please enter a valid date"
      },
      fin: {
        
        dateISO: "Please enter a valid date"
      },
      naissance: {
        required: "Please provide a date",
        dateISO: "Please enter a valid date"
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
  

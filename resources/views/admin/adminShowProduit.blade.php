@include ('header')
@include ('tableHeader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Détail du produit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowProduits')}}">Produits</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <a href="{{route('adminShowProduits')}}" class="btn btn-secondary btn-sm"> Retour <i class="fas fa-add"></i> </a>
                  <a href="{{route('adminEditProduit',$produit->id)}}" class="btn btn-warning btn-sm"> Editer <i class="fas fa-add"></i> </a>
                  <a href="{{route('adminDeleteProduit',$produit->id)}}" class="btn btn-danger btn-sm"> Supprimer <i class="fas fa-add"></i> </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  
                  <tr>
                    <th>ID</th>
                    <td>{{$produit->id}}</td>
                  </tr>

                  <tr>
                    <th>Nom</th>
                    <td>{{$produit->nom}}</td>
                  </tr>

                  <tr>
                    <th>Categorie</th>
                    <td>@if (isset($produit->categorie)) {{$produit->categorie->nom}} @endif</td>
                  </tr>

                  <tr>
                    <th>Prix</th>
                    <td>{{$produit->prix}}</td>
                  </tr>

                  <tr>
                    <th>Description</th>
                    <td>{{$produit->description}}</td>
                  </tr>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


 
  </div>
  <!-- /.content-wrapper -->

  



  @include ('footer')
  @include ('tableFooter')

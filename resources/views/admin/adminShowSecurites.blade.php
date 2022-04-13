@include ('header')

  @include ('tableHeader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liste des alertes de sécurité</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Securité</a></li>
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
                  <a href="#" class="BtnFiltrer btn-sm btn btn-primary"> <i class="fas fa-filter"></i> Filtrer</a>
                  <a href="#" class="BtnExporter btn-sm btn btn-primary"> <i class="fas fa-file-export"></i> Exporter</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Niveau</th>
                    <th>Type</th>
                    <th>Alerte</th>
                    <th>Employé</th>
                    <th>Table</th>
                    <th>Champ</th>
                    <th>Element</th>
                    <th>Ancien</th>
                    <th>Nouveau</th>
                    <th>Commentaire</th>
                    <th>Etat</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($securites->sortByDesc('date') as $securite)
                    <tr>
                     <td>{{\Carbon\Carbon::parseFromLocale($securite->date)->diffForHumans()}}</td>
                      <td>{{$securite->niveau}}</td>
                      <td>{{$securite->type}}</td>
                      <td>{{$securite->alerte}}</td>
                      <td>{{$securite->user->name}} ({{$securite->user->ref}}) </td>
                      <td>{{$securite->nomtable}}</td>
                      <td>{{$securite->nomelement}}</td>
                      <td>{{$securite->element}}</td>
                      <td>{{$securite->ancien}}</td>
                      <td>{{$securite->nouveau}}</td>
                      <td>{!!$securite->commentaire!!}</td>
                      <td>{{$securite->etat}}</td>
                      <td><a href="{{route('adminEditSecurite',$securite->id)}}" class="btn btn-warning">Edit</a></td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Niveau</th>
                    <th>Type</th>
                    <th>Alerte</th>
                    <th>Employé</th>
                    <th>Table</th>
                    <th>Champ</th>
                    <th>Element</th>
                    <th>Ancien</th>
                    <th>Nouveau</th>
                    <th>Commentaire</th>
                    <th>Etat</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
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


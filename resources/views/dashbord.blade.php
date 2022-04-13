@include ('header')
@include ('tableHeader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard/Home</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          @if (Auth::user()->hasRole(['admin']))
          

              <div class="col-md-4">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Réparition des employés selon la catégorie</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="donutChartCategorie" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Réparition des employés selon le type du contrat</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="barContrat" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Réparition des employés selon le collège</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="donutChartCollege" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>
            @endif

          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-0">
                  <h3 class="card-title">Notes d'information / Notes de service</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Information/Note</th>
                    <th>Lien</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach($notes as $note)
                    <tr>
                      <td>{{$note->date}}</td>
                      <td>{{$note->note}}</td>
                      <td>@if ($note->lien<>"") <a href="{{asset('/note/'.$note->lien)}}">Voir</a> @endif</td>
                    </tr>
                    @endforeach
                  
                  @if (!$notes->count())
                    <tr><td colspan="3" class="text-center">Pas de notes pour le moment. </td></tr>
                  @endif
                  
                  </tbody>
                </table>
              </div>
            </div>
          
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  @include ('footer')
  @include ('tableFooter')


<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>


<script>

    //-- Contrat

    var donutChartCanvasCollege = $('#donutChartCollege').get(0).getContext('2d')
    
    var donutDataCollege       = {
      labels: [

          @foreach ($usersCollege as $userCollege)
          
          '{{$userCollege->first()->college}}',
          
          @endforeach
      ],
      datasets: [
        {
          data: [
          @foreach ($usersCollege as $userCollege)
            {{$userCollege->count()}},
          @endforeach
          ],
          backgroundColor : ['#98B4D4', '#FF6F61', '#6B5B95', '#88B04B', '#92A8D1', '#d2d6de'],
        }
      ]
    }
    
    var donutOptionsCollege     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    new Chart(donutChartCanvasCollege, {
      type: 'doughnut',
      data: donutDataCollege,
      options: donutOptionsCollege
    })



    //---------- Categorie

    var donutChartCanvas = $('#donutChartCategorie').get(0).getContext('2d')
    
    var donutData        = {
      labels: [

          @foreach ($usersStatut as $userStatut)
          
          '{{$userStatut->first()->statut}}',
          
          @endforeach
      ],
      datasets: [
        {
          data: [
          @foreach ($usersStatut as $userStatut)
            {{$userStatut->count()}},
          @endforeach
          ],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


//---------- Contrat

    var barCanvas = $('#barContrat').get(0).getContext('2d')
    
    var barData        = {
      labels: [

          @foreach ($usersContrat as $userContrat)
          
          '{{$userContrat->first()->contrat}}',
          
          @endforeach
      ],
      datasets: [
        {
          data: [
          @foreach ($usersContrat as $userContrat)
            {{$userContrat->count()}},
          @endforeach
          ],
          backgroundColor : ['#17a2b8', '#DC143C', '#f39c12', '#C71585', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    
    var barOptions     = {
      maintainAspectRatio : false,
      responsive : true,
       legend: {
            display: false,
        },


    }

    new Chart(barCanvas, {
      type: 'horizontalBar',
      data: barData,
      options: barOptions
    })





</script>
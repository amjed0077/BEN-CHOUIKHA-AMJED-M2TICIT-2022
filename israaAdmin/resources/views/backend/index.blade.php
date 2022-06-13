@extends('backend.layout')
@section('title','Acceuil')
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3>0</h3>

                <p>Les Promotions </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3> {{$data["hotels"]}}<sup style="font-size: 20px"></sup></h3>

                <p>Nombre d'hotel ajouter</p>
              </div>
              <div class="icon">
              <i class="fa fa-hotel"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3>{{$data["users"]}}</h3>

                <p>Nombre d'utilisateurs</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
        </div>
        <!-- /.row -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="info-box">
  <span class="info-box-icon bg-success"><i class="ion-connection-bars"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Connectée</span>
    <span class="info-box-number">0</span>
    <div class="progress">
      <div class="progress-bar bg-info" style="width: 70%"></div>
    </div>
    <span class="progress-description">
      <!-- 70% Augmentation en 30 jours -->
    </span>
  </div>
</div>

          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="info-box">
            <span class="info-box-icon bg-cyan"><i class="ion-briefcase"></i></span>
              <div class="info-box-content">
    <span class="info-box-text">Les reservations</span>
    <span class="info-box-number">{{$data["reservations"]}}</span>
    <div class="progress">
      <div class="progress-bar bg-info" style="width: 70%"></div>
    </div>
    <span class="progress-description">
      <!-- 70% Augmentation en 30 jours -->
    </span>
  </div>
</div>

          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="ion-close"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Annulation </span>
    <span class="info-box-number">0</span>
    <div class="progress">
      <div class="progress-bar bg-info" style="width: 70%"></div>
    </div>
    <span class="progress-description">
      <!-- 10% Augmentation en 30 jours -->
    </span>
  </div>
</div>
         
        </div>
     
      <div class="container-fluid">
       
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{$data["voyages"]}}</h3>

                <p>Voyages</p>
              </div>
              <div class="icon">
                <i class="ion ion-plane"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3>{{$data["circuits"]}}<sup style="font-size: 20px"></sup></h3>

                <p>Circuits</p>
              </div>
              <div class="icon">
              <i class="ion ion-model-s"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$data["events"]}}</h3>

                <p>les evenments</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
            <!-- /.card -->

            

           
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <!-- <section class="col-lg-5 connectedSortable"> -->

          
            
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white"></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white"></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white"></div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  @endsection

@extends('backend.layout')
@section('title',$data["title"])


@section('main')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- @include('sweetalert::alert') --}}
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$data["title"]}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">{{$data["title"]}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  
                  <tr>
                  
                   
                    <th>nom d'utlisateur'</th>
                    <th>nom de client</th>
                    <th>nom de  services</th>
                    <th>etat</th>
                    <th>Action</th>
                    
                 
                  </tr>
                  </thead>
                  <tbody>
                 @foreach ($data["reservations"] as $reservation)
                  <tr>
                    <td>{{$reservation->user->name}}</td> 
                    <td>{{$reservation->nom ." ".$reservation->prenom}}</td> 

                    <td>{{$reservation->labelle_Service}}</td>
                 

                    @switch($reservation->etat)
                        @case('0')
                        <td>refuser</td>
                            @break
                     
                        @case('2')
                        <td>Confirmer</td>
                            @break
                    
                        @default
                        <td>en attente</td>
                    @endswitch
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default open-AddBookDialog" data-toggle="modal" data-target="#modal-Edit"  data-id="{{$reservation->id}}"  data-user="{{$reservation->user_id}}" data-service="{{$reservation->service_id}}" data-nomservice="{{$reservation->labelle_Service}}" >
                        <i class="fa fa-edit fa-1x"></i>
                      </button>

                      @if ($reservation->etat === '1')
                         <a class="btn btn-primary" href="{{ route('reservations.Confirmer', $reservation->id)}}" role="button"><i class="fa fa-check fa-1x"></i></a>
                         <a class="btn btn-danger" href="{{ route('reservations.annuler', $reservation->id)}}" role="button"> X </a>
                      @endif
                       <button type="button" class="btn btn-default open-showDialog" data-toggle="modal" data-target="#modal-show"  data-id="{{$reservation->id}}"  data-user="{{$reservation->user->name}}" data-service="{{$reservation->service_id}}" data-nomservice="{{$reservation->labelle_Service}}" data-contact="{{$reservation->portable}}">
                        <i class="fa fa-eye fa-1x"></i>
                      </button>

                        <form action="{{ route('reservations.destroy', $reservation->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" onclick="return confirm('êtes-vous sûre de cette décision?')" ><i class="fa fa-trash fa-1x" data-toggle="tooltip" data-placement="top" title="Supprimer"></i></button>
                        </form>
                      </div>
                    </td> 
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                     
                 
                  <th>nom de client</th>
                  <th>nom de  services</th>
                  <th>etat</th>
                  <th>Action</th>
                    
                
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

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ajout Reservations</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('reservations.store')}}">
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                @csrf
               
                
                <div class="form-group">
                  <label for="exampleFormControlSelect1">User</label>
                  <select class="form-control" id="user_id" name="user_id">
                    
                    @foreach ($data["users"] as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                     @endforeach
                  
                  </select>
</div>
                
             
                
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Hotel</label>
                  <select class="form-control" id="hotel_id" name="hotel_id">
                    <option selected>Hotel</option>
                    <option value="1">Sim </option>
                    <option value="2">nova</option>
                  </select>
               </div>
               
           
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i></button>
              </form>
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-Edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modifier Reservation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('reservations.update2')}}">
               @csrf
                <input type="hidden" name="id" id="id"  value="">
              
              
               <div class="form-group">
                  <label for="exampleFormControlSelect1">user</label>
                  <select class="form-control" id="userEdit" name="userEdit">
                    <option selected>Hotel</option>
                    <option value="1">Sim </option>
                    <option value="2">nova</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Service</label>
                  <select class="form-control" id="service_idEdit" name="service_idEdit">
                    <option selected>Hotel</option>
                    <option value="1">Sim </option>
                    <option value="2">nova</option>
                  </select>
               </div>
                


                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i></button>
              </form>
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      

      <div class="modal fade" id="modal-show">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">detail Reservation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="#">
              
              
               <div class="form-group">
                  <label for="exampleFormControlSelect1">user </label>
                  <span id="usershow" name="usershow"></span>
               </div>
               <div class="form-group">
                  <label for="exampleFormControlSelect1">labelle Service : </label>
                  <span id="serviceName" name="serviceName">    </span> 
                
               </div>
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Identifiant Service : </label>
                  <a href="#" class="badge badge-light" id="serviceId" name="serviceId"></a>                         
               </div>
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Contact  : </label>
                  <a href="#" class="badge badge-light" id="contactId" name="contactId"></a>
              
                
               </div>


             
              </form>
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      

 

    </section>
    <!-- /.content -->
  </div>
  @endsection

<!-- DataTables -->
@section('DataTableJS')
<!-- DataTables -->
<script src="{{ asset('dist/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dist/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endsection

<!-- page script -->
@section('DataTable')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      language: {
        url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/French.json'
    },
    });
  
  });
</script>

@endsection
@section('DataTablesCss')
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">   
@endsection
@section('pageScript')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
   
  });
</script>
@endsection
@push('contact-scripts')
<script src="contact/jqBootstrapValidation.js"></script>
<script src="contact/contact_me.js"></script>
@endpush

@section('modelEdit')
<script type="text/javascript">
  $(document).on("click", ".open-AddBookDialog", function () {

  var id =$(this).data('id');

  //alert( $(this).data('id'));
 

  $(".modal-body #userEdit").val($(this).data('user'));
  $(".modal-body #service_idEdit").val($(this).data('service_id'));
  $(".modal-body #labelle_ServiceEdit").val($(this).data('labelle_Service'));
 
  $(".modal-body #id").val( id );
});

$(document).on("click", ".open-showDialog", function () {

var id =$(this).data('id');

console.log($(this).data('user'));
console.log($(this).data('service'));
console.log($(this).data('nomservice'));

/* $(".modal-body #usershow").innerHTML =($(this).data('user'));
$(".modal-body #serviceId").innerHTML=$(this).data('service');
$(".modal-body #ServiceName").innerHTML =$(this).data('nomservice'); */
// $(".modal-body #usershow").innerHTML = "<span id='test'>Hello</span>";
document.getElementById('usershow').innerHTML = " "+$(this).data('user');
document.getElementById('serviceId').innerHTML = " "+$(this).data('service');
document.getElementById('serviceName').innerHTML += " "+$(this).data('nomservice');
document.getElementById('contactId').innerHTML += " "+$(this).data('contact');
$(".modal-body #id").val( id );
});
 </script>@endsection
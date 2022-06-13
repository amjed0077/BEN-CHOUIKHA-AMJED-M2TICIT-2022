
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
                  <tr><th>  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                      +
                    </button></th></tr>
                  <tr>
                  <tr>
                  
                   
                    <th>id</th>
                    <th>id_hotel</th>
                    <th>arrangement</th>
                    <th>Prix</th>
                    <th>Action</th>
                    
                 
                  </tr>
                  </thead>
                  <tbody>
                 @foreach ($data["arrangements"] as $arrangement)
                  <tr>
                  <td>{{$arrangement->id}}</td> 
                    <td>{{$arrangement->hotel->name}}</td> 
                    <td>{{$arrangement->arrangement_labelle}}</td> 
                    <td>{{$arrangement->prix}}</td>
                 

                  
                  <td>
                    <div class="btn-group">
<!--                       <button type="button" class="btn btn-default open-AddBookDialog" data-toggle="modal" data-target="#modal-Edit"  data-id_hotel="{{$arrangement->hotel_id}}"  data-arrangement_labelle="{{$arrangement->arrangement_labelle}}" data-prix="{{$arrangement->prix}}"  >
                        <i class="fa fa-edit fa-1x"></i>
                      </button>

                    
                       <button type="button" class="btn btn-default open-showDialog" data-toggle="modal" data-target="#modal-show"  data-id_hotel="{{$arrangement->id_hotel}}"  data-arrangement_labelle="{{$arrangement->arrangement_labelle}}" data-prix="{{$arrangement->prix}}" >
                        <i class="fa fa-eye fa-1x"></i>
                      </button> -->

                        <form action="{{ route('arrangements.destroy', $arrangement->id)}}" method="post">
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
                     
                  <th>id</th>
                    <th>id_hotel</th>
                    <th>arrangement</th>
                    <th>Prix</th>
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
              <h4 class="modal-title">Ajout un arrangement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('arrangements.store')}}">
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                @csrf
               
                
                <div class="form-group">
                  <label for="exampleFormControlSelect1">HOTEL</label>
                  <select class="form-control" id="id_hotel" name="id_hotel">
                    
                    @foreach ($data["hotels"] as $hotel)
                    <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                     @endforeach
                  
                  </select>
</div>
                
             
                
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Arrangment</label>
                  <select class="form-control" id="arrangement_labelle" name="arrangement_labelle">
                    <option selected>Arrangment</option>
                    <option value="LPD">LPD </option>
                    <option value="DP">DP</option>
                    <option value="PC">PC</option>
                    <option value="ALL IN">All In</option>
                  </select>
               </div>

               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">prix:</label>
                  <input type="number" class="form-control" id="prix" name="prix">
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
              <h4 class="modal-title">Modifier Arrangment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="#">
               @csrf
                <input type="hidden" name="id" id="id"  value="">
              
              
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">prix:</label>
                  <input type="number" class="form-control" id="prixEdit" name="prixEdit">
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
              <h4 class="modal-title">detail </h4>
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

$(".modal-body #id").val( id );
});
 </script>@endsection
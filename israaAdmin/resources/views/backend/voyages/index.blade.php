
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
                  
                    <th>image</th>
                    <th>destination</th>
                    <th>nbjours</th>
                    <th>date</th>
                    <th>prix</th>
                    <th>description</th>
                 
                    <th>Action</th>
                    
                 
                  </tr>
                  </thead>
                  <tbody>
                 @foreach ($data["voyages"] as $voyage)
                  <tr>
                  
                    <td>  <img src="http://127.0.0.1:8000/storage/voyages/{{$voyage->image}}" class="rounded" alt="..." width="100" height="100"></td>
                    <td>{{$voyage->destination}}</td> 
                    <td>{{$voyage->nbjours}}</td>
                    <td>{{$voyage->date}}</td>
                    <td>{{$voyage->prix}}</td>
                    <td>{{$voyage->description}}</td>
                   
                  
                  
                  
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default open-AddBookDialog" data-toggle="modal" data-target="#modal-Edit"  data-id="{{$voyage->id}}"  data-destination="{{$voyage->destination}}" data-nbjours="{{$voyage->nbjours}}" data-date="{{$voyage->date}}" data-prix="{{$voyage->prix}}"  data-description="{{$voyage->description}}"  data-hotel_id="{{$voyage->hotel}}">
                        <i class="fa fa-edit fa-1x"></i>
                      </button>
                      {{-- <a href="{{ route('voyages.show', $voyage->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"></a> --}}

                        <form action="{{ route('voyages.destroy', $voyage->id)}}" method="post">
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
                     
                 
                    <th>labelle</th>
                 
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
              <h4 class="modal-title">Ajout Voyage Organisé</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('voyages.store')}}" enctype="multipart/form-data">
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                @csrf
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Image:</label>
                  <input type="file" class="form-control-file" id="image" name="image">
                </div>
                
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Destination:</label>
                  <input type="text" class="form-control" id="destination" name="destination">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">prix:</label>
                  <input type="number" class="form-control" id="prix" name="prix">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nb jours:</label>
                  <input type="text" class="form-control" id="nbjours" name="nbjours">
                </div>
                
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Date:</label>
                  <input type="date" class="form-control" id="date" name="date">
                </div>
                
               <div class="form-group">
               <label for="exampleFormControlSelect1">HOTEL</label>
                  <select class="form-control" id="id_hotel" name="id_hotel">
                    
                    @foreach ($data["hotels"] as $hotel)
                    <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                     @endforeach
                  
                  </select>
               </div>
                <div class="form-group">
                 <label for="exampleFormControlTextarea">Description</label>
                 <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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
              <h4 class="modal-title">Modifier voyage</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('voyages.update2')}}">
               @csrf
                <input type="hidden" name="id" id="id"  value="">
              
                
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Destination:</label>
                  <input type="text" class="form-control" id="destinationEdit" name="destinationEdit">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">prix:</label>
                  <input type="number" class="form-control" id="prixEdit" name="prixEdit">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nb jours:</label>
                  <input type="text" class="form-control" id="nbjoursEdit" name="nbjoursEdit">
                </div>
                
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Date:</label>
                  <input type="date" class="form-control" id="dateEdit" name="dateEdit">
                </div>
                
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Hotel</label>
                  <select class="form-control" id="hotel_idEdit" name="hotel_idEdit">
                  @foreach ($data["hotels"] as $hotel)
                    <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                     @endforeach
                  </select>
               </div>
                <div class="form-group">
                 <label for="exampleFormControlTextarea">Description</label>
                 <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
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
 
  $(".modal-body #destinationEdit").val($(this).data('destination'));
  $(".modal-body #prixEdit").val($(this).data('prix'));
  $(".modal-body #nbjoursEdit").val($(this).data('nbjours'));
  $(".modal-body #dateEdit").val($(this).data('date'));
  $(".modal-body #hotel_idEdit").val($(this).data('hotel_id'));
  $(".modal-body #descriptionEdit").val($(this).data('description'));
 
  $(".modal-body #id").val( id );
});
 </script>@endsection
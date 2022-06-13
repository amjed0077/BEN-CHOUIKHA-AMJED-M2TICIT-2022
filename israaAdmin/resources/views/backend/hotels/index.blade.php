
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
                  
                    <th>Image</th>
                    <th>Hotel</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>étoils</th> 
                    <th>adresse</th>
                 
                    <th>Action</th>
                    
                 
                  </tr>
                  </thead>
                  <tbody>
                 @foreach ($data["hotels"] as $hotel)
                  <tr>
                  
                    <td>  <img src="http://127.0.0.1:8000/storage/hotels/{{$hotel ->image}}" class="rounded" alt="..." width="100" height="100"></td>
                    <td>{{$hotel ->name}}</td> 
                    <td>{{$hotel ->description}}</td>
                    <td>{{$hotel ->prix}}</td>
                    <td>{{$hotel ->nbetoils}}</td>
                    <td>{{$hotel ->adresse}}</td>
                   
                  
                  
                  
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default open-AddBookDialog" data-toggle="modal" data-target="#modal-Edit"  data-id="{{$hotel->id}}"  data-name="{{$hotel->name}}" data-prix="{{$hotel->prix}}" data-description="{{$hotel->description}}" data-nbetoils="{{$hotel->nbetoils}}" data-adresse="{{$hotel->adresse}}" >
                        <i class="fa fa-edit fa-1x"></i>
                      </button>
                      {{-- <a href="{{ route('hotels.show', $hotel->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"></a> --}}

                        <form action="{{ route('hotels.destroy', $hotel->id)}}" method="post">
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
                    <th>image</th>
                    <th>name</th>
                    <th>description</th>
                    <th>prix</th>
                    <th>nbetoils</th> 
                    <th>adresse</th>
                 
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
              <h4 class="modal-title">Ajout d'un hotel</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('hotels.store') }}"enctype="multipart/form-data">
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
               @csrf
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Image:</label>
                  <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nom Hotel:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">prix:</label>
                  <input type="number" class="form-control" id="prix" name="prix">
                </div>

                <div class="form-group">
                 <label for="exampleFormControlTextarea">Description</label>
                 <textarea class="form-control" id="description" name="description" rows="3"></textarea>
               </div>

               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">NB etoils:</label>
                  <input type="text" class="form-control" id="nbetoils" name="nbetoils">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Adresse:</label>
                  <input type="text" class="form-control" id="adresse" name="adresse">
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
              <h4 class="modal-title">Modifier un hotels</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('hotels.update2')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id"  value="">
     

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nom Hotel:</label>
                  <input type="text" class="form-control" id="nameEdit" name="nameEdit">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">prix:</label>
                  <input type="number" class="form-control" id="prixEdit" name="prixEdit">
                </div>

                <div class="form-group">
                 <label for="exampleFormControlTextarea">Description</label>
                 <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
               </div>

               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">NB etoils:</label>
                  <input type="text" class="form-control" id="nbetoilsEdit" name="nbetoilsEdit">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Adresse:</label>
                  <input type="text" class="form-control" id="adresseEdit" name="adresseEdit">
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
  var name = $(this).data('name');
  var id =$(this).data('id');
  var prix = $(this).data('prix');
  var description = $(this).data('description');
  var nbetoils = $(this).data('nbetoils');
  var adresse = $(this).data('adresse');

  //alert( $(this).data('id'));
  $(".modal-body #nameEdit").val( name );
 
  $(".modal-body #id").val( id );
  $(".modal-body #prixEdit").val( prix );
  $(".modal-body #descriptionEdit").val( description );
  $(".modal-body #nbetoilsEdit").val( nbetoils );
  $(".modal-body #adresseEdit").val( adresse );

});
 </script>@endsection
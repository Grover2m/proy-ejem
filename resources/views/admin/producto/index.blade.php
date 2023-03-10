@extends("layouts.admin")

@section("titulo","Gestion Productos")

@section("contenido")

<div class="card">
    <div class="card-body">
        @include("admin.producto.nuevo")
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table id="example1" class=" table table-striped table-hover">

            <thead>
                <tr>
                    <td>ID</td>
                    <td>NOMBRE</td>
                    <td>PRECIO</td>
                    <td>STOCK</td>
                    <td>SUBTOTAL</td>
                    <td>CATEGORIA</td>
                    <td>ACCIONES</td>
                </tr>
            </thead>
            <TBody>
                @foreach($productos as $prod)
                <TR>
                    <td>{{$prod->id}}</td>
                    <td>{{$prod->nombre}}</td>
                    <td>{{$prod->precio}}</td>
                    <td>{{$prod->stock}}</td>
                    <td>{{$prod->stock * $prod->precio}}</td>
                    <td>{{$prod->categoria->nombre}}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal{{$prod->id}}">
                           <i class = "fa fa-eye"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="Modal{{$prod->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Producto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{$prod->imagen}}" alt="" width = "50%">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </TR>
                @endforeach
            </TBody>
        </table>
    </div>

</div>



@endsection

@section("css")

<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

@section("js")

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection
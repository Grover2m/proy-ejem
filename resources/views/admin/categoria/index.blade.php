@extends("layouts.admin")

@section("contenido")

<!-- Button trigger modal -->


<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="m-0 float-left">Lista de Categorias</h5>

        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
            Nueva categoria
        </button>
    </div>
    <div class="card-body">


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Categorias</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('categoria.store')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <label for="">Ingrese nombre</label>
                            <input type="text" name="nombre" class="form-control">

                            <label for="">Ingrese Detalle</label>
                            <textarea name="detalle" id="" cols="30" rows="10" class="form-control"></textarea>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <TAble class=" table">
            <THEad>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DETALLE</th>
                    <th>ACCION</th>
                </tr>
            </THEad>
            <TBody>
                @foreach ($categorias as $cat)
                <tr>
                    <td>{{ $cat->id}}</td>
                    <td>{{ $cat->nombre}}</td>
                    <td>{{ $cat->detalle}}</td>
                    <td>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal{{$cat->id}}">
                            <i class="fa fa-eye"> </i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="Modal{{$cat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="">Ingrese nombre</label>
                                        <input type="text" name="nombre" class="form-control" readonly value="{{$cat->nombre}}">

                                        <label for="">Ingrese Detalle</label>
                                        <textarea name="detalle" id="" cols="30" rows="10" class="form-control" readonly> {{$cat->detalle}}</textarea>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Modificar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit{{$cat->id}}">
                            <i class="fa fa-edit"> </i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalEdit{{$cat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('categoria.update', $cat-> id)}}" method="post">
                                        @csrf
                                        @method("PUT")
                                        <div class="modal-body">
                                            <label for="">Ingrese nombre</label>
                                            <input type="text" name="nombre" class="form-control" value="{{$cat->nombre}}">

                                            <label for="">Ingrese Detalle</label>
                                            <textarea name="detalle" id="" cols="30" rows="10" class="form-control"> {{$cat->detalle}} </textarea>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Modificar</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        <a href="{{route('categoria.show', $cat->id)}}" class="btn btn-info btn-xs">Mostrar Producto</a>
              
                    </td>
                </tr>
                @endforeach
            </TBody>
        </TAble>

    </div>
</div>



@endsection
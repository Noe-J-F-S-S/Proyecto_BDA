<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Editar Producto
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">Todos Los Productos</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Nombre</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nombre Producto" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Slug Producto" class="form-control input-md" wire:model="slug">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Corta Descripción</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Corta Descripción" wire:model="short_description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Descripción</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Descripción" wire:model="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Precio Regular</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Precio Regular" class="form-control input-md" wire:model="regular_price">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Precio a Vender</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Precio Venta" class="form-control input-md" wire:model="sale_price">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Stock</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">En Stock</option>
                                        <option value="outofstock">Sin Stock</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Destacado</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Cantidad</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Cantidad" class="form-control input-md" wire:model="quantity">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Imagen</label>
                                <div class="col-md-4">
                                    <input type="file" wire:model="newimage">
                                    {{-- <div>
                                        {{$imageName}}
                                    </div> --}}
                                    @if ($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120">
                                    @else 
                                        <img src="{{asset('assets/images/products')}}/{{$image}}" width="120">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Categoria</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Seleccione Categoria</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

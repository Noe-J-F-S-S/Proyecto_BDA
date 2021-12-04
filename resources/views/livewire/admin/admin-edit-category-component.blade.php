<div>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Editar Categoria
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">Todas Las Categorias</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateCategory()" method="post">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">Nombre Categoria</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Nombre" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">Slug</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Slug" class="form-control input-md" wire:model="slug">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

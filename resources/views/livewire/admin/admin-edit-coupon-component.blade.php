<div>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Editar Cupon
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">Todas Los Cupones</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateCoupon">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">Código Cupon</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Código Cupon" class="form-control input-md" wire:model="code">
                                @error('code') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">Tipo de Cupon</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="type">
                                    <option value="">Seleccione</option>
                                    <option value="fixed">Fijado</option>
                                    <option value="percent">Porcentaje</option>
                                </select>
                                @error('type') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">Valor de Cupon</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Valor de Cupon" class="form-control input-md" wire:model="value">
                                @error('value') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">Valor Carrito</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Valor Carrito" class="form-control input-md" wire:model="cart_value">
                                @error('cart_value') <p class="text-danger">{{$message}}</p> @enderror
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

@include('layouts.master')


<div class="content-wrapper">
    <section class="content">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Item</h3>
            </div>

            <form action="{{ route('editar_menu') }}" method="post">
            <div class="box-body">

                <input name="id" type="hidden" value="{{$item->id}}">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$item->name}}" name="name" id="name" placeholder="Nome">
                        <br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Rota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$item->route}}" name="route" id="route" placeholder="Rota">
                        <br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Pai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$item->parent_id}}" name="parent_id" id="parent_id" placeholder="Pai">
                        <br />
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Editar</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </div>
        </form>

        </div>



    </section>
</div>

@include('includes.footpage')



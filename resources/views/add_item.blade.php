@include('layouts.master')



<div class="content-wrapper">
    <section class="content">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Adicionar Menu Item</h3>
            </div>

        <form action="{{ route('addmenu') }}" method="post">

            <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
                    <br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Rota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="route" id="route" placeholder="Rota">
                    <br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pai</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="parent_id" id="parent_id" placeholder="Pai">
                    <br />
                </div>
            </div>


                <button type="submit" class="btn btn-primary">Adicionar</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </div>


        </form>
        </div>

    </section>
</div>

@include('includes.footpage')



@include('layouts.master')

<head>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( ".sortable2" ).sortable({
                axis: 'y',
                stop: function (el) {
                    $.map($(this).find('tr.fechado'), function(el){
                        var id = el.id;
                        var order = el.value;
                        var index = $(el).index();
                        var _token = $("#csrf-token").value;

                        $.ajax({
                            type: "POST",
                            url: '/reorder',
                            data: {"_token": "{{ csrf_token() }}", id: id, order: order, index: index},
                            success: function( msg ) {
                                //alert(msg);
                            }
                        });
                    })
                }
            });
            $( ".sortable2" ).disableSelection();
        } );
    </script>
</head>

<div class="content-wrapper">
    <section class="content">


    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Gerenciar Items do Menu</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">

                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>ID</th>
                            <th>Ordem</th>
                            <th>Editar</th>
                        </tr>
                        </thead>

                        <tbody class="sortable2" >
                        @foreach ($items as $item)

                            <tr id="{{$item->id}}" class="fechado">
                                <td>{{$item->name}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->order}}</td>
                                <td>
                                    <a class="btn btn-small btn-success" href="{{ URL::to('edit_menu/' . $item->id) }}">Editar</a>

                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    <a class="btn btn-small btn-info" href="{{ URL::to('delete/' . $item->id) }}">Excluir</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>













</section>
</div>

@include('includes.footpage')


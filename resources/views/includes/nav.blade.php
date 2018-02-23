<!-- Left side column. contains the logo and sidebar -->


<aside class="main-sidebar">
    <section class="sidebar">

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{ url('manage_menu') }}"><i class="fa fa-circle-o"></i> Gerenciar Menu</a></li>
            <li><a href="{{ url('add_item') }}"><i class="fa fa-circle-o"></i> Add Menu Item</a></li>
        </ul>
        <ul class="sidebar-menu" data-widget="tree">

            @foreach($menu as $item)
                <li class="treeview fechada" id="{{$item->id}}">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>{{$item->name}}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    @if ($item->submenus->count())
                        <ul class="treeview-menu">
                            @foreach ($item->submenus as $subitem)
                                <li><a href="{{$subitem->route}}"><i class="fa fa-circle-o"></i> {{$subitem->name}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </section>
</aside>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Teste;
use function Sodium\crypto_box_open;

class PageController extends Controller
{

    public function getWelcome(){
        return view('welcome');
    }

    public function EditMenu($prisw){
        $item = DB::table('testes')->where('id', '=', $prisw)->get()->load('submenus');
        return view('edit_menu', compact('item', $item));
    }

    public function getManageMenu(){
        $items = DB::table('testes')->whereNull('parent_id')->orWhere('parent_id', '=', 0)->orderBy('order')->get();
        return view('manage_menu', compact('items', $items));
    }

    public function getAddItem(){
        return view('add_item');
    }

    public function getDashboard(){
        return view('dashboard');
    }

    public function AddMenuItem(Request $request)
    {

        $name = $request['name'];
        $parent_id = $request['parent_id'];
        $route = $request['route'];
        $order = $request['order'];

        $menu = new Teste();
        $menu->name = "";
        if ($name != "") {
            $menu->name = $name;
        }
        $menu->route = "";
        if ($route != null) {
            $menu->route = $route;
        }



        $menu->order = (DB::table('testes')->whereNull('parent_id')->orWhere('parent_id', '=', 0)->max('order')) + 1;


        $menu->parent_id = 0;
        if($parent_id != null) {
            $menu->parent_id = $parent_id;
        }


        $menu->save();

        $items = DB::table('testes')->whereNull('parent_id')->orWhere('parent_id', '=', 0)->orderBy('order')->get();
        return view('manage_menu', compact('items', $items));
    }
}

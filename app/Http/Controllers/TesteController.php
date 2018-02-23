<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teste;
use Illuminate\Support\Facades\View;
use DB;

class TesteController extends Controller
{
    public function EditMenu($id)
    {
        $item = Teste::find($id);

        return view('edit_menu', compact('item', $item));
    }

    public function populaTabela(){
        $items = DB::table('testes')->whereNull('parent_id')->orWhere('parent_id', '=', 0)->orderBy('order')->get();
        return $items;
    }

    public function DeleteMenu($id)
    {
        DB::table('testes')->where('id', '=', $id)->delete();
        DB::table('testes')->where('parent_id', '=', $id)->delete();

        $items = $this->populaTabela();
        return view('manage_menu', compact('items', $items));
    }

    public function EditarMenu(Request $request)
    {
        $item = Teste::find($request->id);

        $name = $request['name'];
        $parent_id = $request['parent_id'];
        $route = $request['route'];
        $order = $request['order'];

        if($name != "") {
            $item->name = $name;
        }
        $item->route = "";
        if($route != null) {
            $item->route = $route;
        }
        $item->parent_id = 0;
        if($parent_id != null) {
            $item->parent_id = $parent_id;
        }

        $item->save();

        $items = $this->populaTabela();
        return view('manage_menu', compact('items', $items));
    }

    public function reorder(Request $request)
    {
        DB::table('testes')->where('id', '=', $request->id)->update(['order' => ($request->index + 1)]);
    }


}

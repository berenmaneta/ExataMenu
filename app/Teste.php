<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{

    public function submenus()
    {
        return $this->hasMany(Teste::class, 'parent_id','id');
    }

    public function allSubMenus()
    {
        return $this->submenus()->with('allSubMenus');
    }

    public function menu()
    {
        return $this->belongsTo('Teste');
    }



}

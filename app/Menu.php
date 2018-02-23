<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function submenus()
    {
        return $this->hasMany(Submenu::class, 'menu_id','id');
    }

    public function allSubMenus()
    {
        return $this->submenus()->with('allSubMenus');
    }
}

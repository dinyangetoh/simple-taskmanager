<?php

namespace Dinyangetoh\SimpleTaskmanager\Models;

use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    
    public function tasks()
    {
    	return $this->hasMany('\Dinyangetoh\SimpleTaskmanager\Models\Task', 'category_id');
    }

     public function slugIt($text)
    
    {
        return str_replace(' ', '-', strtolower(trim($text)));
    }
}

<?php

namespace Dinyangetoh\SimpleTaskmanager;

use Illuminate\Support\Facades\Facade;

class TaskManagerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'taskmanager';
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todo';

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
    );

    public function getName()
    {
        return $this->name;
    }

    public function getRouteKey()
{
    return $this->category_id;
}
}

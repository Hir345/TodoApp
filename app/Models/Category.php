<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'deadline' => 'required|date',
    );

    public function getData()
    {
        return $this->name .':' . $this->deadline;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDl()
    {
        return $this->deadline;
    }

    public function todo()
    {
        return $this->hasMany('App\Models\Todo');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Model
{
	use SluggableTrait;
	protected $sluggable = [
		'build_from' => 'title',
		'save_to'    => 'slug',
	];

	private $rules = [
		'title' => 'required',
		'body' => 'required',
	];


}

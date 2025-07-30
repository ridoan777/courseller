<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Module;
use App\Models\Content;

class Course extends Model
{
	protected $fillable = [
		'course_title',
		'featured_video',
		'total_modules',
		'total_contents',
	];

	public function modules()
	{
		return $this->hasMany(Module::class);
	}

	public function contents()
	{
		return $this->hasManyThrough(Content::class, Module::class);
	}
}

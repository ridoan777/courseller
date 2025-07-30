<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $fillable = [
		'course_id',
		'module_id',
		'title',
		'source',
		'url',
		'length',
	];

	public function module()
	{
		return $this->belongsTo(Module::class);
	}

	public function course()
	{
		return $this->belongsTo(Course::class);
	}
}

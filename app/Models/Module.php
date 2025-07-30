<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Content;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
	protected $fillable = [
		'course_id',
		'title',
		'total_contents'
	];

	public function course()
	{
	return $this->belongsTo(Course::class);
	}
	
	public function contents()
	{
		return $this->hasMany(Content::class);
	}
}

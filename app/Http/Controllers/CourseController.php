<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\Content;
use Illuminate\Http\Request;

class CourseController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		
		return view('components.layouts.courses');
	}
	/**
	 * Display a create course page.
	 */
	public function singleCourse()
	{
		return view('components.layouts.singleCourse');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(Request $request)
	{
		$validated = $request->validate([
			'course_title' => 'required|string|max:120',
			'featured_video' => 'nullable|url|max:500',

			'modules' => 'required|array',
			'modules.*.title' => 'required|string|max:120',

			'modules.*.content' => 'nullable|array',
			'modules.*.content.*.title' => 'nullable|string|max:120',
			'modules.*.content.*.source' => 'nullable|string|max:60',
			'modules.*.content.*.url' => 'nullable|url|max:500',
			'modules.*.content.*.length' => 'nullable|string|max:60',
		]);

		$courses = Course::create([
			'course_title' => $validated['course_title'],
			'featured_video' => $validated['featured_video'],
		]);

		$totalContents = 0;
		
		foreach($validated['modules'] as $moduleItem){
			$modules = $courses->modules()->create([
				'title' => $moduleItem['title']
			]);

			// looping through each module
			$modulContents = 0;
			if(!empty($moduleItem['content']) && is_array($moduleItem['content'])) {
				foreach($moduleItem['content'] as $contentItem) {					

					$modules->contents()->create($contentItem + [
						'course_id' => $courses->id
					]);
					$modulContents++;
					$totalContents++;
				}
			}
					
			$modules->update([
				'total_contents' => $modulContents,
			]);

		}

		$courses->update([
			'total_modules' => count($validated['modules']),
			'total_contents' => $totalContents,
		]);

		dd("modules = " . count($validated['modules']) . ' ' . "contents = " . $totalContents);

	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Course $course)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Course $course)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Course $course)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Course $course)
	{
		//
	}
}

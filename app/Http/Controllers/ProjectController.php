<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Project::orderBy('id', 'desc')->with('type:id,libelle')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $directoryPhoto = 'projects';
        Storage::makeDirectory($directoryPhoto);

        $requestData = $request->all();
        if($request->hasFile('image')) 
        $requestData['image']= $request->file('image')->store($directoryPhoto );

        return Project::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $oldPhoto =$project->image;

        
        $requestData = $request->except(['_method','image']);
        
        if($request->hasFile('image')){
            $requestData['image']= $request->file('image')->store('projects');
        } 

        
        if( !empty($requestData['image']) )
        {
            Storage::delete($oldPhoto);
        }

        $project->update($requestData);

        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
      Storage::delete($project->image);
 
      return  Project::destroy($project->id);
    }
}

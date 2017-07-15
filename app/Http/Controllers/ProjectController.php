<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function getProjectInfo(Request $request){
      $projectDetails = $request->all();
      $project = DB::table('projects')
                      ->where('imgstring', $projectDetails['projectString'])
                      ->first();
      $about = explode('_', $project->about);
      $technical = explode('_', $project->technical);
      return response()->json(array('name'=> $project->name,
                                    'description'=> $project->description,
                                    'website'=> $project->website,
                                    'repo'=> $project->repo,
                                    'technical'=> json_encode($technical),
                                    'about'=> json_encode($about)), 200);
    }
}

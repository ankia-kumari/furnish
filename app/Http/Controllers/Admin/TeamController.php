<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTeamRequest;
use App\Http\Requests\EditTeamRequest;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function teamView(){
        $title = 'Team';

        $breadcrum = [
            'Team',
            'Add Team'
        ];

        return view('admin.team.add',compact('title','breadcrum'));
    }

    public function teamAdd(AddTeamRequest $request){

        $request_data = [
          'name' => $request['name'],
          'designation' => $request['designation'],
          'facebook_url' => $request['facebook_url'],
          'twitter_url' => $request['twitter_url'],
          'linkedin_url' => $request['linkedin_url'],
          'feed_url' => $request['feed_url'],
          'status' => $request['status']
        ];

        if($request->hasFile('image')){
            $request_data['image'] = file_upload($request->file('image'),'team');
        }

        if(Team::create($request_data)){

            return redirect()->route('admin.team.list')->with('success-status','data inserted');
        }

        return redirect()->route('admin.dashboard')->with('error-status','something went wrong');
    }

    public function teamList(){
        $title = 'List Of Team';

        $breadcrum = [
            'Team',
            'List Of Team'
        ];

        $team_list = Team::orderBy('created_at','desc')->get();

        return view('admin.team.list',compact('title','team_list','breadcrum'));
    }

    public function teamEditView(Request $request){
        $title = 'Edit Team';

        $breadcrum = [
            'Team',
            'Edit Of Team'
        ];

        $team_edit = Team::findOrFail($request->id);

        return view('admin.team.edit',compact('title','team_edit','breadcrum'));
    }

    public function teamEdit(EditTeamRequest $request){

        $team_edit = Team::Find($request->id);

        if ($team_edit){
           $data = $request->except('_token');

            if($request->hasFile('image')){
                $data['image'] = file_upload($request->file('image'),'team');
            }

           if ($team_edit->update($data)){
               return redirect()->route('admin.team.list')->with('success-status', 'data updated');
           }
        }

    }

    public function teamDelete(Request $request){
        $team_delete = Team::findOrFail($request->id);

        if ($team_delete->delete()){

            return redirect()->route('admin.team.list')->with('success-status','data deleted');
        }
    }
}

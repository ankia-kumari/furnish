<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTeamRequest;
use App\Http\Requests\EditTeamRequest;
use App\Team;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TeamExport;
use App\Imports\TeamImport;

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

    public function teamList(Request $request){
        $title = 'List Of Team';

        $breadcrum = [
            'Team',
            'List Of Team'
        ];

        $team_list_data = Team::orderBy('created_at','desc');

        if ($request->has('search') && !empty($request['search'])){

            $team_list_data->where(function ($search) use($request){

                $search->where('name','like','%'.$request['search'].'%');
                $search->orWhere('designation','like','%'.$request['search'].'%');
                $search->orWhere('facebook_url','like','%'.$request['search'].'%');
                $search->orWhere('twitter_url','like','%'.$request['search'].'%');
                $search->orWhere('linkedin_url','like','%'.$request['search'].'%');
                $search->orWhere('feed_url','like','%'.$request['search'].'%');
            });
        }

        if ($request->has('export')){

            return Excel::download(new TeamExport($team_list_data->get()),'team_list.xlsx');

        }

        $team_list = $team_list_data->get();

        if ($request->ajax()){

            return view('admin.team.list-ajax',compact('team_list','team_list_data'));
        }

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

    public function downloadExport(){

        return Excel::download(new TeamExport,'team.xlsx');

    }

    public function listImport(Request $request){

        if ($request->has('import_file')) {

            Excel::import(new TeamImport, $request->file('import_file'));

            return back()->with('success-status', 'file import successfully');

        }
        else{

            return redirect('/')->with('error-status','something went wrong');
        }


    }
}

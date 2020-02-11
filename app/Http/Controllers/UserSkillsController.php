<?php

namespace App\Http\Controllers;

use App\Skill;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserSkillsController extends Controller
{
    /**
     * Display a listing of the skills.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills_user = Auth::user()->skills()->paginate(5);

        return view('skills_user.index',compact('skills_user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
      
    /**
     * Show the form for creating a new skills.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        return view('skills_user.create', compact('skills'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'level' => 'required',
            
        ]);
  
        DB::table('skill_user')->join('skills', 'skill_user.skill_id', '=', 'skills.id')->insert(['skill_id' => $request->name, 'user_id' => Auth::user()->id, 'level' => $request->level]);
   
        return redirect()->route('skills_user.index')
                        ->with('success','Competence ajoutee avec succes !');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return view('skills_user.show',compact('skill'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
      return view('skills_user.edit',['skill'=> $skill]);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'level' => 'required',
        ]);
  
        DB::table('skill_user')->join('skills', 'skill_user.skill_id', '=', 'skills.id')->update(['skill_id' => $request->name, 'user_id' => Auth::user()->id, 'level' => $request->level]);
  
        return redirect()->route('skills_user.index')
                        ->with('success','Compétence mis à jour avec succes !');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
  
        return redirect()->route('skills_user.index')
                        ->with('success','Competence supprimee avec succes !');
    }
}

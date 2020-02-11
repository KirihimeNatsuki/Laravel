<?php
  
namespace App\Http\Controllers;
  
use App\Skill;
use Illuminate\Http\Request;
  
class SkillsController extends Controller
{
    /**
     * Display a listing of the skills.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::latest()->paginate(10);
  
        return view('skills.index',compact('skills'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new skills.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create');
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
            'logo',
        ]);
  
        Skill::create($request->all());
   
        return redirect()->route('skills.index')
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
        return view('skills.show',compact('skill'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit',compact('skill'));
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
            'logo',
        ]);
  
        $skill->update($request->all());
  
        return redirect()->route('skills.index')
                        ->with('success','Competence mis � jour avec succes !');
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
  
        return redirect()->route('skills.index')
                        ->with('success','Competence supprimee avec succes !');
    }
}
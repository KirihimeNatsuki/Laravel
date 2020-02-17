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
            'logo' =>  'required|image|max:2048',
        ]);
        
        $logo = $request->file('logo');
        $extension = $logo->getClientOriginalExtension();
        $new_name = time() . '.' . $extension;
        $logo->move(public_path('/images/'), $new_name);
        
        Skill::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $new_name,
            ]);
   
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
        $logo_name = $request->hidden_image;
        $logo = $request->file('logo');
        if($logo != '')
        {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'logo' =>  'required|image|max:2048',
            ]);
            $extension = $logo->getClientOriginalExtension();
            $logo_name = time() . '.' . $extension;
            $logo->move(public_path('/images/'), $logo_name);
        }
        else
        {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
        }
  
        $skill->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logo_name,
            ]);
  
        return redirect()->route('skills.index')
                        ->with('success','Competence mis à jour avec succes !');
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
<?php
namespace App\Http\Controllers;
use App\Models\Eveniment;
use Illuminate\Http\Request;

class EvenimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $evenimente = Eveniment::orderBy('titlu','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('evenimente.list',compact('evenimente'))->with('i',$value);
        /** daca am numit eveniments.list asa numim si in views */
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evenimente.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['titlu' => 'required','descriere' => 'required','data'=> 'required','ora'=> 'required','locatie' => 'required']);
        // create new task
        Eveniment::create($request->all());
        return redirect()->route('evenimente.index')->with('success', 'Your eveniment has been added successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eveniment = Eveniment::find($id);
        return view('evenimente.show',compact('eveniment'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $eveniment = Eveniment::find($id);
        return view('evenimente.edit',compact('eveniment'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['titlu' => 'required','descriere' => 'required','data'=> 'required','ora'=> 'required','locatie' => 'required']);
        Eveniment::find($id)->update($request->all());
        return redirect()->route('evenimente.index')->with('success','Eveniment updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    7
     */
    public function destroy($id)
    {
        Eveniment::find($id)->delete();
        return redirect()->route('evenimente.index')->with('success','eVENIMENTS removed successfully');
    }
}

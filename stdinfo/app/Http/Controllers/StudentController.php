<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentinfo;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = studentinfo::all();
        return view('index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'student_ID'    =>  'required',
            'name'          =>  'required',
            'email'         =>  'required',
            'school'        =>  'required',
            'program'       =>  'required',
            'batch'         =>  'required',
            'image'         =>  'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'student_ID'       =>   $request->student_ID,
            'name'             =>   $request->name,
            'email'            =>   $request->email,
            'school'           =>   $request->school,
            'program'          =>   $request->program,
            'batch'            =>   $request->batch,
            'image'            =>   $new_name
        );

        studentinfo::create($form_data);

        return redirect('studentinfo')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = studentinfo::findOrFail($id);
        return view('view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = studentinfo::findOrFail($id);
        return view('edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'student_ID'    =>  'required',
                'name'          =>  'required',
                'email'         =>  'required',
                'school'        =>  'required',
                'program'       =>  'required',
                'batch'         =>  'required',
                'image'         =>  'required|image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'student_ID'    =>  'required',
                'name'          =>  'required',
                'email'         =>  'required',
                'school'        =>  'required',
                'program'       =>  'required',
                'batch'         =>  'required',
            ]);
        }
        $form_data = array(
            'student_ID'       =>   $request->student_ID,
            'name'             =>   $request->name,
            'email'            =>   $request->email,
            'school'           =>   $request->school,
            'program'          =>   $request->program,
            'batch'            =>   $request->batch,
            'image'            =>   $image_name
        );
        studentinfo::whereId($id)->update($form_data);

        return redirect('studentinfo')->with('success', 'Data is successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = studentinfo::findOrFail($id);
        $data->delete();

        return redirect('studentinfo')->with('success', 'Data is successfully deleted');
    }
}

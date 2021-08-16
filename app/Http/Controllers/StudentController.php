<?php

namespace App\Http\Controllers;

use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'student_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'age' => 'required|numeric',
            'contact' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);

        //handle featured image
        $image = $request->file('image');
        if ($image) {
            // Make Unique Name for Image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Check Dir is exists

            if (!Storage::disk('public')->exists('image')) {
                Storage::disk('public')->makeDirectory('image');
            }

            // Resize Image  and upload
            $cropImage = Image::make($image)->resize(400, 300)->stream();
            Storage::disk('public')->put('image/' . $image_name, $cropImage);

        }

        $student = new Student();
        $student->student_name = $request->student_name;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->contact = $request->contact;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->department = $request->department;
        $student->image = $image_name;
        $student->save();
        return redirect(route('student.index'))->with('success', 'Student Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {

        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'student_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'age' => 'required|numeric',
            'contact' => 'required|numeric',
            'image' => 'mimes:jpeg,png,jpg',
        ]);

        //handle featured image

        $image = $request->file('image');

        if ($image) {

            // Make Unique Name for Image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Check Dir is exists
            if (!Storage::disk('public')->exists('image')) {
                Storage::disk('public')->makeDirectory('image');
            }

            // Resize Image and upload
            $cropImage = Image::make($image)->resize(400, 300)->stream();
            Storage::disk('public')->put('image/' . $image_name, $cropImage);

            if (Storage::disk('public')->exists('image/' . $student->image)) {
                Storage::disk('public')->delete('image/' . $student->image);
            }
            $student->image = $image_name;
        }

        $student->student_name = $request->student_name;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->contact = $request->contact;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->department = $request->department;
        $student->save();

        

        
        return redirect(route('student.index'))->with('success', 'Student Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //delete old featured image
        if (Storage::disk('public')->exists('image/' . $student->image)) {
            Storage::disk('public')->delete('image/' . $student->image);
        }

        $student->delete();
        return redirect()->back()->with('success', 'Student Deleted Successfully');
    }
}

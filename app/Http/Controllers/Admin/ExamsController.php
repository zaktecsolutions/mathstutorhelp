<?php

namespace App\Http\Controllers\Admin;
use App\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamsController extends Controller
{

    public function __construct()
    {
        /**
         * access to registered user
         */
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'User index page';
        $exams = exam::all(); //gets all the exams
        //   dd($exams);
        return view('admin.exams.index')->with('exams', $exams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'exam_name' => 'required| max:120',
            'exam_code' => 'required| max:120',
            'exam_desc' => 'required| max:120',
            'exam_body' => 'required| max:120',
            'exam_level' => 'required| max:120',
        ]);

        $exam = new exam;
        $exam->exam_name = $request->exam_name;
        $exam->exam_code = $request->exam_code;
        $exam->exam_desc = $request->exam_desc;
        $exam->exam_body = $request->exam_body;
        $exam->exam_level = $request->exam_level;

        if ($exam->save()) {$request->session()->flash('success', $exam->exam_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.exams.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
          // return 'User index page';
        $exams = exam::all(); //gets all the exams
        return view('admin.exams.show')->with('exams', $exams);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //dd($exam)  - check if exam is coming
        $exams = exam::all(); //get all the exams
        return view('admin.exams.edit')->with(['exam' => $exam, // send the exam you want to edit
            // 'exams' => $exams, // send all the exams
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        $this->validate($request, [
            'exam_name' => 'required| max:120',
            'exam_code' => 'required| max:120',
            'exam_desc' => 'required| max:120',
            'exam_body' => 'required| max:120',
            'exam_level' => 'required| max:120',
        ]);

        $exam->exam_name = $request->exam_name;
        $exam->exam_code = $request->exam_code;
        $exam->exam_desc = $request->exam_desc;
        $exam->exam_body = $request->exam_body;
        $exam->exam_level = $request->exam_level;

        if ($exam->save()) {$request->session()->flash('success', $exam->exam_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.exams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()->route('admin.exams.index');
    }
}

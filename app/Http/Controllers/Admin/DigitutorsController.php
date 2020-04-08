<?php

namespace App\Http\Controllers\Admin;

use App\Digitutor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DigitutorsController extends Controller
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
        $digitutors = digitutor::all(); //gets all the digitutors
        //   dd($digitutors);
        return view('admin.digitutors.index')->with('digitutors', $digitutors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.digitutors.create');
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
            'digitutor_name' => 'required| max:120',
            'digitutor_body' => 'required| max:120',
            'digitutor_image' => 'required| max:120',
            'ans_body' => 'required| max:120',
            'ans_explanation' => 'required| max:120',
        ]);

        $digitutor = new digitutor;
        $digitutor->digitutor_name = $request->digitutor_name;
        $digitutor->digitutor_body = $request->digitutor_body;
        $digitutor->digitutor_image = $request->digitutor_image;
        $digitutor->ans_body = $request->ans_body;
        $digitutor->ans_explanation = $request->ans_explanation;

        if ($digitutor->save()) {$request->session()->flash('success', $digitutor->digitutor_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.digitutors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Digitutor  $digitutor
     * @return \Illuminate\Http\Response
     */
    public function show(Digitutor $digitutor)
    {
        //
        // return 'User index page';
        $digitutors = digitutor::all(); //gets all the digitutors
        return view('admin.digitutors.show')->with('digitutors', $digitutors);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Digitutor  $digitutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Digitutor $digitutor)
    {
        //
        //dd($digitutor)  - check if digitutor is coming
        $digitutors = digitutor::all(); //get all the digitutors
        return view('admin.digitutors.edit')->with(['digitutor' => $digitutor, // send the digitutor you want to edit
            // 'digitutors' => $digitutors, // send all the digitutors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Digitutor  $digitutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Digitutor $digitutor)
    {
        //
        $this->validate($request, [
            'digitutor_name' => 'required| max:120',
            'digitutor_body' => 'required| max:120',
            'digitutor_image' => 'required| max:120',
            'ans_body' => 'required| max:120',
            'ans_explanation' => 'required| max:120',
        ]);
        $digitutor->digitutor_name = $request->digitutor_name;
        $digitutor->digitutor_body = $request->digitutor_body;
        $digitutor->digitutor_image = $request->digitutor_image;
        $digitutor->ans_body = $request->ans_body;
        $digitutor->ans_explanation = $request->ans_explanation;

        if ($digitutor->save()) {$request->session()->flash('success', $digitutor->digitutor_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.digitutors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Digitutor  $digitutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Digitutor $digitutor)
    {
        //
        $digitutor->delete();

        return redirect()->route('admin.digitutors.index');
    }
}

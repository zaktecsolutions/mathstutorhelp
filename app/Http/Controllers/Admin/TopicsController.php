<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        /**
         * access to registered user
         */
        $this->middleware('auth');
    }
    
    public function index()
    {

        // return 'User index page';
        $topics = Topic::all(); //gets all the topics
        //  dd($topics);
        return view('admin.topics.index')->with('topics', $topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.topics.create');
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
            'topic_name' => 'required| max:120',
            'topic_code' => 'required| max:120',
            'topic_desc' => 'required| max:120',
            'topic_les_num' => 'required| numeric|min:1|max:100',
            'topic_diagnostic_quiz' => 'required| max:120',
            'topic_summary_quiz' => 'required| max:120',
        ]);

        $topic = new Topic;
        $topic->topic_name = $request->topic_name;
        $topic->topic_code = $request->topic_code;
        $topic->topic_desc = $request->topic_desc;
        $topic->topic_les_num = $request->topic_les_num;
        $topic->topic_diagnostic_quiz = $request->topic_diagnostic_quiz;
        $topic->topic_summary_quiz = $request->topic_summary_quiz;

        if ($topic->save()) {$request->session()->flash('success', $topic->topic_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.topics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
        // return 'User index page';
        $topics = Topic::all(); //gets all the topics
        return view('admin.topics.show')->with('topics', $topics);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //dd($topic)  - check if topic is coming

        $topics = Topic::all(); //get all the topics
        return view('admin.topics.edit')->with(['topic' => $topic, // send the topic you want to edit
            // 'topics' => $topics, // send all the topics
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
        $this->validate($request, [
            'topic_name' => 'required| max:120',
            'topic_code' => 'required| max:120',
            'topic_desc' => 'required| max:120',
            'topic_les_num' => 'required| numeric|min:1|max:100',
            'topic_diagnostic_quiz' => 'required| max:120',
            'topic_summary_quiz' => 'required| max:120',
        ]);

        $topic->topic_name = $request->topic_name;
        $topic->topic_code = $request->topic_code;
        $topic->topic_desc = $request->topic_desc;
        $topic->topic_les_num = $request->topic_les_num;
        $topic->topic_diagnostic_quiz = $request->topic_diagnostic_quiz;
        $topic->topic_summary_quiz = $request->topic_summary_quiz;

        if ($topic->save()) {$request->session()->flash('success', $topic->topic_name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.topics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
        $topic->delete();

        return redirect()->route('admin.courses.index');
    }
}

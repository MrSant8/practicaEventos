<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EventController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
        ]);
    
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
    
        return redirect()->route('index');
    }
    
    public function index(){
        
        $events = Event::all();
        return view('index', compact('events'));
    }
    
    public function create()
    {
        $users = User::all();
        return view('create', compact('users'));
    }
    
    public function store(Request $request){
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'location' => 'required|max:255',
        'date' => 'required|date', 
    ]);

    $event = new Event;
    $event->title = $validated['title'];
    $event->description = $validated['description'];
    $event->location = $validated['location'];
    $event->date = $validated['date'];
    $event->user_id = auth()->id();
    $event->save();

    return redirect()->route('index');
}

    
public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('edit', compact('event')); 
}


    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'location' => 'required|max:255',
        'date' => 'required|date'
    ]);

    $event = Event::findOrFail($id);
    $event->title = $validated['title'];
    $event->description = $validated['description'];
    $event->location = $validated['location'];
    $event->date = $validated['date'];
    $event->save();

    return redirect()-route('events.index');
}
public function show($id)
{
    $event = Event::findOrFail($id);
    return view('events.show', compact('event'));
}

public function destroy($id)
{
    $event = Event::findOrFail($id);
    $event->delete();
    return redirect()->route('events.index');
}


}

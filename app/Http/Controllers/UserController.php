<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;


class UserController extends Controller
{
    public function index(){
        $users = User::where('id', '!=', Auth::id())->SimplePaginate(7);
        return view('user', compact('users'));
    }

    public function showusers(string $id){
        $users = User::find($id);
        return view('layout.view', compact('users'));
}


public function register(Request $request)
{
    $data = $request->validate([
        'name'     => 'required',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    try {
        // Encrypt password and save user
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('login')->with('success', 'Account created successfully! Please login.');
    } catch (QueryException $e) {
        if ($e->errorInfo[1] == 1062) {
            return back()->with('error', 'The email address is already in use.')->withInput();
        }

        return back()->with('error', 'An unexpected error occurred. Please try again.')->withInput();
    }
}



public function AddUser(Request $request)
{
    $data1 = $request->validate([
        'name'     => 'required',
        'email'    => 'required|email',
        'password' => 'required|min:6',
    ]);

    try {
        // Attempt to create the user
        $user1 = User::create($data1);

        if ($user1) {
            return redirect()->route('users')->with('success', 'User added successfully!');
        }
    } catch (QueryException $e) {
        // Determine the error reason
        $errorCode = $e->errorInfo[1];
        $errorMessage = '';

        if ($errorCode == 1062) { // Duplicate entry error
            $errorMessage = 'The email address is already in use.';
        } else {
            $errorMessage = 'An unexpected error occurred: ' . $e->getMessage();
        }

        // Redirect back with the error reason
        return back()->withErrors(['error' => $errorMessage])->withInput();
    }
}



public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        return redirect()->intended('dashboard');
    } else {
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}


public function dashboardPage(){
    return view('dashboard');
}



public function logout()
{
    Auth::logout();
    return redirect()->route('login');
}



    public function show(string $id)
    {

    $users = User::find($id);
    return view('layout.view', compact('users'));
}


    public function edit(string $id){

    $users = User::find($id);
    return view("updateUser", compact('users'));
}


public function update(Request $request, $id)
{
    $user = User::find($id);
    $user->update($request->all());
    return redirect()->route('users');
}


public function destroy(string $id)
{
    $user = User::findOrFail($id); // `findOrFail` throws an error if the user is not found
    $user->delete();

    return redirect()->route('users');
}


}

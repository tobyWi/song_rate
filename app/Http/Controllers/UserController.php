<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Response;
use Session;

class UserController extends Controller
{

    //Admin

    //Get all users
    public function index()
    {
        $users = User::all();
        return view('admin.users.all', ['users' => $users]);
    }

    //Edit user
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    //Update user
    public function update($id)
    {
        $this->validate(request(), [
            'name'=>'required|string',
            'email'=>'required|email',
        ]);

  
        $user = User::findOrFail($id);

        $user->name = request()->name;

        $user->email = request()->email;

        if(request()->admin) {
            $user->is_admin = 1;
        } else {
            $user->is_admin = 0;
        }

        $user->save();


        Session::flash('msg', 'User updated');


        return redirect()->back();
    }

    //Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        Session::flash('msg', "User $user->name deleted");


        return redirect()->route('admin.users.all');
    }

    //Export users table to csv
    public function exportUsersToCsv()
    {
        $table = User::all();
        $filename = 'users.csv';
        $handle = fopen($filename, 'w');

        fputcsv($handle, ['ID', 'Name', 'E-mail', 'Is_Admin', 'Created_At', 'Updated_At']);

        foreach($table as $row) {
            fputcsv($handle, [$row['id'], $row['name'], $row['email'], $row['is_admin'], $row['created_at'], $row['updated_at']]);
        }


        fclose($handle);

        $headers = ['content-type' => 'text/csv'];

        return Response::download($filename, $filename, $headers);
    }

    //Users

    //Edit own profile 
    public function profileEdit()
    {
        return view('users.edit');
    }

    //Update own profile
    public function profileUpdate()
    {
        
        $this->validate(request(), [
            'name'=>'required|string',
            'email'=>'required|email',
            'password' => 'required|min:6'
        ]);

        $user = Auth::User();

        $user->name = request()->name;

        $user->email = request()->email;

        $user->password = bcrypt(request()->password);

        $user->save();


        Session::flash('msg', 'User updated');


        return redirect()->back();

    }


    //Show Auth profile
    public function dashboard()
    {
        return view('users.profile');
    }

    //Get all users in logged in as user
    public function getAllUsers() {
        $users = User::all();

        return view('users.all', ['users' => $users]);
    }

    //Show other users profile
    public function showUser(User $user) 
    {
       return view('users.show', ['user' => $user]); 
    }
}

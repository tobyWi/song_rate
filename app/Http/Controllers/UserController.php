<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use Session;

class UserController extends Controller
{

    //All users
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

    public function update($id)
    {
        
        $this->validate(request(), [
            'name'=>'required|string',
            'email'=>'required|email'
        ]);

        $user = User::findOrFail($id);

        $user->name = request()->name;

        $user->email = request()->email;

        $user->save();


        Session::flash('msg', 'User updated');


        return redirect()->route('admin.users.all');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);


        $user->delete();

        Session::flash('msg', "User $user->name deleted");


        return redirect()->route('admin.users.all');
    }




    //Show Auth profile
    public function dashboard()
    {
        return view('users.profile');
    }

    //Show other users profile
    public function showUser(User $user) 
    {
       return view('users.show', ['user' => $user]); 
    }

    public function export()
    {
        return $this->exportTableToCsv(User::all(), 'users.csv');
    }

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

}

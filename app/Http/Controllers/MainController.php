<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $emp = Employees::all();
        $data = compact('emp');
        return view('Home')->with($data);
    }

    public function create_form()
    {
        return view('NewEmployee');
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'city' => 'required',
                'image' => 'required',
                'username' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]
        );

        // $filename = time() . "-employee." . $request->file('image')->getClientOriginalExtension();
        // $request->file('image')->storeAs('public/uploads', $filename);
        $image = $request->file('image');
        $imageName = time() . '_employee.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        $emp = new Employees;
        $emp->firstname = $request['firstname'];
        $emp->lastname = $request['lastname'];
        $emp->email = $request['email'];
        $emp->phone = $request['phone'];
        $emp->city = $request['city'];
        $emp->image = $imageName;
        $emp->username = $request['username'];
        $emp->password = md5($request['password']);

        if ($emp->save()) {
            $request->session()->flash('message', 'This record saved successfully.');
        } else {
            $request->session()->flash('message', 'Sorry, This record is not saved.');
        }

        return redirect('/');
    }


    public function edit_employee_form($id)
    {
        $edit_employee = Employees::find($id);
        $data = compact('edit_employee');
        return view('editEmployee')->with($data);
    }

    public function edit_employee_save($id, Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'city' => 'required',
                'username' => 'required',
            ]
        );


        $edit_emp = Employees::find($id);
        if (!is_null($edit_emp)) {
            if ($request->file('image') != '') {
                $image = $request->file('image');
                $imageName = time() . '_employee.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
            } else {
                $imageName = $edit_emp->image;
            }

            $edit_emp->firstname = $request->firstname;
            $edit_emp->lastname = $request->lastname;
            $edit_emp->email = $request->email;
            $edit_emp->phone = $request->phone;
            $edit_emp->city = $request->city;
            $edit_emp->username = $request->username;
            $edit_emp->image = $imageName;

            if ($edit_emp->save()) {
                $request->session()->flash('message', 'This Record is updated successfully');
            } else {
                $request->session()->flash('message', 'Sorry! This Record is not updated.');
            }
        }

        return redirect('/');
    }

    public function trash_employee_save($id, Request $request)
    {
        $emp = Employees::find($id);
        if (!is_null($emp)) {
            $emp->delete();
            $request->session()->flash('message', 'Delete employee successfully.');
        }

        return redirect('/');
    }

    public function trash_employee()
    {
        $trash_emp = Employees::onlyTrashed()->get();
        $data = compact('trash_emp');

        return view('TrashEmployee')->with($data);
    }

    public function trash_employee_restore($id, Request $request)
    {
        $trash_emp = Employees::withTrashed()->find($id);
        if (!is_null($trash_emp)) {
            $trash_emp->restore();
        }
        $request->session()->flash('message', 'This record is restore successfully.');

        return redirect('/');
    }

    public function trash_employee_delete($id, Request $request)
    {
        $trash_emp = Employees::onlyTrashed()->find($id);
        if (!is_null($trash_emp)) {
            $trash_emp->forceDelete();
            $request->session()->flash('message', 'This record is permanently delete successfully.');
        }
        return redirect('/');
    }
}

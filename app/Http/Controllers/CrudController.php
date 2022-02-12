<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    protected $employee;
    protected $employees;
    public function newEmployee(Request $request){
        Employee::addEmployee($request);
        return redirect()->back();
    }
    public function employeeinfo(){
        $this->employee = Employee::find($_GET['id']);
        return json_encode($this->employee);
    }
    public function updateEmployee(Request $request){
        Employee::updateEmployee($request);
        return redirect()->back();

    }
    public function deleteEmployee($id){
        $this->employee = Employee::find($id);
        $this->employee->delete();
        return redirect()->back();
    }
    public function deleteAllEmployee(){

        foreach (Employee::all() as $emp){
            $emp->delete();
        }
        return redirect()->back();
    }

}

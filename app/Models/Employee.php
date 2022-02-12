<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [];

    protected static $employee;

    public static function addEmployee($request){
        self::$employee = new Employee();
        self::$employee->name = $request->name;
        self::$employee->email = $request->email;
        self::$employee->address = $request->address;
        self::$employee->phone = $request->phone;
        self::$employee->save();

    }
    public static function updateEmployee($request){
        self::$employee = Employee::find($request->employee_id);
        self::$employee->name = $request->name;
        self::$employee->email = $request->email;
        self::$employee->address = $request->address;
        self::$employee->phone = $request->phone;
        self::$employee->save();
    }
}

<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EmployeeNominee extends Model
{
    protected $table = 'employee_nominees';
    protected $fillable = ['employee_id','name','relation','address','telephone','mobile','percentage'];
    public function employee() { return $this->belongsTo(Employee::class); }
}

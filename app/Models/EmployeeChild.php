<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EmployeeChild extends Model
{
    protected $table = 'employee_children';
    protected $fillable = ['employee_id','name','dob'];
    public function employee() { return $this->belongsTo(Employee::class); }
}

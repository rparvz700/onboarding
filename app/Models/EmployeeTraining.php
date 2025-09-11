<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EmployeeTraining extends Model
{
    protected $table = 'employee_trainings';
    protected $fillable = ['employee_id','institute','subject','duration'];
    public function employee() { return $this->belongsTo(Employee::class); }
}

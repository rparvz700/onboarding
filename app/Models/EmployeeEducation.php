<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EmployeeEducation extends Model
{
    protected $table = 'employee_educations';
    protected $fillable = ['employee_id','institute','degree','group','grade','start','end'];
    public function employee() { return $this->belongsTo(Employee::class); }
}

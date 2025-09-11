<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EmployeeQualification extends Model
{
    protected $table = 'employee_qualifications';
    protected $fillable = ['employee_id','qualification','technical_training','membership'];
    public function employee() { return $this->belongsTo(Employee::class); }
}

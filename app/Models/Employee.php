<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'name','scb_account','cell_no','etin','dob','marriage_date','place_birth','passport_no','gender','passport_place_issue','passport_expiry','nationality','blood_group','religion','marital_status','nid','nid_place_issue','driving_license','passport_photo','signature','present_house_no','present_road_no','present_apt_no','present_building','present_area','present_district','permanent_address','home_district','father_name','mother_name','spouse_name','emergency_name','emergency_relation','emergency_address','emergency_telephone','emergency_mobile','ref_name','ref_designation','ref_org','form_id'
    ];
    public function children() { return $this->hasMany(EmployeeChild::class); }
    public function educations() { return $this->hasMany(EmployeeEducation::class); }
    public function trainings() { return $this->hasMany(EmployeeTraining::class); }
    public function qualifications() { return $this->hasMany(EmployeeQualification::class); }
    public function nominees() { return $this->hasMany(EmployeeNominee::class); }
    public function form() { return $this->belongsTo(Form::class); }
}

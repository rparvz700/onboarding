<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';
    protected $fillable = [
        'email', 'code', 'status', 'recruitment_id'
    ];
    // Recruitment relationship (assuming Recruitment model exists)
    public function recruitment() {
        return $this->belongsTo(Recruitment::class);
    }
    public function employees() { return $this->hasMany(Employee::class); }
}

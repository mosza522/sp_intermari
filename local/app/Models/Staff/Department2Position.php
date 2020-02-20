<?php

namespace App\Models\Staff;

use Illuminate\Database\Eloquent\Model;

class Department2Position extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Staff_Department_2_Position';
    protected $fillable = ['DepartmentID', 'PositionID'];
}

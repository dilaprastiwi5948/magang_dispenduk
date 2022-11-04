<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportingIdCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'reportingtype_id',
        'submissiontype_id',
        'explanationtype_id',
        'name',
        'nik',
        'birthplace',
        'birthdate',
        'address',
        'sub_districts',
        'districts',
        'city',
        'province',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public function ExplanationType()
    {
        return $this->hasOne(ExplanationType::class, 'id', 'explanationtype_id');
    }

    public function ReportingType()
    {
        return $this->hasOne(ReportingType::class, 'id', 'reportingtype_id');
    }

    public function SubmissionType()
    {
        return $this->hasOne(SubmissionType::class, 'id', 'submissiontype_id');
    }

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}

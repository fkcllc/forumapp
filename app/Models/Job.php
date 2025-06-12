<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
// use App\Models\User;
// use App\Models\Category;
// use App\Models\Role;
// use App\Models\Profile;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'category_id', 'title', 'slug', 'description', 'role', 'position', 'address', 'type', 'status', 'last_date', 'number_of_vacancy', 'gender', 'experience', 'salary'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkApplication()
    {
        return DB::table('job_user')->where('user_id', auth()->user()->id)
            ->where('job_id', $this->id)->exists();
    }
    public function favourite()
    {
        return $this->belongsToMany(User::class, 'favourites', 'job_id', 'user_id')->withTimestamps();
    }

    public function checkSaved()
    {
        return DB::table('favourites')->where('user_id', auth()->user()->id)
            ->where('job_id', $this->id)->exists();
    }
}

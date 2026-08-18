<?php

namespace App\Models;

use Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postion extends Model
{
        use HasFactory;

//    public static araray $jobs = [
//             [
//             'id'=>'1',
//             'title' =>'Director',
//             'salary'=>'$10,000'
//         ],[ 
//             'id'=>'2',
//             'title' =>'Programmer',
//             'salary'=>'$10,000'
//         ],[
//             'id'=>'3',
//             'title' =>'Teacher',
//             'salary'=>'$10,000'
//         ]];
    // public static function find($id): array{
    //      $job=Arr::first(self::$jobs, fn($job) => $job['id'] == $id);
    //     if(! $job){
    //         abort(404);
    //     }
    //      return $job;
    protected $fillable = ['title','salary','employer_id',];
public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    
        
}

    



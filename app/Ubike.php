<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ubike extends Model
{
    protected $fillable = [
        'sno', 'sna', 'tot', 'sbi', 'sarea', 'mday', 'lat', 'lng', 'ar', 'sareaen', 'snaen', 'aren', 'bemp', 'act'
    ];

    public function getBySearch($search)
    {
        $qb = DB::table('ubikes')
                    ->where('sna', 'like', "%$search%")
                    ->orWhere('sarea', 'like', "%$search%")
                    ->orWhere('ar', 'like', "%$search%")
                    ->get();
        return $qb;
    }
}

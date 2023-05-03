<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $guarded = [];
    // عن طريق $fillable  -  $guarded  بدل ما نكتب كل اسماء العواميد

    public function section()
    {
        return $this->belongsTo(sections::class);
    }

}

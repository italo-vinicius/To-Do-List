<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'task',
        'done',
        'done_at',
    ];

    public function done()
    {
        $this->update([
            'done' => true,
            'done_at' => Carbon::now()
        ]);
    }
}

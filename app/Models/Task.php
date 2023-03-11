<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'user_id',
        'title',
        'task',
        'done',
        'done_at',
    ];

    protected $casts = [
      'done' => 'boolean'
    ];

    public function done()
    {
        $this->update([
            'done' => true,
            'done_at' => Carbon::now()
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory, HasUuids;

    // protected $fillable = [
    //     "title",
    //     "body",
    //     "sent_date",
    //     "is_published",
    //     "heart_count",
    //     "timestamps",
    //     "create_at",
    //     "updated_at",
    //     "deleted_at"
    // ];

    protected $guarded = [
        "id",
    ];

    protected $casts = [
        "is_published" => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

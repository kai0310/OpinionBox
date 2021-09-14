<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    public function getStatusAttribute()
    {
        return $this->updated_at != $this->created_at ? '編集済み' : '';
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('M	d, Y');
    }

    public function getShortBodyAttribute(): string
    {
        return str_limit_ja($this->body, 30);
    }



}

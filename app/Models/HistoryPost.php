<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HistoryPost extends Model
{
    use HasFactory;

    /**
     * 却下内容
     * @return hasMany
     */
    public function rejects(): hasMany
    {
        return $this->hasMany(Reject::class);
    }
}

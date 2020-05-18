<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{

    protected $fillable = ['theme_id', 'creator_id', 'protocol'];

    public function ersteller(){
        return $this->belongsTo(User::class, 'creator_id')->withDefault([
            'name' => 'System',
        ]);
    }

    public function theme(){
        return $this->belongsTo(Theme::class, 'type_id');
    }
}

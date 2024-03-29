<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = 'post_images';
    protected $guarded = false;

    public function getUrlAttribute()
    {
        return  url('storage/' . $this->path);
    }

    public static function clearStorage()
    {
        $images = PostImage::where('user_id', auth()->id())
            ->whereNull('post_id')->get();

        $images->each( function (PostImage $image) {
            \Storage::disk('public')->delete($image->path);
            $image->delete();
    });
    }
}

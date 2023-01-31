<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand_code', 'description'];

    // instans value

    // relation
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
    public function logo()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // boot
    public static function boot()
    {
        parent::boot();

        self::created(function ($brand) {
            $image = request()->file('image');
            $uploaded = Image::uploadImage($image);
            Image::create([
                'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                'src' => 'images/' . $uploaded['src']->basename,
                'alt' => Image::getAlt($image),
                'imageable_id' => $brand->id,
                'imageable_type' => "App\Models\Brand"
            ]);
        });
        self::updating(function ($brand) {
            $new_image = request()->file('image');
            if (request()->hasFile('image')) {
                $brand->logo()->delete();
                $updated = Image::uploadImage($new_image);
                Image::create([
                    'thumb' => 'thumbnails/' . $updated['thumb']->basename,
                    'src' => 'images/' . $updated['src']->basename,
                    'alt' => Image::getAlt($new_image),
                    'imageable_id' => $brand->id,
                    'imageable_type' => "App\Models\Brand"
                ]);
            }
        });

        self::deleting(function ($brand) {
            $image = $brand->logo;
            $image->delete();
        });

        self::deleted(function ($brand) {
            foreach ($brand->products as $index => $product) {
                $product->update([
                    'brand_id' => NULL
                ]);
            }
        });
    }
}

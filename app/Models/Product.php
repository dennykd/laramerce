<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_code';
    protected $keyType = 'string';
    protected $fillable = ['name', 'product_code', 'category_id', 'condition', 'price', 'weight', 'stock', 'brand_id', 'description'];

    // instant value
    public static function popular()
    {
        return Product::all()->map(function ($item) {
            if ($item->loved->count()) {
                return $item;
            }
        });
    }

    public function sold()
    {
        return OrderDetail::where('product_id', $this->id)->count();
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', 'like', '%' . $category . '%');
            });
        });
    }

    public function scopeCategory($query, $category_id = null)
    {
        if (!is_null($category_id)) {
            $this->cats($query, $category_id);
        }
    }

    public function cats($query, $category_id)
    {
        return $query->where('category_id', $category_id);
    }


    //relations
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function loved()
    {
        return $this->hasMany(Whislist::class, 'product_code');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    // boot
    public static function boot()
    {
        parent::boot();

        self::creating(function ($product) {
            $product->id = request()->product_code;
        });

        self::created(function ($product) {
            foreach (request()->file('images') ?? [] as $key => $image) {
                $uploaded = Image::uploadImage($image);
                Image::create([
                    'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                    'src' => 'images/' . $uploaded['src']->basename,
                    'alt' => Image::getAlt($image),
                    'imageable_id' => $product->id,
                    'imageable_type' => "App\Models\Product"
                ]);
            }
        });

        self::updating(function ($product) {
            // update product id on cart
            foreach (Cart::where('product_id', $product->id)->get() as $cart) {
                $cart->update(['product_id', request()->product_code]);
            }

            $img_array = explode(',', request()->deleted_images);
            array_pop($img_array);

            // dd($img_array);
            // dd(Image::whereIn('id', $img_array)->get());
            foreach ($img_array as $key => $image_id) {
                $will_deleted_image = Image::find($image_id);
                if (!is_null($will_deleted_image)) {
                    $will_deleted_image->delete();
                }
            }

            foreach (request()->file('images') ?? [] as $key => $image) {
                $uploaded = Image::uploadImage($image);
                Image::create([
                    'thumb' => 'thumbnails/' . $uploaded['thumb']->basename,
                    'src' => 'images/' . $uploaded['src']->basename,
                    'alt' => Image::getAlt($image),
                    'imageable_id' => $product->id,
                    'imageable_type' => "App\Models\Product"
                ]);
            }
        });

        self::updated(function ($model) {
        });

        self::deleting(function ($product) {
            foreach ($product->images as $key => $image) {
                $image->delete();
            }
        });

        self::deleted(function ($model) {
            foreach (Cart::where('product_id', $model->id)->get() as $cart) {
                $cart->delete();
            }
        });
    }
}
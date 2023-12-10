<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // To allow mass assignment (creating entry in DB) from ListingController. By default, for protection, this is not allowed.
    // Alternatively, we could add "    Model::ungaurd()    " in AppServiceProvider.php file in app/Providers directory.
    protected $fillable = ["title", "companyName", "email", "location", "website", "tags", "description"];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', "%" . request('search') . "%")
                ->orWhere('tags', 'like', "%" . request('search') . "%");
        }
    }
}
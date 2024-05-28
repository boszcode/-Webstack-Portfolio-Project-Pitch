<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\HasProfilePhoto;

class Hotel extends Model
{
    use HasFactory;
    use HasProfilePhoto;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(HotelService::class);
    }
    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        Storage::disk($this->profilePhotoDisk())->delete($this->image);

        $this->forceFill([
            'image' => 'photos/default_hotel.jpg',
        ])->save();
    }


}

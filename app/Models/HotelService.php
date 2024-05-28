<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\HasProfilePhoto;

class HotelService extends Model
{
    use HasFactory;

    use HasProfilePhoto;
    protected $guarded = [];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
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
            'image' => null,
        ])->save();
    }
}

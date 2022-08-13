<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{  private static $unit;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;
    
    public static function getImageUrl($a)
    {
        self::$image = $a->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory  = 'unit-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newUnit($bitm)
    {
        self::$unit = new Unit();
        self::$unit->name           = $bitm->name;
        self::$unit->description    = $bitm->description;
        self::$unit->image          = self::getImageUrl($bitm);
        self::$unit->save();
    }
    public static function updateBrand($request, $id)
    {
        self::$unit = Brand::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$unit->image))
            {
                unlink(self::$unit->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$unit->image;
        }
        self::$unit->name           = $request->name;
        self::$unit->description    = $request->description;
        self::$unit->image          = self::$imageUrl;
        self::$unit->save();
    }
    use HasFactory;
}

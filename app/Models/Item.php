<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public static function checkIfExistItemNameOnStore($name){
        $existingItemName = Item::where('name', '=', $name)->first();
    
        if($existingItemName){
            return true;        
        }

        return false;
    }

    public static function checkIfExistItemNameOnUpdate($name, $id){
        $existingItemName = Item::where('name', '=', $name)->where('id', '!=', $id)->first();
    
        if($existingItemName){
            return true;
        }

        return false;
    }
}



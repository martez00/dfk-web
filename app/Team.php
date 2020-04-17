<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Team extends Model
{

    // --------------------------------- methods -----------------------------------------------------------------------

    public static function logoPath()
    {
        return public_path() . '/images/uploads/teams/logos/';
    }

    public function hasLogo()
    {
        return File::exists($this->logoPath() . $this->id);
    }

    public function logoUrl()
    {
        if($this->hasLogo()) {
            return url('images/uploads/teams/logos/' . $this->id);
        } else {
            return url('images/uploads/teams/logos/no_logo.png');
        }
    }
}

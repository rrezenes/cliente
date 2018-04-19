<?php

namespace cliente;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = array
    (
    	'name','email','password','active'
    );

    public function encryptPassword()
    {   
        $this->password = bcrypt($this->password);
    }

}

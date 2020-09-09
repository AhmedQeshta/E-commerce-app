<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;

        protected $guard = 'admin';

        public function sendPasswordResetNotification($token)
	    {
	        $this->notify(new AdminPasswordResetNotification($token));
	    }

        protected $fillable = [
            'name', 'email', 'password',
            'phone', 'type' , 'category',
            'coupon', 'product', 'blog',
            'order', 'other', 'report',
            'role', 'return', 'contact',
            'comment', 'setting', 'stock',
            'type'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}

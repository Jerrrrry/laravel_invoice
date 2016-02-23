<?php

namespace App\Repositories;

use App\User;
use App\Invoice;

class InvoiceRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Invoice::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}

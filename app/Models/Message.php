<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $cast = [
        'deleted_by_users' => 'array',
        'reacted_by_users' => 'array',
    ];

    protected $fillable = [
        'deleted_by_users',
        'reacted_by_users'
    ];

    #---- media ----#
    public function media()
    {
        return $this->hasMany(messageMedia::class, 'message_id', 'id');
    }

    #----- Message reactions ----#
    public function reaction()
    {
        return $this->hasMany(MessageReaction::class, 'message_id', 'id');
    }

    public function isDeletedForUser($userId)
    {
        return in_array($userId, $this->deleted_by_users ?? []);
    }


    public function deleteForUser($userId)
    {
        // Retrieve the current list of users who have deleted the message
        $deletedBy = $this->deleted_by_users ?? [];

        if (is_string($deletedBy)) {
            $deletedBy = json_decode($deletedBy, true) ?? [];
        } elseif (!is_array($deletedBy)) {
            $deletedBy = [];
        }

        // If the user has not already deleted the message, add them to the list
        if (!in_array($userId, $deletedBy)) {
            $deletedBy[] = $userId;
        }

        // Update the message with the new list of users who have deleted it
        $this->update(['deleted_by_users' => $deletedBy]);
    }

    public function scopeNotDeletedByUser(Builder $query, $userId)
    {
        return $query->where(function ($query) use ($userId) {
            $query->whereNull('messages.deleted_by_users')
                ->orWhereJsonDoesntContain('messages.deleted_by_users', $userId);
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $cast = [
        'deleted_by_users' => 'array',
        'muted_by_users' => 'array'
    ];

    protected $fillable = [
        'deleted_by_users',
        'muted_by_users'
    ];

    public function muteUser($userId)
    {
        // Retrieve the current list of users who have deleted the message
        $mutedUsers = $this->muted_by_users ?? [];

        if (is_string($mutedUsers)) {
            $mutedUsers = json_decode($mutedUsers, true) ?? [];
        } elseif (!is_array($mutedUsers)) {
            $mutedUsers = [];
        }

        // If the user has not already deleted the message, add them to the list
        if (!in_array($userId, $mutedUsers)) {
            $mutedUsers[] = $userId;
        }

        // Update the message with the new list of users who have deleted it
        $this->update(['muted_by_users' => $mutedUsers]);
    }

    public function unmuteUser($userId)
    {
        $mutedUsers = $this->muted_by_users ?? [];
        if (is_string($mutedUsers)) {
            $mutedUsers = json_decode($mutedUsers, true) ?? [];
        } elseif (!is_array($mutedUsers)) {
            $mutedUsers = [];
        }

        $this->update(['muted_by_users' => array_diff($mutedUsers, [$userId])]);
    }

    public function isUserMuted($userId)
    {
        $mutedUsers = $this->muted_by_users ?? [];
        if (is_string($mutedUsers)) {
            $mutedUsers = json_decode($mutedUsers, true) ?? [];
        } elseif (!is_array($mutedUsers)) {
            $mutedUsers = [];
        }
        return in_array($userId, $mutedUsers ?? []);
    }


    public function isDeletedForUser($userId)
    {
        $deletedBy = $this->deleted_by_users ?? [];

        if (is_string($deletedBy)) {
            $deletedBy = json_decode($deletedBy, true) ?? [];
        } elseif (!is_array($deletedBy)) {
            $deletedBy = [];
        }
        return in_array($userId, $deletedBy ?? []);
    }

    public function removeDeletedUser($userId)
    {
        $deletedBy = $this->deleted_by_users ?? [];
        if (is_string($deletedBy)) {
            $deletedBy = json_decode($deletedBy, true) ?? [];
        } elseif (!is_array($deletedBy)) {
            $deletedBy = [];
        }

        $this->update(['deleted_by_users' => array_diff($deletedBy, [$userId])]);
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
            $query->whereNull('threads.deleted_by_users')
                ->orWhereJsonDoesntContain('threads.deleted_by_users', $userId);
        });
    }
}

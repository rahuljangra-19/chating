<?php


use Carbon\Carbon;

if (!function_exists('getLastMessageTimeDiff')) {
    function getLastMessageTimeDiff($lastMessageTime)
    {
        // Convert last message time to Carbon instance for easy manipulation
        $lastMessageTime = Carbon::parse($lastMessageTime);

        // Calculate the time difference
        $diff = $lastMessageTime->diffForHumans();

        return $diff;
    }
}



if (!function_exists('generateNickname')) {
    /**
     * Generate initials (nickname) from a name.
     *
     * @param string $name The full name
     * @return string The initials generated from the name
     */
    function generateNickname($name)
    {
        // Split the name into parts based on spaces
        $parts = explode(' ', $name);

        // Initialize an empty string to store initials
        $initials = '';

        // Loop through each part of the name
        foreach ($parts as $part) {
            // Take the first character of each part and convert it to uppercase
            $initials .= strtoupper(substr($part, 0, 1));
        }

        // Return the generated initials
        return $initials;
    }
}


if (!function_exists('isYouTubeLink')) {
    function isYouTubeLink($url)
    {
        return preg_match('/(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/', $url);
    }
}



if (!function_exists('extractYouTubeVideoId')) {
    function extractYouTubeVideoId($url)
    {
        $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/?.*\/?|(?:watch|embed|v|vi|user|shorts)\/|watch\?(?:.*&)?v=|.*v(?:i)?=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }
}

if (!function_exists('convertToYouTubeEmbedUrl')) {

    function convertToYouTubeEmbedUrl($url)
    {
        $videoId = extractYouTubeVideoId($url);
        if ($videoId) {
            return "https://www.youtube.com/embed/{$videoId}";
        }
        return null;
    }
}


if (!function_exists('formatDuration')) {
    function formatDuration($seconds)
    {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $seconds = $seconds % 60;

        $parts = [];
        if ($hours > 0) {
            $parts[] = $hours . ' hour' . ($hours > 1 ? 's' : '');
        }
        if ($minutes > 0) {
            $parts[] = $minutes . ' min' . ($minutes > 1 ? 's' : '');
        }
        if ($seconds > 0 || empty($parts)) {
            $parts[] = $seconds . ' sec' . ($seconds > 1 ? 's' : '');
        }

        return implode(' ', $parts);
    }
}

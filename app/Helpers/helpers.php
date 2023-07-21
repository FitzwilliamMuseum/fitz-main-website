<?php

namespace App\Helpers;

use App\Models\AnnouncementGlobal;

class helpers {
    /**
     * Return the global announcement from the database
     *
     * @return array
     */
    public static function getGlobalAnnouncement() {
        $globalAnnouncment = AnnouncementGlobal::list();

        return $globalAnnouncment;
    }
}

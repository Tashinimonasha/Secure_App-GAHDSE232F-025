<?php
class SessionManager {
    public static function startSession() {
        session_start();
        // Regenerate session ID on every login
        session_regenerate_id(true);
    }

    public static function destroySession() {
        session_destroy();  // Destroy the session on logout
    }
}

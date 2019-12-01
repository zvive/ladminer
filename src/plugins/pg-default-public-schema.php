<?php

class AdminerPgDefaultPublicSchema
{
    public function database()
    {
        if (connection()) {
            // PostgreSQL only
            if (!in_array(strtolower(connection()->extension), ['pgsql', 'pdo_pgsql'])) {
                return DB;
            }

            if (get_schema() !== 'public') {
                queries('SET search_path = ' . get_schema() . ', public;');
            }
        }

        return DB;
    }
}

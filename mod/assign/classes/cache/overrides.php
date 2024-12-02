<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Cache data source for the assign overrides.
 *
 * @package   mod_assign
 * @copyright 2021 Shamim Rezaie <shamim@moodle.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

declare(strict_types=1);

namespace mod_assign\cache;

use core_cache\data_source_interface;
use core_cache\definition;

/**
 * Class assign_overrides
 *
 * @package   mod_assign
 * @copyright 2021 Shamim Rezaie <shamim@moodle.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class overrides implements data_source_interface {

    /** @var overrides the singleton instance of this class. */
    protected static $instance = null;

    /**
     * Returns an instance of the data source class that the cache can use for loading data using the other methods
     * specified by this interface.
     *
     * @param definition $definition
     * @return object
     */
    public static function get_instance_for_cache(definition $definition): overrides {
        if (is_null(self::$instance)) {
            self::$instance = new overrides();
        }
        return self::$instance;
    }

    /**
     * Loads the data for the key provided ready formatted for caching.
     *
     * @param string|int $key The key to load.
     * @return mixed What ever data should be returned, or false if it can't be loaded.
     * @throws \coding_exception
     */
    public function load_for_cache($key) {
        global $DB;

        [$assignid, $ug, $ugid] = explode('_', $key);
        $assignid = (int) $assignid;

        switch ($ug) {
            case 'u':
                $userid = (int) $ugid;
                $override = $DB->get_record(
                    'assign_overrides',
                    ['assignid' => $assignid, 'userid' => $userid],
                    'duedate, cutoffdate, allowsubmissionsfromdate'
                );
                break;
            case 'g':
                $groupid = (int) $ugid;
                $override = $DB->get_record(
                    'assign_overrides',
                    ['assignid' => $assignid, 'groupid' => $groupid],
                    'sortorder, duedate, cutoffdate, allowsubmissionsfromdate'
                );
                break;
            default:
                throw new \coding_exception('Invalid cache key');
        }

        // Return null instead of false, because false will not be cached.
        return $override ?: null;
    }

    /**
     * Loads several keys for the cache.
     *
     * @param array $keys An array of keys each of which will be string|int.
     * @return array An array of matching data items.
     */
    public function load_many_for_cache(array $keys) {
        $results = [];

        foreach ($keys as $key) {
            $results[] = $this->load_for_cache($key);
        }

        return $results;
    }
}

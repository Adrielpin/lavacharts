<?php

namespace Khill\Lavacharts\Dashboards\Filters;

use \Khill\Lavacharts\Exceptions\InvalidFilter;

/**
 * Lavacharts - A PHP wrapper library for the Google Chart API
 *
 *
 * @category   Class
 * @package    Khill\Lavacharts
 * @subpackage Charts
 * @since      3.1.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2016, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class FilterFactory
{
    public static $FILTER_TYPES = [
        'category',
        'chartrange',
        'date',
        'numberrange',
        'string'
    ];

    public static function create($type, $columnLabelOrIndex, $config = [])
    {
        if (in_array($type, self::$FILTER_TYPES) === false) {
            throw new InvalidFilter($type, self::$FILTER_TYPES);
        }

        if (is_string($columnLabelOrIndex) === false && is_int($columnLabelOrIndex) === false) {
            throw new InvalidConfigValue(
                'columnLabelOrIndex',
                'string|int'
            );
        }

        $filter = self::makeNamespace($type);

        return new $filter($columnLabelOrIndex, $config);
    }

    private static function makeNamespace($filter)
    {
        if (strpos($filter, 'range') !== false) {
            $filter = ucfirst(str_replace('range', 'Range', $filter));
        }

        return __NAMESPACE__ . '\\' . $filter . 'Filter';
    }
}

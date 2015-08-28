<?php

namespace Khill\Lavacharts\DataTables\Columns;

/**
 * TimeOfDayColumn Object
 *
 * TimeOfDay columns are for Carbon objects or strings representing time in the DataTable.
 *
 *
 * @package    Khill\Lavacharts
 * @subpackage DataTables\Columns
 * @since      3.0.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class TimeOfDayColumn extends DateColumn
{
    /**
     * Type of column.
     *
     * @var string
     */
    const TYPE = 'timeofday';

    /**
     * Creates a new column object.
     *
     * @access public
     * @param  string $label Label for the column.
     * @return self
     */
    public function __construct($label = '')
    {
        parent::__construct($label);
    }
}

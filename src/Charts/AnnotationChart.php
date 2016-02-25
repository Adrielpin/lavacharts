<?php

namespace Khill\Lavacharts\Charts;

/**
 * AnnotationChart Class
 *
 * Annotation charts are interactive time series line charts that support annotations.
 * Unlike the annotated timeline, which uses Flash, annotation charts are SVG/VML and
 * should be preferred whenever possible.
 *
 *
 * @package    Khill\Lavacharts
 * @subpackage Charts
 * @since      3.1.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2016, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class AnnotationChart extends Chart
{
    /**
     * Javascript chart type.
     *
     * @var string
     */
    const TYPE = 'AnnotationChart';

    /**
     * Javascript chart version.
     *
     * @var string
     */
    const VERSION = '1';

    /**
     * Javascript chart package.
     *
     * @var string
     */
    const VIZ_PACKAGE = 'annotationchart';

    /**
     * Google's visualization class name.
     *
     * @var string
     */
    const VIZ_CLASS = 'google.visualization.AnnotationChart';
}

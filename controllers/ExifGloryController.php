<?php
/**
 * Exif Glory plugin for Craft CMS
 *
 * ExifGlory Controller
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://photocollections.io
 * @package   ExifGlory
 * @since     0.0.1
 */

namespace Craft;

class ExifGloryController extends BaseController
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = array('actionIndex',
        );

    /**
     */
    public function actionIndex()
    {
    }
}
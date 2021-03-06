<?php
/**
 * +-----------------------------------------------------------------------+
 * | Copyright (c) 2009, Remko Tronçon                                     |
 * | All rights reserved.                                                  |
 * |                                                                       |
 * | Redistribution and use in source and binary forms, with or without    |
 * | modification, are permitted provided that the following conditions    |
 * | are met:                                                              |
 * |                                                                       |
 * | o Redistributions of source code must retain the above copyright      |
 * |   notice, this list of conditions and the following disclaimer.       |
 * | o Redistributions in binary form must reproduce the above copyright   |
 * |   notice, this list of conditions and the following disclaimer in the |
 * |   documentation and/or other materials provided with the distribution.|
 * | o The names of the authors may not be used to endorse or promote      |
 * |   products derived from this software without specific prior written  |
 * |   permission.                                                         |
 * |                                                                       |
 * | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS   |
 * | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT     |
 * | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR |
 * | A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT  |
 * | OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, |
 * | SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT      |
 * | LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, |
 * | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY |
 * | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT   |
 * | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE |
 * | OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.  |
 * |                                                                       |
 * +-----------------------------------------------------------------------+
 * | Author: Remko Tronçon                                                 |
 * +-----------------------------------------------------------------------+
 *
 * PHP version 5
 *
 * @category VersionControl
 * @package  Wigit
 * @author   Till Klampaeckel <till@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version  GIT: $Id$
 * @link     http://github.com/till/wigit
 */
namespace Wigit;

/**
 * Config
 *
 * @category VersionControl
 * @package  Wigit
 * @author   Till Klampaeckel <till@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version  Release: @package_version@
 * @link     http://github.com/till/wigit
 */
class Config
{
    public $git            = 'git';
    public $base_url       = '/wigit';
    public $script_url;
    public $title          = 'WiGit';
    public $data_dir       = 'data';
    public $default_page   = 'Home';
    public $default_author = 'Anonymous <anon@wigit>';
    public $authors        = array();
    public $theme          = 'default';
    public $timezone;

    /**
     * Constructor.
     *
     * @return $this
     */
    public function __construct()
    {
        $this->script_url = $this->base_url . '/index.php?r=';
    }

    /**
     * Attempt to load a local config and overwrite defaults.
     *
     * @param string $configFile A complete path.
     *
     * @return boolean
     */
    public function checkLocalConfig($configFile)
    {
        if (!file_exists($configFile)) {
            return false;
        }
        $arr = include $configFile;
        if (!is_array($arr)) {
            return false;
        }
        foreach ($arr as $configKey => $configValue) {
            $this->$configKey = str_replace(
                '__BASE_URL__',
                $this->base_url,
                $configValue
            );
        }
        return true;
    }
}

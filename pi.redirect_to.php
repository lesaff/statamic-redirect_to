<?php
/**
 * Plugin_redirect_to
 * Statamic Addon to automatically redirect page to the first child
 *
 * @author     Rudy Affandi <rudy@adnetinc.com>
 * @copyright  2015
 * @link       https://github.com/lesaff
 * @license    http://opensource.org/licenses/MIT
 *
 * Versions
 * 1.0.0       Initial release
 */

class Plugin_redirect_to extends Plugin
{

    public function index()
    {

        // Settings and parameters
        $site_root       = Config::getSiteRoot();
        $current_url     = Path::tidy($site_root . '/' . Request::getResourceURI());
        $response        = $this->fetchParam('response', 302);
        $from            = $current_url;
        $max_depth       = '1';
        $folders_only    = true;
        $include_entries = false;
        $exclude         = '';
        $tree            = ContentService::getContentTree($from, $max_depth, $folders_only, $include_entries);
        $url             = $tree[0]['url'];

        if ($url){
            return Self::redirect($url, $response);
        }
    }

    private function redirect($url, $response)
    {
        $app = \Slim\Slim::getInstance();
        $app->redirect($url, $response);
    }
}

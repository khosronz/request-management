<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

use hisorange\BrowserDetect\Parser as Browser;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Log::channel('mysql')->info($event->user['email'].' Logged in successfully.',[
            'ip_address'=>Request::ip(),
            'is_mobile'=>Browser::isMobile(),
            'is_tablet'=>Browser::isTablet(),
            'is_desktop'=>Browser::isDesktop(),
            'is_firefox'=>Browser::isFirefox(),
            'is_opera'=>Browser::isOpera(),
            'is_safari'=>Browser::isSafari(),
            'is_ie'=>Browser::isIE(),
            'is_android'=>Browser::isAndroid(),
            'is_mac'=>Browser::isMac(),
            'user_agent'=>Browser::userAgent(),
            'is_bot'=>Browser::isBot(),
            'browser_name'=>Browser::browserName(),
            'browser_family'=>Browser::browserFamily(),
            'browser_version'=>Browser::browserVersion(),
            'browser_version_major'=>Browser::browserVersionMajor(),
            'browser_version_minor'=>Browser::browserVersionMinor(),
            'browser_version_patch'=>Browser::browserVersionPatch(),
            'browser_engine'=>Browser::browserEngine(),
            'platform_name'=>Browser::platformName(),
            'platform_family'=>Browser::platformFamily(),
            'platform_version'=>Browser::platformVersion(),
            'platform_version_major'=>Browser::platformVersionMajor(),
            'platform_version_minor'=>Browser::platformVersionMinor(),
            'platform_version_patch'=>Browser::platformVersionPatch(),
            'is_windows'=>Browser::isWindows(),
            'is_linux'=>Browser::isLinux(),
            'device_family'=>Browser::deviceFamily(),
            'device_model'=>Browser::deviceModel(),
            'mobile_grade'=>Browser::mobileGrade(),
            'is_edge'=>Browser::isEdge(),
        ]);
    }
}

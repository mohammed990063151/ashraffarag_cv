<?php

return [

    /*
    |--------------------------------------------------------------------------
    | مجلدات التخزين تحت storage/app/public/
    |--------------------------------------------------------------------------
    |
    | المسارات النهائية على القرص:
    |   storage/app/public/{profile|logos|portfolio}/...
    | العرض في المتصفح (بعد php artisan storage:link):
    |   /storage/{profile|logos|portfolio}/...
    |
    | إذا كان المشروع في مجلد فرعي على السيرفر، عيّن APP_URL في .env ليشمل
    | المسار الكامل (مثال: https://domain.com/ashraffarag_cv/public).
    |
    */

    'profile_directory' => env('MEDIA_PROFILE_DIR', 'profile'),

    'logo_directory' => env('MEDIA_LOGO_DIR', 'logos'),

    'portfolio_directory' => env('MEDIA_PORTFOLIO_DIR', 'portfolio'),

];

# عنوان پروژه

مدیریت درخواستها

## شروع سریع

یک نرم افزار حرفه ای جهت بررسی نیاز ها و ارائه یک محموعه برای تامین کننده این نیاز ها است. در این بین نقش های متعددی وجود دارند که می توانند این نیاز ها را تایید یا رد کنند.

### پیش نیاز ها 

ابزار هایی که نیاز دارید تا پیش از نصب بر بستر سیستم شما وجود داشته باشند.
- یک سرور لینوکس
- نصب سرور وب بر روی این سیستم
- نصب php
- نصب یک پایگاه داده (mysql,mariadb,...) 

### نصب

لاراول نسخه 6 (که در این پروژه استفاده شده است) به ابزار های زیر نیاز دارد تا بتواند به خوبی عمل کند.

- PHP >= 7.2.0
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension 

#### آدرس وب زیبا
##### وب سرور آپاچی 
 
به سراغ فایل
`public/.htaccess`
رفته و محتویات آن را مطابق کد های زیر قرار دهید. 

    Options +FollowSymLinks -Indexes
    RewriteEngine On
    
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]

##### وب سرور Nginx
اگر از وب سرور Nginx استفاده می کنید کد زیر را تنظیمات سرور وب خود اضافه کنید.

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }


### استفاده

#### نقش ها
- مالک: این شخص مالک یا ثبت کننده سفارش می باشد. 
- بازرس: شخصی است که باید بر برخی از دسته ها نظارت داشته باشد و اگر کالایی از دسته های مورد نظر وی عبور کند او است که باید آن را تایید کند.
- رئیس مالک: مدیر مالک است که باید آن را تایید و ارسال کند.
- کارشناس: شخصی است که مهارت و توانایی در درخواست دارد و درخوست را باید مطابق با تخصص خود تایید کند .
- مالی: شخصی حسابدار است که در صورت نیاز باید درخواست را تایید کند . 
- تامین کننده: در واقع شرکت هایی هستند که باید درخواست مورد نظر را تامین کنند و برای آنها پیشفاکتور صادر کنند.
- پشتیبان: شخصی است که باید از وضعیت دارایی ها مطع بوده و صرفا باید به وی گذارش داده شود.


## Built With

* [Laravel](https://laravel.com/) - چارچوب مورد استفاده برای برنامه نویسی این نرم افزار
* [Composer](https://getcomposer.org/) - ابزار مدیریت نیاز ها
* [NPM](https://www.npmjs.com/) - مدیریت بسته های جاوااسکریپت* 
* [Vuejs](https://vuejs.org/) - چارچوب جاوا اسکریپت
* [BootstrapVue](https://bootstrap-vue.js.org/) - بسته های کاربردی نوشته شده با Bootstrap و Vue 
* [Axios](https://github.com/axios/axios) - یک بسته جاوا اسکریپت برای ارتباطات با پس زمینه. که مبتین بر ایجکس می باشد.

<!-- ## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags).  -->

## Authors

* **Khosro Nazari** - *سایرکارها در * - [پروفایل کابری](https://github.com/khosronz)

مشاهده لیست مشارکت ها در این پروژه [مشارکت کنندگان](https://github.com/khosronz/request-management/contributors) اشخاصی که در پیاده سازی این پروژه مشارکت داشته اند.

## گواهینامه

این پروژه مبنی بر گواهی نامه MIT می باشد  - برای اطلاعات بیشتر به [LICENSE.md](LICENSE.md) مراجعه نمایید.

<!-- ## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc -->


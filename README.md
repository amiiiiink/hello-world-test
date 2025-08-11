
# Hello World Package

A simple Laravel package that returns a **"Hello World"** message.  
This package is created for learning purposes and can be extended for more complex use cases.

---

## 📦 Installation

You can install the package via Composer:

```bash
composer require amiiiiink/hello-world
```

### If you want to customize the message, you can publish the config file

```
php artisan vendor:publish --tag=hello-world-config
 php artisan vendor:publish --tag="helloworld"
```


add 
```
@import "../vendor/helloworld/helloworld.css";
```

into resources/css/app.css

then  
```
npm install
```

then
```
npm run build
```
in web.php add below
```
Route::get('/hello-world', function () {
    return view('helloworld::hello', [
        'title' => 'سلام از پکیج',
        'subtitle' => 'نسخهٔ جدید با Tailwind CSS'
    ]);
});
```


🚀 Usage
```
use VendorName\HelloWorld\Facades\HelloWorld;

echo HelloWorld::sayHello('amiiiiink');
// Output: Hello World
```

### Helper Function

```
echo hello_world();
// Output: Hello World
```





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
```

🚀 Usage
```
use VendorName\HelloWorld\Facades\HelloWorld;

echo HelloWorld::sayHello();
// Output: Hello World
```

### Helper Function

```
echo hello_world();
// Output: Hello World
```




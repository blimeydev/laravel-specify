**Laravel Specify**

A small Laravel package to provide page registration, view composers (for example a sidebar composer), and easily publish package configuration and views.

**Status:**: Stable

**Contents**
- **Overview:** What the package does and why to use it
- **Installation:** Composer install and asset/config publishing
- **Configuration:** `config/specify.php` explanation
- **Usage:** Routes, view composers and example blade snippets
- **Testing:** Running the package test suite
- **Contributing & License**

**Overview**

This package helps manage and register application-specific pages and shared view data through a service provider and view composers. It includes a sample `SidebarViewComposer` that injects sidebar data into views and a `SpecifyPagesServiceProvider` to wire the package into your Laravel application.

**Installation**

1. Require the package via Composer (replace with actual vendor/package name):

   composer require vendor/laravel-specify

2. If your application does not use package auto-discovery, register the service provider in `config/app.php`:

   \- Add `\Vendor\Specify\SpecifyPagesServiceProvider::class` to the `providers` array.

3. Publish the configuration and views (if applicable):

   php artisan vendor:publish --provider="Vendor\Specify\SpecifyPagesServiceProvider" --tag="config"
   php artisan vendor:publish --provider="Vendor\Specify\SpecifyPagesServiceProvider" --tag="views"

**Configuration**

After publishing, edit `config/specify.php` to configure the package behavior (routes, middleware, or page settings). The config file controls defaults used by the included service provider and view composers.

**Usage**

- Routes: The package may register routes in `routes/web.php` when the service provider is loaded. If you need to extend or override them, you can publish the views and route definitions and customize accordingly.

- View Composer: `src/Composers/SidebarViewComposer.php` is included to attach sidebar data to views. The service provider wires the composer to the views. Example usage in a Blade template:

  @if(isset($sidebar))
      @foreach($sidebar as $item)
          <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
      @endforeach
  @endif

- Service Provider: `src/SpecifyPagesServiceProvider.php` registers bindings, publishes resources, and attaches composers. If you need to customize behavior, extend or override the provider in your app.

**Examples**

- Registering the provider manually (if not auto-discovered):

  \- Add the provider to `config/app.php` providers array.

- Sample route (if exposing a pages UI):

  Route::group(['middleware' => ['web','auth']], function () {
      Route::get('/specify', [\Vendor\Specify\Http\Controllers\SpecifyController::class, 'index'])->name('specify.index');
  });

Adjust namespace/class names to match the installed package; the examples above are illustrative.

**Testing**

Run the package test suite using Pest or PHPUnit from the package root:

```bash
composer install
./vendor/bin/pest
```

Or with PHPUnit:

```bash
./vendor/bin/phpunit
```

**Contributing**

Contributions are welcome. Please open issues or pull requests. Follow the project's coding standards and add tests for new features or bug fixes.

**License**

This package is open source and available under the MIT License. See the `LICENSE` file for details.

---

If you want, I can update the README with the exact Composer package name, add badges (Packagist, CI), or include code samples from specific files in the repository.

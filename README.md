## Laravel json placeholder

A package that integrates [Typicode Json placeholder](https://jsonplaceholder.typicode.com/) with laravel. It creates a landing, listing and view pages for all the
available resources `posts`, `comments`, `albums`, `photos`, `todos`, `users`.

## Installation

Require the package.

```bash
composer require jsonrai277/laravel-json-placeholder
```

Publish necessary configs and views for customization. It copies the config to `config/laravel-json-placeholder` in laravel app and also the views to `resources/views/vendor/laravel-json-placeholder` directory.

```bash
php artisan vendor:publish --provider=JsonRai277\\LaravelJsonPlaceholder\\LaravelJsonPlaceholderServiceProvider
```

Once tag published visit the route `/resources`. It should render a nice landing page for all the available resources. Also, the config should be pretty self explanatory to override any settings.

## Testing

You can run tests with:

```bash

```

# Running Tests with PHP Artisan

This project uses Laravel's built-in testing tools. You can run tests using the `php artisan test` command. These tests showed multiple broken sections due to small changes in business logic, easily fixed. 

There are nearly 800 tests in this suite, and over 1300 assertions. 

## What won't work without API access

Any Tessitura stuff won't work without the correct config in place.

## Basic Usage

```bash
php artisan test
```

## Running in Different Modes

- **Debug Mode**  
    Shows detailed output for each test.
    ```bash
    php artisan test --debug
    ```

- **Compact Mode**  
    Shows a summary of test results.
    ```bash
    php artisan test --compact
    ```

- **Verbose Mode**  
    Shows detailed output, including test names and status.
    ```bash
    php artisan test --verbose
    ```

## Running Specific Feature Tests

You can run tests for specific features by specifying the test directory or file.

### Controller Tests

```bash
php artisan test tests/Feature/Http/Controllers
```

### Model Tests

```bash
php artisan test tests/Feature/Models
```

### Route tests

```bash
php artisan test tests/Feature/Routes
```

## Additional Options

- Run a single test file:
    ```bash
    php artisan test tests/Feature/ExampleTest.php
    ```
- Filter by test method name:
    ```bash
    php artisan test --filter=test_method_name
    ```

Refer to the [Laravel Testing Documentation](https://laravel.com/docs/testing) for more details.
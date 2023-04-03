# Dependency injection in WordPress plugin

This repository serves educational purposes, introducing autowired dependency injection containers in any WordPress plugin or theme to leverage the use of modern best practices and ease the development process.

## Prerequisites

This project assumes you are familiar with using Composer in your projects and you are making use of class autoloading feature, preferably according to PSR-4 recomendation (not strictly required).

In addition, it is worth to understand dependency prefixing.

## Installation

```sh
composer install
```

## Usage

This repository is split into two main branches: `no-di` and `di`.

First one present a plugin which is making use of some good, modern techniques, but clearly violates important principles, which prevents us from introducing decoupled architecture and, in result, integrate Dependency Injection Container. This will be treated as our starting point, from which, with series of refactorization we will improve our project's structure and open for further improvements.

`di` branch is our target plugin, the one we want to achieve through our improvements.

## Key takeaways

- Learn and understand Dependency Inversion Principle.
- Write classes which are independent from WordPress and integrate with WP in small, single-purposed hook services.
- Leverage the use of Dependency Injection Container with autowired dependencies to simplify your plugin bootstrapping logic.

## Testing

```sh
composer test
```

## Further resources

- https://php-di.org/doc/understanding-di.html
- https://igor.io/2013/03/31/stateless-services.html

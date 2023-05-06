# Przykre zapaszki w kontekście odwracania zależności

Łamanie zasady odwracania zależności (jednej z pięciu zasad SOLID) jest dość częste we wtyczkach i motywach WordPressowych. Jakie są najszęstsze przejawy naruszenia tych zasad?

## Tworzenie obiektów w konstruktorze klasy

```php
class PostExporter {

  private PostQuery $query;

  public function __constructor() {
    $this->query = new PostQuery();
  }
```

## Tworzenie obiektów w metodzie klasy

```php
class PostExporter {

  public function export() {
    $query = new PostQuery();
    $posts = $query->get_posts();
    // Export posts...
  }
```

## Nadużywanie `trait` do deklarowania pól klasy

```php
class PostExporter implements \Psr\Logger\LoggerAwareInterface {
  use LoggerAwareTrait;

  public function export() {
    $query = new PostQuery();
    $posts = $query->get_posts();
    $this->logger->debug('Exporting posts...');
  }
```

## Brak wykorzystywania interfejsów

```php
class PostExporter {

  public function __constructor(
    private readonly PostQuery $query
  ) {
  }
```

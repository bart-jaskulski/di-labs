# Wstrzykiwanie zależności w projektach WordPressowych

Projekt służy celom edukacyjnym, wprowadzając kontenery do wstrzykiwania zależności w dowolnym projekcie WordPressowym, pomagając w czerpaniu korzyści z nowoczesnych dobrych praktyk i ułatwiając proces rozwoju wtyczki.

## Wymagania wstępne

Projekt zakłada, że jesteś zaznajomiony z wykorzystywaniem Composera w projektach i potrafisz korzystać z autoładowania klas, najlepiej zgodnie z [rekomendacją PSR-4](https://php-figorg/psr/psr-4) (nie wymagane ściśle).

Dodatkowo warto rozumieć prefixowanie zależności.

## Instalacja

```sh
composer install && composer prefix
```

## Wykorzystywanie

Repozytorium jest podzielone na dwie główne gałęzie:

- `main`, która zawiera początkowy kod wtyczki, wymagający refaktoryzacji
- `with-di`, która przedstawia docelowy kod, poprawiony i korzystający z kontenera DI

Ponadto, najważniejsza wiedza zebrana na tematy potrzebne w wykonaniu zadania została zawarta w formie artykułów, dostępnych w folderze `docs` lub przez stronę <https://bart-jaskulski.github.io/di-labs>.

## Kluczowe punkty

- Poznanie i zrozumienie *zasady odwracania zależności* (Dependency Inversion Principle)
- Pisanie klas, które są niezależne od WordPressa i integrują się z WP w małych, jedno-zadaniowych serwisach dla hooków
- Wykorzystanie kontenerów do wstrzykiwania zależności z autodowiązaniem zależności dla ułatwienia logiki rozruchu wtyczki

# Serwisy powinny być bezstanowe

Niemutowalność danych w programowaniu jest często podkreślana jako duża wartość, ułatwiająca zarządzanie skomplikowanymi aplikacjami. W podobnych kategoriach można myśleć o tworzeniu serwisów bezstanowych – są to takie klasy, które nie posiadają informacji o stanie aplikacji (np. wartości tablicy `$_POST`).

## Czym jest serwis?

Serwisem można nazwać klasę, której odpowiedzialność polega na wykonaniu jakiejś operacji na jednym lub kilku obiektach przedstawiających *rzecz* w naszej aplikacji. Ta uproszczona definicja zakłada, że serwis będzie wykonywał działanie integrujące różne części naszego systemu. Przykładem serwisu może być klasa `PostExporter`, której czynnością będzie eksportowanie obiektów `Post`.

```php
class PostExporter {

  public function export( PostCollection $posts ) {
    // Export posts...
  }
```

Zauważ, że pomiędzy serwisem, a klasą `Post` zachodzi następująca zależność już w samym języku:

- `Post` jest rzeczownikiem, oznacza więc jakiś model/encję w naszej aplikacji, i.e. obiekt, odwzorowujący rzeczywistość
- `PostExporter` składa się z dwóch członów, `Post` i `Exporter`; pierwsze słowo odnosi się do naszego modelu, wskazując z czym klasa będzie powiązana, natomiast druga, ważniejsza fraza pochodzi od czasownika i wskazuje na **czynność**, którą nasz serwis będzie miał wykonać względem modelu `Post`

Zwracanie uwagi na podobne relacje jest pomocne w tworzeniu serwisów i dobierania dla nich odpowiednich nazw, choć należy traktować to głównie jako wskazówkę, a nie zasadę.

## Jak tworzyć serwisy bezstanowe?

- <https://igor.io/2013/03/31/stateless-services.html>

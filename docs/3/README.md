# Czym jest i jakie wartości wnosi kontener DI

Kontenery do wstrzykiwania zależności to standard w dużych frameworkach PHP (Symfony, Laravel); kontener stosowany jest także m.in. we wtyczce WooCommerce.

Wstrzykiwanie zależności jest praktyką, która pomaga uelastycznić tworzony kod oraz ułatwić testowanie jednostkowe (pojedynczych klas w odseparowaniu). W rzeczywistości całą ideę wstrzykiwania zależności można byłoby streścić do następującego przykładu:

```php
class A {
  // ŹLE: Umieszczanie zależności na sztywno w konstruktorze klasy
  public function __construct() {
    $this->database = new Database();
  }
}

$a = new A;

class B {
  // DOBRZE: Wprowadzanie zależności "z zewnątrz"
  public function __construct(
    private readonly DatabaseInterface $database
  ) {}
}

$b = new B( new Database );
```

W klasie `A` nowa instancja **zawsze** będzie miała w sobie nowy obiekt klasy `Database`. Potencjalnie jest to duży problem, nakładający następujące ograniczenia:

- każda zmiana konstruktora klasy `Database` będzie wymagała bezpośredniej zmiany kodu w klasie `A`;
- nie ma możliwości połączenia się z inną *bazą danych*: jesteśmy zmuszeni korzystać z każdym razem z tego samego rodzaju, więc nie da się wymienić `mysql` na `sqlite`, ani na jakąś wartość przeznaczoną tylko do testów;
- próba testowania takiej klasy będzie wymagała dużo mockowania lub faktycznego wykonywania zapytań do bazy danych, kiedy alternatywnie można byłoby skorzystać z predefiniowanej wartości tylko na potrzeby testów;
- każda instancja klasy `A` tworzy **nową** instancję klasy `Database`, więc w najlepszym przypadku obciążamy pamięć systemu, a w najgorszym wykonujemy kilka połączeń z tą samą bazą danych w ramach jednego zapytania.

Poprawne odwrócenie zależności jest pozbawione tych wad, a jedyny koszt, to różnica w wywołaniu nowej instancji klasy. Ponadto *Dependency Inversion Principle* bardzo dobrze współpracuje z zasadą otwarte-zamknięte (*Open-Closed Principle*), dzięki temu, że klasa `B` jest oparta o **interfejs** `DatabaseInterface`, który możemy dowolnie implementować i przekazywać do klasy `B` bez jej zmieniania.

## Droga od wstrzykiwania zależności do kontenera DI

Odwracanie zależności jest techniką, określającą w jaki sposób pisać zorganizowany kod, natomiast kontener do wstrzykiwania zależności jest narzędziem wspierającym programistę w automatyzowaniu zarządzaniem zależnościami. Jeśli w projekcie zależności nie są wstrzykiwane, nie da się wprowadzić kontenera DI. Niemniej, kontener nie jest niezbędny do odwracania zależności, a jedynie wspiera tę technikę.

Dzięki kontenerowi do wstrzykiwania zależności upewniamy się, że obiekty są tworzone tylko jeden raz i tylko wtedy, kiedy są faktycznie wymagane. Oszczędza to pamięć aplikacji, jednak to nie jest kluczowa wartość tej cechy. Posiadając scentryzowaną instancję obiektu łatwiej jest nim zarządzać i wykorzystywać w różnych miejscach aplikacji, bez uciekania się do *Singletona*, który jest uznawany za anty-wzorzec. Utworzenie jednej instancji klasy znaczy także, że prawdopodobnie jest ona tworzona tylko raz (najczęściej w pliku z definicjami), więc łatwiej jest zaktualizować kod po modyfikacji sygnatury konstruktora.

Zaawansowane kontenery do wstrzykiwania zależności (php-di, symfony/dependency-injection) posiadają bardzo ważną cechę, mającą największy wpływ na uproszczenie kodu projektu: **automatyczne dowiązanie zależności** (*autowire*). To pierwszy aspekt, na który należy zwrócić uwagę, wybierając kontener DI dla swojego projektu, ponieważ brak tej funkcjonalności znacząco ogranicza możliwości kontenera. *Autowiring*, na bazie API refleksji wbudowanego w PHP, odkrywa typy parametrów wylistowanych w konstruktorze klasy i stara się samodzielnie dobrać odpowiednie zależności. Poniższy przykład ilustruje stworzenie działającego kontenera DI z wykorzystaniem biblioteki `php-di/php-di` w wersji 7.0.

```php
class D {}

class C {
  public function __construct(
    // Za pomocą silnego typowania wskazujemy, jakiej klasy wymaga obiekt.
    public readonly D $dep
  ) {}
}

$container = new \PhpDi\Container\Container();
// Przy pomocy automatycznego dowiązania php-di tworzy obiekt
// klasy C, z zawartym w nim obiektem klasy D.
$c = $container->get(C::class);
assert($c->d instanceof D);
```

Automatyczne dowiązanie zależności nie tylko pozwala oszczędzić rozwlekłych wpisów w pliku konfiguracyjnym, ale także uodparnia nasz kod na zmiany. Kontener natychmiastowo *wie*, jaka zależność jest wymagana w klasie `C`, więc jeśli w przyszłości będziemy wymagali klasy `E` zamiast `D` w konstruktorze, kontener się do tego dostosuje, nie wymagając od nas dodatkowych zmian (bez tej funkcjonalności każda zmiana musiałaby także zostać naniesiona w pliku konfiguracyjnym).

- Czym jest DI?
  <https://php-di.org/doc/understanding-di.html>

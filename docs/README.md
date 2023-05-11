# Warsztaty wprowadzające kontener do wstrzykiwania obiektów w rozwiązaniach WordPressowych

Projekt ma na celu wprowadzenie kontenera do wstrzykiwania zależności w projektach opartych o WordPressa. [Narzędzie te pomaga ulepszać strukturę kodu](./3) oraz upraszcza zarządzanie klasami wymaganymi przez obiekty.

Aby wprowadzić kontener DI, w pierwszej kolejności należy zadbać o to, żeby kod przestrzegał zasady odwracania zależności (*Dependency Inversion Principle*), jednej z zasad SOLID. Świadomość zawartych w niej reguł pomaga rozumieć i rozbudowywać architekturę rozwijanych projektów oraz daje potencjał do korzystania z benefitów, jakie przynoszą kontenery do wstrzykiwania zależności.

## Jak korzystać z repozytorium

Kod zawarty w tym repozytorium przewiduje prace warsztatową, która będzie składała się z dwóch głównych faz:

1. Refaktoryzacja zastanej bazy kodu zgodnie z DIP.
1. Wprowadzenie kontenera do wstrzykiwania zależności.

Pierwszy krok łączy teorię z praktyką, skupiając się na [najczęstszych błędach i problematycznych praktykach](./2) spotykanych w projektach, które utrudniają rozwój. Początkowa faza może wydawać się niezwiązana bezpośrednio z głównym tematem warsztatów, jednak ta część pozwoli zbudować wymaganą wiedzę.

Podczas drugiego etapu zostanie przeprowadzona integracja popularnej biblioteki `php-di` z przykładową wtyczką, z uwzględnieniem takich zagadnień, jak:

- dodawanie zależności przez `composer`;
- prefixowanie zależności;
- tworzenie pliku z definicjami kontenera;
- wykorzystywanie kontenera DI w praktyce;
- kompilowanie definicji kontenera;

Kontener DI w połączeniu z zasadą odwracania zależności to potężne narzędzie, które ma realny wpływ na architekturę naszego projektu. Takie możliwości wiążą się również z kolejnymi niedobrymi praktykami, które zostaną zaadresowane podczas warsztatów.

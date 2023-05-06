# Tworzenie rozszerzeń do WordPressa z zachowaniem zasad DI

Repozytorium przedstawia przykładową wtyczkę do WordPressa, na bazie której uczestnicy warsztatów będą mieli okazję nauczyć się zasad **odwracania zależności** w programowaniu i wprowadzić kontenery do wstrzykiwania zależności do własnych rozwiązań.

Najważniejsze elementy:

- dlaczego nie należy tworzyć obiektów w konstruktorze klasy
- dlaczego powinniśmy bazować na interfejsach, zamiast na konkretnych implementacjach
- w jaki sposób przygotować projekt do współpracy z kontenerem DI
- wprowadzenie kontenera DI

Dodatkowe elementy:

- prefixowanie zależności dodawanych przez composer'a
- testowanie jednostkowe?

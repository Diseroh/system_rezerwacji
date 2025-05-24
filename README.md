# 🚗 System rezerwacji aut służbowych

Prosta aplikacja webowa do rezerwacji samochodów służbowych w fikcyjnej firmie.  
Zbudowana w PHP z wykorzystaniem HTML, CSS, MySQL (MariaDB) oraz opcjonalnie JavaScript.

## 📌 Funkcje aplikacji

- ✅ Dodawanie rezerwacji auta (formularz dla użytkownika)
- ✅ Lista istniejących rezerwacji (dla użytkownika)
- ✅ Sprawdzenie dostępności auta (nie można zarezerwować już zajętego w danym terminie)
- ✅ Panel administratora z logowaniem
- ✅ Możliwość edytowania i usuwania rezerwacji (tylko dla admina)
- ✅ Prosty i responsywny interfejs

## 🔐 Dane logowania (dla administratora)

- Hasło admina: `admin123`

## 🛠️ Wymagania

- **XAMPP** (testowane na wersji: `xampp-windows-x64-8.2.12-0-VS16-installer.exe`)
- Przeglądarka internetowa (Chrome, Firefox, Edge, itp.)

## 🧪 Jak uruchomić aplikację?

1. **Zainstaluj XAMPP** i uruchom `Apache` + `MySQL`.
2. Skopiuj folder `auta_rezerwacja` do katalogu `C:\xampp\htdocs\`.
3. Uruchom **phpMyAdmin** (http://localhost/phpmyadmin).
4. Utwórz bazę danych o nazwie `rezerwacja_auta`.
5. Zaimportuj plik `baza.sql` (znajduje się w folderze projektu).
6. W przeglądarce wejdź na: [http://localhost/auta_rezerwacja](http://localhost/auta_rezerwacja)

## 📂 Struktura projektu

- `index.php` – formularz rezerwacji
- `lista.php` – lista rezerwacji dla użytkownika
- `admin.php` – logowanie administratora
- `panel_admina.php` – panel admina
- `edytuj.php`, `usun.php` – zarządzanie rezerwacjami
- `style.css` – stylizacja interfejsu
- `config.php` – połączenie z bazą danych
- `baza.sql` – struktura + przykładowe dane do bazy


---

## 📄 Licencja

Projekt stworzony na potrzeby zaliczenia przedmiotu. Do użytku edukacyjnego.

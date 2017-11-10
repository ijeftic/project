# Instalacija
Da bi se pokrenula aplikacija potrebno je importovati test.sql fajl u bazu.
Instalirati composer dependensije preko komande `composer install`.

Opis po folderima/fajlovima:
- portal/index.php je stranica kada se uloguje korisnik, ispisuje welcome user <username>
- models/User.php je klasa usera
- backend/* je folder gde se nalazila logika za logovanje, registrovanje i konekcija ka bazi
- includes/navigation.php je meni bar(navigacija) koja se ubacuje na stranice

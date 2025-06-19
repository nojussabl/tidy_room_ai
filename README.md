Laravel 12

Kaip pasileisti projektą?
Reikia atsidaryti keturius terminalus, kurie butų projetko pagrindiniame folderyje ir kiekviename terminale paleisti po komandą.

-------------------------------

Terminalas 1:
cd .\tidy-room-app\
npm run dev

Terminalas 2:
cd .\tidy-room-app\
php artisan serve

Terminalas 3:
cd .\tidy-room-app\
php artisan queue:work

Terminalas 4:
cd .\tidy-room-app\
php artisan reverb:start

-------------------------------

php artisan migrate:fresh --seed  // Visa DB resetina
storage/app/public  // Cia yra uploadinamos nuotraukos

-------------------------------

Testiniai useriai

User: admin@example.com
Pass: password

User: parent@example.com
Pass: password

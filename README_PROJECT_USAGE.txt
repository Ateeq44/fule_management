After extracting ZIP:

1. Install composer packages:
   composer install

2. Install node packages:
   npm install

3. Build assets:
   npm run dev

4. Copy env and generate key:
   cp .env.example .env
   php artisan key:generate

5. Run migrations:
   php artisan migrate

6. Start server:
   php artisan serve

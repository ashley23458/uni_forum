University Forum Application

1. git clone https://github.com/ashley23458/uni_forum.git
2. Open uni_forum folder 
3. cp .env.example .env  or copy the .env.example and change its name to .env
4. Add your database connection to the .env file.
5. Add google and Github credentials (created in Google and Github API) and add to .env.
   
   GOOGLE_CLIENT_ID=

   GOOGLE_CLIENT_SECRET=
   
   GOOGLE_REDIRECT=${APP_URL}/login/google/callback
   
   GITHUB_CLIENT_ID=
   
   GITHUB_CLIENT_SECRET=
   
   GITHUB_CALLBACK_URL=${APP_URL}/login/github/callback
   
6. Add a mail service into .env.
7. composer install
8. php artisan key:generate
9. php artisan migrate
10. php artisan db:seed to populate database tables.
11. Ready to go! Visit your set domain "{domain}/".
12. You can login with any username in the users table the password will be "password".

© U1653907 Ashley Booth 2020

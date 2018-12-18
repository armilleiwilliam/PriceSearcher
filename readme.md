INTRODUCTION

Hi, I have decided to use Laravel for this application considering Symfony, the other framework I know, I bit too complex for this small and simple test.
This framework choice doesn’t arise particular issues, it pretty much suited all that was needed.

INSTALLATION INSTRUCTIONS

With git clone copy the application from my repository on your local, then execute:

- Composer install

Once created the database on your PhpMyAdmin and set the connection parameters on the copied application run the following to populate the database:

- php artisan migrate
- php artisan db:seed --class=UsersTableSeeder
- php artisan db:seed --class=PhotographsTableSeeder

IMPORTANT: IF COPYING AND PASTING THE ENTIRE COMMANDS ABOVE GIVES THE ERROR 'Too many arguments, expected arguments "command"', 
TRY TO TYPE THEM INSTEAD LETTER BY LETTER. 

In case the above commands won’t work just upload the database dump provided on the repository root of the github account (photographstwo.sql). 
Then execute:

- php artisan serve

Go to 127.0.0.1:8000/login to access the application.

The login is the following:

Username: admin@admin.com
Password: password 

On the home page you will notice a menu on top, in order to see the list of the items click on “photographs”, then you will be able to add a new photograph and edit or delete an old one.
Once created a new photograph a link to edit the new item appears next to a success message, the status “completed” appears on the list of photos and on photo details page. 
Each form is validated, if someone tries to add a new photo without caption or leaves empty the text field a descriptive error is returned, also if an image is bigger than 1500 KB or smaller than 100x100. Try to trig those errors to see the errors messages please.
I have added a pagination on the bottom of the list which appears once the number of photographs is higher than 10, try to add a few photographs to see how it looks. 
A jquery script is used to confirm the deletion of an item.

COMMENTS USAGE ON THE APPLICATION CODE

During my experience as web developer I have worked in environments with very different opinions about commenting the code. For example the first two experiences here in uk the developers commented code quite a lot, instead in my last company the team standard was to comment very rarely sustaining that it was enough to create very descriptive variables and methods names. 
I have decided to adopt a middle standard on this application between the two I have worked with in my previous companies, but if you want me to comment more or less I am sure I won’t have any problem to adapt to your commenting standard.
So, please, consider the above while you will judge my comments standard.  

Thanks so much for giving me the opportunity to complete this great exercise :)
William Armillei







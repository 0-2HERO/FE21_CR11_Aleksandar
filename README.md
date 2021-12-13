# FE21_CR11_Aleksandar




User log in: 
user@mail.com
password: 123123

Admin log in: 
admin@mail.com
password: 123123




- Create a database initially with 2 tables: users and animals. Add sufficient test data in the animals table: at least 10 records in total between small animals and large animals. Remember that animals have their age so make sure there are at least 4 senior animals in the DB (older than 8 years old).

- Display all animals on a single web page (home.php). Make sure a nice GUI is presented here(backenders exempt)

- Display all senior animals. Here you can decide whether to create a filter on the home page or create a new page senior.php

- Create a show more/show details button that will lead to a new page with only the information from that specific record/animal.

- Create a registration and login system.

Create separate sessions for normal users and administrators.

-Normal Users:

They will be able to ONLY see(read) and access all data. No action buttons (create, edit or delete) should be available.

- Admin:

Only the admin is able to create, update and delete data about animals (not users) within the admin panel, therefore an Admin Panel/Dashboard  should be created.

Bonus points
Pet Adoption

In order to accomplish this task, a new table pet_adoption will need to be created. This table should hold the userId and the petId (as foreign keys) plus other information that you may think is relevant i.e: adoption_date. 

Each Pet information/card should have a button "Take me home" that when clicked, will "adopt" the pet. When it does, a new record should be created in the table pet_adoption.


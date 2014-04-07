## Test Project with Laravel PHP Framework and Mongodb

This is the test project for a simple CRUD operation of a data like follows:

{ "_id" : ObjectId("52733912a3e4852b01b7acd9"), "uid" : 5650, "networks" : [ { "nid" : 1, "n_name" : "home", "n_ip" : "1.2.3.4", "n_status" : 1 }, { "nid" : 3, "n_name" : "work", "n_ip" : "8.8.8.8", "n_status" : 0 } ], "hostnames" : [ { "hostname" : "ip.unotelly.com", "block" : 1 }, { "hostname" : "nba.com", "block" : 0 }, { "hostname" : "facebook.com", "block" : 1 } ] }


We are using Laravel Framework and Mongodb for the project.

Step to run successfully:

1. Run Mongodb with default connection
2. Create a collection named "network_db"
3. Run apache
4. open terminal and go to the project folder 
5. Run the project with the command/similer like this "php artisan serve"
6. Check the url in browser


How it works:

1. You can find the users listing at first
2. Here you can see the add new user link at top
3. Add one or more user by entering the uid
4. Then go to the Network tab from top
5. Here you will see the Users and the associated networks and hostnames
6. Add one or more network or hostnames from top link
7. Edit and delele links should in the listing for networks and hostnames
8. Edit and delete option should be there for users also


Improvements:

1. users.uid and associated networks.nid should be unique
2. should have the id for hostnames
3. filtering the view instead of showing all items there
4. Need to improve of quering the data

-MD RASHEDUL ISLAM SUMON

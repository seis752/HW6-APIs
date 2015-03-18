# HW6-APIs

## Submission Notes
* The hosted web application is available for review here: http://justinmcdowell.com/hw6/
* As of 2015-03-17:
 * **PART 1: Integration with Twilio messaging service** is complete. See **Demo** section for description.
 * **PART 2: ?** is incomplete.

## Demo
There are 7 user records set up for demonstration, in addition to the 2000 user records (provided for HW5). The 7 demo users have usernames "user1", "user2", "user3", etc. and all have password "password". The other users have password "abc123".

### PART 1: Integration with Twilio messaging service
The web application allows users to post messages to their own message streams via text messages sent to the Twilio number. The phone number used to send the text message must already exist in the user record. A page to allow users to update their user records (currently, limited to editing "phone") has been added and is available from the user's "Profile" page. A response message will be sent back to the phone number sending the message, indicating either a success or failure condition.

### PART 2: ?
*This part of the assignment has not been completed yet.*

## Setup
* `schema.sql` (located in `database/`) contains the SQL commands for creating the database structure and inserting sample data. NOTE: `schema.sql` contains commands for dropping and creating the schema, in addition to the commands for creating tables and inserting sample data.
* `web/` is the directory that should be set as the public, web-accessible "webroot" directory for the application
* `config.php-template` (located in application/) must be renamed to `config.php` and update with database access credentials.

## Repository Layout

Description of the key directories and files:

* `assignment/` - Contains the original assignment assets.
* `database/` - Contains database model and script files.
* `schema.sql` - The SQL script for generating the project database, with sample data.
* `schema-data.sql` - SQL script containing only the sample data.
* `schema-structure.sql` - SQL script defining database structure, generated from the MySQL Workbench model file.
* `seis752justin_db.mwb` - MySQL Workbench model file.
* `setup.bat` - Useful during development to run SQL scripts against the MySQL instance.
* `twilio-datamodel.sql` - SQL script containing the DDL statements for the in-class example—currently, included only to support debugging
* `web/` - Contains the website files for deployment—the "web root" directory.
 * `application/config.php-template` - Rename to `config.php` and update with database access credentials.

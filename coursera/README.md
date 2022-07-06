# Resume Education
Resume Education is the third and last assignment project required to complete the course *[JavaScript, jQuery and JSON](https://www.coursera.org/learn/javascript-jquery-json/home/welcome)* from Coursera.

> *In this next assignment, you will extend our simple resume database to support Create, Read, Update, and Delete operations (CRUD) into a Education table that has a many-to-one relationship to our Profile table and a many-to-many relationship to an Institution table. We will add an jQuery autocomplete field to our user interface.*
> Copyright Creative Commons Attribution 3.0 - Charles R. Severance.

# Usage
To use this application you must be sure that you meet the requirementes and follow the configuration steps.

## Requirements

 - PHP >= 5.3
 - MySQL 3.x/4.x/5.x

## Configuration
You must configure the following to completely run the application:


 1. Create a database (or use an existing one), for example `misc`, create the tables named `users`, `Profile`, `Position` `Institution` and `Education` , then add new users to `users` and new institutions to `Institution` tables with the following statements:
```sql
CREATE TABLE users (
  user_id INTEGER NOT NULL AUTO_INCREMENT,
  name VARCHAR(128),
  email VARCHAR(128),
  password VARCHAR(128),
  PRIMARY KEY(user_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE users ADD INDEX(email);
ALTER TABLE users ADD INDEX(password);

CREATE TABLE Profile (
  profile_id INTEGER NOT NULL AUTO_INCREMENT,
  user_id INTEGER NOT NULL,
  first_name TEXT,
  last_name TEXT,
  email TEXT,
  headline TEXT,
  summary TEXT,
  PRIMARY KEY(profile_id),
  CONSTRAINT profile_ibfk_2
  FOREIGN KEY (user_id)
  REFERENCES users (user_id)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Position (
  position_id INTEGER NOT NULL AUTO_INCREMENT,
  profile_id INTEGER,
  rank INTEGER,
  year INTEGER,
  description TEXT,
  PRIMARY KEY(position_id),
  CONSTRAINT position_ibfk_1
    FOREIGN KEY (profile_id)
    REFERENCES Profile (profile_id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Institution (
  institution_id INTEGER NOT NULL KEY AUTO_INCREMENT,
  name VARCHAR(255),
  UNIQUE(name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Education (
  profile_id INTEGER,
  institution_id INTEGER,
  rank INTEGER,
  year INTEGER,
  CONSTRAINT education_ibfk_1
    FOREIGN KEY (profile_id)
    REFERENCES Profile (profile_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT education_ibfk_2
    FOREIGN KEY (institution_id)
    REFERENCES Institution (institution_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(profile_id, institution_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users (name,email,password)
VALUES ('UMSI','umsi@umich.edu','1a52e17fa899cf40fb04cfc42e6352f1');
INSERT INTO users (name,email,password) 
VALUES ('Chuck','csev@umich.edu','1a52e17fa899cf40fb04cfc42e6352f1');

INSERT INTO Institution (name) VALUES ('University of Michigan');
INSERT INTO Institution (name) VALUES ('University of Virginia');
INSERT INTO Institution (name) VALUES ('University of Oxford');
INSERT INTO Institution (name) VALUES ('University of Cambridge');
INSERT INTO Institution (name) VALUES ('Stanford University');
INSERT INTO Institution (name) VALUES ('Duke University');
INSERT INTO Institution (name) VALUES ('Michigan State University');
INSERT INTO Institution (name) VALUES ('Mississippi State University');
INSERT INTO Institution (name) VALUES ('Montana State University');
```
2. Place the folder where you cloned this repo into your web server's root folder.
3. Configure the variables `$HOST, $PORT, $DB_NAME, $DB_USER, $DB_PASSWORD` in `pdo.php` file, accordnly to the values you configured in the previous step.

Now you can access to your folder's url in the browser, for example: *localhost/res-education* using any of this email for login: `umsi@umich.edu` or `csev@umich.edu`
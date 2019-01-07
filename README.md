# RecruitmentExerciseJumia

This is my solution to the recruitment exercise for Jumia.
The company asked to fetch data from a database, list and filter it according to two conditions.

### Tech

This solution was developed on windows and, due to lack of time, I used WAMP server to be faster. 
Other technologies I used for the application run property were:

* PHP - main point of this solution.
* Bootstrap - the eyes also eat.
* JQuery - I'm very familiar with it.
* DataTables - pagination were extra points.
* PhpStorm - my favourite 
* PHPUnit - it's always good to test our code.
* Composer - this little fellow kept many things together.
* GIT - obvious.

### Installation

Requires an apache server, php interpreter, PHPUnit and composer, so it is best to install these. 
If you are on Windows with WAMP installed, you only need composer and PHPUnit.

Composer:
```sh
$ sudo apt install composer
$ composer install
```

For run the tests: 

```sh
$ vendor/bin/phpunit tests/
```

### Development

As I didn't use any development framework I had to adopt an organized, clear and coherent folder structure, and it goes as follows:

```bash
.
├── composer.json
├── composer.lock
├── database
│   └── sample.db
├── public
│   ├── css
│   │   ├── app.css
│   │   ├── pagination.css
│   │   └── plugins
│   │       ├── bootstrap.css
│   │       └── pagination
│   │           └── data-table.css
│   ├── icon
│   │   └── Jumia.png
│   ├── index.php
│   ├── js
│   │   ├── phoneNumbers.js
│   │   ├── plugins
│   │   │   ├── jquery
│   │   │   │   └── jquery.min.js
│   │   │   └── pagination
│   │   │       ├── data-table-options.js
│   │   │       └── data-tables.js
│   │   └── tableActions.js
│   └── views
│       └── phoneNumbers.html
├── src
│   ├── classes
│   │   ├── databases
│   │   │   └── DBSqlLite.php
│   │   ├── entities
│   │   │   ├── EntityCustomerConverter.php
│   │   │   ├── EntityCustomer.php
│   │   │   └── Entity.php
│   │   └── phoneNumberHelpers
│   │       ├── PhoneNumberDetailChecker.php
│   │       └── PhoneNumberValidator.php
│   ├── controllers
│   │   └── EntityCustomerController.php
│   ├── interfaces
│   │   ├── IDatabaseBehaviour.php
│   │   └── IEntity.php
│   └── repositories
│       └── EntityCustomerRepository.php
├── tests
│   ├── classes
│   │   └── phoneNumberHelpers
│   │       ├── PhoneNumberDetailCheckerTest.php
│   │       └── PhoneNumberValidatorTest.php
│   └── converter
│       └── EntityCustomerConverterTest.php
```
---

#### Run application
To run this app you need to run first WAMP or configured apache server and then go to your localhost.

```sh
localhost/
```

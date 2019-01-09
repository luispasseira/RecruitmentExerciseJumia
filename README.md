# RecruitmentExerciseJumia

This is my solution to the recruitment exercise for Jumia.
The company asked to fetch data from a database, list and filter it according to two conditions.

### Tech

This solution was developed on Windows and, due to lack of time, I used WAMP server to be faster.
EDIT: I used docker later, so if you're familiar with it you can run this application easily.
Other technologies I used for the application run property were:

* PHP - main point of this solution.
* Bootstrap - the eyes also eat.
* JQuery - I'm very familiar with it.
* DataTables - pagination were extra points.
* PhpStorm - my favourite 
* PHPUnit - it's always good to test our code.
* Composer - this little fellow kept many things together.
* Docker - first time I used it.
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

EDIT: If you prefer to use docker, go to docker/ folder and run these commands:

```sh
$ docker-compose build
$ docker-compose up
```

### Development

As I didn't use any development framework I had to adopt an organized, clear and coherent folder structure, and it goes as follows:

```bash
.
├── app
│   ├── composer.json
│   ├── composer.lock
│   ├── database
│   │   └── sample.db
│   ├── guides
│   │   └── uml
│   │       ├── uml.gliffy
│   │       └── uml.PNG
│   ├── public
│   │   ├── css
│   │   │   ├── app.css
│   │   │   ├── pagination.css
│   │   │   └── plugins
│   │   │       ├── bootstrap.css
│   │   │       └── pagination
│   │   │           └── data-table.css
│   │   ├── icon
│   │   │   └── Jumia.png
│   │   ├── index.php
│   │   ├── js
│   │   │   ├── phoneNumbers.js
│   │   │   ├── plugins
│   │   │   │   ├── jquery
│   │   │   │   │   └── jquery.min.js
│   │   │   │   └── pagination
│   │   │   │       ├── data-table-options.js
│   │   │   │       └── data-tables.js
│   │   │   └── tableActions.js
│   │   └── views
│   │       └── phoneNumbers.html
│   ├── src
│   │   ├── classes
│   │   │   ├── databases
│   │   │   │   └── DBSqlLite.php
│   │   │   ├── entities
│   │   │   │   ├── EntityCustomerConverter.php
│   │   │   │   ├── EntityCustomer.php
│   │   │   │   └── Entity.php
│   │   │   └── phoneNumberHelpers
│   │   │       ├── PhoneNumberDetailChecker.php
│   │   │       └── PhoneNumberValidator.php
│   │   ├── controllers
│   │   │   └── EntityCustomerController.php
│   │   ├── interfaces
│   │   │   ├── IDatabaseBehaviour.php
│   │   │   └── IEntity.php
│   │   └── repositories
│   │       └── EntityCustomerRepository.php
│   └── tests
│       ├── classes
│       │   └── phoneNumberHelpers
│       │       ├── PhoneNumberDetailCheckerTest.php
│       │       └── PhoneNumberValidatorTest.php
│       └── converter
│           └── EntityCustomerConverterTest.php
├── docker
│   ├── 000-default.conf
│   ├── docker-compose.yml
│   └── Dockerfile
└── README.md

27 directories, 34 files

```
---

#### Run application
To run this app you need to run first WAMP or configured apache server and then go to your localhost.

You have to change the connection path on DBSqlLite.php ($connectionPath) to the path of "sample.db" on your computer.

```sh
localhost:65000
```

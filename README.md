# LaunWeb: Revolutionizing Laundry Services with a Web - Integrated Booking System

## Getting Started

Clone the project into the "htdocs" directory within your XAMPP installation.

```bash
git clone git@github.com:ICS2608-Final-Project/laundry-system.git
```

## Project Structure

```plaintext
/laundry_system
|-- app/
|   |-- controllers/
|   |   |-- HomeController.php
|   |   |-- AboutController.php
|   |   |-- ContactController.php
|   |   |-- ...
|   |-- models/
|   |   |-- UserModel.php
|   |   |-- ...
|   |-- views/
|   |   |-- home.php
|   |   |-- about.php
|   |   |-- contact.php
|   |   |-- ...
|
|-- assets/
|   |-- images
|   |-- ...
|
|-- config/
|   |-- config.php
|   |-- database.php
|
|-- css/
|   |-- styles.css
|   |-- ...
|
|-- js/
|   |-- scripts.js
|   |-- ...
|
|-- template/
|   |-- header.php
|   |-- footer.php
|
|-- db.sql
|-- index.php
|-- .gitignore
|-- README.md
```

### Explanation of the structure

- **app**: Contains the application-specific code.

  - **controllers**: PHP files responsible for handling user requests, processing data, and interacting with models.

  - **models**: PHP files representing data structures and database interactions.

  - **views**: PHP files responsible for rendering the HTML and presenting data to the user. The layouts directory holds common layout elements like headers and footers.

- **config**: Configuration files for your project.

  - **config.php**: General configuration settings.

  - **database.php**: Database configuration settings.

- **public**: The web server's root directory. Only files in this directory are accessible from the web.

  - **index.php**: The main entry point for your application.

  - **assets**: Static assets like CSS and JavaScript files.

- **db.sql**: Script that contains instructions to create and initialize a database along with its tables, relationships, and initial data.

- **.gitignore**: Specifies files and directories that should be ignored by version control.

- **README.md**: Project documentation.

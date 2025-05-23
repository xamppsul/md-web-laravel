# MD Feb UMK CMS - Laravel

A MD feb umk content management system built with Laravel, featuring role-based access control and modern authentication.

## Technology Stack

### Web
- **Language**: PHP 8.2+
- **Web Framework**: Laravel - Build and ship software with tools crafted for productivity
- **Database**: MySQL 8.0+ - Primary data store
- **Authentication**: Guard Authentication
- **Migration**: Migration-laravel Database versioning
- **Seeder**: Seeder-laravel Database versioning

## Project Structure

```
md-web-laravel/
├── app/                           # Application entry points
│   ├── Modules                    # Private application code
│   │   ├── Authentication         # Authentication module
│   │   │   ├── handler/           # HTTP Handler
│   │   │   ├── interfaces/        # Struct of method on modules
│   │   │   ├── repository/        # Exec Business Logic
│   │   │   ├── routes/            # Endpoint of module
│   │   │   ├── services/          # Data access layer
│   │   │   ├── usecase/           # Prepare data access layer with execute
│   ├── Providers                  # Thirdparty config
│   │   ├── AppServiceProvider.php # instance third party and other providers 
│   ├── Src                        # Store 
│   │   ├── Constant               # Define static of value
│   │   ├── Domain                 # Models transaction data with database
│   │   ├── Mail                   # Config send mailable handler
│   │   ├── Middleware             # HTTP Middleware
├── bootstrap/                     # Application configuration
├── config/                        # Init custom config
├── database/                      # Database related files
│   └── migrations/                # SQL migration files
├── mdfebumk-compose/              # Docker-compose file store
├── public/                        # Assets
├── resources                      # Views
├── routes                         # Call endpoint of every modules
├── storage                        # Logging and store data
├── tests                          # uUnit test configuration
└── vendor                         # Dependancy laravel
.editorconfig
.env
.env.example
.gitattributes
.gitignore
artisan
composer.json
composer.lock
composer.lock
dev.Docker-Compose.yml
dev.Dockerfile
makefile
package.json
phpunit.xml
README.md
vite.config.js
```

## Architecture

The project follows Clean Architecture principles with the following layers:

1. **Domain Layer** (`services/`)
   - Manage business logic interfaces
   - Defines struct of handling business logic
   - Houses repository and usecase interfaces

2. **Repository Layer** (`repository/`)
   - Implements data access logic
   - Handles database operations
   - Manages data persistence

3. **Usecase Layer** (`usecase/`)
   - Implements business logic
   - Orchestrates data flow between layers
   - Handles business rules and validations

4. **Handler Layer** (`handler/`)
   - Manages HTTP requests and responses
   - Handles input validation
   - Routes requests to appropriate usecases

## Features Basic (if you want to know all about feature please install it)

- **Authentication & Authorization**
  - Guard authentication with user and admin
  - Role-based access control
  - Read Password hashing

- **User Management**
  - User registration and login
  - Profile management
  - Role assignment
  - Password reset functionality

- **Security**
  - Password hashing using bcrypt
  - Token-based authentication
  - Role-based access control
  - Request validation and sanitization

## Installation

1. Install composer:
```bash
# For macOS/linux using composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"
php composer-setup.php
php -r "unlink('composer-setup.php');"

sudo mv composer.phar /usr/local/bin/composer

#for windows
Download and run Composer-Setup.exe - it will install the latest composer version whenever it is executed.

# For other platforms, visit:
# https://getcomposer.org/doc/00-intro.md
```

2. Clone the repository:
```bash
git clone https://github.com/xamppsul/md-web-laravel.git #basic clone
git clone git@github.com:xamppsul/md-web-laravel.git #with SSH
cd md-web-laravel
```

3. Install dependencies:
```bash
composer install
```

## Database Setup

1. Configure your database connection in `.env`:
```bash
database: local
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE="your database in local"
   DB_USERNAME="your username in local"
   DB_PASSWORD="your password in local"  # Adjust port if needed
database: docker
   DB_CONNECTION=mysql
   DB_HOST=dev-mdfebumk-db
   DB_PORT=3306
   DB_DATABASE=dev_mdfebumk
   DB_USERNAME="username in docker-composer"
   DB_PASSWORD="password in docker-composer" # Adjust hosts if needed
```

3. Run database migrations: with makefile
```bash
# Apply all migrations and seeder
make mdfebumk-migrate

# Refresh all migrations and seeder
make mdfebumk-refresh

# Rollback all migrations
make mdfebumk-rollback
```

## Running the Application

Start the server:
```bash
#makefile 
make mdfebumk-serve
#base command
php artisan serve
#base command with port
php -S localhost:port -t public
#base command with default port 8089 from makefile
make mdfebumk-serve-port
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

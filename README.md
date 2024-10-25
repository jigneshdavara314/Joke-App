# Joke Application - Laravel

This README outlines the steps required to set up and serve the Laravel Joke application on your local machine.

## Prerequisites

Ensure you have the following installed on your system:

- PHP 8.3 or higher (Laravel 11.X)
- Composer
- MySQL (or your preferred database)

## Step-by-Step Setup Process

### 1. Clone the Repository

Clone the project from your repository using the following command:

```bash
git clone https://github.com/jigneshdavara314/Joke-App.git
```

### 2. Checkout the Desired Branch

Navigate into the project directory and checkout the desired branch:

```bash
cd Joke-App
git checkout your-branch
```

Replace `your-branch` with the actual branch name.

### 3. Set Up Environment Variables

Copy the `.env.example` file to create the `.env` file:

```bash
cp .env.example .env
```

Edit the `.env` file to configure database credentials and other environment settings:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Replace the values with your actual database credentials.

### 4. Install PHP Dependencies

Run the following command to install the PHP dependencies:

```bash
composer install
```

### 5. Generate Application Key

Generate the application key to secure encrypted data:

```bash
php artisan key:generate
```

### 6. Run Database Migrations

Run the migrations to set up the database structure:

```bash
php artisan migrate
```

### 7. Serve the Laravel Application

Start the Laravel development server with:

```bash
php artisan serve
```

Your application will be accessible at `http://localhost:8000` by default.

### 8. Running Test Cases

To ensure that the application works as expected, you can run the test cases using:

```bash
php artisan test
```

This command will execute all the test cases defined in the `tests` directory.

## Final Notes

- Make sure your database is running and configured correctly.
- Refer to the Laravel documentation for more advanced configurations.
- For further testing, you can add more test cases to the `tests/Feature/JokeTest.php` file.
- Ensure to maintain your codebase and regularly run the tests to catch any issues early.

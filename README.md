# Task 1000 Programming — School Management System

A Laravel-based school management system for organizing students, teachers, and classrooms through an authenticated dashboard.

The application provides CRUD functionality for the core school entities and uses a service-oriented structure to keep business logic separate from controllers.

## Features

- Secure user authentication with registration, login, logout, email verification, and password reset.
- Authenticated dashboard for managing school data.
- Student management:
  - Add, view, edit, and delete students.
  - Store contact information and birth dates.
  - Associate students with classrooms.
- Teacher management:
  - Add, view, edit, and delete teachers.
  - Store contact information and specialization.
  - Associate teachers with classrooms.
- Classroom management:
  - Add, view, edit, and delete classrooms.
  - Store classroom descriptions and capacity limits.
- Form validation through dedicated Laravel Form Request classes.
- Database migrations for users, students, teachers, classrooms, sessions, cache, and jobs.
- Responsive frontend assets built with Vite, Tailwind CSS, Alpine.js, and AdminLTE.

## Technology Stack

- **Backend:** PHP 8.2+, Laravel 12
- **Authentication:** Laravel Breeze
- **Admin interface:** Laravel AdminLTE
- **Frontend:** Blade, Tailwind CSS, Alpine.js
- **Build tool:** Vite
- **Database:** MySQL 8.0+
- **Testing:** PHPUnit and Laravel's testing tools

## Requirements

Before installing the project, make sure you have:

- PHP 8.2 or newer
- Composer
- Node.js and npm
- MySQL 8.0 or newer
- PHP extensions required by Laravel 12

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/ayhambsmar36-maker/Task-1000-programming.git
   cd Task-1000-programming
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Create the environment file:

   ```bash
   cp .env.example .env
   ```

   On Windows PowerShell, use:

   ```powershell
   Copy-Item .env.example .env
   ```

4. Create a MySQL database.

   Using the MySQL command line client:

   ```sql
   CREATE DATABASE task_1000_programming CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

   You can use another database name, but make sure it matches `DB_DATABASE` in your `.env` file.

5. Configure MySQL in `.env`:

   ```dotenv
   APP_NAME="Task 1000 Programming"
   APP_ENV=local
   APP_DEBUG=true
   APP_URL=http://localhost

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_1000_programming
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Update `DB_USERNAME` and `DB_PASSWORD` if your MySQL installation uses a different account or password.

6. Generate the application key:

   ```bash
   php artisan key:generate
   ```

7. Run the database migrations:

   ```bash
   php artisan migrate
   ```

8. Install frontend dependencies and build the assets:

   ```bash
   npm install
   npm run build
   ```

## Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

For frontend development with Vite hot reload, run this in a separate terminal:

```bash
npm run dev
```

You can also use the Composer development script to start the application, queue listener, log viewer, and Vite together:

```bash
composer run dev
```

Open the application at [http://localhost:8000](http://localhost:8000).

## MySQL Commands

Use the following commands when working with the MySQL database:

```bash
php artisan migrate             # Run pending migrations
php artisan migrate:status      # Show migration status
php artisan migrate:fresh       # Drop all tables and rebuild the database
php artisan db:show              # Display database information
```

> **Warning:** `php artisan migrate:fresh` deletes all existing tables and data in the configured MySQL database. Use it only in development.

## Main Routes

All application management routes require authentication.

| Area | Route | Purpose |
| --- | --- | --- |
| Dashboard | `/` | View the authenticated dashboard |
| Students | `/students` | Manage students |
| Teachers | `/teachers` | Manage teachers |
| Classrooms | `/classrooms` | Manage classrooms |
| Profile | `/profile` | Manage the authenticated user's profile |

Each management section supports listing records, creating records, viewing details, editing records, and deleting records.

## Project Structure

```text
app/
├── Http/Controllers/        Request controllers for the dashboard and CRUD features
├── Http/Requests/           Validation rules for student, teacher, and classroom forms
├── Models/                  Eloquent models
└── Services/                Business logic for students, teachers, and classrooms

database/
├── migrations/              MySQL database table definitions
└── seeders/                 Database seed data

resources/
├── js/                      Alpine.js and application JavaScript
├── css/                     Application styles
└── views/                   Blade templates

routes/
├── Dashboard.php            Dashboard and school management routes
├── auth.php                 Authentication routes
└── web.php                  Main web route loader
```

## Testing

Make sure the test database configuration is set correctly before running the test suite.

Run the test suite with:

```bash
composer test
```

You can also run Laravel tests directly:

```bash
php artisan test
```

## Troubleshooting MySQL

### Access denied for user

Check that `DB_USERNAME` and `DB_PASSWORD` in `.env` match an existing MySQL user. After changing `.env`, clear the cached configuration:

```bash
php artisan config:clear
```

### Unknown database

Create the database manually and ensure the name matches `DB_DATABASE`:

```sql
CREATE DATABASE task_1000_programming CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Connection refused

Make sure the MySQL server is running and that `DB_HOST` and `DB_PORT` are correct. The default MySQL port is `3306`.

## Development Notes

- Keep `.env` out of version control. Use `.env.example` as the configuration template.
- Do not commit production database credentials.
- Run `npm run dev` while developing frontend assets and `npm run build` before deployment.
- Use the existing Form Request classes when adding or modifying validation rules.
- Keep feature-specific business logic in the appropriate service class rather than placing it directly in controllers.

## Contributing

Contributions and improvements are welcome. To contribute:

1. Create a feature branch.
2. Make your changes.
3. Run the test suite and frontend build.
4. Open a pull request with a clear description of the changes.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

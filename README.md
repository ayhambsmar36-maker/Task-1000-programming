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
- **Database:** Any database supported by Laravel; SQLite is suitable for local development
- **Testing:** PHPUnit and Laravel's testing tools

## Requirements

Before installing the project, make sure you have:

- PHP 8.2 or newer
- Composer
- Node.js and npm
- A database supported by Laravel
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

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Configure the database connection in `.env`.

   For a simple local SQLite setup:

   ```bash
   touch database/database.sqlite
   ```

   Then set the following values in `.env`:

   ```dotenv
   DB_CONNECTION=sqlite
   ```

6. Run the migrations:

   ```bash
   php artisan migrate
   ```

7. Install frontend dependencies and build the assets:

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
├── migrations/              Database table definitions
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

Run the test suite with:

```bash
composer test
```

You can also run Laravel tests directly:

```bash
php artisan test
```

## Useful Artisan Commands

```bash
php artisan migrate             # Run database migrations
php artisan migrate:fresh       # Rebuild the database from scratch
php artisan route:list           # Display all registered routes
php artisan config:clear        # Clear cached configuration
php artisan cache:clear         # Clear the application cache
```

## Development Notes

- Keep `.env` out of version control. Use `.env.example` as the configuration template.
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

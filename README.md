# Personal Task Manager

A simple Laravel-based application that helps users organize and manage their daily tasks. Users can create tasks, view saved tasks, edit task details, delete tasks, and update their task status.

## Project Information

**Project Code:** WST21-PM-2026-SF

**Student Name:** ANIBAN, ARJANE ROSE B.

**Course & Year:** BSIT - 2nd Year

**Database Used:** SQLite

## Features

- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status

## Database

The system uses an SQLite database with a `tasks` table containing:

| Field | Purpose |
|---|---|
| `id` | Unique Task ID |
| `task_name` | Name of the task |
| `description` | Details of the task |
| `status` | Pending or Completed |
| `due_date` | Task deadline |
| `created_at` | Date the task was created |
| `updated_at` | Date the task was updated |

## Laravel Structure

The project follows the Laravel application flow:

**Routes → Controller → Model → Database → Blade Views**

### Routes

Manages the application URLs and directs requests to the correct controller methods.

### Controller

Processes the main task operations, including adding, viewing, editing, updating, and deleting tasks.

### Model

The `Task` model connects the application to the `tasks` table in the SQLite database.

### Database

SQLite stores all task records and their related information.

### Blade Views

Blade templates display the Task Manager interface and allow users to interact with their tasks.

## CRUD Operations

### Create

Users can create and save a new task.

### Read

Users can view the list of tasks stored in the system.

### Update

Users can edit task information and change the status between Pending and Completed.

### Delete

Users can delete a task from the system.

## How to Run

1. Clone or download the repository.

2. Open the project folder in the terminal.

3. Install Laravel dependencies:

```bash
composer install
npm install




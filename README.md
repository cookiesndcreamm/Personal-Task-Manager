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

## Image 1: Review and Manage Tasks
The dashboard displays all saved tasks. Each task shows its name, description, status, due date, and available actions.

1. View the saved tasks in the task list.
2. Check the task name and description.
3. Check the current task status.
4. Check the due date of the task.
5. Select **Complete** to change a pending task to completed.
6. Select **Edit** to modify the task.
7. Select **Delete** to remove the task.
<img width="1599" height="790" alt="screenshot 1" src="https://github.com/user-attachments/assets/d078dab4-d75c-4a7c-94e1-60c0d75d315d" />

## Image 2: Add a Task
The Add New Task page allows the user to create a new task.

1. Enter the task name in the **Task Name** field.
2. Enter additional details in the **Description** field.
3. Select the task **Status**.
4. Choose the **Due Date**.
5. Select **Save Task** to save the new task.
6. Select **Cancel** to return to the task list without saving.
<img width="1599" height="790" alt="screenshot 2" src="https://github.com/user-attachments/assets/af3df29d-833b-4bcc-a12b-63e9e25370bf" />

## Image 3: Task List After Saving
After successfully saving a task, the system returns to the dashboard and displays the new task.

1. The saved task appears in the task list.
2. The task name and description are displayed.
3. The task status is displayed as Pending or Completed.
4. The due date is displayed.
5. The user can complete, edit, or delete the task.
<img width="1599" height="793" alt="screenshot 3" src="https://github.com/user-attachments/assets/2258e6c0-c692-429d-9758-94db3cb92a0c" />









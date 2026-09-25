<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f0ff;
            color: #333;
        }

        /* NAVBAR */
        .navbar {
            background: #6a1b9a;
            color: white;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
        }

        .nav-link {
            color: #6a1b9a;
            background: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: bold;
        }

        /* MAIN */
        .container {
            width: 85%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .top h1 {
            color: #4a148c;
        }

        .add-button {
            background: #7b1fa2;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .add-button:hover {
            background: #4a148c;
        }

        /* SUCCESS MESSAGE */
        .success {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* EMPTY */
        .empty {
            background: white;
            text-align: center;
            padding: 50px 20px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .empty h2 {
            color: #6a1b9a;
            margin-bottom: 10px;
        }

        .empty p {
            margin-bottom: 20px;
            color: #666;
        }

        /* TASK CARDS */
        .tasks {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .task-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .task-card h2 {
            color: #4a148c;
            margin-bottom: 10px;
        }

        .description {
            color: #666;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        /* STATUS */
        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .pending {
            background: #fff3cd;
            color: #856404;
        }

        .completed {
            background: #d4edda;
            color: #155724;
        }

        .date {
            color: #555;
            margin-bottom: 18px;
        }

        /* BUTTONS */
        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .actions a,
        .actions button {
            border: none;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
        }

        .edit {
            background: #ede7f6;
            color: #6a1b9a;
        }

        .complete {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .set-pending {
            background: #fff3cd;
            color: #856404;
        }

        .delete {
            background: #ffebee;
            color: #c62828;
        }

        .actions form {
            display: inline;
        }

        /* MOBILE */
        @media (max-width: 600px) {
            .navbar {
                padding: 18px 5%;
            }

            .container {
                width: 92%;
            }

            .top {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="logo">
            🍪 cookiesndcream
        </div>

        <a href="{{ route('tasks.index') }}" class="nav-link">
            My Tasks
        </a>

    </nav>


    <!-- MAIN CONTENT -->
    <div class="container">
        <div class="top">
            <h1>My Tasks</h1>
    </div>


        <!-- SUCCESS MESSAGE -->
        @if(session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        <!-- TASK LIST -->
        @if($tasks->count() > 0)

            <div class="tasks">

                @foreach($tasks as $task)

                    <div class="task-card">

                        <!-- TASK NAME -->
                        <h2>
                            {{ $task->task_name }}
                        </h2>


                        <!-- DESCRIPTION -->
                        <p class="description">

                            @if($task->description)

                                {{ $task->description }}

                            @else

                                No description provided.

                            @endif

                        </p>


                        <!-- STATUS -->
                        @if($task->status == 'Completed')

                            <span class="status completed">
                                Completed
                            </span>

                        @else

                            <span class="status pending">
                                Pending
                            </span>

                        @endif


                        <!-- DUE DATE -->
                        <p class="date">

                            <strong>Due Date:</strong>

                            @if($task->due_date)

                                {{ $task->due_date->format('F d, Y') }}

                            @else

                                No due date

                            @endif

                        </p>


                        <!-- ACTION BUTTONS -->
                        <div class="actions">

                            <!-- EDIT -->
                            <a
                                href="{{ route('tasks.edit', $task->id) }}"
                                class="edit"
                            >
                                Edit
                            </a>


                            <!-- STATUS -->
                            @if($task->status == 'Pending')

                                <form
                                    action="{{ route('tasks.status', $task->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="hidden"
                                        name="status"
                                        value="Completed"
                                    >

                                    <button
                                        type="submit"
                                        class="complete"
                                    >
                                        Complete
                                    </button>

                                </form>

                            @else

                                <form
                                    action="{{ route('tasks.status', $task->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="hidden"
                                        name="status"
                                        value="Pending"
                                    >

                                    <button
                                        type="submit"
                                        class="set-pending"
                                    >
                                        Set Pending
                                    </button>

                                </form>

                            @endif


                            <!-- DELETE -->
                            <form
                                action="{{ route('tasks.destroy', $task->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this task?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <!-- NO TASKS -->
            <div class="empty">

                <h2>No Tasks Yet</h2>

                <p>
                    You don't have any tasks yet. Add your first task to get started.
                </p>

                <a href="{{ route('tasks.create') }}" class="add-button">
                    + Add Task
                </a>

            </div>

        @endif

    </div>

</body>
</html>
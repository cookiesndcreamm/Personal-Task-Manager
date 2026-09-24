<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>cookiesndcream - Personal Task Manager</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f7f1ff;
            color: #2d1b3d;
        }

        /* NAVBAR */

        .navbar {
            background: linear-gradient(
                135deg,
                #6a1b9a,
                #8e44ad
            );

            color: white;
            padding: 20px 8%;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow: 0 4px 15px rgba(70, 30, 100, 0.2);
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .navbar-text {
            font-size: 14px;
        }


        /* CONTAINER */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 45px auto;
        }


        /* HEADER */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 30px;
        }

        .header h2 {
            color: #4a148c;
            font-size: 32px;
            margin-bottom: 6px;
        }

        .header p {
            color: #76677d;
        }


        /* ADD BUTTON */

        .add-button {
            background: #7b1fa2;
            color: white;

            text-decoration: none;

            padding: 13px 20px;

            border-radius: 9px;

            font-weight: bold;

            transition: 0.2s;
        }

        .add-button:hover {
            background: #4a148c;
        }


        /* SUCCESS */

        .success {
            background: #eadcff;
            color: #5b2080;

            border-left: 5px solid #8e44ad;

            padding: 15px;

            border-radius: 8px;

            margin-bottom: 25px;
        }


        /* TASK GRID */

        .task-grid {
            display: grid;

            grid-template-columns:
                repeat(auto-fit, minmax(290px, 1fr));

            gap: 22px;
        }


        /* TASK CARD */

        .task-card {
            background: white;

            padding: 25px;

            border-radius: 15px;

            border-left: 6px solid #8e44ad;

            box-shadow:
                0 5px 20px rgba(80, 40, 100, 0.10);

            transition: 0.2s;
        }

        .task-card:hover {
            transform: translateY(-3px);
        }


        .task-card h3 {
            color: #4a148c;

            font-size: 20px;

            margin-bottom: 10px;
        }


        .description {
            color: #6f6177;

            line-height: 1.5;

            margin-bottom: 18px;
        }


        /* STATUS */

        .status {
            display: inline-block;

            padding: 7px 12px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: bold;

            margin-bottom: 15px;
        }

        .pending {
            background: #eee0ff;
            color: #6a1b9a;
        }

        .completed {
            background: #d8c4e8;
            color: #4a148c;
        }


        /* DATE */

        .due-date {
            color: #62576a;

            font-size: 14px;

            margin-bottom: 18px;
        }


        /* ACTIONS */

        .actions {
            display: flex;

            gap: 7px;

            flex-wrap: wrap;
        }


        .button {
            border: none;

            padding: 9px 12px;

            border-radius: 7px;

            cursor: pointer;

            text-decoration: none;

            font-size: 13px;

            font-weight: bold;
        }


        .edit {
            background: #eadcff;
            color: #6a1b9a;
        }


        .complete {
            background: #dcc9eb;
            color: #4a148c;
        }


        .pending-button {
            background: #f0e5ff;
            color: #7b1fa2;
        }


        .delete {
            background: #f5dce8;
            color: #8e2450;
        }


        form {
            display: inline;
        }


        /* EMPTY */

        .empty {
            background: white;

            padding: 65px 30px;

            text-align: center;

            border-radius: 15px;

            box-shadow:
                0 5px 20px rgba(80, 40, 100, 0.10);
        }

        .empty-icon {
            font-size: 50px;

            margin-bottom: 15px;
        }

        .empty h3 {
            color: #4a148c;

            margin-bottom: 8px;

            font-size: 22px;
        }

        .empty p {
            color: #777;
        }


        /* MOBILE */

        @media (max-width: 650px) {

            .navbar-text {
                display: none;
            }

            .header {
                flex-direction: column;

                align-items: flex-start;

                gap: 18px;
            }

            .add-button {
                width: 100%;

                text-align: center;
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

        <div class="navbar-text">
            Personal Task Manager
        </div>

    </nav>


    <!-- CONTENT -->

    <main class="container">


        <!-- HEADER -->

        <div class="header">

            <div>

                <h2>
                    My Tasks
                </h2>

                <p>
                    Organize your tasks and stay productive.
                </p>

            </div>


            <a
                href="{{ route('tasks.create') }}"
                class="add-button"
            >
                + Add Task
            </a>

        </div>


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="success">

                ✓ {{ session('success') }}

            </div>

        @endif


        <!-- TASKS -->

        @if($tasks->count() > 0)


            <div class="task-grid">


                @foreach($tasks as $task)


                    <div class="task-card">


                        <h3>
                            {{ $task->task_name }}
                        </h3>


                        <p class="description">

                            @if($task->description)

                                {{ $task->description }}

                            @else

                                No description provided.

                            @endif

                        </p>


                        <!-- STATUS -->

                        @if($task->status === 'Completed')

                            <span class="status completed">
                                ✓ Completed
                            </span>

                        @else

                            <span class="status pending">
                                ● Pending
                            </span>

                        @endif


                        <!-- DATE -->

                        <p class="due-date">

                            <strong>Due Date:</strong>

                            @if($task->due_date)

                                {{ $task->due_date->format('M d, Y') }}

                            @else

                                No due date

                            @endif

                        </p>


                        <!-- BUTTONS -->

                        <div class="actions">


                            <!-- EDIT -->

                            <a
                                href="{{ route('tasks.edit', $task->id) }}"
                                class="button edit"
                            >
                                Edit
                            </a>


                            <!-- STATUS -->

                            @if($task->status === 'Pending')


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
                                        class="button complete"
                                    >
                                        ✓ Complete
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
                                        class="button pending-button"
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
                                    class="button delete"
                                >
                                    Delete
                                </button>

                            </form>


                        </div>


                    </div>


                @endforeach


            </div>


        @else


            <!-- EMPTY -->

            <div class="empty">

                <div class="empty-icon">
                    🍪
                </div>

                <h3>
                    No tasks yet
                </h3>

                <p>
                    Click "Add Task" to create your first task.
                </p>

            </div>


        @endif


    </main>


</body>

</html>
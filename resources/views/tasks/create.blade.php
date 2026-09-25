<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task - Personal Task Manager</title>

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

        .container {
            width: 85%;
            max-width: 700px;
            margin: 40px auto;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #4a148c;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #7b1fa2;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            background: #ffebee;
            color: #c62828;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error ul {
            margin-left: 20px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .save-button {
            background: #7b1fa2;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .save-button:hover {
            background: #4a148c;
        }

        .cancel-button {
            background: #eeeeee;
            color: #444;
            text-decoration: none;
            padding: 12px 22px;
            border-radius: 8px;
            font-weight: bold;
        }

        .cancel-button:hover {
            background: #dddddd;
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
            }

            .navbar {
                padding: 18px 5%;
            }

            .buttons {
                flex-direction: column;
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


    <!-- FORM -->
    <div class="container">

        <div class="form-card">

            <h1>Add New Task</h1>


            <!-- VALIDATION ERRORS -->
            @if($errors->any())

                <div class="error">

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('tasks.store') }}"
                method="POST"
            >

                @csrf


                <!-- TASK NAME -->
                <div class="form-group">

                    <label for="task_name">
                        Task Name
                    </label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        value="{{ old('task_name') }}"
                        placeholder="Enter task name"
                        required
                    >

                </div>


                <!-- DESCRIPTION -->
                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Enter task details..."
                    >{{ old('description') }}</textarea>

                </div>


                <!-- STATUS -->
                <div class="form-group">

                    <label for="status">
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                    >

                        <option
                            value="Pending"
                            {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Completed"
                            {{ old('status') == 'Completed' ? 'selected' : '' }}
                        >
                            Completed
                        </option>

                    </select>

                </div>


                <!-- DUE DATE -->
                <div class="form-group">

                    <label for="due_date">
                        Due Date
                    </label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date') }}"
                    >

                </div>


                <!-- BUTTONS -->
                <div class="buttons">

                    <button
                        type="submit"
                        class="save-button"
                    >
                        Save Task
                    </button>

                    <a
                        href="{{ route('tasks.index') }}"
                        class="cancel-button"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>
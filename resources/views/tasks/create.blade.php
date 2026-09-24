<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Task - cookiesndcream</title>

    <style>

        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            background: #f7f1ff;
            color: #2d1b3d;
        }

        .navbar {
            background: linear-gradient(
                135deg,
                #6a1b9a,
                #8e44ad
            );

            color: white;

            padding: 20px 8%;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 650px;
            margin: 45px auto;
        }

        .card {
            background: white;

            padding: 35px;

            border-radius: 15px;

            box-shadow:
                0 5px 20px rgba(80, 40, 100, 0.12);
        }

        h2 {
            color: #4a148c;

            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;

            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;

            margin-bottom: 8px;

            color: #4a148c;

            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;

            padding: 12px;

            border: 1px solid #d5c5df;

            border-radius: 8px;

            font-size: 14px;

            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #8e44ad;

            box-shadow:
                0 0 0 2px #eadcff;
        }

        textarea {
            min-height: 120px;

            resize: vertical;
        }

        .error {
            color: #a22a5a;

            font-size: 13px;

            margin-top: 6px;
        }

        .buttons {
            display: flex;

            gap: 10px;

            margin-top: 28px;
        }

        .button {
            padding: 12px 20px;

            border: none;

            border-radius: 8px;

            cursor: pointer;

            text-decoration: none;

            font-weight: bold;
        }

        .save {
            background: #7b1fa2;

            color: white;
        }

        .save:hover {
            background: #4a148c;
        }

        .cancel {
            background: #eee7f2;

            color: #4a148c;
        }

        @media (max-width: 600px) {

            .buttons {
                flex-direction: column;
            }

            .button {
                text-align: center;
            }

        }

    </style>

</head>


<body>


    <nav class="navbar">

        <div class="logo">
            🍪 cookiesndcream
        </div>

    </nav>


    <main class="container">


        <div class="card">


            <h2>
                Add New Task
            </h2>

            <p class="subtitle">
                Create a new task and keep track of your work.
            </p>


            @if($errors->any())

                <div class="error">
                    Please check the information entered.
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

                    @error('task_name')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

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

                        <option value="Pending">
                            Pending
                        </option>

                        <option value="Completed">
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
                        class="button save"
                    >
                        Add Task
                    </button>

                    <a
                        href="{{ route('tasks.index') }}"
                        class="button cancel"
                    >
                        Cancel
                    </a>

                </div>


            </form>


        </div>


    </main>


</body>

</html>
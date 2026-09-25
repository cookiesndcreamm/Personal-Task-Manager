<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'cookiesndcream')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f0ff;
            color: #2d2438;
        }

        header {
            background: #6c3bb8;
            color: white;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            width: 85%;
            max-width: 900px;
            margin: 40px auto;
        }

        .page-title {
            font-size: 30px;
            color: #51258a;
            margin-bottom: 25px;
        }

        .success {
            background: #e8f8ed;
            color: #26733b;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error {
            background: #ffe8e8;
            color: #a52a2a;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .add-button {
            display: inline-block;
            background: #6c3bb8;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 8px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .add-button:hover {
            background: #51258a;
        }

        .task-card {
            background: white;
            padding: 22px;
            margin-bottom: 18px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(80, 40, 120, 0.12);
            border-left: 5px solid #6c3bb8;
        }

        .task-card h3 {
            margin-top: 0;
            color: #51258a;
            font-size: 21px;
        }

        .task-info {
            margin: 8px 0;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .pending {
            background: #fff0c2;
            color: #8a6200;
        }

        .completed {
            background: #dff5e5;
            color: #23743b;
        }

        .actions {
            margin-top: 18px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            border: none;
            padding: 9px 14px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            font-size: 14px;
        }

        .edit-button {
            background: #eee4ff;
            color: #5c2ca0;
        }

        .complete-button {
            background: #dff5e5;
            color: #23743b;
        }

        .delete-button {
            background: #ffe1e1;
            color: #a52a2a;
        }

        .empty {
            background: white;
            padding: 40px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(80, 40, 120, 0.1);
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(80, 40, 120, 0.12);
        }

        label {
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            border: 1px solid #d4c6e8;
            border-radius: 7px;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #6c3bb8;
        }

        .save-button {
            background: #6c3bb8;
            color: white;
        }

        .cancel-button {
            background: #eee;
            color: #333;
        }

        @media (max-width: 600px) {

            header {
                flex-direction: column;
                gap: 12px;
                text-align: center;
            }

            nav a {
                margin: 0 8px;
            }

            main {
                width: 92%;
            }
        }
    </style>

</head>

<body>

    <header>

        <h1>🍪 cookiesndcream</h1>

        <nav>
            <a href="{{ route('tasks.index') }}">My Tasks</a>
            <a href="{{ route('tasks.create') }}">Add Task</a>
        </nav>

    </header>

    <main>

        @yield('content')

    </main>

</body>

</html>
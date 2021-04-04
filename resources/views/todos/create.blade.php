<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Todo List</title>
</head>
<body>
    <div class="text-center pt-10">
        <h1 class="text-2xl">Your To-do List</h1>
        @include('layouts.flash')
        <form method="post" action="/todos/create" class="py-5">
            @csrf
            <input type="text" name="title" class="py-2 px-2 border rounded-lg">
            <input type="submit" value="Create" class="p-2 border rounded-lg">
        </form>
    </div>
</body>
</html>
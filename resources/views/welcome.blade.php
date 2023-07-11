<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSV Processor</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')
    </head>

    <body class="antialiased">
        <div>
            <div class="mt-5 max-w-5xl mx-auto">
                <h1 class="text-2xl font-semibold">Upload CSV Files</h1>
                <p class="mt-1 text-gray-700">Make sure that the CSV files follows the same format in the database.</p>

                <div class="flex space-x-5 items-start">
                    <div class="flex-1 mt-5 flex flex-col">
                        <label for="datasource" class="font-semibold mb-1">CSV File:</label>
                        <input type="file"
                            class="rounded px-3 py-2 border bg-slate-100 file:bg-black file:border-none file:text-white file:rounded"
                            placeholder="Enter datasource alias" name="datasource">
                    </div>
                    <div class="flex-1 mt-5 flex flex-col">
                        <label for="datasource" class="font-semibold mb-1">Datasource alias:</label>
                        <input type="text" class="rounded px-3 py-2 border" placeholder="Enter datasource alias"
                            name="datasource">
                    </div>
                </div>

                <div class="mt-10">
                    <h2 class="text-lg">Result:</h2>

                </div>
            </div>
        </div>
    </body>

</html>
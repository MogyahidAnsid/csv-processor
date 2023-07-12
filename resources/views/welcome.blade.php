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

                {{-- Success message --}}
                @if (session('success'))
                <p id="message"
                    class="mb-3 border border-green-500 bg-green-100 p-3 flex items-center justify-between rounded font-semibold border-l-4 text-green-700">
                    <span>{{ session('success') }}</span>

                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24">
                            <path
                                d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z">
                            </path>
                        </svg>
                    </button>
                </p>
                @endif

                {{-- Error message --}}
                @if (session('error'))
                <p id="message"
                    class="mb-3 border border-red-500 bg-red-100 p-3 flex items-center justify-between rounded font-semibold border-l-4 text-red-700">
                    <span>{{ session('error') }}</span>

                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24">
                            <path
                                d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z">
                            </path>
                        </svg>
                    </button>
                </p>
                @endif

                <h1 class="text-2xl font-semibold">Upload CSV Files</h1>
                <p class="mt-1 text-gray-700">Make sure that the CSV files follows the same format in the database.</p>

                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="flex space-x-5 items-start">
                        <div class="flex-1 mt-5 flex flex-col">
                            <label for="file" class="font-semibold mb-1">CSV File:</label>
                            <input type="file"
                                class="rounded px-3 py-2 border bg-slate-100 file:bg-black file:border-none file:text-white file:rounded"
                                placeholder="Enter datasource alias" name="file">
                        </div>
                        {{-- <div class="flex-1 mt-5 flex flex-col">
                            <label for="alias" class="font-semibold mb-1">Datasource alias:</label>
                            <input type="text" class="rounded px-3 py-2 border" placeholder="Enter datasource alias"
                                name="alias">
                        </div> --}}
                    </div>

                    <button type="submit"
                        class="bg-black/70 hover:bg-black duration-300 text-white px-2 py-1 font-medium mt-5 rounded">
                        Continue to upload CSV file
                    </button>
                </form>
            </div>
        </div>

        <script>
            // Hide success message after 5 seconds
            setTimeout(function() {
                document.getElementById('message').style.display = 'none';
            }, 5000);
        </script>
    </body>

</html>
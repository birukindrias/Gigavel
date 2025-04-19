<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gigavel - The Minimalist PHP Framework</title>
    <meta name="description" content="Gigavel is a simple and elegant PHP framework for building web applications.">
    <meta name="keywords" content="PHP, framework, web development, Gigavel">
    <meta name="author" content="Gigavel Team">

<link rel="icon" href="/assets/ico.png" type="image/png">
    <!-- Tailwind CSS -->

    <script  src="/assets/tailwind.js"></script>

    <!-- <link rel="stylesheet" href="/assets/tailwind.css"> -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            600: '#7c3aed',
                            700: '#6d28d9'
                        }
                    }
                }
            }
        }
    </script>

    <script defer src="/assets/x.js"></script>
    <script defer src="/assets/app.js"></script>
    <!-- Alpine.js -->
    <!-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> -->

    <!-- HTMX -->
    <!-- <script src="https://unpkg.com/htmx.org@1.9.6"></script> -->

    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-text {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-image: linear-gradient(to right, #7c3aed, #10b981);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-200" x-cloak>
    {content}

</body>

</html>
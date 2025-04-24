<?php
session_start();
if (!isset($_SESSION['Username'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Bulletin Board</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-to-b from-gray-900 to-slate-800 min-h-screen text-white font-[Roboto]">
    <header class="bg-gradient-to-r from-transparent to-transparent py-4 shadow-md fixed w-full top-0 z-50">
        <div class="container mx-auto flex justify-between items-center px-8">
            <a href="index.php" class="flex items-center gap-4 text-yellow-300">
                <i class="fa-solid fa-bullhorn text-4xl"></i>
                <div>
                    <h1 class="text-3xl font-bold">Bulletin Board</h1>
                    <p class="text-sm text-gray-200">Your voice in the community</p>
                </div>
            </a>
            <nav class="flex gap-6 text-sm">
                <a href="index.php" class="hover:text-yellow-300">Home</a>
                <a href="about.php" class="hover:text-yellow-300 font-semibold text-yellow-400">About Us</a>
                <a href="logout.php" class="hover:text-yellow-300">Logout</a>
            </nav>
        </div>
    </header>

    <main class="pt-32 px-6 max-w-4xl mx-auto text-center">
        <h2 class="text-4xl font-bold mb-6 text-yellow-400">About Us</h2>
        <p class="text-lg leading-relaxed text-gray-300">
            Welcome to the <strong>Community Bulletin Board</strong> – a platform built by students for the community. Our mission is to empower users to share ideas, events, and important announcements in an easy and engaging way.
        </p>
        <p class="mt-6 text-lg text-gray-300">
            This project is created by <span class="text-yellow-300 font-semibold">Chetan</span>, <span class="text-yellow-300 font-semibold">Hunny</span>, and <span class="text-yellow-300 font-semibold">Apoorva</span> as a part of our college course to explore web development and user interaction.
        </p>
        <p class="mt-6 text-lg text-gray-400">
            We hope you enjoy using it and contribute actively to your local community!
        </p>
    </main>

    <footer class="text-center py-6 mt-20 border-t border-gray-700 text-sm text-gray-400">
        &copy; 2025 Bulletin Board | Built with 💛 by Chetan, Hunny & Apoorva
    </footer>
</body>

</html>
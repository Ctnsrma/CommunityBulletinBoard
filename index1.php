<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Bulletin Board</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Shake Animation Style -->
    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }

        .hover\:shake:hover {
            animation: shake 0.4s ease-in-out;
        }
    </style>
</head>
<body class="min-h-screen bg-fixed bg-no-repeat  bg-cover bg-center " style="background-image:linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.8) 100%),url('https://images.pexels.com/photos/8924333/pexels-photo-8924333.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); ">
 
<header class="fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-transparent to-transparent text-yellow-300 shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center px-8">

        <div class="flex items-center gap-4">
            <a href="index1.php" class="flex items-center gap-4">
            <i class="fa-solid fa-bullhorn text-4xl"></i>
            <div>
                <h1 class="text-3xl font-bold">Bulletin Board</h1>
                <p class="text-sm text-gray-200">Your voice in the community</p>
            </div>
            </a>
        </div>

        <nav class="flex gap-8">
            <a class="hover:bg-yellow-300 hover:text-blue-600 text-white font-bold text-sm uppercase rounded-full px-6 py-2 tracking-widest transition duration-300" href="index1.php">Home</a>
            <a class="hover:bg-yellow-300 hover:text-blue-600 text-white font-bold text-sm uppercase rounded-full px-6 py-2 tracking-widest transition duration-300" href="#Category">Create Post</a>
            <a class="hover:bg-yellow-300 hover:text-blue-600 text-white font-bold text-sm uppercase rounded-full px-6 py-2 tracking-widest transition duration-300" href="#posts">Posts</a>

            
        </nav>
        <div class="relative flex gap-8">
            <!-- <div class="hidden md:block">
                <input type="text" placeholder="Search..." class="px-6 py-2 rounded-full bg-white text-gray-700">
            </div> -->
            <a href="sign.php" class="py-2">Sign In </a>
            <a href="login.php" class="py-2">LogIn </a>
        </div>
    </div>
</header>



<main class="container mx-auto py-10 px-6 md:px-20">
        <div class="text-yellow-400 py-12 relative">
            <div class="container mx-auto text-right flex justify-end h-[calc(75vh-96px)] items-center px-10 ">
                <div>
                    <h1 class="text-6xl font-bold">Community Bulletin Board</h1>
                    <p class="mt-2 text-xl">Share updates with your community</p>
                </div>
            </div>
        </div>
    </div>
    <main class="container mx-auto py-10 px-6 md:px-20">
        <!-- Create a Post Section -->
        <section id="Category" class="bg-white text-gray-900 shadow-lg rounded-lg p-8 mb-10">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create a Post</h2>

            <!-- Form (disabled for non-logged-in users) -->
            <form id="postForm" class="space-y-4 opacity-50 pointer-events-none">
                <div>
                    <label for="title" class="block text-gray-700">Title</label>
                    <input type="text" id="title" name="title" required
                        class="w-full p-2 border rounded-md bg-gray-100 cursor-not-allowed" disabled>
                </div>
                <div>
                <label for="category" class="block text-gray-700">Category</label>
                <select id="category" name="category" required
                class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" disabled>
                <option value="" disabled selected>Select a category</option>
                <option value="Technology">Technoloy</option>
                <option value="Business">Business</option>
                <option value="Health">Health</option>
                <option value="Sports">Sports</option>
                <option value="General">General</option>
                </select>
                </div>
                <div>
                    <label for="content" class="block text-gray-700">Message</label>
                    <textarea id="content" name="content" required rows="5"
                        class="w-full p-2 border rounded-md bg-gray-100 cursor-not-allowed" disabled></textarea>
                </div>
                <div>
                    <label for="author" class="block text-gray-700">Your Name</label>
                    <input type="text" id="author" name="author" required
                        class="w-full p-2 border rounded-md bg-gray-100 cursor-not-allowed" disabled>
                </div>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow-md transition-colors duration-300 cursor-not-allowed"
                    disabled>
                    Submit Post
                </button>
            </form>
            <p class="text-red-600 mt-4 text-center">
                You must <a href="login.php" class="underline text-blue-700">log in</a> or 
                <a href="sign.php" class="underline text-blue-700">sign up</a> to create a post.
            </p>
        </section>

        <!-- Posts Grid -->
        <section id="posts" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></section>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-800 text-gray-300 py-6 mt-16 text-center">
        <p>&copy; 2025 Community Bulletin Board. All rights reserved.</p>
    </footer>

    <!-- Script -->
    <script>
        function loadPosts() {
            const posts = JSON.parse(localStorage.getItem('posts')) || [];
            const postsContainer = document.getElementById('posts');
            postsContainer.innerHTML = '';

            posts.forEach(post => {
                const postElement = document.createElement('div');
                postElement.className = 'bg-white text-gray-900 shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300 hover:shake';
                postElement.innerHTML = `
                    <h3 class="text-xl font-bold text-gray-800 mb-2">${post.title}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">${post.content}</p>
                    <p class="text-sm text-gray-500">Posted by ${post.author} on ${post.date}</p>
                `;
                postsContainer.appendChild(postElement);
            });
        }

        window.onload = loadPosts;
    </script>

</body>
</html>

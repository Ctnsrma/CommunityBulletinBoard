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
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-fixed bg-no-repeat bg-center bg-cover" 
      style="background-image: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.8) 100%), url('https://images.pexels.com/photos/8924333/pexels-photo-8924333.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); ">

    <header class="fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-transparent to-transparent text-yellow-300 shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-8">
            <div class="flex items-center gap-4">
                <a href="index.php" class="flex items-center gap-4">
                <i class="fa-solid fa-bullhorn text-4xl"></i>
                <div>
                    <h1 class="text-3xl font-bold">Bulletin Board</h1>
                    <p class="text-sm text-gray-200">Your voice in the community</p>
                </div>
                </a>    
            </div>
            <nav class="flex gap-8">
                <a class="hover:bg-yellow-300 hover:text-blue-600 text-white font-bold text-sm uppercase rounded-full px-6 py-2 tracking-widest transition duration-300" href="index.php">Home</a>
                <a class="hover:bg-yellow-300 hover:text-blue-600 text-white font-bold text-sm uppercase rounded-full px-6 py-2 tracking-widest transition duration-300" href="#Category">Create Post</a>
                <a class="hover:bg-yellow-300 hover:text-blue-600 text-white font-bold text-sm uppercase rounded-full px-6 py-2 tracking-widest transition duration-300" href="#posts">Posts</a>
                <a class="hover:bg-yellow-300 hover:text-blue-600 text-white font-bold text-sm uppercase rounded-full px-6 py-2 tracking-widest transition duration-300" href="about.php">About Us</a>

            </nav>

            <div class="relative flex gap-8">
                
                <i id="profileIcon" class="fa-solid fa-user text-2xl hover:text-white cursor-pointer py-1"></i>
                <div id="profileDropdown" class="absolute right-0 mt-2 w-72 bg-white rounded-md shadow-lg hidden z-50 p-4">
                    <h3 class="font-bold text-lg text-gray-800 mb-2"><?php echo $_SESSION['Username']; ?>'s Posts</h3>
                    <a><ul id="userPostsList" class="text-sm max-h-60 overflow-y-auto text-gray-700 space-y-1"></ul></a>
                    <a href="logout.php" class="mt-4 inline-block bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded-md text-center w-full">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </header>
    
    <main class="container mx-auto py-10 px-6 md:px-20">
        <div class="text-yellow-400 py-12 relative">
            <div class="container mx-auto text-right flex justify-end h-[calc(75vh-96px)] items-center px-10 ">
                <div>
                    <h1 class="text-6xl font-bold">Community Bulletin Board</h1>
                    <p id="Category" class="mt-2 text-xl">Share updates with your community</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between gap-12 px-[25vh]">
        <a href="#technology"><div class="transform transition-transform duration-300 hover:scale-110 cursor-pointer">
            <img src="./images/0.jpg" alt="" srcset="">
            <p class="text-yellow-300 font-bold text-center">Technology</p>
        </div></a>
        <a href="#business"><div class="transform transition-transform duration-300 hover:scale-110 cursor-pointer">
            <img src="./images/5.jpg" alt="" srcset="">
            <p class="text-yellow-300 font-bold text-center">Business</p>
        </div></a>
        <a href="#health"><div class="transform transition-transform duration-300 hover:scale-110 cursor-pointer">
            <img src="./images/3.jpg" alt="" srcset="">
            <p class="text-yellow-300 font-bold text-center">Health</p>
        </div></a>
        <a href="#sports"><div class="transform transition-transform duration-300 hover:scale-110 cursor-pointer">
            <img src="./images/4.jpg" alt="" srcset="">
            <p class="text-yellow-300 font-bold text-center">Sports</p>
        </div></a>
        <a href="#general"><div class="transform transition-transform duration-300 hover:scale-110 cursor-pointer">
            <img src="./images/7.jpeg" alt="" srcset="">
            <p class="text-yellow-300 font-bold text-center">General</p>
        </div></a>
    </div>



    <main class="container mx-auto py-10 px-6 md:px-20">





    <!-- Create Post Section -->
    <section class="bg-white shadow-lg rounded-lg p-8 mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create a Post</h2>
        <form id="postForm" class="space-y-4">
            <div>
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" id="title" name="title" required
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label for="category" class="block text-gray-700">Category</label>
            <select id="category" name="category" required
                class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
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
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div>
                <label for="author" class="block text-gray-700">Your Name</label>
                <input type="text" id="author" name="author" required
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="<?php echo $_SESSION['Username']; ?>">
            </div>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Submit Post</button>
        </form>
        <p id="formError" class="text-red-500 mt-2 hidden">Please fill out all fields correctly.</p>
    </section>


    <!-- Posts Section -->
    <section id="posts" class="space-y-12">
    <!-- Posts will be dynamically added here grouped by category -->
</section>



    <footer class="bg-slate-800 text-gray-300 py-6 mt-16 bottom-0 text-center ">
        <p>&copy; 2025 Community Bulletin Board. All rights reserved.</p>
        <p>Made by Chetan | Hunny | Apoorva</p>
    </footer>
</main>
    <script>
        const currentUser = "<?php echo $_SESSION['Username']; ?>";

        function loadPosts() {
    const posts = JSON.parse(localStorage.getItem('posts')) || [];
    const postsContainer = document.getElementById('posts');
    const userPostsList = document.getElementById('userPostsList');
    postsContainer.innerHTML = '';
    userPostsList.innerHTML = '';

    const categoryMap = {};

    posts.forEach((post, index) => {
        if (!categoryMap[post.category]) {
            categoryMap[post.category] = [];
        }
        categoryMap[post.category].push({ post, index });
    });

    Object.keys(categoryMap).forEach(category => {
        const categorySection = document.createElement('div');
        categorySection.id = category.toLowerCase(); // add an ID for scroll linking
        categorySection.innerHTML = `<h2 class="text-3xl font-bold text-blue-900 mb-6">${category}</h2>`;

        const grid = document.createElement('div');
        grid.className = "grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6";

        categoryMap[category].forEach(({ post, index }) => {
            const postCard = document.createElement('div');
            postCard.className = "bg-white shadow-lg rounded-lg p-6";

            postCard.innerHTML = `
                <h3 class="text-xl font-semibold text-gray-800 mb-2">${post.title}</h3>
                <p class="text-gray-600 mb-2">${post.content}</p>
                <p class="text-sm text-gray-500 mb-4">Posted by ${post.author} on ${post.date}</p>

                <div class="flex items-center space-x-4 mb-2">
                    <button onclick="likePost(${index})" class="text-blue-600 hover:text-blue-800">
                        👍 Like (<span id="like-count-${index}">${post.likes || 0}</span>)
                    </button>
                    <button onclick="toggleCommentBox(${index})" class="text-green-600 hover:text-green-800">
                        💬 Comment
                    </button>
                </div>

                <div id="comment-box-${index}" class="hidden">
                    <textarea id="comment-input-${index}" class="w-full border rounded p-2 mb-2" placeholder="Write a comment..."></textarea>
                    <button onclick="addComment(${index})" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Post</button>
                </div>

                <div id="comments-${index}" class="mt-4 space-y-1">
                    ${(post.comments || []).map(c => `<p class="text-gray-700 text-sm border-t pt-1">${c}</p>`).join('')}
                </div>
            `;

            grid.appendChild(postCard);

            if (post.author === currentUser) {
                const li = document.createElement('li');
                li.innerHTML = `
                    <div class="flex justify-between items-center">
                        <span>${post.title}</span>
                        <button onclick="deletePost(${index})" class="text-red-500 hover:underline">Delete</button>
                    </div>
                `;
                userPostsList.appendChild(li);
            }
        });

        categorySection.appendChild(grid);
        postsContainer.appendChild(categorySection);
    });
}

        function savePost(post) {
            const posts = JSON.parse(localStorage.getItem('posts')) || [];
            posts.push(post);
            localStorage.setItem('posts', JSON.stringify(posts));
        }

        function deletePost(index) {
            const posts = JSON.parse(localStorage.getItem('posts')) || [];
            posts.splice(index, 1);
            localStorage.setItem('posts', JSON.stringify(posts));
            loadPosts();
        }

        function likePost(index) {
            const posts = JSON.parse(localStorage.getItem('posts')) || [];
            posts[index].likes = (posts[index].likes || 0) + 1;
            localStorage.setItem('posts', JSON.stringify(posts));
            document.getElementById(`like-count-${index}`).innerText = posts[index].likes;
        }

        function toggleCommentBox(index) {
            const box = document.getElementById(`comment-box-${index}`);
            box.classList.toggle('hidden');
        }

        function addComment(index) {
            const commentInput = document.getElementById(`comment-input-${index}`);
            const comment = commentInput.value.trim();
            if (comment.length === 0) return;

            const posts = JSON.parse(localStorage.getItem('posts')) || [];
            posts[index].comments = posts[index].comments || [];
            posts[index].comments.push(comment);
            localStorage.setItem('posts', JSON.stringify(posts));
            commentInput.value = '';
            loadPosts();
        }

        document.getElementById('postForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const title = document.getElementById('title').value.trim();
    const content = document.getElementById('content').value.trim();
    const author = document.getElementById('author').value.trim();
    const category = document.getElementById('category').value; // Capture category
    const errorMsg = document.getElementById('formError');

    if (title.length < 3 || content.length < 10 || author.length < 2 || !category) {
        errorMsg.textContent = 'Title, message, name, and category are required.';
        errorMsg.classList.remove('hidden');
        return;
    }

    const post = {
        title,
        content,
        author,
        category,  // Add category here
        date: new Date().toLocaleString(),
        likes: 0,
        comments: []
    };

    savePost(post);
    this.reset();
    errorMsg.classList.add('hidden');

    loadPosts();
});


        // document.getElementById('profileIcon').addEventListener('click', () => {
        //     document.getElementById('profileDropdown').classList.toggle('hidden');
        // });
        const profileIcon = document.getElementById('profileIcon');
        const profileDropdown = document.getElementById('profileDropdown');

        // Toggle on icon click
        profileIcon.addEventListener('click', (e) => {
        e.stopPropagation(); // Stop bubbling to window
        profileDropdown.classList.toggle('hidden');
        });

        // Close when clicking outside
        window.addEventListener('click', (e) => {
        if (!profileDropdown.classList.contains('hidden') && !profileDropdown.contains(e.target) && e.target !== profileIcon) {
            profileDropdown.classList.add('hidden');
            }
        });

        window.onload = loadPosts;
    </script>
</body>

</html>
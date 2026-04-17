<?php
if (!isset($page_title)) {
  $page_title = 'Home';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($page_title); ?> | Developer Portfolio</title>
  <meta name="description" content="Full stack developer portfolio showcasing projects and insights">
  
  <script src="https://cdn.tailwindcss.com"></script>
  
 <style>
  /* Simple working particles with FLOATING animation */
  @keyframes float {
    0% { transform: translateY(0px) translateX(0px); }
    50% { transform: translateY(-20px) translateX(10px); }
    100% { transform: translateY(0px) translateX(0px); }
  }
  
  .particle {
    position: fixed;
    width: 4px;
    height: 4px;
    background: #3b82f6;
    border-radius: 50%;
    pointer-events: none;
    z-index: 9999;
    animation: float 8s ease-in-out infinite;
  }
</style>
</head>
<body class="bg-gray-900 text-gray-100">

<header class="sticky top-0 z-50 bg-gray-800 border-b border-gray-700">
  <div class="max-w-6xl mx-auto px-6 py-4">
    <div class="flex items-center justify-between">
      <div class="logo">
        <a href="index.php" class="text-2xl font-bold text-white">Saviour Angel</a>
      </div>
      
      <nav class="flex items-center gap-8">
        <a href="index.php" class="font-medium text-gray-300 hover:text-blue-400 transition">Home</a>
        <a href="about.php" class="font-medium text-gray-300 hover:text-blue-400 transition">About</a>
        <a href="projects.php" class="font-medium text-gray-300 hover:text-blue-400 transition">Projects</a>
        <a href="blog.php" class="font-medium text-gray-300 hover:text-blue-400 transition">Blog</a>
        <a href="contact.php" class="font-medium text-gray-300 hover:text-blue-400 transition">Contact</a>
        
        <button id="theme-toggle" class="p-2 rounded-lg hover:bg-gray-700 transition">
          <span id="theme-icon" class="text-xl">☀️</span>
        </button>
      </nav>
    </div>
  </div>
</header>

<main class="relative z-10">
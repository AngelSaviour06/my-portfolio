<?php
// Portfolio Website - Home Page
$page_title = "Home";
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero relative overflow-hidden min-h-[600px] flex items-center py-20 bg-gray-900">
  <div class="max-w-6xl mx-auto px-6 w-full relative z-10">
    <div class="text-center">
      
      <!-- Profile Image with Protective Background -->
      <div class="mb-8 relative z-50">
        <!-- Protective bubble to hide particles behind image -->
        <div class="absolute inset-0 w-56 h-56 rounded-full bg-gray-900 left-1/2 -translate-x-1/2 top-0 z-40"></div>
        
        <!-- Your profile picture - displayed on top -->
        <img src="images/profile.jpg" alt="Saviour Angel" class="w-48 h-48 rounded-full border-4 border-blue-500 shadow-lg mx-auto relative z-50">
      </div>
      
      <h1 class="text-5xl md:text-6xl font-bold text-white mb-4">Hi, I'm Saviour Angel</h1>
      <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">A passionate Full Stack Developer crafting scalable web applications and delivering exceptional user experiences</p>
      <div class="flex gap-4 justify-center flex-wrap">
        <a href="about.php" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition transform hover:-translate-y-1">Learn More About Me</a>
        <a href="projects.php" class="px-8 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-semibold transition transform hover:-translate-y-1">View My Work</a>
      </div>
    </div>
  </div>
</section>

<!-- Featured Projects Section -->
<section class="py-20 bg-gray-800">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-white mb-2">Featured Projects</h2>
      <p class="text-gray-400">A selection of recent work I'm proud of</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
      <?php
      $projects = json_decode(file_get_contents('data/projects.json'), true);
      $featured = array_slice($projects['projects'], 0, 3);
      
      foreach ($featured as $project): ?>
        <div class="bg-gray-700 rounded-lg overflow-hidden border border-gray-600 hover:shadow-lg transition transform hover:-translate-y-1">
          <div class="h-48 bg-gradient-to-br from-purple-500 to-pink-500"></div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-white mb-2"><?php echo htmlspecialchars($project['title']); ?></h3>
            <p class="text-gray-300 mb-4"><?php echo htmlspecialchars($project['description']); ?></p>
            <div class="flex flex-wrap gap-2 mb-4">
              <?php foreach (array_slice($project['technologies'], 0, 3) as $tech): ?>
                <span class="inline-block px-3 py-1 bg-gray-600 text-gray-200 rounded text-sm"><?php echo htmlspecialchars($tech); ?></span>
              <?php endforeach; ?>
            </div>
            <a href="projects.php#<?php echo htmlspecialchars($project['slug']); ?>" class="text-blue-400 font-semibold hover:text-blue-300">View Project →</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    
    <div class="text-center">
      <a href="projects.php" class="inline-block px-8 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-semibold transition">View All Projects</a>
    </div>
  </div>
</section>

<!-- Latest Articles Section -->
<section class="py-20 bg-gray-900">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-white mb-2">Latest Articles</h2>
      <p class="text-gray-400">Thoughts on web development and software engineering</p>
    </div>
    
    <div class="space-y-8">
      <?php
      $articles = json_decode(file_get_contents('data/articles.json'), true);
      $latest = array_slice($articles['articles'], 0, 3);
      
      foreach ($latest as $article): ?>
        <article class="border-b border-gray-700 pb-8">
          <div class="flex gap-4 mb-3 text-sm text-gray-400">
            <time datetime="<?php echo $article['date']; ?>">
              <?php echo date('M d, Y', strtotime($article['date'])); ?>
            </time>
            <span>•</span>
            <span><?php echo $article['reading_time']; ?> min read</span>
          </div>
          <h3 class="text-2xl font-bold text-white mb-2">
            <a href="article.php?slug=<?php echo urlencode($article['slug']); ?>" class="hover:text-blue-400 transition">
              <?php echo htmlspecialchars($article['title']); ?>
            </a>
          </h3>
          <p class="text-gray-400 mb-3"><?php echo htmlspecialchars($article['excerpt']); ?></p>
          <a href="article.php?slug=<?php echo urlencode($article['slug']); ?>" class="text-blue-400 font-semibold hover:text-blue-300">Read Article →</a>
        </article>
      <?php endforeach; ?>
    </div>
    
    <div class="text-center mt-12">
      <a href="blog.php" class="inline-block px-8 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-semibold transition">All Articles</a>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-black text-white text-center">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-4xl font-bold mb-4">Ready to work together?</h2>
    <p class="text-xl text-gray-400 mb-8">I'm always open to discussing new projects and opportunities.</p>
    <a href="contact.php" class="inline-block px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-lg transition transform hover:-translate-y-1">Start a Conversation</a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<?php
// Portfolio Website - Blog Page
$page_title = "Blog";
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="py-16 bg-gray-800 border-b border-gray-700">
  <div class="max-w-6xl mx-auto px-6">
    <h1 class="text-4xl font-bold text-white mb-2">Articles & Insights</h1>
    <p class="text-gray-400">Exploring web development, architecture, and best practices</p>
  </div>
</section>

<!-- Blog Section -->
<section class="py-20 bg-gray-900">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
      
      <!-- Sidebar -->
      <div class="lg:col-span-1">
        <!-- Search -->
        <div class="mb-8">
          <input type="text" id="search-articles" placeholder="Search articles..." class="w-full px-4 py-2 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>
        
        <!-- Categories -->
        <div>
          <h3 class="text-lg font-bold text-white mb-4">Categories</h3>
          <ul class="space-y-2">
            <li><a href="#" data-category="all" class="category-link block px-4 py-2 rounded-lg bg-blue-600 text-white font-medium">All Articles</a></li>
            <li><a href="#" data-category="backend" class="category-link block px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-800 font-medium">Backend</a></li>
            <li><a href="#" data-category="frontend" class="category-link block px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-800 font-medium">Frontend</a></li>
            <li><a href="#" data-category="devops" class="category-link block px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-800 font-medium">DevOps</a></li>
            <li><a href="#" data-category="tutorial" class="category-link block px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-800 font-medium">Tutorials</a></li>
          </ul>
        </div>
      </div>
      
      <!-- Articles Grid -->
      <div class="lg:col-span-3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <?php
          $articles = json_decode(file_get_contents('data/articles.json'), true);
          
          foreach ($articles['articles'] as $article): ?>
            <article class="article-card bg-gray-800 rounded-lg border border-gray-700 overflow-hidden hover:shadow-lg transition" data-category="<?php echo htmlspecialchars($article['category']); ?>" data-title="<?php echo htmlspecialchars(strtolower($article['title'])); ?>">
              
              <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                  <span class="inline-block px-3 py-1 bg-blue-900 text-blue-300 rounded-full text-xs font-bold uppercase"><?php echo htmlspecialchars($article['category']); ?></span>
                  <time class="text-sm text-gray-400" datetime="<?php echo $article['date']; ?>">
                    <?php echo date('M d, Y', strtotime($article['date'])); ?>
                  </time>
                </div>
                
                <h3 class="text-xl font-bold text-white mb-3">
                  <a href="article.php?slug=<?php echo urlencode($article['slug']); ?>" class="hover:text-blue-400 transition">
                    <?php echo htmlspecialchars($article['title']); ?>
                  </a>
                </h3>
                
                <p class="text-gray-400 mb-4"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                
                <div class="flex items-center justify-between">
                  <span class="text-sm text-gray-500"><?php echo $article['reading_time']; ?> min read</span>
                  <a href="article.php?slug=<?php echo urlencode($article['slug']); ?>" class="text-blue-400 font-semibold hover:text-blue-300">Read More →</a>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
let activeCategory = 'all';
let searchTerm = '';

const searchInput = document.getElementById('search-articles');
const categoryLinks = document.querySelectorAll('.category-link');
const articleCards = document.querySelectorAll('.article-card');

function filterArticles() {
  articleCards.forEach(card => {
    const matchesCategory = activeCategory === 'all' || card.dataset.category === activeCategory;
    const matchesSearch = card.dataset.title.includes(searchTerm.toLowerCase());
    card.style.display = matchesCategory && matchesSearch ? 'block' : 'none';
  });
}

searchInput.addEventListener('input', (e) => {
  searchTerm = e.target.value;
  filterArticles();
});

categoryLinks.forEach(link => {
  link.addEventListener('click', (e) => {
    e.preventDefault();
    categoryLinks.forEach(l => {
      l.classList.remove('bg-blue-600', 'text-white');
      l.classList.add('text-gray-300', 'hover:bg-gray-800');
    });
    link.classList.remove('text-gray-300', 'hover:bg-gray-800');
    link.classList.add('bg-blue-600', 'text-white');
    activeCategory = link.dataset.category;
    filterArticles();
  });
});
</script>

<?php include 'includes/footer.php'; ?>

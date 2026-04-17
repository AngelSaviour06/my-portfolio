<?php
// Portfolio Website - Article Page
$page_title = "Article";
include 'includes/header.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : null;
$article = null;

if ($slug) {
  $articles = json_decode(file_get_contents('data/articles.json'), true);
  foreach ($articles['articles'] as $a) {
    if ($a['slug'] === $slug) {
      $article = $a;
      break;
    }
  }
}
?>

<?php if (!$article): ?>
  <!-- Article Not Found -->
  <section class="py-20 bg-gray-900 text-center">
    <div class="max-w-6xl mx-auto px-6">
      <h1 class="text-4xl font-bold text-white mb-4">Article Not Found</h1>
      <p class="text-gray-400 mb-8">Sorry, the article you're looking for doesn't exist.</p>
      <a href="blog.php" class="inline-block px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">Back to Articles</a>
    </div>
  </section>

<?php else: ?>

  <!-- Article Header -->
  <section class="py-16 bg-gray-800 border-b border-gray-700">
    <div class="max-w-3xl mx-auto px-6">
      <a href="blog.php" class="text-blue-400 hover:text-blue-300 mb-4 inline-block">← Back to Articles</a>
      <span class="inline-block px-3 py-1 bg-blue-900 text-blue-300 rounded-full text-xs font-bold uppercase mb-4"><?php echo htmlspecialchars($article['category']); ?></span>
      <h1 class="text-4xl font-bold text-white mb-4"><?php echo htmlspecialchars($article['title']); ?></h1>
      <div class="flex items-center gap-4 text-gray-400">
        <time datetime="<?php echo $article['date']; ?>">
          <?php echo date('F d, Y', strtotime($article['date'])); ?>
        </time>
        <span>•</span>
        <span><?php echo $article['reading_time']; ?> min read</span>
      </div>
    </div>
  </section>

  <!-- Article Content -->
  <article class="py-20 bg-gray-900">
    <div class="max-w-3xl mx-auto px-6">
      <div class="prose prose-invert max-w-none text-gray-300">
        <?php echo $article['content']; ?>
      </div>
      
      <!-- Author Info -->
      <div class="mt-16 pt-8 border-t border-gray-700">
        <h3 class="text-2xl font-bold text-white mb-4">About the author</h3>
        <p class="text-gray-400 leading-relaxed">
          I'm a full stack developer passionate about building scalable applications and sharing knowledge with the community. Feel free to connect with me on my social media or reach out through the contact page.
        </p>
      </div>
    </div>
  </article>

  <!-- Related Articles -->
  <section class="py-20 bg-gray-800">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-3xl font-bold text-white mb-12">More Articles</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <?php
        $articles_data = json_decode(file_get_contents('data/articles.json'), true);
        $related = array_filter($articles_data['articles'], function($a) use ($article) {
          return $a['slug'] !== $article['slug'];
        });
        $related = array_slice($related, 0, 2);
        
        foreach ($related as $related_article): ?>
          <article class="bg-gray-700 rounded-lg overflow-hidden border border-gray-600 hover:shadow-lg transition">
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="text-sm font-semibold text-gray-400"><?php echo htmlspecialchars($related_article['category']); ?></span>
                <time class="text-sm text-gray-400">
                  <?php echo date('M d, Y', strtotime($related_article['date'])); ?>
                </time>
              </div>
              <h3 class="text-xl font-bold text-white mb-3">
                <a href="article.php?slug=<?php echo urlencode($related_article['slug']); ?>" class="hover:text-blue-400 transition">
                  <?php echo htmlspecialchars($related_article['title']); ?>
                </a>
              </h3>
              <p class="text-gray-400 mb-4"><?php echo htmlspecialchars($related_article['excerpt']); ?></p>
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500"><?php echo $related_article['reading_time']; ?> min read</span>
                <a href="article.php?slug=<?php echo urlencode($related_article['slug']); ?>" class="text-blue-400 font-semibold hover:text-blue-300">Read More →</a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

<?php endif; ?>

<?php include 'includes/footer.php'; ?>

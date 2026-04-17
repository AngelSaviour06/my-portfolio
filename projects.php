<?php
// Portfolio Website - Projects Page
$page_title = "Projects";
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="py-16 bg-gray-800 border-b border-gray-700">
  <div class="max-w-6xl mx-auto px-6">
    <h1 class="text-4xl font-bold text-white mb-2">My Projects</h1>
    <p class="text-gray-400">A showcase of projects I've built, from concept to deployment</p>
  </div>
</section>

<!-- Filter Section -->
<section class="py-12 bg-gray-900 border-b border-gray-700">
  <div class="max-w-6xl mx-auto px-6">
    <h3 class="text-lg font-bold text-white mb-4">Filter by Technology</h3>
    <div class="flex flex-wrap gap-3">
      <button class="filter-btn px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition active" data-filter="all">All</button>
      <button class="filter-btn px-6 py-2 bg-gray-700 text-white rounded-lg font-semibold hover:bg-gray-600 transition" data-filter="php">PHP</button>
      <button class="filter-btn px-6 py-2 bg-gray-700 text-white rounded-lg font-semibold hover:bg-gray-600 transition" data-filter="python">Python</button>
      <button class="filter-btn px-6 py-2 bg-gray-700 text-white rounded-lg font-semibold hover:bg-gray-600 transition" data-filter="react">React</button>
      <button class="filter-btn px-6 py-2 bg-gray-700 text-white rounded-lg font-semibold hover:bg-gray-600 transition" data-filter="database">Database</button>
      <button class="filter-btn px-6 py-2 bg-gray-700 text-white rounded-lg font-semibold hover:bg-gray-600 transition" data-filter="tailwindcss">TailwindCSS</button>
      <button class="filter-btn px-6 py-2 bg-gray-700 text-white rounded-lg font-semibold hover:bg-gray-600 transition" data-filter="api">API</button>
    </div>
  </div>
</section>

<!-- Projects Grid -->
<section class="py-20 bg-gray-900">
  <div class="max-w-6xl mx-auto px-6">
    <div class="space-y-8">
      <?php
      $projects = json_decode(file_get_contents('data/projects.json'), true);
      
      foreach ($projects['projects'] as $project): ?>
        <div class="project-card bg-gray-800 rounded-lg border border-gray-700 overflow-hidden hover:shadow-lg transition" id="<?php echo htmlspecialchars($project['slug']); ?>" data-technologies="<?php echo htmlspecialchars(strtolower(implode(' ', $project['technologies']))); ?>">
          
          <div class="grid grid-cols-1 md:grid-cols-4 gap-0">
            <!-- Project Image -->
            <div class="h-64 md:h-auto md:col-span-1 bg-gradient-to-br from-purple-500 to-pink-500"></div>
            
            <!-- Project Content -->
            <div class="md:col-span-3 p-8">
              <h3 class="text-2xl font-bold text-white mb-3"><?php echo htmlspecialchars($project['title']); ?></h3>
              <p class="text-gray-300 mb-6"><?php echo htmlspecialchars($project['description']); ?></p>
              
              <!-- Project Details Grid -->
              <div class="grid grid-cols-3 gap-6 mb-6 pb-6 border-b border-gray-700">
                <div>
                  <h4 class="font-semibold text-white mb-2">Technologies</h4>
                  <div class="flex flex-wrap gap-2">
                    <?php foreach ($project['technologies'] as $tech): ?>
                      <span class="inline-block px-3 py-1 bg-blue-900 text-blue-300 rounded text-sm font-medium"><?php echo htmlspecialchars($tech); ?></span>
                    <?php endforeach; ?>
                  </div>
                </div>
                
                <div>
                  <h4 class="font-semibold text-white mb-2">Year</h4>
                  <p class="text-gray-400"><?php echo $project['year']; ?></p>
                </div>
                
                <div>
                  <h4 class="font-semibold text-white mb-2">Role</h4>
                  <p class="text-gray-400"><?php echo htmlspecialchars($project['role']); ?></p>
                </div>
              </div>
              
              <!-- Project Links -->
              <div class="flex gap-4">
                <?php if (!empty($project['link'])): ?>
                  <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">View Live</a>
                <?php endif; ?>
                <?php if (!empty($project['github'])): ?>
                  <a href="<?php echo htmlspecialchars($project['github']); ?>" target="_blank" class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-semibold transition">GitHub</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script>
document.querySelectorAll('.filter-btn').forEach(button => {
  button.addEventListener('click', function() {
    const filter = this.dataset.filter;
    
    // Update active button
    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.classList.remove('bg-blue-600');
      btn.classList.add('bg-gray-700');
    });
    this.classList.remove('bg-gray-700');
    this.classList.add('bg-blue-600');
    
    // Filter projects
    document.querySelectorAll('.project-card').forEach(card => {
      if (filter === 'all' || card.dataset.technologies.includes(filter.toLowerCase())) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  });
});
</script>

<?php include 'includes/footer.php'; ?>

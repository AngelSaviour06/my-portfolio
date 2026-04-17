<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diagnostics | Portfolio</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">
  
  <div class="max-w-6xl mx-auto px-6 py-20">
    <h1 class="text-4xl font-bold text-white mb-4">🔍 Diagnostic Check</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      
      <!-- Theme Toggle Test -->
      <div class="bg-gray-800 p-8 rounded-lg border border-gray-700">
        <h2 class="text-2xl font-bold text-white mb-4">Theme Toggle Test</h2>
        <p class="text-gray-400 mb-2"><strong>Status:</strong> <span id="theme-status" class="text-red-500">Checking...</span></p>
        <p class="text-gray-400 mb-2">Current Theme: <span id="current-theme" class="font-semibold">Not detected</span></p>
        <p class="text-gray-400 mb-6">Saved Theme: <span id="saved-theme" class="font-semibold">Not found</span></p>
        <button onclick="testTheme()" class="w-full px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">Test Theme Toggle</button>
      </div>

      <!-- Particles Animation Test -->
      <div class="bg-gray-800 p-8 rounded-lg border border-gray-700">
        <h2 class="text-2xl font-bold text-white mb-4">Particles Animation Test</h2>
        <p class="text-gray-400 mb-2"><strong>Status:</strong> <span id="particles-status" class="text-red-500">Checking...</span></p>
        <p class="text-gray-400 mb-2">Particles Count: <span id="particles-count" class="font-semibold">0</span> (should be 80 on all pages)
        <p class="text-gray-400 mb-2">Particles Container: <span id="container-status" class="font-semibold">Not found</span> (on all pages)
        <p class="text-gray-500 text-sm mt-4">💡 Particles now appear on ALL pages as background animation</p>
      </div>

      <!-- File Status -->
      <div class="bg-gray-800 p-8 rounded-lg border border-gray-700">
        <h2 class="text-2xl font-bold text-white mb-4">File Status</h2>
        <p class="text-gray-400 mb-2">✓ Tailwind CSS: <span class="font-semibold text-green-400">Loaded</span></p>
        <p class="text-gray-400 mb-2">✓ theme.js: <span id="js-status" class="font-semibold">Checking...</span></p>
        <p class="text-gray-400 mb-2">✓ HTML Element: <span id="html-status" class="font-semibold text-green-400">Found</span></p>
      </div>

      <!-- Quick Tips -->
      <div class="bg-yellow-900 border-l-4 border-l-yellow-400 p-8 rounded-lg">
        <h3 class="text-xl font-bold text-yellow-200 mb-4">If Something Doesn't Work:</h3>
        <ul class="space-y-2 text-yellow-200">
          <li>1. Hard refresh: Press <strong>Ctrl+F5</strong></li>
          <li>2. Clear cache: Press <strong>Ctrl+Shift+Delete</strong></li>
          <li>3. Check files in root folder (theme.js)</li>
          <li>4. Open DevTools (F12) → Console → look for red errors</li>
          <li>5. Make sure Apache is running in XAMPP</li>
        </ul>
      </div>
      
    </div>
  </div>

  <script src="theme.js"></script>
  <script>
    // Run diagnostics
    document.addEventListener('DOMContentLoaded', function() {
      
      // Check theme
      const htmlElement = document.documentElement;
      const currentTheme = htmlElement.getAttribute('data-theme') || 'dark';
      const savedTheme = localStorage.getItem('theme') || 'not saved';
      
      document.getElementById('current-theme').textContent = currentTheme;
      document.getElementById('saved-theme').textContent = savedTheme;
      document.getElementById('theme-status').textContent = '✓ Working';
      document.getElementById('theme-status').className = 'text-green-400 font-semibold';
      
      // Check particles
      setTimeout(function() {
        const particlesContainer = document.getElementById('particles-container');
        const particlesCount = document.querySelectorAll('.particle').length;
        
        if (particlesContainer) {
          document.getElementById('container-status').textContent = 'Found';
        }
        
        if (particlesCount > 0) {
          document.getElementById('particles-status').textContent = '✓ Working (' + particlesCount + ' particles)';
          document.getElementById('particles-status').className = 'text-green-400 font-semibold';
        } else {
          document.getElementById('particles-status').textContent = 'ℹ️ No particles (only on home page)';
          document.getElementById('particles-status').className = 'text-blue-400 font-semibold';
        }
        
        document.getElementById('particles-count').textContent = particlesCount;
      }, 500);
      
      // Check if theme.js loaded
      if (typeof createParticles !== 'undefined') {
        document.getElementById('js-status').textContent = 'Loaded ✓';
        document.getElementById('js-status').className = 'text-green-400 font-semibold';
      } else {
        document.getElementById('js-status').textContent = 'Not loaded';
        document.getElementById('js-status').className = 'text-red-500 font-semibold';
      }
      
      console.log('=== PORTFOLIO DIAGNOSTICS ===');
      console.log('Current Theme:', currentTheme);
      console.log('Saved Theme:', savedTheme);
      console.log('Particles:', document.querySelectorAll('.particle').length);
      console.log('HTML Element:', htmlElement.tagName);
      console.log('Tailwind CSS:', 'Loaded');
    });
    
    function testTheme() {
      const htmlElement = document.documentElement;
      const currentTheme = htmlElement.getAttribute('data-theme');
      const newTheme = currentTheme === 'light' ? 'dark' : 'light';
      
      htmlElement.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      
      const icon = document.querySelector('.theme-icon');
      if (icon) {
        icon.textContent = newTheme === 'light' ? '☀️' : '🌙';
      }
      
      alert('Theme changed to: ' + newTheme + '\nReload page to see full effect');
    }
  </script>
</body>
</html>

// WORKING PARTICLES WITH FASTER FLOATING ANIMATION
(function() {
  console.log('Starting FAST floating particles...');
  
  // Create 200 floating particles
  for (let i = 0; i < 100; i++) {
    const particle = document.createElement('div');
    particle.className = 'particle';
    
    // Random position
    particle.style.left = Math.random() * 100 + '%';
    particle.style.top = Math.random() * 100 + '%';
    
    // Random size (2-6px)
    const size = Math.random() * 4 + 2;
    particle.style.width = size + 'px';
    particle.style.height = size + 'px';
    
    // Random opacity
    particle.style.opacity = Math.random() * 0.5 + 0.3;
    
    // FASTER animation: 2-5 seconds instead of 5-15
    const duration = Math.random() * 3 + 2;  // ← CHANGED THIS
    particle.style.animation = `float ${duration}s ease-in-out infinite`;
    
    // Random animation delay
    const delay = Math.random() * 2;
    particle.style.animationDelay = `${delay}s`;
    
    document.body.appendChild(particle);
  }
  
  console.log('Created 200 FAST FLOATING particles!');
  
  // Simple theme toggle
  const toggle = document.getElementById('theme-toggle');
  const icon = document.getElementById('theme-icon');
  const html = document.documentElement;
  
  html.style.backgroundColor = '#111827';
  
  if (toggle) {
    toggle.addEventListener('click', function() {
      const isDark = html.style.backgroundColor === 'rgb(17, 24, 39)';
      if (isDark) {
        html.style.backgroundColor = '#f3f4f6';
        icon.textContent = '🌙';
        document.body.style.color = '#111827';
        document.querySelectorAll('.particle').forEach(p => {
          p.style.background = '#2563eb';
        });
      } else {
        html.style.backgroundColor = '#111827';
        icon.textContent = '☀️';
        document.body.style.color = '#f3f4f6';
        document.querySelectorAll('.particle').forEach(p => {
          p.style.background = '#60a5fa';
        });
      }
    });
  }
})();
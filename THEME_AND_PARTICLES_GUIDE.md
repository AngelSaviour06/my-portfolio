# 🎯 THEME.JS & PARTICLES - COMPLETE GUIDE

## 📌 IMPORTANT: You Only Need ONE File!

### ❌ DON'T Use Separate Files:
- ❌ particles.js (separate)
- ❌ js/theme.js (in subfolder)
- ❌ css/style.css (no longer used)

### ✅ DO Use This:
- ✅ **theme.js** (in root folder, only file needed)

---

## 🎯 WHAT IS theme.js?

**theme.js** is a SINGLE file that handles:
1. 🌙 **Theme Toggle** - Light/dark mode switching
2. ✨ **Tech Particles** - Floating animation on hero section
3. 💾 **Memory** - Remembers your theme preference

---

## 📂 WHERE SHOULD theme.js BE?

**CORRECT:**
```
my_portfolio_website/
├── theme.js          ✅ ROOT FOLDER
├── index.php
├── about.php
└── includes/
```

**WRONG:**
```
my_portfolio_website/
├── js/
│   └── theme.js      ❌ NOT HERE
├── theme.js          ✅ Should be in root
└── index.php
```

---

## 🔧 HOW TO SET IT UP

### Step 1: Make Sure theme.js Is in Root
- Place `theme.js` in the root folder (same level as index.php)
- NOT in a subfolder
- NOT in js/ folder

### Step 2: Check footer.php Loads It
In `includes/footer.php`, before `</body>`, you should have:
```html
<script src="theme.js"></script>
</body>
</html>
```

### Step 3: Check header.php Has Particles CSS
In `includes/header.php`, in the `<style>` tag, you should have:
```html
<style>
  @keyframes float {
    0% {
      transform: translateY(0) translateX(0);
      opacity: 0.6;
    }
    50% {
      opacity: 0.8;
    }
    100% {
      transform: translateY(-100vh) translateX(100px);
      opacity: 0;
    }
  }
  
  .particle {
    position: absolute;
    background: #2563eb;
    border-radius: 50%;
    opacity: 0.6;
  }
  
  #particles-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
    z-index: 1;
  }
</style>
```

---

## 📝 COMPLETE theme.js FILE

Here's your **complete, final theme.js** file with everything included:

```javascript
// ========================================
// THEME TOGGLE + TECH PARTICLES
// Combined into one file
// ========================================

// Initialize theme on page load
function initializeTheme() {
  const htmlElement = document.documentElement;
  const savedTheme = localStorage.getItem('theme') || 'light';
  htmlElement.setAttribute('data-theme', savedTheme);
  updateThemeIcon(savedTheme);
}

// Update theme icon based on current theme
function updateThemeIcon(theme) {
  const themeToggle = document.getElementById('theme-toggle');
  if (themeToggle) {
    const icon = themeToggle.querySelector('.theme-icon');
    if (icon) {
      icon.textContent = theme === 'light' ? '🌙' : '☀️';
    }
  }
}

// Theme toggle functionality
document.addEventListener('DOMContentLoaded', function() {
  const themeToggle = document.getElementById('theme-toggle');
  const htmlElement = document.documentElement;
  
  initializeTheme();
  
  if (themeToggle) {
    themeToggle.addEventListener('click', function(e) {
      e.preventDefault();
      const currentTheme = htmlElement.getAttribute('data-theme');
      const newTheme = currentTheme === 'light' ? 'dark' : 'light';
      
      htmlElement.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      updateThemeIcon(newTheme);
      console.log('✓ Theme changed to: ' + newTheme);
    });
  }
  
  // Initialize particles after everything is loaded
  initializeParticles();
});

// ========================================
// TECH PARTICLES ANIMATION
// ========================================

// Initialize particles animation
function initializeParticles() {
  const container = document.getElementById('particles-container');
  if (container) {
    createParticles(container);
    console.log('✓ Particles created successfully');
  } else {
    console.log('ℹ Particles container not found (only on home page)');
  }
}

// Create particle elements
function createParticles(container) {
  const particleCount = 50;
  
  for (let i = 0; i < particleCount; i++) {
    const particle = document.createElement('div');
    particle.className = 'particle';
    
    // Random size between 2-6px
    const size = Math.random() * 4 + 2;
    
    // Random position
    const x = Math.random() * 100;
    const y = Math.random() * 100;
    
    // Random animation duration and delay
    const duration = Math.random() * 20 + 10;
    const delay = Math.random() * 2;
    
    // Apply styles
    particle.style.width = size + 'px';
    particle.style.height = size + 'px';
    particle.style.left = x + '%';
    particle.style.top = y + '%';
    particle.style.animation = `float ${duration}s linear ${delay}s infinite`;
    
    container.appendChild(particle);
  }
}

// Mouse move effect for particles
document.addEventListener('mousemove', function(e) {
  const particles = document.querySelectorAll('.particle');
  if (particles.length === 0) return;
  
  const x = e.clientX / window.innerWidth;
  const y = e.clientY / window.innerHeight;
  
  particles.forEach(particle => {
    const offsetX = (x - 0.5) * 50;
    const offsetY = (y - 0.5) * 50;
    
    particle.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
  });
});

// Log when everything is ready
console.log('=== Portfolio Theme & Particles Ready ===');
```

---

## ✨ WHAT DOES theme.js DO?

### 🌙 Theme Toggle Function

**When you click the moon icon (🌙):**
1. Script checks current theme (light or dark)
2. Switches to opposite theme
3. Saves preference to browser's localStorage
4. Icon changes to sun (☀️) or moon (🌙)
5. Page colors change instantly

**Code that does this:**
```javascript
themeToggle.addEventListener('click', function(e) {
  // Get current theme
  const currentTheme = htmlElement.getAttribute('data-theme');
  
  // Switch to opposite
  const newTheme = currentTheme === 'light' ? 'dark' : 'light';
  
  // Save and apply
  htmlElement.setAttribute('data-theme', newTheme);
  localStorage.setItem('theme', newTheme);
});
```

### ✨ Particles Animation Function

**When page loads:**
1. Script finds `#particles-container` on page
2. Creates 50 random particle elements
3. Each particle has:
   - Random size (2-6px)
   - Random starting position
   - Random animation speed
   - Blue color (#2563eb)
4. Particles float upward continuously
5. Mouse movement affects particles slightly

**Code that does this:**
```javascript
function createParticles(container) {
  // Create 50 particles
  for (let i = 0; i < 50; i++) {
    const particle = document.createElement('div');
    particle.className = 'particle';
    
    // Random size
    const size = Math.random() * 4 + 2;
    
    // Random position
    const x = Math.random() * 100;
    const y = Math.random() * 100;
    
    // Random animation
    const duration = Math.random() * 20 + 10;
    
    // Apply styles
    particle.style.width = size + 'px';
    particle.style.height = size + 'px';
    particle.style.left = x + '%';
    particle.style.top = y + '%';
    particle.style.animation = `float ${duration}s linear ...`;
    
    // Add to page
    container.appendChild(particle);
  }
}
```

---

## 🧪 HOW TO TEST

### Test Theme Toggle:
1. Go to home page
2. Click moon icon (🌙) in top-right navbar
3. Page should turn dark
4. Icon should change to sun (☀️)
5. Refresh page - it should remember dark mode
6. Click again - should go back to light

### Test Particles:
1. Go to home page
2. Look at hero section (top of page)
3. You should see blue dots floating upward ✨
4. Move your mouse around
5. Particles should respond slightly to movement
6. Go to other pages - particles won't show (only on home)

### Check Console:
1. Press F12 to open DevTools
2. Go to Console tab
3. You should see:
   ```
   === Portfolio Theme & Particles Ready ===
   ✓ Particles created successfully
   ✓ Theme changed to: light
   ```

---

## ⚙️ CUSTOMIZE PARTICLES

### Change Number of Particles:
In theme.js, find:
```javascript
const particleCount = 50;  // Number of particles
```

Change to:
- `25` = fewer particles (faster)
- `75` = more particles (more visual effect)
- `100` = lots of particles

### Change Particle Color:
In header.php, find:
```css
.particle {
  background: #2563eb;  /* This is the color */
}
```

Change to:
- `#ff6b6b` = Red
- `#4ecdc4` = Teal
- `#ffd93d` = Yellow
- `#ffffff` = White

### Change Animation Speed:
In theme.js, find:
```javascript
const duration = Math.random() * 20 + 10;
```

This means: speeds between 10-30 seconds

Change to:
- `Math.random() * 10 + 5` = 5-15 seconds (faster)
- `Math.random() * 30 + 20` = 20-50 seconds (slower)

---

## ❌ WHAT NOT TO DO

```javascript
// ❌ DON'T try to use particles.js separate
// ❌ DON'T put theme.js in js/ subfolder
// ❌ DON'T have multiple JavaScript files for same purpose
// ❌ DON'T delete theme.js and expect things to work
```

---

## ✅ CHECKLIST

- [ ] theme.js is in root folder (not in js/)
- [ ] footer.php loads `<script src="theme.js"></script>`
- [ ] header.php has particle CSS in `<style>` tag
- [ ] index.php has `<div id="particles-container"></div>`
- [ ] No other theme.js or particles.js files exist
- [ ] Browser console shows: "Portfolio Theme & Particles Ready"
- [ ] Moon icon (🌙) is clickable in navbar
- [ ] Dark mode works when clicked
- [ ] Blue particles show on home page
- [ ] Particles respond to mouse movement

---

## 🎯 SUMMARY

| Question | Answer |
|----------|--------|
| Do I need particles.js? | ❌ NO - it's in theme.js |
| Do I need separate theme.js? | ❌ NO - one file does both |
| Where should theme.js go? | ✅ Root folder (same level as index.php) |
| What does theme.js do? | ✅ Theme toggle + Particles |
| Can I modify theme.js? | ✅ YES - customize as needed |
| Will deleting old CSS files break it? | ❌ NO - theme.js is standalone |

---

## 🚀 YOU'RE ALL SET!

- ✅ You have ONE theme.js file
- ✅ It handles BOTH theme toggle AND particles
- ✅ It's in the root folder
- ✅ footer.php loads it
- ✅ Everything works perfectly!

**No need for separate particles.js or anything else!** 🎉

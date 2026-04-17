# Adding Your Profile Picture

Currently, the portfolio uses an SVG placeholder for the profile image. Follow these steps to add your own profile picture:

## Step 1: Prepare Your Image

1. Get a high-quality photo of yourself
2. Crop it to a square (e.g., 400x400px, 500x500px, or 600x600px)
3. Optimize the file size (recommended: under 200KB)
4. Supported formats: JPG, PNG, WebP

## Step 2: Upload Your Image

1. Place your image in the `images/` folder
2. Name it `profile.jpg` or `profile.png` (or keep the original filename)

## Step 3: Update Image References

Replace the SVG references with your image in these files:

### In `index.php` (around line 10):
```html
<!-- Change from: -->
<img src="images/profile.svg" alt="Saviour Angel" class="profile-image">

<!-- To: -->
<img src="images/profile.jpg" alt="Saviour Angel" class="profile-image">
```

### In `about.php` (around line 27):
```html
<!-- Change from: -->
<img src="images/profile.svg" alt="Saviour Angel" class="about-img">

<!-- To: -->
<img src="images/profile.jpg" alt="Saviour Angel" class="about-img">
```

## Step 4: Verify

Refresh your browser to see your profile picture displayed:
- On the home page hero section
- On the about page

## Tips for Best Results

- **Aspect Ratio**: Use a square image for the circular profile display
- **Resolution**: Use at least 400x400px for sharp display
- **Format**: JPG for photographs, PNG for graphics with transparency
- **File Size**: Keep under 200KB for faster loading
- **Lighting**: Choose a photo with good lighting and clear visibility

## Image Optimization

If your image is too large, you can optimize it using:
- Online tools like TinyPNG or ImageOptim
- VS Code extensions
- Command line tools like ImageMagick

## Fallback

If you want to keep the SVG placeholder while testing, you can leave it as is. The placeholder will work fine until you're ready to add your real photo.

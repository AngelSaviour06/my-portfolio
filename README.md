# Developer Portfolio Website - PHP

A professional, responsive portfolio website built with PHP, featuring a project gallery, blog section, and contact form.

## Features

- **Responsive Design**: Mobile-first design that works on all devices
- **Professional Layout**: Clean, corporate styling with dark mode support
- **Project Gallery**: Showcase your projects with filtering by technology
- **Blog Section**: Write and publish articles with categories and search
- **Contact Form**: Working contact form with email delivery
- **Easy Customization**: JSON-based data files for easy content management

## Directory Structure

```
portfolio/
├── index.php              # Home page
├── projects.php           # Projects gallery
├── blog.php              # Blog listing
├── article.php           # Individual article page
├── contact.php           # Contact form
├── includes/
│   ├── header.php        # Navigation header
│   ├── footer.php        # Footer template
│   └── functions.php     # Helper functions
├── css/
│   └── style.css         # Main stylesheet
├── data/
│   ├── projects.json     # Projects data
│   └── articles.json     # Blog articles data
└── logs/                 # Error logs (created automatically)
```

## Requirements

- PHP 7.4 or higher
- A web server (Apache, Nginx, etc.)
- Email capability for contact form (requires mail function configured)

## Installation & Setup

### 1. Upload Files
Upload all files to your web server using FTP or your hosting control panel.

### 2. Configure Email (Optional)
Edit `contact.php` and update the email address:

```php
$to = 'your-email@example.com';  // Change this to your email
```

### 3. Create Logs Directory
The application will create a `logs` directory automatically. If permissions prevent this, create it manually:

```
mkdir logs
chmod 755 logs
```

### 4. Update Personal Information
Update the following files with your information:

**In `includes/header.php`:**
- Change "Alex Chen" to your name

**In `includes/footer.php`:**
- Update social media links
- Change email and location

**In `data/projects.json`:**
- Replace sample projects with your own
- Update technologies and links

**In `data/articles.json`:**
- Add your own articles
- Update categories and content

## Customization Guide

### Adding a New Project

Edit `data/projects.json` and add a new object:

```json
{
  "id": 7,
  "slug": "project-slug",
  "title": "Project Title",
  "description": "Project description",
  "role": "Your Role",
  "year": "2024",
  "technologies": ["PHP", "MySQL", "React"],
  "link": "https://example.com",
  "github": "https://github.com/username/repo"
}
```

### Adding a New Blog Article

Edit `data/articles.json` and add:

```json
{
  "id": 7,
  "slug": "article-slug",
  "title": "Article Title",
  "category": "Backend",
  "date": "2024-01-20",
  "reading_time": 8,
  "excerpt": "Short summary of the article",
  "content": "<h2>Heading</h2><p>Article content in HTML...</p>"
}
```

### Styling

The main stylesheet is `css/style.css`. It uses CSS variables for easy customization:

```css
--primary-color: #2563eb;        /* Main accent color */
--secondary-color: #1e40af;      /* Secondary accent */
--text-primary: #1f2937;         /* Main text color */
--bg-primary: #ffffff;           /* Background color */
```

Modify these variables to change the overall color scheme.

### Categories

Blog categories can be filtered. To add new categories:

1. Add articles with the new category in `articles.json`
2. Update the filter buttons in `blog.php`

## Security Notes

1. **Sanitization**: All user input is sanitized in `contact.php`
2. **Email Configuration**: Ensure your server's mail function is properly configured
3. **File Uploads**: This template doesn't include file uploads. If you add them, implement proper validation
4. **Database**: If you add a database, use prepared statements to prevent SQL injection

## Performance Tips

1. **Caching**: Set browser cache headers on your web server
2. **Compression**: Enable Gzip compression on your server
3. **CDN**: Serve static assets from a CDN for better performance
4. **Images**: Optimize images before adding them to projects

## Troubleshooting

### Contact Form Not Sending
- Check that your server has mail() function enabled
- Verify the email address is correct
- Check server error logs

### 404 Errors on Blog Articles
- Ensure the article slug in the URL matches the slug in `articles.json`
- Check URL encoding if using special characters

### Styling Issues
- Clear browser cache (Ctrl+Shift+Delete or Cmd+Shift+Delete)
- Ensure `css/style.css` is being loaded
- Check browser console for any errors

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Extending the Website

### Adding a Portfolio Section
1. Create a new PHP file
2. Include `includes/header.php` at the top
3. Include `includes/footer.php` at the bottom
4. Add the page to navigation in `includes/header.php`

### Adding a Database
1. Modify `data/projects.json` and `data/articles.json` to fetch from database
2. Use prepared statements to prevent SQL injection
3. Implement caching to improve performance

### Adding User Authentication
1. Implement a login system
2. Protect admin pages with session checks
3. Add a backend for managing content

## License

This portfolio template is provided as-is for personal use.

## Support

For questions or issues:
1. Check the troubleshooting section
2. Review your server's error logs
3. Verify all files are uploaded correctly

---

Happy building!


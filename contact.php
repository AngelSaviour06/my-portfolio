<?php
// Portfolio Website - Contact Page
$page_title = "Contact";
include 'includes/functions.php';
include 'includes/header.php';
include 'config.php';

require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$form_submitted = false;
$form_error = '';
$form_success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize_input($_POST['name'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $subject = sanitize_input($_POST['subject'] ?? '');
    $message = sanitize_input($_POST['message'] ?? '');
    
    $form_submitted = true;
    
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $form_error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_error = 'Please enter a valid email address.';
    } else {
        $mail = new PHPMailer(true);
        
        try {
            // Server settings (using constants from config.php)
            $mail->isSMTP();
            $mail->Host       = SMTP_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = SMTP_USERNAME;
            $mail->Password   = SMTP_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = SMTP_PORT;
            
            // Recipients (using constants from config.php)
            $mail->setFrom($email, $name);
            $mail->addAddress(RECIPIENT_EMAIL, RECIPIENT_NAME);
            $mail->addReplyTo($email, $name);
            
            // Content
            $mail->isHTML(false);
            $mail->Subject = "New Portfolio Contact: " . $subject;
            $mail->Body    = "Name: {$name}\nEmail: {$email}\nSubject: {$subject}\n\nMessage:\n{$message}";
            
            $mail->send();
            $form_success = true;
        } catch (Exception $e) {
            $form_error = "Message could not be sent. Error: {$mail->ErrorInfo}";
        }
    }
}
?>
<!-- Page Header -->
<section class="py-16 bg-gray-800 border-b border-gray-700">
  <div class="max-w-6xl mx-auto px-6">
    <h1 class="text-4xl font-bold text-white mb-2">Get in Touch</h1>
    <p class="text-gray-400">Have a project in mind? Let's talk about it.</p>
  </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gray-900">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
      
      <!-- Contact Information -->
      <div>
        <h2 class="text-3xl font-bold text-white mb-6">Contact Information</h2>
        <p class="text-gray-400 mb-8">I'm always interested in hearing about new projects and opportunities.</p>
        
        <div class="space-y-8">
          <!-- Email -->
          <div>
            <h3 class="text-xl font-bold text-white mb-2">Email</h3>
            <a href="mailto:saviourangel13@gmail.com" class="text-blue-400 hover:text-blue-300 text-lg">saviourangel13@gmail.com</a>
          </div>
          
          <!-- Location -->
          <div>
            <h3 class="text-xl font-bold text-white mb-2">Location</h3>
            <p class="text-gray-400 text-lg">Nigeria</p>
          </div>
          
          <!-- Social Links -->
          <div>
            <h3 class="text-xl font-bold text-white mb-4">Social</h3>
            <div class="flex flex-wrap gap-4">
              <a href="https://github.com" target="_blank" class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-semibold transition">GitHub</a>
              <a href="https://linkedin.com" target="_blank" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">LinkedIn</a>
              <a href="https://twitter.com" target="_blank" class="px-6 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg font-semibold transition">Twitter</a>
              <a href="https://instagram.com" target="_blank" class="px-6 py-2 bg-pink-600 hover:bg-pink-700 text-white rounded-lg font-semibold transition">Instagram</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div>
        <?php if ($form_submitted && $form_success): ?>
          <div class="bg-green-900 border border-green-700 rounded-lg p-8 text-center">
            <h3 class="text-2xl font-bold text-green-200 mb-2">Thank you for reaching out!</h3>
            <p class="text-green-300">I'll get back to you as soon as possible.</p>
          </div>
        <?php else: ?>
          <form method="POST" class="space-y-6" novalidate>
            <!-- Name Field -->
            <div>
              <label for="name" class="block text-lg font-semibold text-white mb-2">Name</label>
              <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" class="w-full px-4 py-3 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            
            <!-- Email Field -->
            <div>
              <label for="email" class="block text-lg font-semibold text-white mb-2">Email</label>
              <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" class="w-full px-4 py-3 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            
            <!-- Subject Field -->
            <div>
              <label for="subject" class="block text-lg font-semibold text-white mb-2">Subject</label>
              <input type="text" id="subject" name="subject" required value="<?php echo htmlspecialchars($_POST['subject'] ?? ''); ?>" class="w-full px-4 py-3 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            
            <!-- Message Field -->
            <div>
              <label for="message" class="block text-lg font-semibold text-white mb-2">Message</label>
              <textarea id="message" name="message" rows="6" required class="w-full px-4 py-3 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600 resize-none"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
            </div>
            
            <!-- Error Message -->
            <?php if ($form_submitted && $form_error): ?>
              <div class="bg-red-900 border border-red-700 border-l-4 border-l-red-600 rounded-lg p-4">
                <p class="text-red-200"><?php echo htmlspecialchars($form_error); ?></p>
              </div>
            <?php endif; ?>
            
            <!-- Submit Button -->
            <button type="submit" class="w-full px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-bold text-lg transition transform hover:-translate-y-1">
              Send Message
            </button>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
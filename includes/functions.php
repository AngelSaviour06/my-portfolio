<?php
// Helper Functions

/**
 * Sanitize user input to prevent XSS attacks
 */
function sanitize_input($input) {
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}

/**
 * Check if current page is active
 */
function is_active_page($page) {
  global $page_title;
  return $page_title === $page ? 'active' : '';
}

/**
 * Format date for display
 */
function format_date($date, $format = 'F d, Y') {
  return date($format, strtotime($date));
}

/**
 * Truncate text
 */
function truncate_text($text, $length = 150) {
  if (strlen($text) <= $length) {
    return $text;
  }
  return substr($text, 0, $length) . '...';
}

/**
 * Get the domain name without protocol
 */
function get_domain() {
  return $_SERVER['HTTP_HOST'];
}

/**
 * Check if SSL is enabled
 */
function is_https() {
  return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
}

/**
 * Get current page URL
 */
function get_current_url() {
  $protocol = is_https() ? 'https' : 'http';
  return $protocol . '://' . get_domain() . $_SERVER['REQUEST_URI'];
}

/**
 * Log errors for debugging
 */
function log_error($message) {
  $log_file = 'logs/error.log';
  if (!is_dir('logs')) {
    mkdir('logs', 0755, true);
  }
  $timestamp = date('Y-m-d H:i:s');
  file_put_contents($log_file, "[$timestamp] $message\n", FILE_APPEND);
}

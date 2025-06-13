<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    wp_redirect(home_url());
    exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

$firstname = sanitize_text_field($_POST['name'] ?? '');
$lastname = sanitize_text_field($_POST['familyname'] ?? '');
$email = sanitize_email($_POST['email'] ?? '');
$subject = sanitize_text_field($_POST['object'] ?? '');
$message = sanitize_textarea_field($_POST['message'] ?? '');

$errors = [];

// Validazione base
if (!$firstname) $errors['name'] = "Veuillez entrer votre prénom.";
if (!$lastname) $errors['familyname'] = "Veuillez entrer votre nom.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Adresse email invalide.";
if (!$message) $errors['message'] = "Veuillez écrire un message.";

// errori
if (!empty($errors)) {
    $_SESSION['contact_form_errors'] = $errors;
    wp_safe_redirect($_SERVER['HTTP_REFERER'] . '#contactMe');
    exit;
}


$post_id = wp_insert_post([
    'post_type'    => 'contact_message',
    'post_title'   => $firstname . ' ' . $lastname,
    'post_content' => $message,
    'post_status'  => 'publish',
]);

// Invia email
$email_body = "Message de $firstname $lastname:\n\n";
$email_body .= "$message\n\n";
$email_body .= "Email: $email\nSujet: $subject";

wp_mail(
    'maroia.haddaji@student.hepl.be',
    'Nouveau message de contact',
    $email_body
);

$_SESSION['contact_form_success'] = 'Merci pour votre message ! Je vous répondrai rapidement.';
wp_safe_redirect($_SERVER['HTTP_REFERER'] . '#contactMe');
exit;

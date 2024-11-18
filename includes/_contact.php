<?php

/**========================================================================
 *                           FORM CONTACT
 *========================================================================**/
function handle_contact_form()
{

    if (isset($_POST['action']) && $_POST['action'] == 'custom_contact_form') {

        $profil = $_POST['profil'];
        $nom = sanitize_text_field($_POST['nom']);
        $prenom = sanitize_text_field($_POST['prenom']);
        $fonction = sanitize_text_field($_POST['fonction']);
        $structure = sanitize_text_field($_POST['structure']);
        $courriel = sanitize_email($_POST['courriel']);
        $message = sanitize_textarea_field($_POST['message']);
        $telephone = sanitize_text_field($_POST['telephone']);
        $demande =  implode(', ',$_POST['demande'])  ;



        $to = 'contact@dm-compost.fr';
        $subject = "Contact site - $prenom $nom";
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $message_body ="";

        $message_body .= "Cible : $profil <br>";
        $message_body .= "Nom: $prenom $nom <br>";
        $message_body .= "Fonction: $fonction<br>";
        $message_body .= "Structure: $structure<br>";
        $message_body .= "Courriel: $courriel<br>";
        $message_body .= "Téléphone: $telephone<br><br>";
        $message_body .= "Demande: $demande<br>";
        $message_body .= "Message: $message<br>";


        wp_mail( $to , $subject, $message_body, $headers );

        wp_redirect(home_url('/contact-confirmation/'));

        exit;

    }

}

add_action('admin_post_nopriv_custom_contact_form', 'handle_contact_form');

add_action('admin_post_custom_contact_form', 'handle_contact_form');




/**========================================================================
 *                           CAPTCHA
 *========================================================================**/

add_action('wp_ajax_captcha', 'checkCaptcha');
add_action("wp_ajax_nopriv_captcha", 'checkCaptcha');

function checkCaptcha()
{

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; // URL to the reCAPTCHA server
    $recaptcha_secret = '6Lf8nX4qAAAAAN01n9dnYi531muxxKlsTyFFn9xB'; // Secret key
    $recaptcha_response = $_GET['code']; // Response from reCAPTCHA server, added to the form during processing

    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); // Send request to the server
    $recaptcha = json_decode($recaptcha); // Decode the JSON response
    if ($recaptcha->success == true && $recaptcha->score >= 0.5 && $recaptcha->action == "contact") { // If the response is valid
        // run email send routine
        $success_output = 1; // Success message
        $error_output = 0;
    } else {
        $error_output = 1;
        $success_output = 0; // Error message
    }

    $output = [
        'error' => $error_output,
        'success' => $success_output
    ];

    wp_send_json($output);

    die();

}
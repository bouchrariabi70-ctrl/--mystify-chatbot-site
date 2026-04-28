<?php
/*
 * Plugin Name: Contact Pharmacie Boukidan
 * Description: Formulaire de contact - messages stockés en BDD
 * Version: 2.0
 */
if (!defined('ABSPATH')) exit;


// ─── 1. TRAITEMENT ET STOCKAGE DU MESSAGE ────────────────────────────────────
function traiter_contact_pharmacie() {
    if (
        isset($_POST['envoyer_pharmacie']) &&
        isset($_POST['contact_nonce']) &&
        wp_verify_nonce($_POST['contact_nonce'], 'contact_pharmacie')
    ) {
        global $wpdb;
        $table = 'messages_pharmacie'; // ← votre table sans préfixe wp_

        $wpdb->insert($table, [
            'nom'       => sanitize_text_field($_POST['nom']),
            'email'     => sanitize_email($_POST['email']),
            'message'   => sanitize_textarea_field($_POST['message']),
            'pharmacie' => sanitize_text_field($_POST['pharmacie']),
            'date_envoi' => current_time('mysql'),
        ]);

        wp_redirect(add_query_arg('contact', 'envoye', get_permalink()));
        exit;
    }
}
add_action('template_redirect', 'traiter_contact_pharmacie');


// ─── 2. AFFICHAGE DU FORMULAIRE ──────────────────────────────────────────────
function afficher_contact_auto($content) {
    if (!is_page()) return $content;

    $statut = '';
    if (isset($_GET['contact']) && $_GET['contact'] === 'envoye') {
        $statut = '<p style="color:green; font-weight:bold;">✅ Votre message a été envoyé à la pharmacie !</p>';
    }

    $form = '
    <div id="section-contact-pharmacie" style="margin-top:40px; font-family:sans-serif;">
        ' . $statut . '

        <button
            onclick="var f=document.getElementById(\'form-contact\'); f.style.display=(f.style.display===\'none\'?\'block\':\'none\')"
            style="background:#2c7a4b; color:white; padding:12px 24px; border:none; border-radius:6px; cursor:pointer; font-size:15px;">
            📩 Contacter la Pharmacie
        </button>

        <div id="form-contact" style="display:none; margin-top:20px; background:#f9f9f9; padding:24px; border-radius:8px; max-width:500px; border:1px solid #ddd;">
            <h3 style="margin-top:0; color:#2c7a4b;">Envoyer un message à la pharmacie</h3>

            <form method="post">
                ' . wp_nonce_field('contact_pharmacie', 'contact_nonce', true, false) . '

                <label>Nom complet *</label><br>
                <input type="text" name="nom" required placeholder="Votre nom"
                    style="width:100%; padding:8px; margin:6px 0 14px; border:1px solid #ccc; border-radius:4px;">

                <label>Email</label><br>
                <input type="email" name="email" placeholder="votre@email.com"
                    style="width:100%; padding:8px; margin:6px 0 14px; border:1px solid #ccc; border-radius:4px;">

                <label>Nom de la pharmacie *</label><br>
                <input type="text" name="pharmacie" required placeholder="Ex: Pharmacie Al Amal"
                    style="width:100%; padding:8px; margin:6px 0 14px; border:1px solid #ccc; border-radius:4px;">

                <label>Message *</label><br>
                <textarea name="message" required rows="5" placeholder="Votre message..."
                    style="width:100%; padding:8px; margin:6px 0 14px; border:1px solid #ccc; border-radius:4px;"></textarea>

                <input type="submit" name="envoyer_pharmacie" value="Envoyer le message"
                    style="background:#2c7a4b; color:white; padding:10px 20px; border:none; border-radius:6px; cursor:pointer; font-size:14px;">
            </form>
        </div>
    </div>';

    return $content . $form;
}
add_filter('the_content', 'afficher_contact_auto');


// ─── 3. PAGE ADMIN POUR CONSULTER LES MESSAGES ───────────────────────────────
function pharmacie_menu_admin() {
    add_menu_page(
        'Messages Pharmacie',
        '💊 Messages Pharmacie',
        'manage_options',
        'messages-pharmacie',
        'pharmacie_afficher_messages',
        'dashicons-email-alt',
        30
    );
}
add_action('admin_menu', 'pharmacie_menu_admin');


function pharmacie_afficher_messages() {
    global $wpdb;
    $table = 'messages_pharmacie';

    // Supprimer un message
    if (isset($_GET['supprimer']) && is_numeric($_GET['supprimer'])) {
        $wpdb->delete($table, ['id' => intval($_GET['supprimer'])]);
        echo '<div class="notice notice-success"><p>Message supprimé.</p></div>';
    }

    $messages = $wpdb->get_results("SELECT * FROM $table ORDER BY date_envoi DESC");

    echo '<div class="wrap">';
    echo '<h1>💊 Messages reçus — Pharmacie Boukidan</h1>';

    if (empty($messages)) {
        echo '<p>Aucun message reçu pour le moment.</p>';
    } else {
        echo '<table class="widefat striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Pharmacie</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($messages as $msg) {
            echo "<tr>
                <td>{$msg->id}</td>
                <td>" . esc_html($msg->nom) . "</td>
                <td>" . esc_html($msg->email) . "</td>
                <td>" . esc_html($msg->pharmacie) . "</td>
                <td>" . esc_html($msg->message) . "</td>
                <td>{$msg->date_envoi}</td>
                <td>
                    <a href='?page=messages-pharmacie&supprimer={$msg->id}'
                       onclick='return confirm(\"Supprimer ce message ?\")' 
                       style='color:red;'>🗑 Supprimer</a>
                </td>
            </tr>";
        }

        echo '</tbody></table>';
    }
    echo '</div>';
}
// Shortcode pour Kubio
function shortcode_contact_pharmacie() {
    return afficher_contact_auto('');
}
add_shortcode('contact_pharmacie', 'shortcode_contact_pharmacie');
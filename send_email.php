<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati inviati dal form
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $messaggio = htmlspecialchars($_POST['messaggio']);

    // Validazione dei dati (aggiungi altre validazioni se necessario)
    if (empty($nome) || empty($email) || empty($messaggio)) {
        echo "Tutti i campi sono obbligatori!";
        exit;
    }

    // Impostazioni dell'email
    $to = "info@subitocasaweb.it"; // Inserisci il tuo indirizzo email
    $subject = "Nuovo messaggio da: " . $nome;
    $body = "Hai ricevuto un nuovo messaggio da un possibile partner:\n\n";
    $body .= "Nome: " . $nome . "\n";
    $body .= "Email: " . $email . "\n\n";
    $body .= "Messaggio:\n" . $messaggio;

    // Impostazioni header dell'email
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Invia l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Messaggio inviato con successo!";
    } else {
        echo "Si è verificato un errore nell'invio del messaggio.";
    }
}
?>

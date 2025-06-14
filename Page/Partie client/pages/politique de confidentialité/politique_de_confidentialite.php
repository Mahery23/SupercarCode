<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['nom_utilisateur'])) {
    $lien_demande_essai = "../demande_essaie/demande_essai.php";
    $lien_connexion = "../login/fonction_php/deconnexion.php"; // Lien de déconnexion lorsque l'utilisateur est connecté
    $icone_connexion = "../../icones/icone_connexion/icons8-logout-96.png"; // Icône de déconnexion
} else {
    $lien_demande_essai = "../login/seconnecter.php";
    $lien_connexion = "../login/inscription_main.php"; // Lien d'inscription lorsque l'utilisateur n'est pas connecté
    $icone_connexion = "../../icones/icone_connexion/icons8-connexion-96.png"; // Icône de connexion
}
?><!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Politiqiue de confidentialité </title>
  <!-- Liens vers les fichiers CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../../css/footer.css">
  <style>
        body {
                background-image: url('https://img2.wallspic.com/previews/4/6/1/1/4/141164/141164-mercedes_benz_classe_s-voiture-voiture_de_luxe_personnels-x750.jpg');
                background-size: cover; /* Ensure the image covers the entire screen */
                background-position: center; /* Keep the image centered */
                background-repeat: no-repeat; /* No repeating of the background image */
                background-attachment: fixed; /* Keep the background fixed during scrolling */
                height: 100vh;
                margin: 0;
                padding: 0;
                color: white; /* Set text color to white for better contrast */
            }
        #corps_contact{
            background-color: rgba(62, 62, 81, 0.546);
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark bg-light">

        <div class="container"> 
    
            <a class="navbar-brand" href="#">
                <img src="../../Logo_page/supercar.png" alt="" id = "logo">
            </a>
    
            <!-- LE TOGGER A TROIS BARRES -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto text-center">
    
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">ACCUEIL</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="../voitures/1-0-voitures.php">VOITURES</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $lien_demande_essai; ?>">DEMANDE ESSAI</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="../evenement/evenement.php">EVENEMENTS</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/contactez-nous.php">CONTACTEZ-NOUS</a>
                    </li>
    
                </ul>
            </div>
    
            <a href="<?php echo $lien_connexion; ?>" class="logo-container">
                <img src="<?php echo $icone_connexion; ?>" alt="Logo">
            </a>
        </div>
    </nav>

    <h1 align="center">
        Politique de confidentialité
    </h1>
    <label for="" align="center">

    </label>

    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Politique de confidentialité</h2>
                            
                            <h3>1. Collecte des données personnelles</h3>
                            <p>Nous collectons les informations suivantes :</p>
                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th>Type de données</th>
                                            <th>Finalité</th>
                                            <th>Base légale</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nom et prénom</td>
                                            <td>Identification</td>
                                            <td>Exécution du contrat</td>
                                        </tr>
                                        <tr>
                                            <td>Adresse email</td>
                                            <td>Communication</td>
                                            <td>Exécution du contrat</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro de téléphone</td>
                                            <td>Contact</td>
                                            <td>Exécution du contrat</td>
                                        </tr>
                                        <tr>
                                            <td>Informations permis</td>
                                            <td>Vérification éligibilité</td>
                                            <td>Obligation légale</td>
                                        </tr>
                                        <tr>
                                            <td>Données de réservation</td>
                                            <td>Gestion des essais</td>
                                            <td>Exécution du contrat</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h3>2. Utilisation des données</h3>
                            <p>Vos données sont utilisées pour :</p>
                            <ul>
                                <li>Gérer vos réservations d'essai</li>
                                <li>Vous contacter concernant votre demande</li>
                                <li>Améliorer nos services</li>
                                <li>Vous envoyer des informations sur nos véhicules (avec votre consentement)</li>
                                <li>Respecter nos obligations légales</li>
                            </ul>

                            <h3>3. Protection des données</h3>
                            <p>Nous mettons en œuvre des mesures de sécurité appropriées :</p>
                            <ul>
                                <li>Chiffrement des données sensibles</li>
                                <li>Accès restreint aux données</li>
                                <li>Surveillance régulière des systèmes</li>
                                <li>Formation du personnel</li>
                                <li>Audits de sécurité réguliers</li>
                            </ul>

                            <h3>4. Vos droits</h3>
                            <p>Conformément au RGPD, vous disposez des droits suivants :</p>
                            <ul>
                                <li>Droit d'accès à vos données</li>
                                <li>Droit de rectification</li>
                                <li>Droit à l'effacement</li>
                                <li>Droit d'opposition au traitement</li>
                                <li>Droit à la portabilité des données</li>
                                <li>Droit de limitation du traitement</li>
                                <li>Droit de retirer votre consentement</li>
                            </ul>

                            <h3>5. Conservation des données</h3>
                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th>Type de données</th>
                                            <th>Durée de conservation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Données de compte</td>
                                            <td>3 ans après dernière activité</td>
                                        </tr>
                                        <tr>
                                            <td>Données de réservation</td>
                                            <td>5 ans (obligation légale)</td>
                                        </tr>
                                        <tr>
                                            <td>Données de connexion</td>
                                            <td>1 an</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h3>6. Partage des données</h3>
                            <p>Nous ne vendons pas vos données personnelles. Nous pouvons les partager avec :</p>
                            <ul>
                                <li>Nos partenaires de service (assurance, maintenance)</li>
                                <li>Les autorités légales si requis par la loi</li>
                                <li>Nos sous-traitants (hébergement, maintenance)</li>
                            </ul>

                            <h3>7. Contact</h3>
                            <p>Pour toute question concernant la protection de vos données personnelles :</p>
                            <ul>
                                <li>Email : privacy@supercar.com</li>
                                <li>Téléphone : +230 3215 8794</li>
                                <li>Adresse : MU.lot54 Battiment4</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include '../../include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../index.php");
    exit();
}

// Connexion à la base de données
include ("../../../include_bdd/connexion.bdd.php");

// Requête SQL pour récupérer la liste des clients inscrits
$sql = "SELECT * FROM `client_inscrit`";
$resultat = $connexion->query($sql);

// Vérifier si la requête a réussi
if (!$resultat) {
    die("Erreur lors de la récupération des clients : " . $connexion->error);
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Clients - Administration Supercar</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #c0392b;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --background-color: #f8f9fa;
            --text-color: #2c3e50;
            --card-bg: #ffffff;
            --border-color: #e0e0e0;
            --card-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        .navbar {
            background: var(--primary-color);
            padding: 0.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: white !important;
            font-weight: 600;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .navbar-brand i {
            font-size: 1.4rem;
        }

        .back-btn {
            background: transparent;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            color: white;
        }

        .container {
            padding: 1rem;
            max-width: 1400px;
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.4rem;
            text-align: center;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--accent-color);
            margin: 15px auto;
            border-radius: 2px;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .table {
            margin-bottom: 0;
            width: 100%;
            background-color: white;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.85rem;
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem;
            font-weight: 600;
            font-size: 0.75rem;
            white-space: nowrap;
            position: sticky;
            top: 0;
            z-index: 1;
            text-align: center;
            min-width: 80px;
        }

        .table tbody td {
            padding: 0.4rem;
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.8rem;
        }

        .table tbody tr:hover {
            background-color: rgba(44, 62, 80, 0.05);
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0 -1rem;
            padding: 0 1rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-height: 400px;
            overflow-y: auto;
        }

        .btn-action {
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
            font-size: 0.8rem;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            color: white;
        }

        .formulaire {
            max-width: 400px;
            margin: 0 auto;
            background-color: var(--card-bg);
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            padding: 1rem;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 0.3rem;
            font-size: 0.85rem;
        }

        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 0.4rem 0.6rem;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.1);
        }

        .mb-3 {
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0.5rem;
            }
            
            .card {
                padding: 0.5rem;
            }
            
            .section-title {
                font-size: 1.2rem;
            }

            .formulaire {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-users"></i>
                Gestion des Clients
            </a>
            <a href="../../../Accueil_admin/menu-admin.php" class="btn back-btn">
                <i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>
    </nav>

    <div class="container">
        <!-- Liste des clients -->
        <div class="card">
            <h2 class="section-title">Liste des Clients Inscrits</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Nom d'utilisateur</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultat->num_rows > 0) {
                            while ($row = $resultat->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id_client"] . "</td>";
                                echo "<td>" . $row["nom"] . "</td>";
                                echo "<td>" . $row["prenom"] . "</td>";
                                echo "<td>" . $row["nom_utilisateur"] . "</td>";
                                echo "<td>" . $row["e_mail"] . "</td>";
                                echo "<td>
                                    <form action='fonction_php/traitement-supprimer-clients.php' method='post' style='display: inline;'>
                                        <input type='hidden' name='id_client' value='" . $row["id_client"] . "'> 
                                        <button type='submit' class='btn-action btn-danger' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce client ?\")'>
                                            <i class='fas fa-trash'></i> Supprimer
                                        </button>
                                    </form>
                                </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Aucun client trouvé</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Formulaire d'ajout -->
        <div class="card">
            <h2 class="section-title">Ajouter un Client</h2>
            <form action='fonction_php/traitement-ajout-clients.php' method='post' class='formulaire'>
                <div class='mb-3'>
                    <label for='nom' class='form-label'>Nom</label>
                    <input type='text' class='form-control' id='nom' name='nom' required>
                </div>

                <div class='mb-3'>
                    <label for='prenom' class='form-label'>Prénom</label>
                    <input type='text' class='form-control' id='prenom' name='prenom' required>
                </div>

                <div class='mb-3'>
                    <label for='nom_utilisateur' class='form-label'>Nom d'utilisateur</label>
                    <input type='text' class='form-control' id='nom_utilisateur' name='nom_utilisateur' required>
                </div>

                <div class='mb-3'>
                    <label for='email' class='form-label'>Email</label>
                    <input type='email' class='form-control' id='e_mail' name='e_mail' required>
                </div>

                <div class='mb-3'>
                    <label for='mots_de_passe' class='form-label'>Mot de passe</label>
                    <input type='password' class='form-control' id='mots_de_passe' name='mots_de_passe' required>
                </div>

                <div class='mb-3'>
                    <label for='confirmation_mots_de_passe' class='form-label'>Confirmation du mot de passe</label>
                    <input type='password' class='form-control' id='confirmation_mot_de_passe' name='confirmation_mots_de_passe' required>
                </div>

                <div class='text-center'>
                    <button type='submit' class='btn-action btn-primary'>
                        <i class='fas fa-plus'></i> Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

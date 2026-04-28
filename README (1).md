# 🏔️ Boukidan — Site Vitrine + Chatbot IA + Formulaire de Contact

<div align="center">

![WordPress](https://img.shields.io/badge/WordPress-6.x-21759B?style=for-the-badge&logo=wordpress&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Python](https://img.shields.io/badge/Python-3.10+-3776AB?style=for-the-badge&logo=python&logoColor=white)
![Flask](https://img.shields.io/badge/Flask-3.x-000000?style=for-the-badge&logo=flask&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

**Site vitrine du village de Boukidan — Al Hoceima, Maroc**  
*Développé avec WordPress · Thème Mystify · Page Builder Kubio · Chatbot IA Python*

[🌐 Démo locale](#démarrage-rapide) · [📖 Documentation](#structure-du-projet) · [🤖 Chatbot](#chatbot-ia) · [📬 Formulaire](#formulaire-de-contact)

</div>

---

## 📋 Table des matières

- [Présentation du projet](#-présentation-du-projet)
- [Fonctionnalités](#-fonctionnalités)
- [Architecture technique](#-architecture-technique)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Structure du projet](#-structure-du-projet)
- [Le site WordPress](#-le-site-wordpress)
- [Chatbot IA](#-chatbot-ia)
- [Formulaire de contact](#-formulaire-de-contact)
- [API REST WordPress](#-api-rest-wordpress)
- [Configuration](#-configuration)
- [Démarrage rapide](#-démarrage-rapide)
- [Auteur](#-auteur)

---

## 🏘️ Présentation du projet

**Boukidan** est un site vitrine complet dédié au village de **Boukidan**, situé dans la province d'Al Hoceima, dans le **Rif central au Maroc**. Le village est connu pour son rôle historique lors de la rébellion du Rif (1958–1959), pour abriter l'**aéroport d'Al Hoceima** et l'**École Nationale des Sciences Appliquées (ENSAH)**, et pour sa gastronomie locale authentique.

Ce projet combine trois composants principaux :

| Composant | Technologie | Rôle |
|---|---|---|
| **Site vitrine** | WordPress + Kubio | Présentation du village, galeries, activités |
| **Chatbot IA** | Python + Flask + Claude AI | Guide touristique virtuel conversationnel |
| **Formulaire de contact** | Contact Form 7 + Python | Collecte et traitement des demandes visiteurs |

> 🎓 Projet réalisé dans le cadre du cours **Développement Web** — ENSAH · TDIA · 2025–2026

---

## ✨ Fonctionnalités

### Site vitrine
- ✅ Page d'accueil avec hero plein écran et image de fond
- ✅ Navigation thématique en 3 cartes colorées (Paysage, Gastronomie, Histoire)
- ✅ Section **Boukidan & ENSAH** avec texte et image côte à côte
- ✅ Galerie **Plats typiques** (Sardines, Kefta, Tajine)
- ✅ Section **Plage Souani** avec description et photos
- ✅ Section **Quad tours** — activités aventure
- ✅ Galerie **Nos Cafés** (Café Rahma, Expresso)
- ✅ Footer avec copyright automatique
- ✅ Design **100% responsive** (mobile, tablette, desktop)
- ✅ Optimisé **SEO** (balises H1/H2/H3, alt images, permaliens)

### Chatbot IA
- ✅ Interface chat flottante intégrée dans WordPress
- ✅ Réponses contextualisées sur Boukidan via **Claude AI (Anthropic)**
- ✅ Serveur backend **Flask** (Python)
- ✅ Gestion des erreurs et timeouts
- ✅ CORS configuré pour l'intégration WordPress
- ✅ Historique de conversation en session

### Formulaire de contact
- ✅ Formulaire WordPress via **Contact Form 7**
- ✅ Traitement des soumissions via script Python
- ✅ Validation des données côté serveur (regex)
- ✅ Envoi de notification par email
- ✅ Sauvegarde des messages dans un fichier CSV
- ✅ Protection anti-spam basique

---

## 🏗️ Architecture technique

```
boukidan/
│
├── 🌐 FRONTEND (WordPress)
│   ├── Thème          : Mystify (wordpress.org/themes/mystify)
│   ├── Page Builder   : Kubio (kubiobuilder.com)
│   ├── Plugins        : Contact Form 7, Kubio
│   └── URL locale     : http://localhost/monprojet
│
├── 🤖 BACKEND (Python)
│   ├── Chatbot        : Flask + Anthropic API
│   ├── Formulaire     : traitement et validation
│   └── API REST       : interaction avec WordPress
│
└── 🗄️ BASE DE DONNÉES
    ├── MySQL 8.x (via XAMPP)
    └── phpMyAdmin : http://localhost/phpmyadmin
```

### Flux de données — Chatbot

```
Visiteur (navigateur)
    │ Question en texte
    ▼
Widget Chat (JavaScript dans WordPress)
    │ POST /chat  (JSON)
    ▼
Serveur Flask Python (port 5000)
    │ Appel API avec contexte Boukidan
    ▼
Claude AI (Anthropic)
    │ Réponse générée
    ▼
Serveur Flask → Widget Chat → Affichage visiteur
```

### Flux de données — Formulaire de contact

```
Visiteur remplit le formulaire (Nom, Email, Message)
    │ Soumission Contact Form 7
    ▼
WordPress (validation côté client)
    │ Webhook POST vers Python
    ▼
Script Python (validation, nettoyage regex)
    │ ├── Sauvegarde CSV
    │ └── Envoi email notification
    ▼
Confirmation affichée au visiteur
```

---

## 📦 Prérequis

### Environnement serveur local
- **XAMPP** (Windows) ou **MAMP** (Mac) ou **LAMP** (Linux)
  - Apache 2.4+
  - MySQL 8.x
  - PHP 8.0+
- **WordPress** 6.x ([télécharger](https://wordpress.org/download/))

### Python
- **Python** 3.10 ou supérieur
- **pip** (gestionnaire de paquets)

### Clé API
- Compte **Anthropic** pour la clé API Claude ([obtenir ici](https://console.anthropic.com/))

---

## 🚀 Installation

### Étape 1 — Cloner le projet

```bash
git clone https://github.com/votre-username/boukidan.git
cd boukidan
```

### Étape 2 — Installer WordPress en local

```bash
# 1. Démarrer XAMPP (Apache + MySQL)
# 2. Copier le dossier WordPress dans :
#    Windows : C:/xampp/htdocs/monprojet/
#    Mac/Linux : /opt/lampp/htdocs/monprojet/

# 3. Créer la base de données MySQL
# Ouvrir : http://localhost/phpmyadmin
# Créer une BDD nommée : boukidan_db

# 4. Lancer l'installation WordPress
# Ouvrir : http://localhost/monprojet
# Suivre l'assistant (5 minutes)
```

### Étape 3 — Installer les plugins WordPress

Dans `wp-admin → Extensions → Ajouter` :

```
1. Kubio          → Installer → Activer
2. Contact Form 7 → Installer → Activer
```

### Étape 4 — Importer le thème Mystify

```
wp-admin → Apparence → Thèmes → Ajouter
→ Rechercher "Mystify"
→ Installer → Activer
```

### Étape 5 — Installer les dépendances Python

```bash
# Créer un environnement virtuel (recommandé)
python -m venv venv

# Activer l'environnement virtuel
# Windows :
venv\Scripts\activate
# Mac/Linux :
source venv/bin/activate

# Installer les dépendances
pip install -r requirements.txt
```

**Contenu du fichier `requirements.txt` :**

```text
flask==3.0.0
flask-cors==4.0.0
anthropic==0.25.0
requests==2.31.0
python-dotenv==1.0.0
pandas==2.1.0
```

### Étape 6 — Configurer les variables d'environnement

```bash
# Copier le fichier d'exemple
cp .env.example .env

# Éditer le fichier .env avec vos valeurs
nano .env
```

**Contenu du fichier `.env` :**

```env
# Clé API Anthropic (Claude)
ANTHROPIC_API_KEY=sk-ant-votre-clé-api-ici

# Configuration WordPress
WP_URL=http://localhost/monprojet
WP_USER=admin
WP_PASSWORD=votre_mot_de_passe_wp

# Configuration Flask
FLASK_PORT=5000
FLASK_DEBUG=True

# Email de notification (formulaire de contact)
EMAIL_DESTINATAIRE=votre@email.com
EMAIL_EXPEDITEUR=noreply@boukidan.local
```

### Étape 7 — Lancer les serveurs

```bash
# Terminal 1 : Lancer le chatbot Flask
python chatbot/app.py

# Terminal 2 : Lancer le serveur de formulaires
python formulaire/traitement.py
```

### Étape 8 — Vérifier l'installation

```
✅ WordPress   : http://localhost/monprojet
✅ wp-admin    : http://localhost/monprojet/wp-admin
✅ Chatbot API : http://localhost:5000/health
✅ phpMyAdmin  : http://localhost/phpmyadmin
```

---

## 📁 Structure du projet

```
boukidan/
│
├── 📄 README.md                    ← Ce fichier
├── 📄 requirements.txt             ← Dépendances Python
├── 📄 .env.example                 ← Variables d'environnement (modèle)
├── 📄 .gitignore                   ← Fichiers exclus de Git
│
├── 🤖 chatbot/
│   ├── app.py                      ← Serveur Flask principal
│   ├── contexte_boukidan.py        ← Contexte IA sur le village
│   └── templates/
│       └── chat_widget.html        ← Widget HTML à intégrer dans WP
│
├── 📬 formulaire/
│   ├── traitement.py               ← Traitement des soumissions CF7
│   ├── validation.py               ← Validation regex des champs
│   ├── email_service.py            ← Service d'envoi d'emails
│   └── data/
│       └── contacts.csv            ← Sauvegarde des messages
│
├── 🔧 scripts/
│   ├── api_wordpress.py            ← Interface API REST WordPress
│   ├── import_contenu.py           ← Import automatique de contenu
│   └── rapport_analytique.py       ← Tableau de bord Pandas/Matplotlib
│
└── 📚 docs/
    ├── installation.md             ← Guide d'installation détaillé
    └── api_reference.md            ← Référence API
```

---

## 🌐 Le site WordPress

### Pages créées

| Page | URL | Description |
|---|---|---|
| Accueil | `/` | Hero, cartes thèmes, sections principales |
| Paysage | `/paysage-et-localisation` | Photos et description géographique |
| Gastronomie | `/vie-et-gastronomie` | Plats typiques, cafés, restaurants |
| Histoire | `/histoire-et-culture` | Rébellion du Rif, patrimoine |
| ENSAH | `/boukidan-ensah` | L'école nationale et son impact |
| Plage Souani | `/plage-souani` | Description et photos de la plage |
| Quad Tours | `/quad-tours` | Activité aventure, réservation |
| Contact | `/contact` | Formulaire de contact CF7 |

### Structure d'une section type

Chaque section de la page d'accueil est construite avec les blocs Gutenberg suivants :

```
Bloc Groupe (couleur de fond / image de fond)
  └── Bloc Colonnes
        ├── Colonne gauche
        │     ├── Bloc Titre H2
        │     ├── Bloc Séparateur (couleur cyan #00B4D8)
        │     └── Bloc Paragraphe
        └── Colonne droite
              └── Bloc Image
```

### Personnalisation Kubio

Pour modifier un élément :

```
1. Cliquer sur "Modifier avec Kubio" (barre admin)
2. Cliquer sur l'élément cible (contour bleu = sélectionné)
3. Panneau droit → onglet "Styles" ou "Contenu"
4. Modifier les valeurs
5. Cliquer sur "Mettre à jour" (bouton bleu, haut droite)
```

---

## 🤖 Chatbot IA

Le chatbot est un guide touristique virtuel alimenté par **Claude (Anthropic)**. Il répond aux questions des visiteurs sur Boukidan en français.

### Code source principal

**`chatbot/app.py`**

```python
from flask import Flask, request, jsonify
from flask_cors import CORS
import anthropic
import os
from dotenv import load_dotenv

load_dotenv()

app = Flask(__name__)
CORS(app, origins=["http://localhost", "http://localhost/monprojet"])

client = anthropic.Anthropic(api_key=os.getenv("ANTHROPIC_API_KEY"))

CONTEXTE = """
Tu es Bouky, le guide touristique virtuel du village de Boukidan,
situé dans la province d'Al Hoceima, dans le Rif central du Maroc.

Informations sur Boukidan :
- Village historique : rébellion du Rif (1958-1959)
- Population : environ 5 000 habitants
- Infrastructure : aéroport d'Al Hoceima, ENSAH
- Gastronomie : sardines grillées, brochettes de kefta, tajine
- Plage Souani : sable doré, eaux limpides, falaises
- Activité phare : circuits de quad dans les montagnes du Rif
- Cafés locaux : Café Rahma, Expresso

Règles de réponse :
- Répondre en français exclusivement
- Réponses courtes et chaleureuses (3-4 phrases max)
- Toujours rester positif sur le village
- Si tu ne sais pas, inviter à contacter via le formulaire
"""

historique = []

@app.route('/health', methods=['GET'])
def health():
    """Vérification que le serveur fonctionne"""
    return jsonify({"status": "ok", "service": "Chatbot Boukidan"})

@app.route('/chat', methods=['POST'])
def chat():
    """Endpoint principal du chatbot"""
    
    try:
        donnees = request.get_json()
        if not donnees or 'message' not in donnees:
            return jsonify({"erreur": "Message manquant"}), 400
        
        question = donnees['message'].strip()
        
        if len(question) > 500:
            return jsonify({
                "erreur": "Message trop long (500 caractères max)"
            }), 400
        
        # Construire l'historique de conversation
        messages = []
        for echange in historique[-5:]:     # Garder les 5 derniers échanges
            messages.append({"role": "user",      "content": echange["question"]})
            messages.append({"role": "assistant", "content": echange["reponse"]})
        
        messages.append({"role": "user", "content": question})
        
        # Appel à Claude
        reponse = client.messages.create(
            model="claude-sonnet-4-20250514",
            max_tokens=300,
            system=CONTEXTE,
            messages=messages
        )
        
        texte_reponse = reponse.content[0].text
        
        # Sauvegarder dans l'historique
        historique.append({
            "question": question,
            "reponse":  texte_reponse
        })
        
        return jsonify({
            "reponse": texte_reponse,
            "status":  "success"
        })
    
    except anthropic.APIError as e:
        return jsonify({"erreur": f"Erreur API Claude : {str(e)}"}), 503
    
    except Exception as e:
        return jsonify({"erreur": "Erreur interne du serveur"}), 500

@app.route('/reset', methods=['POST'])
def reset_historique():
    """Réinitialise l'historique de conversation"""
    historique.clear()
    return jsonify({"status": "Historique réinitialisé"})

if __name__ == '__main__':
    port = int(os.getenv("FLASK_PORT", 5000))
    debug = os.getenv("FLASK_DEBUG", "True") == "True"
    print(f"🤖 Chatbot Boukidan démarré sur http://localhost:{port}")
    app.run(port=port, debug=debug)
```

### Widget HTML à intégrer dans WordPress

**`chatbot/templates/chat_widget.html`**

```html
<!-- À coller dans : Apparence → Personnaliser → CSS/HTML additionnel -->
<!-- OU dans un bloc HTML personnalisé Kubio en bas de page -->

<div id="bouky-chat">
  <button id="bouky-toggle" onclick="toggleChat()">
    💬 Bouky — Guide
  </button>

  <div id="bouky-fenetre" style="display:none;">
    <div id="bouky-header">
      🏔️ Bouky — Guide de Boukidan
      <button onclick="toggleChat()" style="float:right;background:none;
        border:none;color:white;font-size:18px;cursor:pointer;">✕</button>
    </div>
    <div id="bouky-messages"></div>
    <div id="bouky-saisie">
      <input type="text" id="bouky-input"
             placeholder="Posez votre question..."
             onkeydown="if(event.key==='Enter') envoyerMessage()">
      <button onclick="envoyerMessage()">Envoyer</button>
    </div>
  </div>
</div>

<style>
#bouky-chat { position:fixed; bottom:24px; right:24px; z-index:9999;
              font-family:sans-serif; }
#bouky-toggle { background:#00B4D8; color:white; border:none;
                padding:12px 18px; border-radius:25px; cursor:pointer;
                font-size:14px; font-weight:bold; box-shadow:0 4px 12px rgba(0,0,0,0.2); }
#bouky-fenetre { width:320px; background:white; border-radius:12px;
                 box-shadow:0 8px 30px rgba(0,0,0,0.15);
                 margin-bottom:10px; overflow:hidden; }
#bouky-header { background:#00B4D8; color:white; padding:14px 16px;
                font-weight:bold; font-size:14px; }
#bouky-messages { height:280px; overflow-y:auto; padding:12px;
                  background:#f9f9f9; }
.bouky-msg-visiteur { text-align:right; margin:8px 0; }
.bouky-msg-bouky    { text-align:left;  margin:8px 0; }
.bouky-bulle { display:inline-block; padding:8px 12px; border-radius:12px;
               max-width:80%; font-size:13px; line-height:1.5; }
.bouky-msg-visiteur .bouky-bulle { background:#00B4D8; color:white; }
.bouky-msg-bouky    .bouky-bulle { background:#e8e8e8; color:#333; }
#bouky-saisie { display:flex; padding:10px; border-top:1px solid #eee; }
#bouky-input { flex:1; padding:8px 12px; border:1px solid #ddd;
               border-radius:20px; font-size:13px; outline:none; }
#bouky-saisie button { background:#00B4D8; color:white; border:none;
                       padding:8px 14px; border-radius:20px; margin-left:6px;
                       cursor:pointer; font-size:13px; }
.bouky-loading { color:#aaa; font-style:italic; font-size:12px; }
</style>

<script>
const CHATBOT_URL = 'http://localhost:5000/chat';

function toggleChat() {
    const fenetre = document.getElementById('bouky-fenetre');
    fenetre.style.display = fenetre.style.display === 'none' ? 'block' : 'none';
    if (fenetre.style.display === 'block') {
        document.getElementById('bouky-input').focus();
        if (!document.getElementById('bouky-messages').hasChildNodes()) {
            ajouterMessage('Bonjour ! Je suis Bouky, votre guide virtuel de Boukidan. Que souhaitez-vous savoir ? 🏔️', 'bouky');
        }
    }
}

function ajouterMessage(texte, auteur) {
    const zone = document.getElementById('bouky-messages');
    const div  = document.createElement('div');
    div.className = `bouky-msg-${auteur}`;
    div.innerHTML = `<span class="bouky-bulle">${texte}</span>`;
    zone.appendChild(div);
    zone.scrollTop = zone.scrollHeight;
}

async function envoyerMessage() {
    const input   = document.getElementById('bouky-input');
    const message = input.value.trim();
    if (!message) return;
    
    ajouterMessage(message, 'visiteur');
    input.value = '';
    
    // Indicateur de chargement
    const chargement = document.createElement('div');
    chargement.className = 'bouky-msg-bouky';
    chargement.innerHTML = '<span class="bouky-bulle bouky-loading">Bouky réfléchit...</span>';
    document.getElementById('bouky-messages').appendChild(chargement);
    
    try {
        const reponse = await fetch(CHATBOT_URL, {
            method:  'POST',
            headers: {'Content-Type': 'application/json'},
            body:    JSON.stringify({message})
        });
        
        const donnees = await reponse.json();
        chargement.remove();
        
        if (donnees.reponse) {
            ajouterMessage(donnees.reponse, 'bouky');
        } else {
            ajouterMessage("Désolé, une erreur est survenue. Réessayez !", 'bouky');
        }
    } catch {
        chargement.remove();
        ajouterMessage("Je suis temporairement indisponible. Contactez-nous via le formulaire !", 'bouky');
    }
}
</script>
```

### Lancer le chatbot

```bash
# Activer l'environnement virtuel
source venv/bin/activate      # Mac/Linux
venv\Scripts\activate         # Windows

# Lancer le serveur
python chatbot/app.py

# Output attendu :
# 🤖 Chatbot Boukidan démarré sur http://localhost:5000
# * Running on http://127.0.0.1:5000

# Tester l'endpoint health
curl http://localhost:5000/health
# {"service": "Chatbot Boukidan", "status": "ok"}

# Tester le chat
curl -X POST http://localhost:5000/chat \
  -H "Content-Type: application/json" \
  -d '{"message": "Quels sont les plats typiques de Boukidan ?"}'
```

---

## 📬 Formulaire de contact

Le formulaire utilise **Contact Form 7** côté WordPress et un script Python pour le traitement, la validation, la sauvegarde CSV et l'envoi de notifications.

### Configuration Contact Form 7

Dans `wp-admin → Contact → Add New`, voici le shortcode du formulaire :

```
[text* votre-nom placeholder "Votre nom complet"]
[email* votre-email placeholder "votre@email.com"]
[text* votre-sujet placeholder "Sujet de votre message"]
[textarea* votre-message placeholder "Votre message..."]
[submit "Envoyer le message"]
```

### Code Python — Traitement du formulaire

**`formulaire/traitement.py`**

```python
from flask import Flask, request, jsonify
from flask_cors import CORS
from validation import valider_formulaire
from email_service import envoyer_notification
import pandas as pd
import os
from datetime import datetime

app = Flask(__name__)
CORS(app)

FICHIER_CSV = "formulaire/data/contacts.csv"

def sauvegarder_contact(donnees):
    """Sauvegarde le contact dans un fichier CSV"""
    
    ligne = {
        "date":    datetime.now().strftime("%Y-%m-%d %H:%M:%S"),
        "nom":     donnees["nom"],
        "email":   donnees["email"],
        "sujet":   donnees["sujet"],
        "message": donnees["message"][:200]    # Tronquer à 200 caractères
    }
    
    # Créer le dossier si nécessaire
    os.makedirs("formulaire/data", exist_ok=True)
    
    # Ajouter au CSV existant ou créer un nouveau
    if os.path.exists(FICHIER_CSV):
        df = pd.read_csv(FICHIER_CSV)
        df = pd.concat([df, pd.DataFrame([ligne])], ignore_index=True)
    else:
        df = pd.DataFrame([ligne])
    
    df.to_csv(FICHIER_CSV, index=False, encoding="utf-8")
    print(f"  💾 Contact sauvegardé : {ligne['nom']} ({ligne['email']})")

@app.route('/contact', methods=['POST'])
def traiter_formulaire():
    """Traite une soumission de formulaire Contact Form 7"""
    
    try:
        donnees = request.get_json()
        
        # Validation des données
        erreurs = valider_formulaire(donnees)
        if erreurs:
            return jsonify({
                "status": "erreur",
                "erreurs": erreurs
            }), 400
        
        # Sauvegarde CSV
        sauvegarder_contact(donnees)
        
        # Notification email (optionnel)
        try:
            envoyer_notification(donnees)
        except Exception as e:
            print(f"  ⚠️ Email non envoyé : {e}")
        
        return jsonify({
            "status":  "success",
            "message": f"Merci {donnees['nom']}, votre message a été reçu !"
        })
    
    except Exception as e:
        print(f"  ❌ Erreur : {e}")
        return jsonify({"status": "erreur", "message": str(e)}), 500

@app.route('/contacts', methods=['GET'])
def lister_contacts():
    """Liste tous les contacts reçus (admin seulement)"""
    
    if not os.path.exists(FICHIER_CSV):
        return jsonify({"contacts": [], "total": 0})
    
    df = pd.read_csv(FICHIER_CSV)
    
    return jsonify({
        "contacts": df.to_dict(orient="records"),
        "total":    len(df)
    })

if __name__ == '__main__':
    print("📬 Serveur formulaire Boukidan démarré sur http://localhost:5001")
    app.run(port=5001, debug=True)
```

**`formulaire/validation.py`**

```python
import re

def valider_formulaire(donnees):
    """Valide les champs du formulaire avec des expressions régulières"""
    
    erreurs = []
    
    if not donnees:
        return ["Données manquantes"]
    
    # Validation du nom (2 à 50 caractères, lettres et espaces)
    nom = donnees.get("nom", "").strip()
    if not nom:
        erreurs.append("Le nom est obligatoire")
    elif not re.match(r'^[A-Za-zÀ-ÿ\s\-]{2,50}$', nom):
        erreurs.append("Le nom doit contenir entre 2 et 50 lettres")
    
    # Validation de l'email (format standard RFC 5322 simplifié)
    email = donnees.get("email", "").strip()
    if not email:
        erreurs.append("L'email est obligatoire")
    elif not re.match(r'^[\w\.-]+@[\w\.-]+\.[a-zA-Z]{2,6}$', email):
        erreurs.append("Format d'email invalide")
    
    # Validation du sujet (5 à 100 caractères)
    sujet = donnees.get("sujet", "").strip()
    if not sujet:
        erreurs.append("Le sujet est obligatoire")
    elif len(sujet) < 5 or len(sujet) > 100:
        erreurs.append("Le sujet doit contenir entre 5 et 100 caractères")
    
    # Validation du message (20 à 1000 caractères)
    message = donnees.get("message", "").strip()
    if not message:
        erreurs.append("Le message est obligatoire")
    elif len(message) < 20:
        erreurs.append("Le message est trop court (20 caractères minimum)")
    elif len(message) > 1000:
        erreurs.append("Le message est trop long (1000 caractères maximum)")
    
    # Protection anti-spam basique
    MOTS_SPAM = ["casino", "viagra", "bitcoin", "click here", "free money"]
    texte_complet = f"{sujet} {message}".lower()
    for mot in MOTS_SPAM:
        if mot in texte_complet:
            erreurs.append("Message détecté comme spam")
            break
    
    return erreurs
```

### Lancer le serveur de formulaires

```bash
# Terminal dédié
python formulaire/traitement.py

# Output attendu :
# 📬 Serveur formulaire Boukidan démarré sur http://localhost:5001
```

---

## 🔌 API REST WordPress

WordPress expose une API REST native. Voici comment l'utiliser avec Python :

```python
# scripts/api_wordpress.py

import requests
import os

WP_URL      = os.getenv("WP_URL", "http://localhost/monprojet")
WP_USER     = os.getenv("WP_USER", "admin")
WP_PASSWORD = os.getenv("WP_PASSWORD", "")

BASE = f"{WP_URL}/wp-json/wp/v2"

# Lire toutes les pages
def get_pages():
    r = requests.get(f"{BASE}/pages")
    return r.json()

# Lire tous les articles
def get_articles():
    r = requests.get(f"{BASE}/posts")
    return r.json()

# Créer un article
def creer_article(titre, contenu):
    r = requests.post(
        f"{BASE}/posts",
        json={"title": titre, "content": contenu, "status": "publish"},
        auth=(WP_USER, WP_PASSWORD)
    )
    return r.json()

# Supprimer un article
def supprimer_article(article_id):
    r = requests.delete(
        f"{BASE}/posts/{article_id}",
        auth=(WP_USER, WP_PASSWORD)
    )
    return r.status_code == 200
```

**Endpoints disponibles :**

| Endpoint | Méthode | Description |
|---|---|---|
| `/wp-json/wp/v2/posts` | GET | Lister les articles |
| `/wp-json/wp/v2/posts` | POST | Créer un article |
| `/wp-json/wp/v2/posts/{id}` | PUT | Modifier un article |
| `/wp-json/wp/v2/posts/{id}` | DELETE | Supprimer un article |
| `/wp-json/wp/v2/pages` | GET | Lister les pages |
| `/wp-json/wp/v2/media` | GET | Lister les médias |
| `/wp-json/wp/v2/comments` | GET | Lister les commentaires |

---

## ⚙️ Configuration

### Fichier `.env.example`

```env
# ── Anthropic (Claude AI) ────────────────────────────────
ANTHROPIC_API_KEY=sk-ant-votre-cle-api-ici

# ── WordPress ────────────────────────────────────────────
WP_URL=http://localhost/monprojet
WP_USER=admin
WP_PASSWORD=votre_mot_de_passe

# ── Flask ────────────────────────────────────────────────
FLASK_PORT=5000
FLASK_DEBUG=True

# ── Email (optionnel) ────────────────────────────────────
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USER=votre@gmail.com
SMTP_PASSWORD=votre_app_password
EMAIL_DESTINATAIRE=contact@boukidan.ma
```

### Fichier `.gitignore`

```gitignore
# Environnement Python
venv/
__pycache__/
*.pyc
*.pyo
.env

# Données sensibles
formulaire/data/contacts.csv
logs/

# WordPress
wp-config.php
wp-content/uploads/

# IDE
.vscode/
.idea/
*.swp
```

---

## ⚡ Démarrage rapide

```bash
# 1. Cloner le projet
git clone https://github.com/votre-username/boukidan.git
cd boukidan

# 2. Configurer l'environnement Python
python -m venv venv && source venv/bin/activate
pip install -r requirements.txt
cp .env.example .env
# → Éditer .env avec votre clé API Anthropic

# 3. Démarrer XAMPP (Apache + MySQL)
# Ouvrir http://localhost/monprojet pour vérifier WordPress

# 4. Lancer le chatbot (Terminal 1)
python chatbot/app.py

# 5. Lancer le formulaire (Terminal 2)
python formulaire/traitement.py

# 6. Visiter le site
open http://localhost/monprojet
```

---

## 👤 Auteur

**Bouchrariabi** — Étudiant Ingénieur TDIA  
École Nationale des Sciences Appliquées d'Al Hoceima (ENSAH)  
Université Abdelmalek Essaâdi

- 📧 Email : `bouchrarabi@site`
- 🌍 Site  : `http://localhost/monprojet`
- 📍 Lieu  : Boukidan, Al Hoceima, Maroc

---

## 📄 Licence

Ce projet est sous licence **MIT**. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

```
MIT License — Copyright (c) 2026 Bouchrariabi
Permission is hereby granted, free of charge, to any person obtaining
a copy of this software to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software.
```

---

<div align="center">

**Fait avec ❤️ à Boukidan · Powered by WordPress + Python + Claude AI**

*© 2026 boukidan · Created with WordPress and Kubio*

</div>

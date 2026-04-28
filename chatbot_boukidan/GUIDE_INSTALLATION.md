# 🏡 Guide d'installation — Chatbot Boukidan

## 📁 Fichiers fournis
- `api.py` → Le serveur Python (cerveau du chatbot)
- `requirements.txt` → Les dépendances Python
- `widget_wordpress.html` → Le widget à coller dans WordPress

---

## ⚙️ ÉTAPE 1 — Installer et lancer le chatbot Python

### 1.1 Installer les dépendances
Ouvrez un terminal dans le dossier du projet et tapez :
```bash
pip install -r requirements.txt
```

### 1.2 Lancer le serveur
```bash
python api.py
```
✅ Vous devez voir : `🚀 Chatbot Boukidan démarré sur http://localhost:5000`

### 1.3 Tester localement
Ouvrez votre navigateur sur : http://localhost:5000
Vous devez voir : `{"status": "✅ Chatbot Boukidan actif"}`

---

## 🌐 ÉTAPE 2 — Exposer le chatbot sur Internet (ngrok)

### 2.1 Télécharger ngrok
Rendez-vous sur : https://ngrok.com/download
Téléchargez la version pour votre système (Windows/Mac/Linux)

### 2.2 (Optionnel mais recommandé) Créer un compte gratuit
Sur https://ngrok.com — pour avoir une URL stable

### 2.3 Lancer ngrok
Dans un NOUVEAU terminal (laissez api.py tourner) :
```bash
ngrok http 5000
```

### 2.4 Récupérer l'URL publique
Ngrok affiche quelque chose comme :
```
Forwarding  https://abc123.ngrok-free.app → http://localhost:5000
```
📌 Copiez cette URL (ex: https://abc123.ngrok-free.app)

---

## 🌿 ÉTAPE 3 — Intégrer le widget dans WordPress

### 3.1 Ouvrir le fichier widget_wordpress.html
Trouvez cette ligne et remplacez l'URL :
```javascript
const BOUKIDAN_API = "https://VOTRE_URL_NGROK.ngrok-free.app/chat";
```
Par votre vraie URL ngrok :
```javascript
const BOUKIDAN_API = "https://abc123.ngrok-free.app/chat";
```

### 3.2 Coller dans WordPress
**Option A (recommandée) — Extension "Insert Headers and Footers" :**
1. Installez l'extension depuis WordPress → Extensions → Ajouter
2. Allez dans Réglages → Insert Headers and Footers
3. Collez le code dans la section **"Scripts in Footer"**
4. Sauvegardez

**Option B — Via l'éditeur Kubio :**
1. Éditez une page avec Kubio
2. Ajoutez un bloc "HTML personnalisé"
3. Collez le code du widget

### 3.3 Vérifier
Visitez votre site → vous devez voir le bouton 🌿 en bas à droite !

---

## 🗣️ Sujets reconnus par le chatbot

| Sujet | Mots-clés reconnus |
|---|---|
| 📍 Localisation | où, situé, province, région, Al Hoceima... |
| 🏖️ Plages | plage, mer, Souani, Sfiha, baignade... |
| 🏔️ Activités | quad, montagne, randonnée, aventure... |
| 🏛️ Histoire | histoire, culture, rifain, tradition... |
| 🍽️ Restauration | restaurant, kefta, sardine, manger... |
| ☕ Cafés | café, étudiant, wifi, thé... |
| 🏫 Services | ENSAH, FST, pharmacie, école... |
| 📞 Contact | mairie, contact, téléphone... |

---

## ✏️ Personnaliser les réponses

Ouvrez `api.py` et modifiez les textes dans le dictionnaire `connaissances`.
Chaque entrée contient :
- `mots_cles` : les mots qui déclenchent cette réponse
- `reponse` : le texte affiché à l'utilisateur

---

## ⚠️ Important

- Le serveur Python doit être **toujours allumé** pour que le chatbot fonctionne
- L'URL ngrok **change à chaque redémarrage** (sauf compte payant)
- Pour une solution permanente, hébergez `api.py` sur un VPS ou Railway.app

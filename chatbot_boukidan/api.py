from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

# ─── Base de connaissances Boukidan ───────────────────────────────────────────

connaissances = {
    "localisation": {
        "mots_cles": ["où", "localisation", "situé", "situation", "region", "région", "province", "wilaya", "adresse", "trouver", "carte", "accès", "acces"],
        "reponse": "📍 Boukidan est un village rifain situé dans la province d'Al Hoceima, région du Rif au nord du Maroc. Il est idéalement placé entre la ville d'Imzouren et la ville d'Al Hoceima, ce qui le rend très accessible."
    },
    "tourisme_plages": {
        "mots_cles": ["plage", "mer", "baignade", "souani", "sfiha", "nager", "plages", "côte", "cote", "beach"],
        "reponse": "🏖️ Boukidan est proche de deux magnifiques plages :\n\n• **Plage Souani** — une plage calme et pittoresque, idéale pour se détendre.\n• **Plage Sfiha** — un cadre naturel superbe pour profiter de la mer.\n\nLes deux plages sont facilement accessibles depuis le village."
    },
    "tourisme_activites": {
        "mots_cles": ["quad", "montagne", "activité", "activite", "randonnée", "randonner", "sport", "aventure", "nature", "balade", "découvrir", "decouvrir", "faire"],
        "reponse": "🏔️ Boukidan offre plusieurs activités de plein air :\n\n• **Quad** — explorez les pistes et les reliefs du Rif en quad.\n• **Randonnées en montagne** — les montagnes environnantes offrent des panoramas exceptionnels sur le Rif et la Méditerranée.\n• **Découverte de la nature** — paysages sauvages et authentiques à explorer à pied ou à vélo."
    },
    "tourisme_general": {
        "mots_cles": ["visiter", "tourisme", "touriste", "voyage", "vacances", "séjour", "sejour", "voir", "attractions", "sites"],
        "reponse": "🌄 Boukidan est une destination authentique dans le Rif marocain ! Voici ce que vous pouvez y faire :\n\n🏖️ Visiter les plages Souani et Sfiha\n🏔️ Faire du quad et découvrir les montagnes\n🍽️ Déguster la cuisine locale (kefta, sardines, plats marocains)\n☕ Profiter des cafés avec espaces étudiants\n\nVous souhaitez plus de détails sur l'une de ces activités ?"
    },
    "histoire": {
        "mots_cles": ["histoire", "historique", "origine", "culture", "tradition", "rifain", "rif", "patrimoine", "identité", "identite", "nom", "fondation"],
        "reponse": "🏛️ Boukidan est un village rifain authentique, ancré dans la riche culture berbère du Rif marocain. Il incarne les traditions et le mode de vie rifain, avec une identité culturelle forte transmise de génération en génération. Le village fait partie de cette région historique du Rif, connue pour sa résistance, son hospitalité et ses paysages montagneux."
    },
    "restauration": {
        "mots_cles": ["restaurant", "manger", "nourriture", "cuisine", "kefta", "sardine", "plat", "repas", "gastronomie", "spécialité", "specialite", "boulangerie", "pain"],
        "reponse": "🍽️ Boukidan propose une belle offre culinaire :\n\n• **Restaurants** — spécialisés dans la kefta grillée, les sardines fraîches et les plats marocains traditionnels.\n• **Boulangeries** — pain frais et pâtisseries locales.\n\nLa cuisine locale est simple, généreuse et authentique — un vrai régal pour les visiteurs !"
    },
    "cafes": {
        "mots_cles": ["café", "cafe", "cafés", "espace", "etudiant", "étudiant", "wifi", "travailler", "détente", "detente", "thé", "the"],
        "reponse": "☕ Boukidan dispose de plusieurs cafés avec des espaces étudiants, idéaux pour travailler, réviser ou simplement se détendre. Une ambiance conviviale typiquement marocaine vous y attend !"
    },
    "services": {
        "mots_cles": ["service", "pharmacie", "école", "ecole", "université", "universite", "santé", "sante", "ensah", "fst", "médecin", "medecin", "soin", "marché", "marche", "commerce"],
        "reponse": "🏫 Boukidan et ses environs offrent plusieurs services essentiels :\n\n🎓 **Enseignement supérieur** :\n• ENSAH (École Nationale des Sciences Appliquées d'Al Hoceima)\n• FST (Faculté des Sciences et Techniques)\n\n💊 **Santé** : Pharmacies disponibles dans le village\n\n🥖 **Commerce** : Boulangeries, cafés, restaurants\n\nLe village est bien desservi grâce à sa proximité avec Imzouren et Al Hoceima."
    },
    "contact": {
        "mots_cles": ["contact", "mairie", "commune", "téléphone", "telephone", "email", "appeler", "joindre", "administer", "administration"],
        "reponse": "📞 Pour contacter la commune de Boukidan, rapprochez-vous de la mairie locale ou des autorités municipales d'Al Hoceima. Les coordonnées seront bientôt disponibles sur ce site."
    },
    "salutation": {
        "mots_cles": ["bonjour", "salam", "salut", "bonsoir", "hello", "hi", "ahlan", "مرحبا", "السلام"],
        "reponse": "👋 Bonjour et bienvenue sur le site du village de Boukidan ! Je suis votre assistant virtuel.\n\nJe peux vous renseigner sur :\n🏖️ Le tourisme et les plages\n🏔️ Les activités (quad, montagne...)\n🏛️ L'histoire et la culture rifaine\n🍽️ Les restaurants et spécialités locales\n🏫 Les services du village\n\nQue souhaitez-vous savoir ?"
    },
    "merci": {
        "mots_cles": ["merci", "شكرا", "thank", "parfait", "super", "excellent", "bien", "bravo"],
        "reponse": "😊 Avec plaisir ! N'hésitez pas si vous avez d'autres questions sur Boukidan. Bonne visite ! 🌿"
    }
}

REPONSE_DEFAUT = (
    "🤔 Je n'ai pas bien compris votre question. "
    "Vous pouvez me demander des informations sur :\n\n"
    "🏖️ Les plages (Souani, Sfiha)\n"
    "🏔️ Les activités (quad, montagne)\n"
    "🏛️ L'histoire et la culture de Boukidan\n"
    "🍽️ Les restaurants et spécialités\n"
    "🏫 Les services (ENSAH, FST, pharmacies...)\n"
    "📍 La localisation du village\n\n"
    "Posez votre question en français ou en darija !"
)

# ─── Moteur de recherche de réponse ──────────────────────────────────────────

def get_reponse(message: str) -> str:
    msg = message.lower().strip()
    
    meilleur_score = 0
    meilleure_reponse = REPONSE_DEFAUT

    for sujet, data in connaissances.items():
        score = sum(1 for mot in data["mots_cles"] if mot in msg)
        if score > meilleur_score:
            meilleur_score = score
            meilleure_reponse = data["reponse"]

    return meilleure_reponse

# ─── Route API ────────────────────────────────────────────────────────────────

@app.route("/", methods=["POST"])
def chat():
    data = request.get_json()
    if not data or "message" not in data:
        return jsonify({"error": "Message manquant"}), 400
    
    message = data["message"]
    reponse = get_reponse(message)
    return jsonify({"reponse": reponse})

@app.route("/", methods=["GET"])
def index():
    return jsonify({"status": "✅ Chatbot Boukidan actif", "version": "1.0"})

if __name__ == "__main__":
    print("🚀 Chatbot Boukidan démarré sur http://localhost:5000")
    app.run(host="0.0.0.0", port=5000, debug=True)

import matplotlib.pyplot as plt
from matplotlib.patches import Rectangle
from matplotlib.backends.backend_pdf import PdfPages

# Définir les couleurs
colors = {
    "primary": "#4A90E2",
    "secondary": "#50E3C2",
    "tertiary": "#F5A623",
    "background": "#F0F2F5",
    "text": "#333333",
    "section_bg": "#E0E0E0"
}

# Générer des maquettes simples
def create_wireframe(ax, title):
    ax.set_title(title, fontsize=16, weight='bold', color=colors['text'])
    ax.set_facecolor(colors['background'])
    ax.grid(False)
    ax.set_xticks([])
    ax.set_yticks([])
    ax.plot([0.1, 0.9], [0.8, 0.8], color=colors['primary'], linewidth=10)
    ax.plot([0.1, 0.9], [0.6, 0.6], color=colors['secondary'], linewidth=10)
    ax.plot([0.1, 0.9], [0.4, 0.4], color=colors['tertiary'], linewidth=10)

# Créer le document PDF
pdf_path = "/mnt/data/charte_graphique_stylée.pdf"
with PdfPages(pdf_path) as pdf:
    # Page de titre
    fig, ax = plt.subplots(figsize=(10, 5))
    ax.text(0.5, 0.8, "Charte Graphique", fontsize=32, weight='bold', ha='center', color=colors['primary'])
    ax.text(0.5, 0.6, "Présentation des couleurs et polices", fontsize=18, ha='center', color=colors['text'])
    ax.add_patch(Rectangle((0, 0.55), 1, 0.02, color=colors['secondary'], transform=ax.transAxes, clip_on=False))
    ax.set_axis_off()
    pdf.savefig(fig)
    plt.close()
    
    # Palette de couleurs
    fig, ax = plt.subplots(figsize=(10, 5))
    ax.set_facecolor(colors['section_bg'])
    ax.text(0.5, 0.9, "Palette de Couleurs", fontsize=24, weight='bold', ha='center', color=colors['primary'])
    ax.text(0.1, 0.7, "Couleur Principale: #4A90E2", fontsize=14, ha='left', color=colors['primary'])
    ax.text(0.1, 0.6, "Couleur Secondaire: #50E3C2", fontsize=14, ha='left', color=colors['secondary'])
    ax.text(0.1, 0.5, "Couleur Tertiaire: #F5A623", fontsize=14, ha='left', color=colors['tertiary'])
    ax.text(0.1, 0.4, "Couleur de Fond: #F0F2F5", fontsize=14, ha='left', color=colors['background'])
    ax.text(0.1, 0.3, "Couleur de Texte: #333333", fontsize=14, ha='left', color=colors['text'])
    ax.add_patch(Rectangle((0, 0.25), 1, 0.02, color=colors['secondary'], transform=ax.transAxes, clip_on=False))
    ax.set_axis_off()
    pdf.savefig(fig)
    plt.close()
    
    # Polices de caractères
    fig, ax = plt.subplots(figsize=(10, 5))
    ax.set_facecolor(colors['section_bg'])
    ax.text(0.5, 0.9, "Polices de Caractères", fontsize=24, weight='bold', ha='center', color=colors['primary'])
    ax.text(0.1, 0.7, "Titre: Montserrat, sans-serif", fontsize=14, ha='left', color=colors['text'])
    ax.text(0.1, 0.6, "Texte Courant: Open Sans, sans-serif", fontsize=14, ha='left', color=colors['text'])
    ax.text(0.1, 0.5, "Exemple de Titre: This is a Title", fontsize=18, weight='bold', ha='left', color=colors['text'], fontname='Montserrat')
    ax.text(0.1, 0.4, "Exemple de Texte: This is a sample text for demonstrating the font.", fontsize=14, ha='left', color=colors['text'], fontname='Open Sans')
    ax.add_patch(Rectangle((0, 0.35), 1, 0.02, color=colors['secondary'], transform=ax.transAxes, clip_on=False))
    ax.set_axis_off()
    pdf.savefig(fig)
    plt.close()

    # Maquettes
    fig, axs = plt.subplots(3, 2, figsize=(10, 15))
    axs[0, 0].set_facecolor(colors['section_bg'])
    axs[1, 0].set_facecolor(colors['section_bg'])
    axs[2, 0].set_facecolor(colors['section_bg'])
    axs[0, 1].set_facecolor(colors['section_bg'])
    axs[1, 1].set_facecolor(colors['section_bg'])
    axs[2, 1].set_facecolor(colors['section_bg'])

    create_wireframe(axs[0, 0], " Bureautique - Page d'Accueil")
    create_wireframe(axs[1, 0], " Bureautique - Page de Contact")
    create_wireframe(axs[2, 0], " Bureautique - Tableau de Bord")
    
    create_wireframe(axs[0, 1], " Mobile - Page d'Accueil")
    create_wireframe(axs[1, 1], " Mobile - Page de Contact")
    create_wireframe(axs[2, 1], " Mobile - Tableau de Bord")
    
    pdf.savefig(fig)
    plt.close()

# Lien pour télécharger le PDF
pdf_path

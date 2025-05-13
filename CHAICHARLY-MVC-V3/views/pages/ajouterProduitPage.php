<link rel="stylesheet" href="public/css/ajouterProduit.css">
<button id="themeToggle" class="btn-theme">🌙 Mode sombre</button>

<div class="ajoutervin-container">
    <h1>➕ Ajouter un nouveau produit</h1>
    

    <a href="Moderation" class="btn-retour">⬅ Retour à l’espace admin</a>

    <form method="POST" enctype="multipart/form-data" action="">
            <label>Nom du vin :</label>
            <input type="text" name="nom" required>

            <label>Description :</label>
            <textarea name="descLong" required></textarea>

            <label>Tarif unitaire (€) :</label>
            <input type="text" name="tarifUnit" required>

            <label>Tarif en carton (€) :</label>
            <input type="text" name="tarifCart" required>

            <label>Catégorie :</label>
            <select name="codeCat" required>
                <option value="RG">Rouge</option>
                <option value="RO">Rosé</option>
                <option value="BL">Blanc</option>
                <option value="BIO">Bio</option>
                <option value="MO">Mousseux</option>
                <option value="BIB">Bag in Box</option>
            </select>

            <label>Image (fichier) :</label>
            <input type="file" name="imgFile" accept="image/*" required>

            <label for="stock">Stock :</label>
            <select name="stock" id="stock" required>
                <option value="1">🟢 En stock</option>
                <option value="0">🟠 Sur demande</option>
            </select>

        <button type="submit" name="ajouter">✅ Ajouter</button>
    </form>
</div>

<script>
  const savedTheme = localStorage.getItem('theme');

  if (savedTheme === 'dark') {
    document.body.classList.add('dark-mode');
  }

  const btn = document.getElementById('themeToggle');
  if (btn) {
    if (document.body.classList.contains('dark-mode')) {
      btn.textContent = '☀ Mode clair';
    } else {
      btn.textContent = '🌙 Mode sombre';
    }

    btn.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
      const isDark = document.body.classList.contains('dark-mode');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      btn.textContent = isDark ? '☀ Mode clair' : '🌙 Mode sombre';
    });
  }
</script>


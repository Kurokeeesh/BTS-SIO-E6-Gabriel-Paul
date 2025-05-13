<div class="nb">
    <p>
        Nous nous reservons le droit de changer de millésime lorsque le précédent est épuisé et à cette occasion d'éventuellement modifier le tarif.
        <?php //showArray($produit); showArray($produit1); showArray($produit2); showArray($produit3); showArray($produit4); showArray($produit5);?>
    </br>
    </br>
        Les prix TTC intègrent les frais de livraison dans les départements 63 et 34.
    </br>
    </br>
    </p>
    <p class="stocke">
        🟢 En stock - 🟠 Sur demande
    </p>
</div>
<div class="nav">
    <nav>
        <ul>
            <li><a href="#rouges">Rouges</a></li>
            <li><a href="#rosés">Rosés</a></li>
        </ul>
    </nav>
    <nav>
        <ul>
            <li><a href="#blancs">Blancs</a></li>
            <li><a href="#bios">Bios</a></li>
        </ul>
    </nav>
    <nav>
        <ul>
            <li><a href="#mousseux">Mousseux</a></li>
            <li><a href="#BIB">BagInBox</a></li>
        </ul>
    </nav>
</div>
<div class="divvin" id="rouges">
    <h1>Nos Rouges</h1>
        <div class="grid-vin">
            <?php 
                foreach($produit as $produit){
                    require "views/components/cardRouge.php";
                }
            ?>
        </div>
</div>
<div class="divvin" id="rosés">
    <h1>Nos Rosés</h1>
        <div class="grid-vin">
            <?php 
                foreach($produit1 as $produit1){
                    require "views/components/cardRose.php";
                }
            ?>
        </div>
</div>
<div class="divvin" id="blancs">
    <h1>Nos Blancs</h1>
    <div class="grid-vin">
            <?php 
                foreach($produit2 as $produit2){
                    require "views/components/cardBlanc.php";
                }
            ?>
        </div>
</div>
<div class="divvin" id="bios">
    <h1>Les Bios (sur demande)</h1>
        <div class="grid-vin">
            <?php 
                foreach($produit3 as $produit3){
                    require "views/components/cardBio.php";
                }
            ?>
        </div>
</div>
<div class="divvin" id="mousseux">
    <h1>Mousseux (sur demande)</h1>
        <div class="grid-vin">
            <?php 
                foreach($produit4 as $produit4){
                    require "views/components/cardMo.php";
                }
            ?>
        </div>
</div>
<div class="divvin" id="BIB">
    <h1>Bag In Box - BIB (sur demande)</h1>
        <div class="grid-vin">
            <?php 
                foreach($produit5 as $produit5){
                    require "views/components/cardBIB.php";
                }
            ?>
        </div>
</div>

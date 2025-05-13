<div class="vin">
    <img src="<?=$produit['imgUrl']?>" id="rose-rouge" height="411px" width="344px" alt="Rose De Sigoulès">
    <h2><?=((int)$produit['stock']===1) ? '🟢' : '🟠' ?><?=$produit['nom']?> </h2>
    </br>
    <h4>Prix TTC bouteille : <?=$produit['tarifUnit']?></h4>
    <h4>Prix TTC carton (6 bouteilles) : <?=$produit['tarifCart']?></h4>
    </br>
    <p><?=$produit['descLong']?></p>
</div>

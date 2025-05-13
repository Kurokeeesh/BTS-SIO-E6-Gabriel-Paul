<div class="vin">
    <img src="<?=$produit3['imgUrl']?>" id="rose-rouge" height="411px" width="344px" alt="Rose De Sigoulès">
    <h2><?=((int)$produit3['stock']===1) ? '🟢' : '🟠' ?> <?=$produit3['nom']?> </h2>
    </br>
    <h4>Prix TTC bouteille : <?=$produit3['tarifUnit']?></h4>
    <h4>Prix TTC carton (6 bouteilles) : <?=$produit3['tarifCart']?></h4>
    </br>
    <p><?=$produit3['descLong']?></p>
</div>
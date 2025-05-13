<div class="vin">
    <img src="<?=$produit4['imgUrl']?>" id="rose-rouge" height="411px" width="344px" alt="Rose De Sigoulès">
    <h2><?=((int)$produit4['stock']===1) ? '🟢' : '🟠' ?> <?=$produit4['nom']?> </h2>
    </br>
    <h4>Prix TTC bouteille : <?=$produit2['tarifUnit']?></h4>
    <h4>Prix TTC carton (6 bouteilles) : <?=$produit4['tarifCart']?></h4>
    </br>
    <p><?=$produit4['descLong']?></p>
</div>

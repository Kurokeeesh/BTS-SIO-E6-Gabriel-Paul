
<div class="vin">
    <img src="<?=$produit2['imgUrl']?>" id="rose-rouge" height="411px" width="344px" alt="Rose De Sigoulès">
    <h2><?=((int)$produit2['stock']===1) ? '🟢' : '🟠' ?> <?=$produit2['nom']?> </h2>
    </br>
    <h4>Prix TTC bouteille : <?=$produit2['tarifUnit']?></h4>
    <h4>Prix TTC carton (6 bouteilles) : <?=$produit2['tarifCart']?></h4>
    </br>
    <p><?=$produit2['descLong']?></p>
</div>

<div class="vin">
    <img src="<?=$produit5['imgUrl']?>" id="rose-rouge" height="411px" width="344px" alt="Rose De Sigoulès">
    <h2><?=((int)$produit5['stock']===1) ? '🟢' : '🟠' ?> <?=$produit5['nom']?> </h2>
    </br>
    <h4>Prix TTC bouteille : <?=$produit5['tarifUnit']?></h4>
    <h4>Prix TTC carton (6 bouteilles) : <?=$produit5['tarifCart']?></h4>
    </br>
    <p><?=$produit5['descLong']?></p>
</div>
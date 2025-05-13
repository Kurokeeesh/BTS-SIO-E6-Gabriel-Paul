
<div class="vin">
    <img src="<?=$produit1['imgUrl']?>" id="rose-rouge" height="411px" width="344px" alt="Rose De Sigoulès">
    <h2><?=((int)$produit1['stock']===1) ? '🟢' : '🟠' ?> <?=$produit1['nom']?> </h2>
    </br>
    <h4>Prix TTC bouteille : <?=$produit1['tarifUnit']?></h4>
    <h4>Prix TTC carton (6 bouteilles) : <?=$produit1['tarifCart']?></h4>
    </br>
    <p><?=$produit1['descLong']?></p>
</div>

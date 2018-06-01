<?php
	include("../../modulos/funciones.php");
	echo rutas("Inventario",1,[""],["0"],["0"]);
?>

<div class="row">
    <section class="plans-container" id="plans">
        <a href="#inventory/products/view/" onclick="cargar('inventory/products/view/')">
          	<article class="col s12 m6 l2">
        	    <div class="card">
                    <div class="card-image #ffca28 amber darken-1 waves-effect">
             	        <div class="card-title">PRODUCTOS</div>
                	    <div class="price"><i class="medium mdi-action-wallet-travel"></i></div>
                    </div>
                </div>
            </article>
        </a>
        <a href="#inventory/kardex/" onclick="cargar('inventory/kardex//')">
          	<article class="col s12 m6 l2">
        	    <div class="card">
                    <div class="card-image #81c784 green lighten-2 waves-effect">
             	        <div class="card-title">KARDEX</div>
                	    <div class="price"><i class="medium mdi-action-wallet-travel"></i></div>
                    </div>
                </div>
            </article>
        </a>
        <a href="#inventory/in-output/" onclick="cargar('inventory/in-output/')">
          	<article class="col s12 m6 l2">
        	    <div class="card">
                    <div class="card-image #4fc3f7 light-blue lighten-2 waves-effect">
             	        <div class="card-title">ENT/SAL (AJUS)</div>
                	    <div class="price"><i class="medium mdi-action-wallet-travel"></i></div>
                    </div>
                </div>
            </article>
        </a>
        <a href="#inventory/groupsandbrands/" onclick="cargar('inventory/groupsandbrands/')">
          	<article class="col s12 m6 l2">
        	    <div class="card">
                    <div class="card-image #ab47bc purple lighten-1 waves-effect">
             	        <div class="card-title">GRUPOS Y MARCAS</div>
                	    <div class="price"><i class="medium mdi-action-wallet-travel"></i></div>
                    </div>
                </div>
            </article>
        </a>
        <a href="#inventory/kardex/" onclick="cargar('inventory/kardex//')">
          	<article class="col s12 m6 l2">
        	    <div class="card">
                    <div class="card-image #d4e157 lime lighten-1 waves-effect">
             	        <div class="card-title">TRANSFORMACION</div>
                	    <div class="price"><i class="medium mdi-action-wallet-travel"></i></div>
                    </div>
                </div>
            </article>
        </a>
        <a href="#inventory/kardex/" onclick="cargar('inventory/kardex//')">
          	<article class="col s12 m6 l2">
        	    <div class="card">
                    <div class="card-image #8d6e63 brown lighten-1 waves-effect">
             	        <div class="card-title">MOV. ENT/SAL</div>
                	    <div class="price"><i class="medium mdi-action-wallet-travel"></i></div>
                    </div>
                </div>
            </article>
        </a>
    </section>
</div>
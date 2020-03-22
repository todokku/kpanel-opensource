<?php 
if (Account::isAuthentified()) {
?>

<div id="rules" class="tab-pane fade">
	<div class="row">
		<div class="col-md-12" style="margin-bottom: 10px; margin-top: 10px;">
			<div class="panel panel-default">
<div class="text-center" style="margin-top: 10px;">
<i class="fa fa-file-text-o fa-4x" aria-hidden="true" style="margin-top: 15px;"></i>
<h3 class="mb-3">Règlement</h3>
<p class="text-muted">Tout non respect du règlement ce résulterat d'un bannisement permanent.</p>
</div>
<div class="row pt-5">
<div class="col-lg-5 offset-lg-1">
<div>
<div class="faq-question-q-box">Q.</div>
<h4 class="faq-question" data-wow-delay=".1s">Est-ce que je peux donner, vendre ou prêter mon compte kPanel ?</h4>
<p class="faq-answer mb-4">Non le partage, la vente ou le prêt de sont compte kPanel est strictement interdit sauf sous autorisation.</p>
</div>
<div>
<div class="faq-question-q-box">Q.</div>
<h4 class="faq-question">Mauvaise utilisation de kPanel</h4>
<p class="faq-answer mb-4">Toute utilisation du panel kPanel ayant pour but d'affecter le site, les machines du panel, le panel, les admins du panel ou les acheteurs du panel kPanel et/ou la Kalysia, les membres de la Kalysia ou les acheteurs de leurs produits de façon négative est interdite et se résultera par un bannissement.</p>
</div>
<div>
<div class="faq-question-q-box">Q.</div>
<h4 class="faq-question">Est-ce que j'ai le droit de me servir de kPanel pour me faire de l'argent ?</h4>
<p class="faq-answer mb-4">La vente de service lier à kPanel est autorisé sous certaines conditions.</p>
</div>
<div>
<div class="faq-question-q-box">Q.</div>
<h4 class="faq-question" data-wow-delay=".1s">Est-ce que j'ai le droit de me servir de kPanel ou autre chose liée à kPanel pour me faire de l'argent ?</h4>
<p class="faq-answer mb-4">Oui, recevoir de l'argent grâce à kPanel ou vendre un service, objet, logiciel, contenu vidéo ect liée à kPanel et ses membres et/ou à Kalysia et ses membres est autorisé sous certaines conditions (exemple: Retirer une backdoor d'un serveur, vendre un dll, vendre des payload/visuels, vendre des menus, scam une personne, vendre des info sur un serveur etc)</p>
</div>
<div>
<div class="faq-question-q-box">Q.</div>
<h4 class="faq-question" data-wow-delay=".1s">L'utilisation de double compte ?</h4>
<p class="faq-answer mb-4">Il est interdit d'utiliser des doubles compte.</p>
</div>


</div>
<div class="col-lg-5 offset-lg-1">
<div>
<div class="faq-question-q-box">Q.</div>
<h4 class="faq-question">kPanel propose t'il un programme de <a href="https://fr.wikipedia.org/wiki/Bug_bounty" target="_newblank">Bug bounty</a> ?</h4>
<p class="faq-answer mb-4">Toute personne rapportant des bugs/exploits sur kPanel sera récompensée en fonction de la gravité du bug/exploit s'il ne détruit pas kPanel avec. (Il est possible que le bug soit tout petit et qu'il n'y est aucune récompense, car pas assez important).</p>
</div>
<div>
<div class="faq-question-q-box">Q.</div>
<h4 class="faq-question">Règlement Social</h4>
<p class="faq-answer mb-4">Toute alliance avec une équipe, une écurie, une armée, un arsenal, une bande, une brigade, un camp, un collectif, un escadron, une escouade, une formation, un laboratoire, un peloton, un régiment, une team, une troupe et/ou une union de personnes hostiles à kPanel et/ou le site, les machines du panel, le panel, les admins du panel ou les acheteurs du panel kPanel et/ou à Kalysia, les membres de la Kalysia ou les acheteurs de leurs produits se résultera par un bannissement.</p>
</div>

<div>
<div class="faq-question-q-box">Q.</div>
<h4 class="faq-question" data-wow-delay=".1s">Règlement du Workshop Steam</h4>
<p class="faq-answer mb-4">Il est interdit de poster des backdoors sur le workshop steam quel que soit l'addons ou les serveurs qu'ils l'ont dans leurs collections.</p>
</div>
<div>
<div class="faq-question-q-box">Q.</div>
<h4 class="faq-question" data-wow-delay=".1s">J'ai le droit de récupérer les html de kPanel ?</h4>
<p class="faq-answer mb-4">Non il vous est totalement interdit de récuperer les html du panel kPanel sauf sous certaines conditions.</p>
</div>
</div>
</div>		
			</div>
		</div>
	</div>
</div>

<style>
.faq-question-q-box {
    height: 30px;
    width: 30px;
    color: #6658dd;
    text-align: center;
    border-radius: 50%;
    float: left;
    font-weight: 700;
    line-height: 30px;
    background-color: rgba(102,88,221,.15);
}
.faq-question {
    margin-top: 0;
    margin-left: 50px;
    font-weight: 400;
    font-size: 16px;
}
.faq-answer {
    margin-left: 50px;
    color: #98a6ad;
}
.offset-lg-1 {
    margin-left: 2.33333%;
}
.mb-3, .my-3 {
    margin-bottom: 0.5rem!important;
}
.pt-5, .py-5 {
    padding-top: 4.5rem!important;
}
</style>

<?php }?>

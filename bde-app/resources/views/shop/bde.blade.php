<h1>Nouvelle Commande</h1>

<p>Bonjour, {{$user->first_name}} {{$user->surname}} vient de commander les articles suivants sur la boutique du BDE</p>

<table style="border: solid 1px black; border-collapse:collapse">
	<thead>
		<tr>
			<th style="border: solid 1px black; padding:5px">Article</th>
			<th style="border: solid 1px black; padding:5px">Quantité</th>
			<th style="border: solid 1px black; padding:5px">Prix</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($items as $item)
	<tr>
		<td style="border: solid 1px black; padding:5px">{{$item->name}}</td>
		<td style="border: solid 1px black; padding:5px">{{$item->quantity}}</td>
		<td style="border: solid 1px black; padding:5px">{{$item->price_total}}</td>
	</tr>
	@endforeach
	</tbody>
</table>

<p>Merci de bien vouloir le contacter à l'adresse {{$user->mail}} pour convenir d'un rendez-vous pour la livraison</p>
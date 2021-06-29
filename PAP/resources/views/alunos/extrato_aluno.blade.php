<h3 style="text-align: center;">Transações de {{$aluno->nome}}</h3><br>
<div class="container-fluid">
	<div class="container-fluid">
		<div class="row">
			@foreach($mov as $m)
				<div class="col-md-4 text-white bg-secondary">
						{{$m->tipo_movimento}}
				</div>
				@if($m->tipo_movimento=='carregamento')
					<div class="col-md-4 text-success bg-secondary">
						+{{$m->carregamento}}
					</div>
				@else
					<div class="col-md-4 text-danger bg-secondary">
						-{{$m->carregamento}}
					</div>
				@endif
				<div class="col-md-4 text-white bg-secondary">
					{{$m->created_at->format('d/m/Y H:m:s')}}
				</div>
			@endforeach	
		</div>
	</div>
</div>
{!!Form::open(array('url'=>'cadastro/tipos', 'method' =>'GET',
'autocomplete'=>'off', 'role' => 'search'))!!}

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText"
		placeholder="buscar..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">
				Buscar
			</button>
		</span>		
	</div>	
</div>

{{Form::close()}}
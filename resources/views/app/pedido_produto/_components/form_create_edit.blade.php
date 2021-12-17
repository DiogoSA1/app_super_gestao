<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method='post'>
    @csrf
    <select name="product_id" class="borda-preta">
        <option>-- Selecione um Cliente --</option>
        @foreach ( $produtos as $produto )
            <option value="{{ $produto->id }}"{{ old('cliente_id') == $produto->id ? 'selected' : '' }}>{{ $produto->nome }}</option>
        @endforeach
    </select> 
        {{ $errors->has('product_id') ? $errors->first('product_id') : ''}}

        <input type="number" name="quantidade" value="{{old('quantidade') ? old('quantidade') : ''}}" placeholder="Quantidade" class="borda-preta">
        {{ $errors->has('quantidade') ? $errors->first('quantidade') : ''}}

        <button type="submit" class="borda-preta">Adicionar</button>
    </form> 
@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method='post'>
    @csrf
    @method('PUT')   
@else
    <form action="{{ route('produto-detalhe.store') }}" method='post'>
    @csrf   
@endif
        {{-- <input type="hidden" name="id" value="{{ $$produto_detalhe->->id ?? ''}}"> --}}
        <input type="text" name="product_id" value="{{ $produto_detalhe->product_id ?? old('product_id') }}" placeholder="ID do produto" class="borda-preta">
        {{ $errors->has('product_id') ? $errors->first('product_id') : ''}}
        <input type="text" name="comprimento" value="{{$produto_detalhe->comprimento ??  old('comprimento') }}" placeholder="comprimento" class="borda-preta">
        {{ $errors->has('comprimento') ? $errors->first('comprimento') : ''}}
        <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="largura" class="borda-preta">
        {{ $errors->has('largura') ? $errors->first('largura') : ''}}
        <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="altura" class="borda-preta">
        {{ $errors->has('altura') ? $errors->first('altura') : ''}}
        <select name="unidade_id" class="borda-preta">
            <option>-- Selecione a Unidade de Medida --</option>
            @foreach ( $unidades as $unidade )
                <option value="{{ $unidade->id }}"{{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
        <button type="submit" class="borda-preta">Adicionar</button>
    </form> 
<p class="descSite">Seja bem vindo ao sistema de atendimento online do <?php $layout->theName(); ?></p>
<div class="formAtendimento">
    <form name="formSet" action="javascript:void(0);">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome "placeholder="Digite o seu nome" />
        
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email "placeholder="Digite o seu email" />
        
        <label for="telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone "placeholder="Digite o seu telefone" />
        
        <label for="codPedido">Código do Pedido</label>
        <input type="text" id="codPedido" name="codPedido "placeholder="Digite o código do seu pedido" />
        
        <label for="duvida">Duvida</label>
        <textarea id="duvida" placeholder="Para facilitar no atendimento, digite a sua duvida"></textarea>
        
        <input type="submit" value="Solicitar atendimento" class="toFila" />
    </form>
</div>
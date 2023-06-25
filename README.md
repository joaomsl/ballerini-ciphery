<h1 align="center">🔐 Ciphery</h1>

<p align="center">
    <img 
        src="https://github.com/joaomsl/ballerini-pomodoro/assets/109992990/e079afa3-11e4-47c6-9a7c-0609b45de0c8" 
        alt="Banner"
    > 
</p>

<p><strong>🆕 Preview</strong> - Visualize a aplicação no link abaixo:</p>

[Visualizar aplicação](https://ballerini-ciphery.onrender.com/)

<h2>💡 O que essa mini-aplicação faz?</h2>
<p>Com essa aplicação você consegue gerar senhas seguras tendo o controle do conjunto de caracteres que vai ser utilizado. Como bônus o sistema ainda pode criptografar/gerar o hash da sua senha em <code>md5</code>, <code>sha1</code> ou <code>bcrypt</code>.</p>

<h2>📂 Sobre o conteúdo repositório</h2>
<p>A aplicação disponível neste repositório é a minha resolução do desafio proposto na comunidade da Ballerini.</p>
<p>O design do software não é de minha autoria (mesmo tendo pequenas alterações). Todos os assets utilizados (incluindo o próprio protótipo) foram fornecidos pela equipe da Ballerini durante o desafio.</p>

> Créditos adicionais no final do readme

<h2>❗ Observações</h2>
<p>
    Essa aplicação é de <strong>cunho educativo</strong>, e mesmo não oferecendo nenhum risco aos usuários não me responsabilizo por falhas, bugs ou qualquer outro problema relacionado a software, toda via fique a vontade para 
    <a href="https://github.com/joaomsl/ballerini-ciphery/issues">criar issues</a>
    ou 
    <a href="https://github.com/joaomsl/ballerini-ciphery/pulls">pull-requests.</a>
</p>
<p>Como se trata de uma aplicação com fim educativo nada aqui deve ser levado como boa prática ou algo do gênero. Várias das soluções apresentadas aqui podem ser uma versão/visão funcional, porém essas podem não ser boas recomendações para uma aplicação real em produção...</p>

<h2>🧩 Tecnologias utilizadas</h2>
<p>Na minha resolução optei por não utilizar um framework como React, Vue ou Angular - E também elas não estão no meu domínio (por enquanto).</p>

<ul>
    <li><strong>Tailwind CSS</strong> - Para agilizar a estilização do projeto (indiretamente o protótipo recomendava)</li>
    <li><strong>AlpineJS</strong> - Essa aplicação em JS puro iria ser bem complicada... Mas que bom que temos o Alpine para ter a reatividade e uma interação simplificada com os eventos da página.</li>
    <li><strong>HTML, CSS e Js/Node</strong> - A explicação se dispensa acredito...</li>
    <li><strong>Vite</strong> - O nosso bundler/transpilador para juntar tudo isso em uma aplicação web.</li>
    <li><strong>Laravel</strong> - A aplicação é um monólito, e além de fornecer o front-end, o Laravel, também fornece a nossa API que será abordada abaixo:</li>
</ul>

<h2>🧱 API</h2>
<p>Mesmo sendo uma aplicação simples foi possível implementar uma api, e como a primeira tentativa com o Livewire não ficou muito... "apresentável", a versão 2 (a atual) controla o estado via o AlpineJS e faz requisições para a api que gera a senha (e as criptografa).</p>

> ⚠ Se lembre de adicionar os headers `Content-Type: application/json` e `Accept: application/json`

<h3>📖 Recuperando as opções disponíveis</h3>
<p>O "front-end" não fica prefixado com as opções de criptografia ou conjunto de caracteres. Inicialmente o que ocorre é uma requisição para consultar as opções disponíveis, e uma vez tendo isso em mãos são renderizados os badges:</p>
<code>OPTIONS: /api/generator</code>
<p>Resposta esperada:</p>
<pre>
{
    "hashing_algos": {
        "md5": "MD5",
        "sha1": "SHA-1",
        "bcrypt": "Bcrypt"
    },
    "characteristics": {
        "capital_letters": "ABC",
        "small_letters": "abc",
        "numbers": "123",
        "symbols": "!#@"
    }
}
</pre>

> Existe uma rotina de cache para que essa requisição não seja feita a todo o momento

<h3>🔒 Gerando a senha & hash</h3>
<p>Uma vez que tenha as opções de geração basta enviar elas via POST:</p>
<code>POST: /api/generator</code>
<p>Corpo da requisição:</p>
<pre>
{
	"characteristics": ["capital_letters", "small_letters", "numbers", "symbols"],
	"hashing_algo": "md5",
	"size": 8 // o tamanho da senha (min. 4, max. 64)
}
</pre>
<p>Resposta esperada:</p>
<pre>
{
	"password": "********",
	"hash": "*******************"
}
</pre>

<h3>🔃 Regerando o hash</h3>
<p>Se você já tem a senha e só quer o hash dela basta realizar um POST:</p>
<code>POST: /api/generator/hash</code>
<p>Corpo da requisição:</p>
<pre>
{
	"hashing_algo": "md5",
	"password": "********" // min. 4, max. 64
}
</pre>
<p>Resposta esperada:</p>
<pre>
{
	"hash": "*****************"
}
</pre>

<h2>✨ Créditos/Links</h2>

* [Ruy Monteiro (Instagram)](https://www.instagram.com/ruy.dev/)
* [Mateus Santos (Instagram)](https://www.instagram.com/mateusdobit/)
* [Comunidade da Ballerini (Discord)](https://discord.com/invite/ballerini)
* [Protótipo da aplicação (Figma)](https://www.figma.com/community/file/1250531181331478542)
* [Esqueci de você? Abra uma issue!](https://github.com/joaomsl/ballerini-ciphery/issues)
